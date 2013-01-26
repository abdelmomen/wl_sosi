<form action="<?php echo home_url();?>" id="search-form" method="get">
						 
	 <input type="text" value="<?php _ec('labels','search');?>" name="s"
	 onblur="if(this.value=='')this.value='<?php _ec('labels','search');?>'" 
	 onfocus="if(this.value=='<?php _ec('labels','search');?>')this.value=''" />
	 
	 <input type="hidden" value="submit" />
	 
</form>
<br/>