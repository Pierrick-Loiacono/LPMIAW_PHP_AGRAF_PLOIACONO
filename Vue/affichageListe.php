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
            <tr>
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
    <button type="button" class="btn btn-info">Création</button>


<?php
    include('includes/footer.php');
?>