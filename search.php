<?php get_header()?>

<div class="post-sep"> <img src="http://lorempixel.com/800/120/" /> </div>

<div class="side-single"><?php get_sidebar();?></div>

<div class="main-single">

		<div class="post-single  col_w900_last">

			<hr class="hr-sep" />
			<?php if(have_posts()) :?>
			<h4 class="wl-confirm centerized"><?php _ec('labels','search_results')?> <?php echo get_search_query();?></h4>
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
								<?php the_date(get_option('date_format')); ?> 
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
				<?php else:?>
				<h4 class="wl-error centerized" style="padding : 20px 0">
				<?php _ec('labels','no_results')?> <?php echo get_search_query();?>
				</h4>
				
				<hr class="hr-sep"/>
				<?php endif;?>

        </div>    
    	
    	<?php wl_pagination();?>
    	<div class="cleaner"></div>
    </div> <!-- end of main -->
    
<?php get_footer();?>