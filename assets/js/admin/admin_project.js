$('select.select-order').change(function(){
    var formData = $('form.form-select-order').serialize();
    var url = site_url + 'admin/project-select-order/';

    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        success: function(data) {

            $('div.search-true').show().html(data.view);
            $('div.search-false').hide()

        }});
});

$(document).on('click', 'button.btn-edit-project', function () {
    var url = site_url + 'admin/project-edit-get-view';
    var project = $(this).attr('data-id');

    $.ajax({
        url : url,
        type : 'POST',
        data : { project:project },
        success : function (data) {
            if (data.error) {

                Swal.fire({
                    position : 'center',
                    icon : 'error',
                    title : 'Un problème est survenu',
                    showConfirmButton : false
                });

            } else {

                $('#modalEditProject .modal-body').html(data.view);
                $('#modalEditProject').modal("show");

            }
        }
    });


});

$(document).on('click', 'button.btn-edit-project-confirm', function () {

    var formData = $('form.form-edit-project').serialize();
    var url = site_url + 'admin/project-edit-attempt/';

    // On clear les potentielles erreurs qui auraient été affiché à un premier essais
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
                            $(this).attr('style', 'visibility : visible');
                            $(this).html(data.error[key]);
                        }
                    }
                });



            } else {

                Swal.fire({
                    position : 'center',
                    icon : 'success',
                    title : 'Le projet a été mis à jour !',
                    showConfirmButton : false,
                    timer: 1500
                });

                var projectID = data.projectRefreshID;
                var projectData = data.projectRefresh;

                console.log(projectData['status']);

                // On remplace les valeurs du nom de projet affiché et de son image associée au niveau des cards
                $('h1.name-update-project-' + projectID).text(projectData['name']);
                $('img.image-update-project-' + projectID).attr('src', '../' + projectData['associated_image_url']);
                $('h1.status-update-project-' + projectID).text('Statut actuel : ' + projectData['status']);

            }

            $('#modalEditProject').modal("hide");

        }});

});