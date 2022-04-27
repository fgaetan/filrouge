<?php
class ViewDeliverer
{
    // /////////////////////////////////////////////////////    LISTE DES TRANSPORTEURS
    public static function delivererManager($groupedeLignes)
    {
?>
        <div id="deliverer">
            <div id="table">
                <table class="w-100 table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Logo</th>
                            <th scope="col" class="text-right"><a class="btn btn-info" href="deliverer-add.php">Ajouter un transporteur</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= $groupedeLignes ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php
    }
    // ajouter un transporteur
    public static function delivererAdd()
    {
    ?>
        <p class="h2 text-center my-4">AJOUTER UN TRANSPORTEUR</p>
        <div class="container jumbotron m-auto text-center">
            <form class="m-auto" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <input class="form-control" type="text" name="nom" placeholder="Nom du transporteur" required="required">
                </div>
                <div class="form-group">
                    <input class="btn btn-light border border-dark" type="file" name="logo" id="fileToUpload" required="required">
                </div>
                <input class="btn btn-info mr-auto" type="submit" name="ajout" id="ajout" value="Ajouter">
                <a class="btn btn-warning" href="admin-deliverers.php">Retour à la liste</a>
            </form>
        </div>
    <?php
    }
    //modifier un transporteur
    public static function delivererUpdate($id)
    {
        $transporteurs = new ModelDeliverer();
        $transporteur = $transporteurs->display($id)
    ?>
        <p class="h2 text-center my-4">MODIFIER LE TRANSPORTEUR</p>
        <div class="container jumbotron m-auto text-center">
            <form class="m-auto" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $transporteur['id'] ?>">
                <div class="form-group">
                    <div class="form-group">
                        <label for="nom">Choisissez ou modifiez le nouveau nom pour le transporteur</label>
                        <input class="form-control" type="text" name="nom" value="<?= $transporteur['nom'] ?>" placeholder="Nouveau nom" required="required">
                    </div>
                    <label for="file">Voulez-vous changer le logo?</label>
                    <p class="h5 font-weight-bold">Logo actuel:</p>
                    <img src="../controller/uploads/deliverers/<?= $transporteur['logo'] ?>" alt="logo" height="150px" width="150px">
                    <div class="form-group">
                        <input class="btn btn-light border border-dark" type="file" name="logo" id="fileToUpload">
                    </div>
                </div>
                <input class="btn btn-info mr-auto" type="submit" name="modif" id="modif" value="Modifier">
                <a class="btn btn-warning" href="admin-deliverers.php">Retour à la liste</a>
            </form>
        </div>
    <?php
    }
    // voir un transporteur
    public static function delivererPage($id)
    {
        $transporteurs = new ModelDeliverer();
        $transporteur = $transporteurs->display($id);
    ?>
        <div class="container jumbotron mt-5 p-4">
            <p class="h4 text-center font-weight-bold">INFORMATIONS SUR LE TRANSPORTEUR</p>
            <div class="text-center m-auto">
                ID: #<?= $transporteur['id'] ?>
                <div class="h5">
                    <span class="input-group-text bg-light my-2 mx-auto"><?= $transporteur['nom'] ?></span>
                </div>
                <div class="text-center">
                    <img class="my-3" src="uploads/deliverers/<?= $transporteur['logo'] ?>" alt="logo" height="150px" width="150px">
                </div>
            </div>
            <div class="text-center">
                <a class="btn btn-warning" href="admin-deliverers.php">Retour</a>
                <a class="btn btn-info" href="deliverer-update.php?id=<?= $transporteur['id'] ?>">Modifier</a>
                <a class="btn btn-danger" href="deliverer-delete.php?id=<?= $transporteur['id'] ?>">Supprimer</a>
            </div>
        </div>
        </div>
<?php
    }
}
