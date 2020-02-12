$('.menu-trigger').on('click', function() {

    // La balise <i> de Font Awesome se tranforme en balise svg
   $(this).find('svg').toggleClass('fa-bars fa-times');
   $('#sidebar').toggleClass('visible');

});

// Fonction permettant un smooth scroll
$(document).ready(function() {
   $('.js-scrollTo').on('click', function() { // Au clic sur un élément
      var page = $(this).attr('href'); // Page cible
      var speed = 750; // Durée de l'animation (en ms)
      $('html, body').animate( { scrollTop: $(page).offset().top }, speed ); // Go
      return false;
   });
});


// Fonction permettant en fonction du scroll de faire apparaître/disparaître le bouton revenir en haut
window.addEventListener("scroll",function() {
   if(window.scrollY > 50) {
      $('.menu-top').show();
   }
   else {
      $('.menu-top').hide();
   }

},false);

/*
var lastScrollTop = 0;
$(window).scroll(function(event){
   var st = $(this).scrollTop();
   if (st > lastScrollTop){
      // downscroll code
   } else {
      // upscroll code
   }
   lastScrollTop = st;
});
*/