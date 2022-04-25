<?php
class ViewDeliverer
{
    // /////////////////////////////////////////////////////    CATEGORIES
    // liste des catégories
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
    // ajouter une catégorie
    public static function delivererAdd()
    {
    ?>
        <p class="h2 text-center my-4">AJOUTER UN TRANSPORTEUR</p>
        <div class="container jumbotron m-auto text-center">
            <form class="m-auto" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                <div class="form-group">
                    <input class="form-control" type="text" name="nom" placeholder="Nom du transporteur" required="required">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="logo" placeholder="logo (provisoire)" required="required">
                </div>
                // AJOUTER UPLOAD !
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
            <form class="m-auto" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                <input type="hidden" name="id" value="<?= $transporteur['id'] ?>">
                <div class="form-group">
                    <label for="nom">Choisissez ou modifiez le nouveau nom pour la catégorie</label>
                    <input class="form-control" type="text" name="nom" value="<?= $transporteur['nom'] ?>" placeholder="Nouveau nom" required="required">
                </div>
                // AJOUTER UPLOAD !
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
            <div class="m-auto">
                <div class="h5">
                    <span class="input-group-text bg-light my-2 mx-auto"><?= $transporteur['id'] ?></span>
                    <span class="input-group-text bg-light my-2 mx-auto"><?= $transporteur['nom'] ?></span>
                </div>
                <div class="text-center">
                    <a class="btn btn-warning" href="admin-deliverers.php">Retour</a>
                    <a class="btn btn-info" href="deliverers-update.php?id=<?= $transporteur['id'] ?>">Modifier</a>
                    <a class="btn btn-danger" href="deliverers-delete.php?id=<?= $transporteur['id'] ?>">Supprimer</a>
                </div>
            </div>
        </div>
<?php
    }
}
