<?php get_header()?>


<div class="post-sep"> <img src="http://lorempixel.com/800/120/" /> </div>

<div class="side-single"><?php get_sidebar();?></div>

<div class="main-single">
		<div class=" col_w900_last post-single">

			<hr class="hr-sep" />

				<?php while (have_posts()) : the_post(); ?>
				
					<article  <?php post_class('section ')?>  id="post-<?php the_ID();?>">
						
							<div class="section-head">
							<div class="vrt-sep"></div>
							<h2 >
								<a href="<?php the_permalink();?>" class="wl-title bolder">
									<?php the_title();?>
								</a>
							</h2>

							<?php 
							if(current_user_can('edit_post',$post->ID))
								edit_post_link(_gt("labels","edit")." "._gt("labels","thepage"),'<span class="article-meta-extra">','</span>');
							?>
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
						<?php if(has_post_thumbnail()): ?>
						<figure class="article-preview-image">
							<a href="<?php the_permalink();?>">
								<?php the_post_thumbnail('medium');?>
							</a>
						</figure>
						<?php endif;?>
						
							<?php the_content();?>
						</div>

						<?php wp_link_pages(array(
							'before'=>'<p class="post-navigation">',
							'after'=>'</p><!-- end post-navigation -->',
							'pagelink'=>_gt('labels','page').' % | ',
						));?>
						
					</article>
					
					
					<hr class="hr-sep"/>

				<?php endwhile;?>

        </div>
    	<?php comments_template();?>
    	<div class="cleaner"></div>
    </div> <!-- end of main side-->

<?php get_footer();?>