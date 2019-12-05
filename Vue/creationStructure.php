<?php

use POO\Modele\managers\EntrepriseManager;
require_once(__DIR__.'/../Vue/includes/connexion.php');

require_once (__DIR__.'/../Modele/managers/EntrepriseManager.php');

include('includes/header.php');
global $bdd;

if(isset($_POST['Enregistrer'])) {

$entrepriseManager = new EntrepriseManager();
    $id = $entrepriseManager->getLastId();
    $nom = $_POST['nom'];
    $rue = $_POST['rue'];
    $cp = $_POST['postal'];
    $ville = $_POST['ville'];

}

?>


<div class="container">
    <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-body" >
                <form method="post" action="">
                    <form  class="form-horizontal" method="post" >
                        <div id="div_id_select" class="form-group required">
                            <label for="id_select"  class="control-label col-md-4  requiredField"> Select<span class="asteriskField"></span> </label>
                            <div class="controls col-md-8 "  style="margin-bottom: 10px">
                                <label class="radio-inline"><input type="radio" checked="checked" name="select" id="id_select_1" value="S"  style="margin-bottom: 10px">Entreprise</label>
                                <label class="radio-inline"> <input type="radio" name="select" id="id_select_2" value="P"  style="margin-bottom: 10px">Association </label>
                                <label class="radio-inline"> <input type="radio" name="select" id="id_select_2" value="P"  style="margin-bottom: 10px">Secteur </label>
                            </div>
                        </div>
                         <div id="div_id_name" class="form-group required">
                            <label for="id_name" class="control-label col-md-4  requiredField">Nom<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <input class="input-md  textinput textInput form-control" id="id_name" maxlength="30" name="nom" placeholder="nom de l'entreprise" style="margin-bottom: 10px" type="text" />
                            </div>
                        </div>
                         <div id="div_id_rue" class="form-group required">
                            <label for="id_rue" class="control-label col-md-4  requiredField">Rue<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <input class="input-md textinput textInput form-control" id="id_rue" name="rue" placeholder="Rue" style="margin-bottom: 10px" type="text" />
                            </div>
                        </div>

                        <div id="div_id_postal" class="form-group required">
                            <label for="id_postal" class="control-label col-md-4  requiredField"> Code Postal<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <input class="input-md textinput textInput form-control" id="id_postal" name="postal" placeholder="Code Postal" style="margin-bottom: 10px" type="text" />
                            </div>
                        </div>
                        <div id="div_id_ville" class="form-group required">
                            <label for="div_id_ville" class="control-label col-md-4  requiredField"> Ville<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <input class="input-md textinput textInput form-control" id="div_id_ville" name="ville" placeholder="ville" style="margin-bottom: 10px" type="text" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="aab controls col-md-4 "></div>
                            <div class="controls col-md-8 ">
                                <input type="submit" name="Enregistrer" value="Enregistrer" class="btn btn-primary btn btn-info" id="submit-id-signup" />
                            </div>
                        </div>

                    </form>

                </form>
            </div>
        </div>
    </div>
</div>






