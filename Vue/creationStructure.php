<?php

    use POO\Entity\AssociationController;
    use POO\Entity\EntrepriseController;
    use POO\Entity\SecteurController;

    require_once(__DIR__.'/../Vue/includes/connexion.php');
    require_once (__DIR__.'/../Controller/EntrepriseController.php');
    require_once (__DIR__.'/../Controller/AssociationController.php');
    require_once (__DIR__.'/../Controller/SecteurController.php');

    include('includes/header.php');
    global $bdd;

    if(isset($_POST['enregistrer_entreprise'])) {
        $controller = new EntrepriseController();
        $controller->addEntreprise();
    } elseif (isset($_POST['enregistrer_association'])){
        $controller = new AssociationController();
//        $controller->addEntreprise();
    } elseif (isset($_POST['enregistrer_secteur']))
        $controller = new SecteurController();
//    $controller->addEntreprise();

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
                    </form>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
include('includes/footer.php');
?>



