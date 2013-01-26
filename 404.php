<?php get_header()?>

<div class="post-sep"> <img src="http://lorempixel.com/800/120/" /> </div>


		<div class="col_w900_last col_w900">

			<hr class="hr-sep" />
				<h4 class="wl-error centerized" style="padding : 20px 0">
				<?php _ec('labels','notfound')?> 
				</h4>
				<div class="search-404">
				<?php _ec('labels','notfound-message');?>
				<div class="vrt-sep"></div>
				<?php get_search_form();?>
				</div>
				
			<hr class="hr-sep"/>
        </div>
    	<div class="cleaner"></div>


<?php get_footer();?>