/* Fonction qui permet de faire apparaître / disparaître la sidebar */
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

      $('html, body').animate({
         scrollTop: $(page).offset().top
      }, speed);
      return false;
   });

   // Différente pour le bouton top
   $('.menu-top').on('click', function() {

      var page = $(this).attr('href'); // Page cible
      var speed = 750; // Durée de l'animation (en ms)

      $('html, body').animate( { scrollTop: $(page).offset().top }, speed ); // Go
      return false;

   });

   /* Features en fonctions du scroll*/

      /* Convertiseur pixel en viewport */
         var px_per_vh = $(window).height() / 100;

      /* On cache le contenu des sections qui apparaitront au scroll */
      $('div[id^=content]').hide();

      window.addEventListener("scroll",function() {

         // Fonction permettant en fonction du scroll de faire apparaître/disparaître le bouton revenir en haut
         if(window.scrollY > px_per_vh * 15) {
            $('.menu-top').show();
         }
         else {
            $('.menu-top').hide();
         }

         if(window.scrollY > px_per_vh * 50) {
            $('#content-about-me').show();
         }

         if(window.scrollY > px_per_vh * 130) {
            $('#content-project').show();
         }

         if(window.scrollY > px_per_vh * 240) {
            $('#content-skills').show();
         }

         if(window.scrollY > px_per_vh * 370) {
            $('#content-timeline').show();
         }

         if(window.scrollY > px_per_vh * 550) {
            $('#content-contact-recommend').show();
         }
      },false);


/* Fonction qui force le retour en haut au refresh de la page */
$(window).on('beforeunload', function() {
   $(window).scrollTop(0,0);
});

/* Animations sidebar de la partie compétences */
   $(".progress-bar").css("width", "0px");
   $(function() {
      $(".progress-bar").each(function() {
         var finalWidth = parseInt($(this).attr("data-width"));
         $(this).css("width", "0px").animate({width: finalWidth+"%"}, 500);
      });
   });

   // Affichage du numéro de téléphone
   $('a.phone-trigger').on('click', function() {
      $('a#phone').toggleClass('display-0 visible');
      $('a.linkedin').toggleClass('display-0');
      $('a.github').toggleClass('display-0');
      $('a.settings').toggleClass('display-0');
      $(this).find('svg').toggleClass('fa-phone fa-undo-alt');
   });
});