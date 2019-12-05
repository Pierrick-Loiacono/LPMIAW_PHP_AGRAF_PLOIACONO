<?php
include('includes/header.php');
global $bdd;

use POO\Entity\Secteur;

?>

    <table class="table table-striped">
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
            <tr>
                <td><?php echo $sect->getId()?></td>
                <td><?php echo $sect->getLibelle()?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>


<?php
include('includes/footer.php');
?>