<?php

function afficheMessages() {
    $retour = '';
    if(!empty($_SESSION['MSG_OK'])) {
        $retour .= '<div class="alert alert-success">' . $_SESSION['MSG_OK'] .
            '</div>'."\n";
        unset($_SESSION['MSG_OK']);
    }
    if(!empty($_SESSION['MSG_KO'])) {
    $retour .= '<div class="alert alert-danger">' . $_SESSION['MSG_KO'] .
        '</div>'."\n";
    unset($_SESSION['MSG_KO']);
    }
    if(!empty($_SESSION['MSG_SUPP'])) {
    $retour .= '<div class="alert alert-success">' . $_SESSION['MSG_SUPP'] .
        '</div>'."\n";
    unset($_SESSION['MSG_SUPP']);
    }

    return $retour;
}


function retourMsgErreurCreation(Exception $ex) {
    $error = "Une erreur est survenu avec le code : ".$ex->getCode()."<br>";
    $error .= "Signifiant : ". $ex->getMessage()."<br>";
    $_SESSION['MSG_KO'] = $error;
    header("Location: index.php?action=creationStructure");
}