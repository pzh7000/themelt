function toggleNav(x) {
  var toggle = document.getElementById("toggleNav");
  if (toggle.className === "toggleNav") {
      toggle.className += " active";
  } else {
      toggle.className = "toggleNav";
  };
   x.classList.toggle("change");
  // var hamburger = document.getElementById("hamburger-nav");
  // if (hamburger.className === "icon hamburger") {
  //     hamburger.className += " active";
  // } else {
  //     hamburger.className = "icon hamburger";
  // }
}


(function ($, root, undefined) {

	$(function () {

		'use strict';


		// DOM ready, take it away
		$(document).scroll(function () {
	    var $nav = $(".topnav");
	    $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
	  });


	});

})(jQuery, this);
