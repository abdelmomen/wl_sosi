<div class="col_w900_comments" >
<?php 
// Check if post is pwd protected
if(post_password_required()):?>
	<p> This post comments cant be displayed because this post is password protected </p>
<?php endif; ?>

<?php 
// Check if post have comments
if(have_comments()):?>
	

	<!-- <a href="#respond" class="article-add-comments">+</a> -->
	
	<h3 class="comments-header"> <?php _ec('labels','comments');?> : <span class="comments-number"> <?php comments_number(""," 1 "," % ");?> </span> </h3>
	
	<ol class="commentslist">
		<?php wp_list_comments("callback=wl_comments"); ?>
	</ol>
	
	<?php 
	// Check if wp enabled comments pagination
	if(get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
					
		<div class="centerized clearfix comment-nav">
			
			<span class="fl"><?php previous_comments_link(_gt('labels','older_comments'));?></span>
			<span class="fr"><?php next_comments_link(_gt('labels','newer_comments'));?></span>
			
		</div> <!-- end comments-nav-section -->
	

	<?php endif; // end check if wp enabled comments pagination ?>

<?php
elseif(!comments_open() && !is_page() && post_type_supports(get_post_type(),'comments') ):?>

	<p> Comments Are Closed </p>
	
<?php endif; 
?>
<!-- Comments Form Container -->
<div id="contact_form">
<?php
$defaults=array(
	'comment_notes_before'	=> '',
	'comment_notes_after'	=> '<p>'
							.'<input type="reset" value="'._gt('labels','reset').'" id="reset" name="reset" class="submit_btn float_r">'
							.'</p><div class="cleaner"></div>',
);

$defaults['comment_field']=<<<HERE
	<p>
		<textarea name="comment" id="comment" cols="30" rows="10"></textarea>
	</p>
HERE;

comment_form($defaults);
?>
</div><!-- contact_form -->

</div><!-- col_w900_comments -->
