<?php
    include('connexion.php');
    global $bdd;
    session_start();

    if (isset($_POST['secteurs'])){
        $_SESSION['secteurs'] = $_POST['secteurs'];
    }

//    var_dump($_SESSION['secteurs']);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Structure</title>
    <link rel="stylesheet" type="text/css" href="Public/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="Public/css/style.css">
    <link rel="stylesheet" type="text/css" href="Public/css/select2.min.css">
</head>

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Php/Agraf-Ploiacono</a>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Accueil<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=viewListeEntre">Entreprises</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=viewListeAsso">Associations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=viewListeSect">Secteurs</a>
                </li>
                <li class="nav-item">
                    <a href="index.php?action=createStructure" type="button" class="btn btn-info">Création</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<body>
