/**
 * @file
 * Javascript for azhagu theme.
 */
(function ($) {

Drupal.behaviors.azhagu = {
  attach: function (context) {
  	// Prefill the search box with Search... text.
    $('#search-block-form input:text', context).autofill({
      value: "Search ..."
    });

    $('nav#navigation').prepend('<div id="menu-icon">Menu</div>');

    $("#menu-icon").bind("click", function(){
		$("nav#navigation ul.menu").slideToggle('slow');
		$(this).toggleClass("active");
	});

  }
};

})(jQuery);
