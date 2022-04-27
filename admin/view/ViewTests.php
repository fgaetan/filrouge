<?php
class ViewTests
{
    public static function formulaire($parametres)
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
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Catégorie</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01">
                        <option selected value="null">Catégorie</option>
                        <?= $parametres[0] ?>
                    </select>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Marque</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01">
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
        <?php
    }
}
