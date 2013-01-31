<?php get_header()?>

    <div id="templatemo_middle">
    	<div id="mid_slider">
			<?php echo wl_slider();?>
        </div>
        <div id="mid_left">
            <?php
            	$intro_page_name="intro";
	            $post=get_page_by_path($intro_page_name);
	            if(!empty($post)):
	            setup_postdata($post);
            ?>
            <div id="mid_title">
            <?php  echo $post->post_title;?>
            </div>
            <p>
            <?php echo $post->post_content;?>
            </p>
            <div style="text-align: center">
            	<button onclick="location.href='<?php echo the_permalink();?>'" class="link_btn">
		     		<?php _ec("labels","knowmore");?>
		     	</button>
            
            </div>
            <?php else:?>
            <h3> Here you will get the excerpt <br/> of the page with slug name : {<?php echo $intro_page_name;?>}</h3>
            <?php endif;?>
	  	</div>
        <div class="cleaner vrt-sep"></div>
	</div> <!-- end of middle -->
	
    <div id="templatemo_main">

<?php if(!is_paged() && is_home()):?>
        <div class="col_w900">
<?php
// The Loop of products
$i_plus=0;
$args = array( 'post_type' => 'product', 'posts_per_page' => 6 );
$loop = new WP_Query( $args );
while ( $loop->have_posts()) : $loop->the_post();// important (fetch post)

if(++$i_plus == 4){
	// new row
	echo '<div class="vrt-sep"></div>';
}
?>

<div class="col_allw280 fp_service_box">

<h3 class="con_tit_02" id="post-<?php the_ID(); ?>">
<a class="wl-title" href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
<?php the_title(); ?></a></h3>

<?php
if ( has_post_thumbnail()) {
    the_post_thumbnail(array(50,50));//null to get thumbnails with the normal size
}
?>

	<div class="entry_thumb">
		<?php the_excerpt(); ?>
	</div><!-- end entry -->

</div><!-- end col_allw280 div -->
<?php endwhile;// End Loop ?>
                
            <div class="cleaner"></div>
        </div>
<?php endif;?>
		<div class="col_w900  col_w900_last">

			<hr class="hr-sep" />

				<?php while (have_posts()) : the_post(); ?>
				
					<article  <?php post_class('section')?>  id="post-<?php the_ID();?>">
						
							<div class="section-head">
							<?php the_category(" | ");?>
							<h2 >
								<a href="<?php the_permalink();?>" class="wl-title bolder">
									<?php the_title();?>
								</a>
							</h2>
							<span class="wl-meta">
							
								<?php 
								// note that the_date display once for the same posts date
								the_time(get_option('date_format'));
								?>
								| <?php _ec('labels','by')?> :<?php the_author_posts_link();?>

								<?php 
								// Display comments link if comments are allowed and the post isn't pwd protected
								if(comments_open() && !post_password_required()){
									echo "| "._gt('labels','comments')." : ";
									comments_popup_link('0','1','%','article-meta-comments');
								}
								?>
							</span>
							
							</div>
							<?php 
							$meta=( get_post_custom($post->ID));
							if(!empty($meta['custom_icon'][0])):
							?>
								<span class="icon" id="<?php echo $meta['custom_icon'][0]; ?>"></span>
							<?php else:?>
							 	<span class="icon entry-icon" ></span>							 
							<?php endif;?>

						<div class="section-content">
							<?php the_content(_gt('labels','readmore'));?>
						</div>
						
					</article>
					
					<hr class="hr-sep"/>
					
				<?php endwhile;?>

        </div>    
    	
    	<?php wl_pagination();?>
    	<div class="cleaner"></div>
    </div> <!-- end of main -->
    
<?php get_footer();?>