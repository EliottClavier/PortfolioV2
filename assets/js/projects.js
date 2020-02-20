$(document).ready(function(){
    // Fonction qui permet de créer un effet de déroulement lorsque qu'on clique sur le bouton "Projets achevés" de la page projet
    $('button.btn-projects-completed').on('click',function(){
        $('div.projects-completed').animate({
            height: 'toggle'
        });
        $(this).find('svg').toggleClass('fa-angle-down fa-angle-up');
    });

    // Fonction qui permet de créer un effet de déroulement lorsque qu'on clique sur le bouton "Projets en cours" de la page projet
    $('button.btn-projects-in-progress').on('click',function(){
        $('div.projects-in-progress').animate({
            height: 'toggle'
        });
        $(this).find('svg').toggleClass('fa-angle-down fa-angle-up');
    });

});

