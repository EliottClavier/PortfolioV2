$('button.btn-update-user-name-send').on('click', function() {

    $('#modalUpdateUserName').modal("show");

    var formData = $('form.form-update-user-name').serialize();
    var url = site_url + 'admin/update-username-attempt/';

    // On clear les potentielles erreur qui auraient été affiché à un premier essais
    $('p.field-error-admin').text('');
    var elementSelected = $('p.field-error-admin');

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
                    title : 'Votre identifiant a été mis à jour ! Veuillez vous reconnecter.',
                    showConfirmButton : false,
                    timer: 1300
                });

                setTimeout(function(){ location.reload() }, 1500);

            }

        }
    });

});

$('button.btn-update-user-password-send').on('click', function() {

    $('#modalUpdateUserPassword').modal("show");

    var formData = $('form.form-update-user-password').serialize();
    var url = site_url + 'admin/update-password-attempt/';

    // On clear les potentielles erreur qui auraient été affiché à un premier essais
    $('p.field-error-admin').text('');
    var elementSelected = $('p.field-error-admin');

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
                    title : 'Votre identifiant a été mis à jour ! Veuillez vous reconnecter.',
                    showConfirmButton : false,
                    timer: 1300
                });

                setTimeout(function(){ location.reload() }, 1500);

            }

        }
    });

});