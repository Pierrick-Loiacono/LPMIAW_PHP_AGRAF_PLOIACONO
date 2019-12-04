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
            <th scope="col">Code Postal</th>
            <th scope="col">Ville</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($data = $req->fetch()) {
        ?>
        <tr>
            <th scope="row"><?php echo htmlspecialchars($data['ID'])?></th>
            <td><?php echo htmlspecialchars($data['NOM'])?></td>
            <td><?php echo htmlspecialchars($data['CP'])?></td>
            <td><?php echo htmlspecialchars($data['VILLE'])?></td>
        </tr>
        <tr>
        <?php
        }
        $req->closeCursor();
        ?>
        </tbody>
    </table>
    <button type="button" class="btn btn-info">Création</button>


<?php
    include('includes/footer.php');
?>