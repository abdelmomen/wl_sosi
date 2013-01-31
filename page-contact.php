<?php 
/*
	Template Name: Contact Us Page
*/
?>

<?php 
	
	$error_name 	=  false;
	$error_email	=  false;
	$error_message	=  false;
	
	$email_sent = false;
	$email_sent_error = false;
	
	// Initialize Vars for the form Fields

	$name	= '';
	$email	= '';
	$message	= '';
	$receiver_email	= '';
		
	if(isset($_POST['contact-submit'])){

		// Verify Name
		if(trim($_POST['contact-author'])==='')
			$error_name=true;
		else
			$name=trim($_POST['contact-author']);

		// Verify Email
		if(trim($_POST['contact-email'])==='' || ! is_email(trim($_POST['contact-email'])))
			$error_email=true;
		else
			$email=trim($_POST['contact-email']);
			
		// Verify Message
		if(trim($_POST['contact-message'])==='')
			$error_message=true;
		else
			$message=stripcslashes(trim($_POST['contact-message']));
		
		// Check if we have errors
		if(!$error_name && !$error_email && !$error_message){
			
			// Get the receiver email from theme options
			$receiver_email='abdelmomen1985@gmail.com';
			//TODO traslate the email context
			$subject = " by $name";
			$body = " message is : $message".PHP_EOL." \n from email : $email";
			$body.=(!empty($website))?PHP_EOL.' with website '.$website:'';

			// Send the email
			if(wp_mail($receiver_email,$subject,$body))
				$email_sent=true;
			else
				$email_sent_error=true;
				
				$name	= '';
				$email	= '';
				$message	= '';	
		}
	}

?>

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
						
					</article>
					
					<div class="vrt-sep"></div>
					<div  id="contact_form" >
					<form action="<?php the_permalink();?>" method="post" >
					<?php if($email_sent):?>
						<h3 class="wl-confirm"><?php _ec("errors","email_sent")?></h3>
					<?php elseif($email_sent_error):?>
						<h4 class="wl-error"><?php _ec("errors","email_sent_error")?></h4>
					<?php endif;?>
							<p>
								
								<label for="author"><?php _ec('labels','name');?> *
								
								<?php if($error_name):?>
								<span class="wl-error">
									<?php _ec('errors','name'); ?>
								</span>
								<?php endif;?>
								</label>
								<input type="text" value="<?php echo $name;?>" name="contact-author" id="author" />
							</p>
							<p>
								
								<label for="email"><?php _ec('labels','email');?> *
								<?php if($error_email):?>
								<span class="wl-error">
									<?php _ec('errors','email'); ?>
								</span>
								<?php endif;?>
								</label>
								<input type="text" value="<?php echo $email;?>" name="contact-email" id="email" />
							</p>

							<p>
							<?php if($error_message):?>
							<span class="wl-error">
								<?php _ec('errors','message'); ?>
							</span>
							<?php endif;?>
								<textarea name="contact-message" id="comment" cols="30" rows="10"><?php echo $message;?></textarea>
							</p>
							
							
							<p>
								<input name="contact-submit" type="submit" value="<?php _ec('labels','send');?>" />
							</p>
							
						</form>
						</div>
					<hr class="hr-sep"/>

				<?php endwhile;?>


        </div>
    	<div class="cleaner"></div>
    </div> <!-- end of main side-->

<?php get_footer();?>