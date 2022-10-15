$(document).ready(function(){
  $(".owl-carousel.custom-reviews").owlCarousel({
    loop:true,
    margin:0,
    nav:false,
    autoplay: true,
    autoplayTimeout: 3000,
    dots: true,
    autoHeight: false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
  });
});
