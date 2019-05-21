function toggleNav(x) {
  var toggle = document.getElementById("toggleNav");
  if (toggle.className === "toggleNav") {
      toggle.className += " active";
  } else {
      toggle.className = "toggleNav";
  };
   x.classList.toggle("change");
}

// function collapseNav() {
//   $('.topnav a').click(function (e) {
//     console.log('click');
//    $('.toggleNav').collapse('active');
//  });
// }



(function ($, root, undefined) {

	$(function () {

		'use strict';


		// DOM ready, take it away
		$(document).scroll(function () {
	    var $nav = $(".topnav");
	    $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
	  });


    $('.toggleNav a').click(function (e) {
      // $('.toggleNav').toggle('active');
      var toggle = document.getElementById("toggleNav");
      var x = document.getElementById("hamburgular")
      if (toggle.className === "toggleNav") {
          toggle.className += " active";
      } else {
          toggle.className = "toggleNav";
      };
       x.classList.toggle("change");
    });




	});

})(jQuery, this);
