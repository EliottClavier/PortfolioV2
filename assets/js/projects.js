$(document).ready(function(){
    $('button.btn-projects-completed').on('click',function(){
        $('div.projects-completed').animate({
            height: 'toggle'
        });
        $(this).find('svg').toggleClass('fa-angle-down fa-angle-up');
    });

    $('button.btn-projects-in-progress').on('click',function(){
        $('div.projects-in-progress').animate({
            height: 'toggle'
        });
        $(this).find('svg').toggleClass('fa-angle-down fa-angle-up');
    });

});

