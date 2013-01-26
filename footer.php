</div> <!-- wrapper -->

<div class="footer-sep"></div>

<div id="templatemo_footer_gadgets">

	<?php get_sidebar('left-footer'); ?>
	
	<?php get_sidebar('right-footer'); ?>
	<div class="cleaner"></div>
</div>

	<div id="templatemo_footer">
    	<?php _ec('labels','copyright');?> &copy; <?php echo date('Y');?> <a href="<?php echo home_url();?>"><?php bloginfo('name')?></a> | 
    	<?php _ec('labels','designed_by');?>
		<a href="http://www.templatemo.com" target="_parent"><?php _ec('labels','author');?></a>&copy; 
        <div class="cleaner"></div>
	</div>
	
<?php wp_footer();?>
</body>
</html>