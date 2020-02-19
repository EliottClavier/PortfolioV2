$body = $("body");

$(document).on({
   ajaxStart: function() { $body.addClass("loading");    },
   ajaxStop: function() { $body.removeClass("loading"); }
});


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
            $('#content-about-me').fadeIn(800);
         }

         if(window.scrollY > px_per_vh * 130) {
            $('#content-project').fadeIn(800);
         }

         if(window.scrollY > px_per_vh * 230) {
            $('#content-skills').fadeIn(800);
         }

         if(window.scrollY > px_per_vh * 330) {
            $('#content-timeline').fadeIn(800);
         }

         if(window.scrollY > px_per_vh * 430) {
            $('#content-contact-recommend').fadeIn(800)
         }
      },false);


/* Fonction qui force le retour en haut au refresh de la page */
/* $(window).on('beforeunload', function() {
   $(window).scrollTop(0,0);
}); */

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