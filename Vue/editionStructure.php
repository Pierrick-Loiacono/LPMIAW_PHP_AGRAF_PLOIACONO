<?php
    include('includes/header.php');

    ?>
    <form method="post">
        <div id="div_id_name" class="form-group required">
            <label for="id_name" class="control-label col-md-4  requiredField">Nom<span class="asteriskField">*</span> </label>
            <div class="controls col-md-8 ">
                <input class="input-md  textinput textInput form-control" id="id_name" required maxlength="30" name="nom_entity"
                       placeholder="Nom de la structure" style="margin-bottom: 10px" type="text" value="<?php echo $entity->getNom()?>"/>
            </div>
        </div>
        <div id="div_id_rue" class="form-group required">
            <label for="id_rue" class="control-label col-md-4  requiredField">Rue<span class="asteriskField">*</span> </label>
            <div class="controls col-md-8 ">
                <input class="input-md textinput textInput form-control" id="id_rue" required name="rue_entity"
                       placeholder="Rue" style="margin-bottom: 10px" type="text" value="<?php echo $entity->getRue()?>"/>
            </div>
        </div>
        <div id="div_id_postal" class="form-group required">
            <label for="id_postal" class="control-label col-md-4  requiredField"> Code Postal<span class="asteriskField">*</span> </label>
            <div class="controls col-md-8 ">
                <input class="input-md textinput textInput form-control" id="id_postal" required name="postal_entity"
                       placeholder="Code Postal" style="margin-bottom: 10px" type="text" value="<?php echo $entity->getCodePostal()?>"/>
            </div>
        </div>
        <div id="div_id_ville" class="form-group required">
            <label for="div_id_ville" class="control-label col-md-4  requiredField"> Ville<span class="asteriskField">*</span> </label>
            <div class="controls col-md-8 ">
                <input class="input-md textinput textInput form-control" id="div_id_ville" required name="ville_entity"
                       placeholder="ville" style="margin-bottom: 10px" type="text" value="<?php echo $entity->getVille()?>"/>
            </div>
        </div>
<?php if ($entity->isEstAsso() == false){
    ?>
        <div id="div_id_actionnaire" class="form-group required">
            <label for="div_id_actionnaire" class="control-label col-md-4  requiredField"> Actionnaire</label>
            <div class="controls col-md-8 ">
                <input class="input-md textinput textInput form-control" id="div_id_actionnaire" name="actionnaire_entreprise"
                       placeholder="Nombre d'actionnaire" style="margin-bottom: 10px" type="text" value="<?php echo $entity->getActionnaires()?>"/>
            </div>
        </div>
    <?php
        }else {
    ?>
        <div id="div_id_donateur" class="form-group required">
            <label for="div_id_donateur" class="control-label col-md-4  requiredField"> Donnateurs</label>
            <div class="controls col-md-8 ">
                <input class="input-md textinput textInput form-control" id="div_id_donateur"
                       name="donateur_association"
                       placeholder="Nombre de donateur" style="margin-bottom: 10px" type="text"
                       value="<?php echo $entity->getDonateurs() ?>"/>
            </div>
        </div>
    <?php
        }
     ?>
        <div class="form-group">
            <div class="aab controls col-md-4 "></div>
            <div class="controls col-md-8 ">
                <input type="submit" name="modifier_entity" value="Modifier" class="btn btn-primary btn btn-info" id="submit-id-signup" />
                <input type="submit" name="supprimer_entity" value="Supprimer" class="btn btn-primary btn btn-danger confirm" id="submit-id-signup" />
            </div>
        </div>
    </form>



<?php
    include('includes/footer.php');
?>