$('button.btn-admin-login').on('click', function () {
    var id = $('#loginID').val();
    var password = $('#loginPassword').val();

    if (id !=null && password !=null) {

        var formData = $('form.form-admin-login').serialize();
        var url = site_url + 'admin/login-attempt';

        // On clear les potentielles erreurs qui auraient été affiché à un premier essais
        $('p.field-error-admin').text('');
        var elementSelected = $('p.field-error-admin');

        $.ajax({
            url : url,
            type: 'POST',
            data : formData,
            success : function (data) {

                if (data.error) {

                    elementSelected.each(function () {
                        for (var key in data.error) {
                            if ($(this).attr('data-field') === key) {
                                $(this).html(data.error[key]);
                            }
                        }
                    });

                    $('p.field-error-admin-match').html(data.error);

                } else {

                    Swal.fire({
                        position : 'center',
                        icon : 'success',
                        title : 'Vous êtes connecté au panel administration !',
                        showConfirmButton : false,
                        timer: 1000,
                    });
                    setTimeout(function(){ location.reload() }, 1300);

                }

            }
        });

    }
});