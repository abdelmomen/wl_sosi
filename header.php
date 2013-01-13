<!DOCTYPE html>
<html <?php language_attributes();?> >
<head>
	<meta charset="<?php bloginfo('charset');?>">
	
	<title><?php wp_title('|',true,'right');?><?php bloginfo('name');?> </title>
	
	<meta name="description" content="<?php bloginfo('description');?>">
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url');?>" />

<link rel="stylesheet" type="text/css" href="<?php print WL_THEME_ROOT ;?>/css/ddsmoothmenu.css" />

<link rel="stylesheet" type="text/css" href="<?php print WL_THEME_ROOT ;?>/rtl.css" />

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
    
</head>
<body>

<div id="templatemo_wrapper">

	<div id="templatemo_header">
    
        <div id="site_title"><h1><a href="<?php echo home_url();?>"><?php bloginfo('name');?></a></h1></div>
        
        <div id="templatemo_menu" class="ddsmoothmenu">
           <!--  <ul>
            
                <li><a href="<?php echo home_url();?>" class="selected">الرئيسية</a></li>
                <li><a href="about.html">من نحن</a>
                    <ul>
                    	<li><a href="http://www.templatemo.com/page/1">محتوي عربي 1</a></li>
                        <li><a href="http://www.templatemo.com/page/2">محتوي عربي 2</a></li>
                        <li><a href="http://www.templatemo.com/page/3">محتوي عربي 3</a></li>
                    </ul>
                </li>
                <li><a href="portfolio.html">اعمالنا</a>
                    <ul>
                    	<li><a href="http://www.templatemo.com/page/1">محتوي عربي 1</a></li>
                        <li><a href="http://www.templatemo.com/page/2">محتوي عربي 2</a></li>
                        <li><a href="http://www.templatemo.com/page/3">محتوي عربي 3</a></li>
                    </ul>
                </li>
                <li><a href="services.html">خدمات</a>
                    <ul>
                    	<li><a href="http://www.templatemo.com/page/1">Sub menu 1</a></li>
                        <li><a href="http://www.templatemo.com/page/2">Sub menu 2</a></li>
                        <li><a href="http://www.templatemo.com/page/3">Sub menu 3</a></li>
                        <li><a href="http://www.templatemo.com/page/4">Sub menu 4</a></li>
                        <li><a href="http://www.templatemo.com/page/5">Sub menu 5</a></li>
                    </ul>
                </li>
                <li><a href="contact.html">اتصل بنا</a></li>
                 
            </ul>
            -->
					<?php 
					// imortant empty container for the ddsmoothmenu sake 
					wp_nav_menu( array('menu' => 'Top Menu','container'=>'' )); ?>

            <br style="clear: left" />
        </div> <!-- end of templatemo_menu -->
        <div class="cleaner"></div>
    </div> <!-- end of templatemo header -->
    
    <div id="templatemo_middle">
    	<div id="mid_slider">
			<h3 class="verticalar"> TODO : Slider Goes Here</h3>
        </div>
        <div id="mid_left">
            <div id="mid_title">
               ADD PAGE HERE
            </div>
            <p>محتوي عربي محتوي عربي محتوي عربي محتوي عربي  محتوي عربي محتوي عربي محتوي عربي محتوي عربي محتوي عربي محتوي عربي محتويمحتوي عربي .</p>
            <div id="learn_more"><a href="#">اعرف اكثر</a></div>
	  	</div>
        <div class="cleaner"></div>
	</div> <!-- end of middle -->