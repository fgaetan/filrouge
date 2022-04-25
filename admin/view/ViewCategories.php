<?php
class ViewCategories
{
    // /////////////////////////////////////////////////////    CATEGORIES
    // liste des catégories
    public static function categoriesManager($groupedeLignes)
    {
    ?>
        <div id="categories">
            <div id="table">
                <table class="w-100 table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Nom</th>
                            <th scope="col" class="text-right"><a class="btn btn-info" href="categories-add.php">Ajouter une catégorie</a></th>
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
    public static function categoriesAdd()
    {
    ?>
        <p class="h2 text-center my-4">AJOUTER UNE CATEGORIE</p>
        <div class="container jumbotron m-auto text-center">
            <form class="m-auto" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                <div class="form-group">
                    <input class="form-control" type="text" name="nom" placeholder="Nom de la catégorie" required="required">
                </div>
                <input class="btn btn-info mr-auto" type="submit" name="ajout" id="ajout" value="Ajouter">
                <a class="btn btn-warning" href="admin-categories.php">Retour à la liste</a>
            </form>
        </div>
    <?php
    }
    //modifier une catégorie
    public static function categoriesUpdate($id)
    {
        $categories = new ModelCategories();
        $categorie = $categories->display($id)
    ?>
        <p class="h2 text-center my-4">MODIFIER LA CATEGORIE</p>
        <div class="container jumbotron m-auto text-center">
            <form class="m-auto" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
            <input type="hidden" name="id" value="<?= $categorie['id'] ?>">
                <div class="form-group">
                    <label for="nom">Choisissez ou modifiez le nouveau nom pour la catégorie</label>
                    <input class="form-control" type="text" name="nom" value="<?= $categorie['nom'] ?>" placeholder="Nouveau nom" required="required">
                </div>
                <input class="btn btn-info mr-auto" type="submit" name="modif" id="modif" value="Modifier">
                <a class="btn btn-warning" href="admin-categories.php">Retour à la liste</a>
            </form>
        </div>
    <?php
    }
    // voir une catégorie
    public static function categoriesPage($id) {
        $categories = new ModelCategories();
        $categorie = $categories->display($id);
    ?>
        <div class="container jumbotron mt-5 p-4">
            <p class="h4 text-center font-weight-bold">INFORMATIONS SUR LA CATEGORIE</p>
            <div class="m-auto">
                <div class="h5">
                    <span class="input-group-text bg-light my-2 mx-auto"><?= $categorie['id'] ?></span>
                    <span class="input-group-text bg-light my-2 mx-auto"><?= $categorie['nom'] ?></span>
                </div>
                <div class="text-center">
                    <a class="btn btn-warning" href="admin-categories.php">Retour</a>
                    <a class="btn btn-info" href="categories-update.php?id=<?= $categorie['id'] ?>">Modifier</a>
                    <a class="btn btn-danger" href="categories-delete.php?id=<?= $categorie['id'] ?>">Supprimer</a>
                </div>
            </div>
        </div>
    <?php
    }
}
