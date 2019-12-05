<?php
include('includes/header.php');
global $bdd;

use POO\Entity\Secteur;

?>

    <table class="table table-striped">
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
            <tr>
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
include('includes/footer.php');
?>