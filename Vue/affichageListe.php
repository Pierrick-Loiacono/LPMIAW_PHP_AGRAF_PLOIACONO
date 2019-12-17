<?php
    include('includes/header.php');
    global $bdd;
?>

    <?php
        if (strcmp($_GET["action"], "viewListeAsso") == 0) {
    ?>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Rue</th>
                <th scope="col">Code Postal</th>
                <th scope="col">Ville</th>
                <th scope="col">Donateurs</th>
            </tr>
        </thead>
        <tbody>
        <?php

        foreach ($associationListe as $asso) {

        ?>
            <tr class = "clickable-row" data-href="index.php?action=editAsso&id=<?php echo $asso->getId()?>">
                <td><?php echo $asso->getId()?></td>
                <td><?php echo $asso->getNom()?></td>
                <td><?php echo $asso->getRue()?></td>
                <td><?php echo $asso->getCodePostal()?></td>
                <td><?php echo $asso->getVille()?></td>
                <td><?php echo $asso->getDonateurs()?></td>
            </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
    <?php
        } elseif (strcmp($_GET["action"], "viewListeEntre") == 0){
    ?>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">RUE</th>
                    <th scope="col">Code Postal</th>
                    <th scope="col">Ville</th>
                    <th scope="col">ACTIONNAIRE</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($entrepriseListe as $ent) {
                    ?>
                    <tr class = "clickable-row" data-href="index.php?action=editEntreprise&id=<?php echo $ent->getId()?>">
                        <td><?php echo $ent->getId()?></td>
                        <td><?php echo $ent->getNom()?></td>
                        <td><?php echo $ent->getRue()?></td>
                        <td><?php echo $ent->getCodePostal()?></td>
                        <td><?php echo $ent->getVille()?></td>
                        <td><?php echo $ent->getActionnaires()?></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
    <?php
        } elseif (strcmp($_GET["action"], "viewListeSect") == 0){
    ?>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Libelle</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($secteurListe as $sect) {
                    ?>
                    <tr class = "clickable-row" data-href="index.php?action=editSecteur&id=<?php echo $sect->getId()?>">
                        <td><?php echo $sect->getId()?></td>
                        <td><?php echo $sect->getLibelle()?></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
    <?php
        }
    ?>
<?php
    include('includes/footer.php');
