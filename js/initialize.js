jQuery(document).ready(function(){
    //jQuery('nav > ul#main-menu').superfish();

    jQuery('nav#navigation').prepend('<div id="menu-icon">Menu</div>');

    jQuery("#menu-icon").bind("click", function(){
		jQuery("nav#navigation ul.menu").slideToggle();
		jQuery(this).toggleClass("active");
	});

  });