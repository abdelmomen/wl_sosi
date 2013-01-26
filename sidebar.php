<?php
// !dynamic_sidebar('main-sidebar') will display the main-sidebar widget
if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('main-sidebar')):?>

<!--  No assigned main-sidebar -->

<div class="sidebar-widget">
					
	 <h4> Search </h4>
	 
	 <?php get_search_form(); ?>
	
</div> <!-- end sidebar-widget -->
				
<?php endif;?>