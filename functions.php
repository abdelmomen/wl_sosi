<?php
//=====================================
// Define Constants
//=====================================

define('WL_THEME_ROOT',get_stylesheet_directory_uri());
define('WL_THEME_IMAGES',WL_THEME_ROOT.'/images');
define('WL_THEME_DOMAIN',"wl-themes");
define('WL_THEME_AUTHOR',__('Abdelmomen Bauomy',WL_THEME_DOMAIN));
//=====================================
// Register Template info
//=====================================



//=====================================
// Menus
//=====================================
// Just Support Menus then get Menu by its name
register_nav_menus(array());
