$(window).scroll(function(){
  if($(this).scrollTop() > 150){
      $('.navbar').addClass('sticky')
  } else{
      $('.navbar').removeClass('sticky')
  }
});
$(document).ready(function(){
	$(window).scroll(function () {
			if ($(this).scrollTop() > 50) {
				$('#back-to-top').fadeIn();
			} else {
				$('#back-to-top').fadeOut();
			}
		});
		// scroll body to 0px on click
		$('#back-to-top').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 400);
			return false;
		});
});

  $(document).ready(function() {
    $("#tours-slider").owlCarousel({
      loop: true,
	  center:false,
      margin: 40,
      autoplay: true,
      autoplayHoverPause:true,      
      dots:false,
      infinite: true,
      nav:true,
      autoplayTimeout: 2500,
      smartSpeed: 450,
	  navigationText:['<i class="icon-arrow-left2"></i>','<i class="icon-arrow-right2"></i>'],
      responsive: {
				0: {
					items: 1,
				},
				768: {
					items: 2,
				},
				1024: {
					items: 3,
				}
			}
    });
});

$(document).ready(function() {
    $("#adventure-slider, #nature-slider, #wild-slider, #history-slider, #photo-slider, #art-slider").owlCarousel({
      loop: true,
	  right:true,
      margin: 30,
      autoplay: true,
      autoplayHoverPause:true,
      dots:false,
      infinite: true,
      nav:true,
      autoplayTimeout: 2500,
      smartSpeed: 450,
      navigationText:['<i class="icon-arrow-left2"></i>','<i class="icon-arrow-right2"></i>'],
      responsive: {
				0: {
					items: 1,
					nav:false,
				},
				768: {
					items: 2,
					nav:false,
				},
				1024: {
					items: 3
				}
			}
    });
});

$(document).ready(function() {
    $("#destinations-slider").owlCarousel({
      loop: true,
      margin: 30,
      autoplay: true,
      autoplayHoverPause:true,
      dots:false,
      infinite: true,
      nav:true,
      autoplayTimeout: 2500,
      smartSpeed: 450,
      navigationText:['<i class="icon-arrow-left2"></i>','<i class="icon-arrow-right2"></i>'],
      responsive: {
				0: {
					items: 1,
				},
				768: {
					items: 2,
				},
				1024: {
					items: 3
				}
			}
    });
});

$(document).ready(function() {
    $("#testimonial-slider").owlCarousel({
      loop: true,
      margin: 30,
      autoplay: true,
      autoplayHoverPause:true,
      dots:false,
      infinite: true,
      nav:true,
      autoplayTimeout: 2500,
      smartSpeed: 450,
      navigationText:['<i class="icon-arrow-left"></i>','<i class="icon-arrow-right"></i>'],
      responsive: {
				0: {
					items: 1,
					nav:false,
				},
				768: {
					items: 2,
					nav:false,
				},
				1024: {
					items: 3
				}
			}
    });
});

$(document).ready(function() {
    $("#place-visit-slider, #accommodation-slider").owlCarousel({
      loop: true,
      margin: 30,
      autoplay: true,
      autoplayHoverPause:true,
      dots:false,
      infinite: true,
      nav:true,
      autoplayTimeout: 2500,
      smartSpeed: 450,
      navigationText:['<i class="icon-arrow-left"></i>','<i class="icon-arrow-right"></i>'],
      responsive: {
				0: {
					items: 1,
					nav:false,
				},
				768: {
					items: 2,
					nav:false,
				},
				1024: {
					items: 4
				}
			}
    });
});


// $(document).ready(function() {
//     $("#syllabus-slider").owlCarousel({
//       loop: true,
//       center: true,
//       margin: 30,
//       autoplay: true,
//       autoplayHoverPause:true,
//       dots:false,
//       infinite: true,
//       nav:true,
//       autoplayTimeout: 2500,
//       smartSpeed: 450,
//       navigationText:['<i class="icon-arrow-left2"></i>','<i class="icon-arrow-right2"></i>'],
//       responsive: {
// 				0: {
// 					items: 1,
// 					nav:false,
// 				},
// 				768: {
// 					items: 2,
// 					nav:false,
// 				},
// 				1024: {
// 					items: 4
// 				}
// 			}
//     });
// });


  AOS.init();