<?php
class ViewAdmin
{
    // /////////////////////////////////////////////////////    TABLEAU DE BORD
    public static function dashboard()
    {
?>
        <div id="stats"></div>
    <?php
    }
    // /////////////////////////////////////////////////////    CATEGORIES
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
                            <th scope="col" class="text-right"><a class="btn btn-info" href="">Ajouter une catégorie</a></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?=$groupedeLignes?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php
    }
    // /////////////////////////////////////////////////////    PRODUITS
    public static function productsManager()
    {
    ?>
        <div id="products"></div>
    <?php
    }
    // /////////////////////////////////////////////////////    MARQUES
    public static function brandsManager()
    {
    ?>
        <div id="brands"></div>
    <?php
    }
    // /////////////////////////////////////////////////////    TRANSPORTEURS
    public static function deliverersManager()
    {
    ?>
        <div id="deliverers"></div>
    <?php
    }
    // /////////////////////////////////////////////////////    CLIENTS
    public static function usersManager()
    {
    ?>
        <div id="users"></div>
<?php
    }
}
