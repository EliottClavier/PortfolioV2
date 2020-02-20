// Fonction qui notifie le changement de l'état du slider pour chaque card  de recommandation dans le panel admin
$(document).on('click', 'input.slider-change',function() {

    var status;
    var id;

    if ($(this).is(':not(:checked)')) {
        console.log('Unchecked');
        status = 'pending';
        id = $(this).val();
    } else {
        console.log('Checked');
        status = 'verified';
        id = $(this).val();
    }

        var url = site_url + 'admin/recommend-switch-status/';

        $.ajax({
            url: url,
            type: 'POST',
            data: {
                status: status,
                id: id,
            },
            success: function(data) {
                    Swal.fire({
                        position : 'center',
                        icon : 'success',
                        title : 'Statut de la recommandation modifiée en ' + status,
                        showConfirmButton : false,
                        timer: 1300
                    });

            }});

});

// Fonction d'envoi de la valeur choisie dans le menu déroulant de type select (qui permet de chosir la méthode de tri pour les recommandations)
$('select.select-order').change(function(){
    var formData = $('form.form-select-order').serialize();
    var url = site_url + 'admin/recommend-select-order/';

    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        success: function(data) {

            $('div.search-true').show().html(data.view);
            $('div.search-false').hide()

        }});
});