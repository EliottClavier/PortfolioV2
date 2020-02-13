$('.menu-trigger').on('click', function() {

    // La balise <i> de Font Awesome se tranforme en balise svg
   $(this).find('svg').toggleClass('fa-bars fa-times');
   $('#sidebar').toggleClass('visible-sidebar');

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

$('a.phone-trigger').on('click', function() {
   $('a#phone').toggleClass('display-0 visible');
   $('a.linkedin').toggleClass('display-0');
   $('a.github').toggleClass('display-0');
   $(this).find('svg').toggleClass('fa-phone fa-undo-alt');
});