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
        while ($data = $secteurListe->fetch()) {
        ?>
        <tr>
            <th scope="row"><?php echo htmlspecialchars($data['ID'])?></th>
            <td><?php echo htmlspecialchars($data['LIBELLE'])?></td>
        </tr>
        <tr>
            <?php
            }
            $secteurListe->closeCursor();
            ?>
        </tbody>
    </table>


<?php
include('includes/footer.php');
?>