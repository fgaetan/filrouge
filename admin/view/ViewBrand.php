<?php
class ViewBrand
{
    // /////////////////////////////////////////////////////    LISTE DES TRANSPORTEURS
    public static function brandManager($groupedeLignes)
    {
?>
        <div id="brands">
            <div id="table">
                <table class="w-100 table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Logo</th>
                            <th scope="col" class="text-right"><a class="btn btn-info" href="brand-add.php">Ajouter une marque</a></th>
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
    // ajouter une marque
    public static function brandAdd()
    {
    ?>
        <p class="h2 text-center my-4">AJOUTER UNE MARQUE</p>
        <div class="container jumbotron m-auto text-center">
            <form class="m-auto" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <input class="form-control" type="text" name="nom" placeholder="Nom de la marque" required="required">
                </div>
                <div class="form-group">
                    <input class="btn btn-light border border-dark" type="file" name="logo" id="fileToUpload" required="required">
                </div>
                <input class="btn btn-info mr-auto" type="submit" name="ajout" id="ajout" value="Ajouter">
                <a class="btn btn-warning" href="admin-brands.php">Retour à la liste</a>
            </form>
        </div>
    <?php
    }
    //modifier une marque
    public static function brandUpdate($id)
    {
        $marques = new ModelBrand();
        $marque = $marques->display($id)
    ?>
        <p class="h2 text-center my-4">MODIFIER LA MARQUE</p>
        <div class="container jumbotron m-auto text-center">
            <form class="m-auto" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $marque['id'] ?>">
                <div class="form-group">
                    <div class="form-group">
                        <label for="nom">Choisissez ou modifiez le nouveau nom pour la marque</label>
                        <input class="form-control" type="text" name="nom" value="<?= $marque['nom'] ?>" placeholder="Nouveau nom" required="required">
                    </div>
                    <label for="file">Voulez-vous changer le logo?</label>
                    <p class="h5 font-weight-bold">Logo actuel:</p>
                    <img src="../controller/uploads/brands/<?= $marque['logo'] ?>" alt="logo" height="150px" width="150px">
                    <div class="form-group">
                        <input class="btn btn-light border border-dark" type="file" name="logo" id="fileToUpload">
                    </div>
                </div>
                <input class="btn btn-info mr-auto" type="submit" name="modif" id="modif" value="Modifier">
                <a class="btn btn-warning" href="admin-brands.php">Retour à la liste</a>
            </form>
        </div>
    <?php
    }
    // voir une marque
    public static function brandPage($id)
    {
        $marques = new ModelBrand();
        $marque = $marques->display($id);
    ?>
        <div class="container jumbotron mt-5 p-4">
            <p class="h4 text-center font-weight-bold">INFORMATIONS SUR LA MARQUE</p>
            <div class="text-center m-auto">
                ID: #<?= $marque['id'] ?>
                <div class="h5">
                    <span class="input-group-text bg-light my-2 mx-auto"><?= $marque['nom'] ?></span>
                </div>
                <div class="text-center">
                    <img class="my-3" src="uploads/deliverers/<?= $marque['logo'] ?>" alt="logo" height="150px" width="150px">
                </div>
            </div>
            <div class="text-center">
                <a class="btn btn-warning" href="admin-deliverers.php">Retour</a>
                <a class="btn btn-info" href="deliverer-update.php?id=<?= $marque['id'] ?>">Modifier</a>
                <a class="btn btn-danger" href="deliverer-delete.php?id=<?= $marque['id'] ?>">Supprimer</a>
            </div>
        </div>
        </div>
<?php
    }
}
