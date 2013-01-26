<?php
//=====================================
// Define Constants And LAnguage
//=====================================

define('WL_THEME_ROOT',get_stylesheet_directory_uri());
define('WL_THEME_IMAGES',WL_THEME_ROOT.'/images');

if(get_bloginfo( 'language' )=='ar'){
	$lang=parse_ini_file( 'lang/arabic.ini',true);
}
else{
	$lang=parse_ini_file( 'lang/english.ini',true);
}

function _gt($section , $name=''){
	global $lang;
	return (!empty($name))? $lang[$section][$name] : $lang[$section];
}

function _ec($section , $name){
	echo _gt($section , $name);
}


//=====================================
// Register Template info
//=====================================

function wl_custom_post_product() {

	$labels = array(
		'name'               => _gt("product",'name'),
		'singular_name'      => _gt("product",'singular_name'),
		'add_new'            => _gt("product",'add_new'),
		'add_new_item'       => _gt("product",'add_new'),
		'edit_item'          => _gt("product",'edit'),
		'new_item'           => _gt("product",'new'),
		'all_items'          => _gt("product",'all'),
		'view_item'          => _gt("product",'view'),
		'search_items'       => _gt("product",'search'),
		'not_found'          => _gt("product",'notfound'),
		'not_found_in_trash' => _gt("product",'notfound'), 
		'parent_item_colon'  => '',
		'menu_name'          =>  _gt("product",'name'),
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds our products and product specific data',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
		'has_archive'   => true,
	);
	register_post_type( 'product', $args );
	//flush_rewrite_rules();// Just once to assure the .htaccess will get the new changes
	// http://codex.wordpress.org/Function_Reference/flush_rewrite_rules
}
add_action( 'init', 'wl_custom_post_product' );


//=====================================
// Menus
//=====================================
// Just Support Menus then get Menu by its name
register_nav_menus(array());

//=====================================
// Theme Supports
//=====================================

add_theme_support( 'post-thumbnails' );

//=====================================
// Pagination 
//=====================================
function wl_pagination() {
	global $wp_query;  
	$total_pages = $wp_query->max_num_pages;  
	if ($total_pages > 1){  
	  $current_page = max(1, get_query_var('paged'));  
	  echo '<div class="pages_nav">';  
	  echo paginate_links(array(  
	      'base' => get_pagenum_link(1) . '%_%',  
	      'format' => '/page/%#%',  
	      'current' => $current_page,  
	      'total' => $total_pages,  
	      'prev_text' => _gt('labels','prev'),  
	      'next_text' => _gt('labels','next') 
	    ));  
	  echo '</div>';  
	}
}
//=====================================
// Register The Sidebars
//=====================================

if (function_exists('register_sidebar')){
	
	register_sidebar(array(
		'name' 	=> 'Main Sidebar',
		'id'	=> 'main-sidebar',
		'description' 	=> 'The main Sidebar area',
		'before_widget'	=> '<div class="sidebar-widget">',
		'after_widget'	=> '</div><!-- end sidebar widget -->',
		'before_title'	=> '<h4>',
		'after_title'	=> '</h4>',
	));
	
		register_sidebar(array(
		'name' 	=> 'Left Footer',
		'id'	=> 'left-footer',
		'description' 	=> 'The Left Footer area',
		'before_widget'	=> '<div class="footer-sidebar-widget">',
		'after_widget'	=> '</div><!-- end footer-sidebar left -->',
		'before_title'	=> '<h4>',
		'after_title'	=> '</h4>',
	));
	
	register_sidebar(array(
		'name' 	=> 'Right Footer',
		'id'	=> 'right-footer',
		'description' 	=> 'The Right Footer Sidebar area',
		'before_widget'	=> '<div class="footer-sidebar-widget">',
		'after_widget'	=> '</div><!-- end footer-sidebar-widget right -->',
		'before_title'	=> '<h4>',
		'after_title'	=> '</h4>',
	));
}

//=====================================
// function to custom display of comments
//=====================================

function wl_comments($comment,$args,$depth){
	
	$_GLOBALS['comment']=$comment;
?>
	
	<li id="comment-<?php comment_ID()?>">
		<article <?php comment_class("clearfix")?>>
		
			<figure class="comment-avatar">
				<?php 
				
				$avatar_size=64;
				
				echo get_avatar($comment,$avatar_size);
				?>
			</figure>
			
			<div class="comment-body">
			<header>
				<h5><?php comment_author_link()?></h5>
				<p>
				<span>on <?php comment_date(); ?> </span>
				
				<?php 
				$rep_args=array_merge($args,array(
					'depth' => $depth ,
					'max_depth' => $args['max_depth'] ,
				));
				comment_reply_link($rep_args);
				?>
				</p>
			</header>

			<?php if ($comment->comment_approved== '0'):?>
				<p class="awaiting-moderation"><?php _ec('labels','comment_moderation');?></p>
			<?php endif;?>
			
			<?php comment_text(); ?>
			
			</div>

			<div class="cleaner"></div>
		</article>
		
	<!-- </li> will be added automatically -->
						
	<?php 
}// End adaptive_comments

function wl_custom_comment_fields(){
	
	$commenter = wp_get_current_commenter();
	$req = get_option('require_name_email');
	$aria_req = ($req ? "aria-required='true'":' ');
	
	$fields=array(
		'author'=>	'<p><label for="author">'._gt('labels','name').": ".($req? _gt('labels','required') :' ').'</label>'
					.'<input type="text" value="'. esc_attr($commenter['comment_author'])
					.'" name="author" id="author" '.$aria_req.' /></p>',
					
		'email'=>	'<p><label for="email"> '._gt('labels','email').": ".($req? _gt('labels','required') :' ').'</label>'
					.'<input type="text" value="'. esc_attr($commenter['comment_author_email'])
					.'" name="email" id="email" '.$aria_req.' /></p>',
		'url'=>	'',
		/* Hashed
		'url'=>	'	<p><label for="url"> '._gt('labels','url').": ".' </label>'
					.'<input type="text" value="'. esc_attr($commenter['comment_author_url'])
					.'" name="url" id="url" '.$aria_req.' /> </p>',
					*/
		
	);
	
	return $fields;
}
add_filter('comment_form_default_fields','wl_custom_comment_fields');
