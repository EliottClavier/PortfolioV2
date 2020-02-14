$('button.btn-contact-send').on('click', function() {

    $('#modalContact').modal("show");

    var formData = $('form.form-contact').serialize();
    var url = site_url + 'attempt-contact/';

    // On clear les potentielles erreur qui auraient été affiché à un premier essais
    $('p.field-error').text('');
    var elementSelected = $('p.field-error');

    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        success: function(data) {

            if (data.error) {

                elementSelected.each(function () {
                    for (var key in data.error) {
                        if ($(this).attr('data-field') === key) {
                            $(this).html(data.error[key]);
                        }
                    }
                })

            } else {

                Swal.fire({
                    position : 'center',
                    icon : 'success',
                    title : 'Votre message a été envoyé avec succès !',
                    showConfirmButton : false
                });

                $('#modalContact').modal("hide");

            }

        }
    });

});

$('button.btn-recommend-send').on('click', function() {

    $('#modalRecomend').modal("show");

    var formData = $('form.form-recommend').serialize();
    var url = site_url + 'attempt-recommend/';

    // On clear les potentielles erreur qui auraient été affiché à un premier essais
    $('p.field-error').text('');
    var elementSelected = $('p.field-error');

    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        success: function(data) {

            if (data.error) {

                elementSelected.each(function () {
                    for (var key in data.error) {
                        if ($(this).attr('data-field') === key) {
                            $(this).html(data.error[key]);
                        }
                    }
                })

            } else {

                Swal.fire({
                    position : 'center',
                    icon : 'success',
                    title : 'Votre recommandation a été envoyé et est en attente de vérification !',
                    showConfirmButton : false
                });

                $('#modalRecommend').modal("hide");

            }

        }
    });

});