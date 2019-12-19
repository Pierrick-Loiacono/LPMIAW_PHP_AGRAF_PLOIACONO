<?php
    include('includes/header.php');
?>
<div class="container">
    <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-body" >
                <form method="post">
                    <form  class="form-horizontal" method="post" >
                        <div id="div_id_select" class="form-group required">
                            <label for="id_select"  class="control-label col-md-4  requiredField"> Select<span class="asteriskField"></span> </label>
                            <div class="controls col-md-8 "  style="margin-bottom: 10px">
                                <label class="radio-inline"><input type="radio"  checked="checked" name="select" id="check_entreprise" value="S"  style="margin-bottom: 10px">Entreprise</label>
                                <label class="radio-inline"> <input type="radio"  name="select" id="check_association" value="P"  style="margin-bottom: 10px">Association </label>
                                <label class="radio-inline"> <input type="radio" name="select" id="check_secteur" value="P"  style="margin-bottom: 10px">Secteur </label>
                            </div>
                        </div>
                        <div id="form_create">

                        </div>
                        <label for="pet-select">Associer un ou plusieur secteur(s):</label>

                        <select name="secteurs[]" id="selection-secteurs" multiple>
                            <?php
                            foreach ($secteurs as $secteur) {
                                ?>
                                <option value="<?php echo $secteur->getId()?>"><?php echo $secteur->getLibelle()?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </form>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col-md-4">



</div>


<?php
include('includes/footer.php');
?>



