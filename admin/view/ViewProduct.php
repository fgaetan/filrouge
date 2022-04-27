<?php
class ViewProduct
{
    // /////////////////////////////////////////////////////    LISTE DES CATEGORIES
    public static function productManager($groupedeLignes)
    {
?>
        <div id="products">
            <div id="table">
                <table class="w-100 table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Photo</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Référence</th>
                            <th scope="col">Qté</th>
                            <th scope="col">Prix</th>
                            <th scope="col" class="text-right"><a class="btn btn-info" href="product-add.php">Ajouter un produit</a></th>
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
    // ajouter un produit
    public static function productAdd($parametres)
    {
    ?>
        <p class="h2 text-center my-4">AJOUTER UN PRODUIT</p>
        <div class="container jumbotron m-auto text-center">
            <form class="m-auto" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <input class="form-control" type="text" name="nom" placeholder="Nom du produit" required="required">
                </div>
                <!-- METTRE DES DROPDOWNS -->
                <div class="input-group mb-3">
                    <select name="id_categorie" class="custom-select" id="inputGroupSelect01">
                        <option selected value="null">Catégorie</option>
                        <?= $parametres[0] ?>
                    </select>
                </div>

                <div class="input-group mb-3">
                    <select name="id_marque" class="custom-select" id="inputGroupSelect01">
                        <option selected value="null">Marque</option>
                        <?= $parametres[1] ?>
                    </select>
                </div>
                <!--  -->
                <div class="form-group">
                    <input class="form-control" type="text" name="ref" placeholder="Référence produit" required="required">
                </div>
                <!-- METTRE UN DROPDOWN NUMBER -->
                <div class="form-group">
                    <input class="form-control" type="number" name="quantite" placeholder="Qté disponible" required="required">
                </div>
                <div class="form-group">
                    <input class="form-control" type="number" name="prix" placeholder="Prix" required="required" min=0 step="0.01">
                </div>
                <!--  -->
                <div class="form-group">
                    <textarea name="description" id="description" cols="30" rows="5" placeholder="Description du produit"></textarea>
                </div>

                <!-- METTRE UN UPLOADER POUR LE(S) PHOTOS -->
                <div class="form-group">
                    <label for="photo">Ajouter une photo du produit : </label><br>
                    <input class="btn btn-light border border-dark" type="file" name="photo" id="fileToUpload" required="required">
                </div>

                <input class="btn btn-info mr-auto" type="submit" name="ajout" id="ajout" value="Ajouter">
                <a class="btn btn-warning" href="admin-products.php">Retour à la liste</a>
            </form>
        </div>
    <?php
    }
    //modifier un produit
    public static function productUpdate($parametres)
    {
        $produits = new ModelProduct();
        $produit = $produits->display($parametres[0]);
    ?>
        <p class="h2 text-center my-4">MODIFIER UN PRODUIT</p>
        <div class="container jumbotron m-auto text-center">
            <form class="m-auto" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $produit['id'] ?>">

                <div class="form-group">
                    <input class="form-control" type="text" name="nom" value="<?= $produit['nom'] ?>" placeholder="Nouveau nom" required="required">
                </div>
                <div class="input-group mb-3">
                    <select name="id_categorie" class="custom-select">
                        <?= $parametres[1][0] ?>
                    </select>
                </div>

                <div class="input-group mb-3">
                    <select name="id_marque" class="custom-select">
                        <?= $parametres[1][1] ?>
                    </select>
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="ref" value="<?= $produit['ref'] ?>" placeholder="Nouvelle référence" required="required">
                </div>
                <!-- METTRE UN DROPDOWN NUMBER -->
                <div class="form-group">
                    <input class="form-control" type="text" name="quantite" value="<?= $produit['quantite'] ?>" placeholder="Nouvelle quantité" required="required">
                </div>

                <div class="form-group">
                    <input class="form-control" type="text" name="prix" value="<?= $produit['prix'] ?>" placeholder="Nouveau prix" required="required">
                </div>

                <!-- METTRE UN UPLOADER POUR LE(S) PHOTOS -->
                <div class="form-group">
                    <label for="photo">Modifier la photo du produit : </label><br>
                    <input class="btn btn-light border border-dark" type="file" name="photo" id="fileToUpload">
                </div>

                <div class="form-group">
                    <textarea name="description" id="description" cols="30" rows="5" placeholder="Description du produit"><?= $produit['description'] ?></textarea>
                </div>

                <input class="btn btn-info mr-auto" type="submit" name="modif" id="modif" value="Modifier">
                <a class="btn btn-warning" href="admin-categories.php">Retour à la liste</a>
            </form>
        </div>
    <?php
    }
    // voir une catégorie
    public static function productPage($id)
    {
        $produits = new ModelProduct();
        $produit = $produits->display($id);
        ?>
        <div class="container jumbotron mt-5 p-4">
            <p class="h4 text-center font-weight-bold">INFORMATIONS SUR LE PRODUIT</p>
            <div class="text-center m-auto">
            ID: #<?= $produit['id'] ?>
                <div class="h5">
                    <span class="input-group-text bg-light my-2 mx-auto"><?= $produit['nom'] ?></span>
                    <span class="input-group-text bg-light my-2 mx-auto"><?= $produit['ref'] ?></span>
                    <span class="input-group-text bg-light my-2 mx-auto">"<?= $produit['description'] ?>"</span>
                    <span class="input-group-text bg-light my-2 mx-auto"><?= $produit['quantite'] ?>u</span>
                    <span class="input-group-text bg-light my-2 mx-auto">€<?= $produit['prix'] ?></span>
                </div>
                <div class="text-center">
                    <a class="btn btn-warning" href="admin-products.php">Retour</a>
                    <a class="btn btn-info" href="product-update.php?id=<?= $produit['id'] ?>">Modifier</a>
                    <a class="btn btn-danger" href="product-delete.php?id=<?= $produit['id'] ?>">Supprimer</a>
                </div>
            </div>
        </div>
    <?php
    }
}
