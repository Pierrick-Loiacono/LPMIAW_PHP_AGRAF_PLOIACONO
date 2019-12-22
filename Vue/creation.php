<form method="post" class="col-6">
    <div id="div_id_select" class="form-group required">
        <label for="id_select"  class="control-label requiredField"> Selectionner l'entité à créer :<span class="asteriskField"></span> </label>
        <div class="controls"  style="margin-bottom: 10px">
            <label class="radio-inline"><input type="radio"  checked="checked" name="select" id="check_entreprise" value="S"  style="margin-bottom: 10px">Entreprise</label>
            <label class="radio-inline"> <input type="radio"  name="select" id="check_association" value="P"  style="margin-bottom: 10px">Association </label>
            <label class="radio-inline"> <input type="radio" name="select" id="check_secteur" value="P"  style="margin-bottom: 10px">Secteur </label>
        </div>
    </div>

    <div class="hide">
        <label for="pet-select">Associer un ou plusieur secteur(s):</label><br>
        <select  name="secteurs[]" id="selection-secteurs" style="width: 14rem;" multiple>
            <?php
            foreach ($secteurs as $secteur) {
                ?>
                <option value="<?php echo $secteur->getId()?>"><?php echo $secteur->getLibelle()?></option>
                <?php
            }
            ?>
        </select>
    </div>

    <div id="form_create">

    </div>

</form>



