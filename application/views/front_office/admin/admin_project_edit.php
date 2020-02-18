<div class="col-11">
    <label class="text" for="editID"> N°Projet * </label>
    <input type="text" class="form-custom" name="editID" id="editID" value="<?= $selected_project->id ?>" readonly>
    <p class="field-error" data-field="editID"></p>
</div>

<div class="col-11">
    <label class="text" for="editName"> Nom du projet * </label>
    <input type="text" class="form-custom" name="editName" id="editName" value="<?= $selected_project->name ?>">
    <p class="field-error" data-field="editName"></p>
</div>

<div class="col-11">
    <label class="text" for="editDesc"> Description du projet * </label>
    <textarea class="form-custom h-75" name="editDesc" id="editDesc"> <?= $selected_project->description ?> </textarea>
    <p class="field-error" data-field="editDesc"></p>
</div>

<div class="col-11">
    <label class="text" for="editURL"> URL menant au projet </label>
    <input class="form-custom" name="editURL" id="editURL" value="<?= $selected_project->url ?>">
    <p class="field-error" data-field="editURL"></p>
</div>

<div class="col-11">
    <label class="text" for="editImageURL"> Chemin d'accès à l'image associée * </label>
    <input class="form-custom" name="editImageURL" id="editImageURL" value="<?= $selected_project->associated_image_url ?>">
    <p class="field-error" data-field="editImageURL"></p>
</div>

<div class="col-11">
    <label class="text" for="editStatus"> Statut du projet * </label>
    <select class="custom-select" name="editStatus" id="editStatus">

        <?php if ($selected_project->status === 'progress') { ?>
            <option value="progress" selected> En cours </option>
            <option value="completed"> Achevé </option>
            <option value="offline"> Hors ligne </option>
        <?php } elseif ($selected_project->status === 'completed') { ?>
            <option value="progress"> En cours </option>
            <option value="completed" selected> Achevé </option>
            <option value="offline"> Hors ligne </option>
        <?php } else { ?>
            <option value="progress"> En cours </option>
            <option value="completed" selected> Achevé </option>
            <option value="offline" selected> Hors ligne </option>
        <?php } ?>

    </select>
    <p class="field-error" data-field="editStatus"></p>
</div>
