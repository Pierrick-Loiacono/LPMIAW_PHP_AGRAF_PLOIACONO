<?php
    include('connexion.php');
    global $bdd;


?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Structure</title>

    <link href="../Public/css/bootstrap.css" rel="stylesheet">
</head>

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar w/ text</a>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<body>
