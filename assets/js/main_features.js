$('.menu-trigger').on('click', function() {

    // La balise <i> de Font Awesome se tranforme en balise svg
   $(this).find('svg').toggleClass('fa-bars fa-times');
   $('#sidebar').toggleClass('visible-sidebar');

});


$(document).ready(function() {
   // Fonction permettant un smooth scroll
   $('.js-scrollTo').not('.menu-top').on('click', function() {
      var page = $(this).attr('href'); // Page cible
      var speed = 750; // Durée de l'animation (en ms)

      /* Retire la sidebar quand on click sur un lien qui scroll */
      $('.menu-trigger').find('svg').toggleClass('fa-times fa-bars');
      $('#sidebar').toggleClass('visible-sidebar');

      $('html, body').animate( { scrollTop: $(page).offset().top }, speed ); // Go
      return false;
   });

   // Différente pour le bouton top
   $('.menu-top').on('click', function() {

      var page = $(this).attr('href'); // Page cible
      var speed = 750; // Durée de l'animation (en ms)

      $('html, body').animate( { scrollTop: $(page).offset().top }, speed ); // Go
      return false;

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

   // Affichage du numéro de téléphone
   $('a.phone-trigger').on('click', function() {
      $('a#phone').toggleClass('display-0 visible');
      $('a.linkedin').toggleClass('display-0');
      $('a.github').toggleClass('display-0');
      $('a.settings').toggleClass('display-0');
      $(this).find('svg').toggleClass('fa-phone fa-undo-alt');
   });
});