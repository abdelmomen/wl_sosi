<!DOCTYPE html>
<html <?php language_attributes();?> >
<head>
	<meta charset="<?php bloginfo('charset');?>">
	
	<title><?php wp_title('|',true,'right');?><?php bloginfo('name');?> </title>
	
	<meta name="description" content="<?php bloginfo('description');?>">
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url');?>" />

<link rel="stylesheet" type="text/css" href="<?php print WL_THEME_ROOT ;?>/css/ddsmoothmenu.css" />

<link rel="stylesheet" type="text/css" href="<?php print WL_THEME_ROOT ;?>/rtl.css" />

<link rel="shortcut icon" href="<?php print WL_THEME_ROOT ;?>/images/favicon.ico">

<script type="text/javascript" src="<?php print WL_THEME_ROOT ;?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php print WL_THEME_ROOT ;?>/js/ddsmoothmenu.js">

/***********************************************
* Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>

<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "templatemo_menu", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script>

<?php wp_head();?>

</head>
<body>

<div id="templatemo_wrapper">

	<div id="templatemo_header">
    
        <div id="site_title"><h1><a href="<?php echo home_url();?>"><?php bloginfo('name');?></a></h1></div>
        
        <div id="templatemo_menu" class="ddsmoothmenu">

					<?php 
					// imortant empty container for the ddsmoothmenu sake 
					wp_nav_menu( array('menu' => 'Top Menu','container'=>'' )); ?>

            <br style="clear: left" />
        </div> <!-- end of templatemo_menu -->
        <div class="cleaner"></div>
    </div> <!-- end of templatemo header -->
    
