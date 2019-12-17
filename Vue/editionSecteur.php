<?php
    include('includes/header.php');
?>

<form method="post">
        <div id="div_id_name" class="form-group required">
            <label for="id_name" class="control-label col-md-4  requiredField">Nom<span class="asteriskField">*</span> </label>
            <div class="controls col-md-8 ">
                <input class="input-md  textinput textInput form-control" id="id_name_secteur" maxlength="30" required name="nom_secteur"
                       placeholder="Nom du secteur" style="margin-bottom: 10px" type="text" value="<?php echo $secteur->getLibelle() ?>" />
            </div>
        </div>
        <div class="form-group">
            <div class="aab controls col-md-4 "></div>
            <div class="controls col-md-8 ">
                <input type="submit" name="modifier_secteur" value="Modifier" class="btn btn-primary btn btn-info" id="submit-id-signup" />
            </div>
        </div>
</form>



<?php
include('includes/footer.php');
?>

