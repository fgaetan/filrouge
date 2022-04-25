<?php
class ViewTemplate
{
    // /////////////////////////////////////////////////////    ALERTES
    public static function alert($type, $message, $lien = null)
    {
?>
        <div class="container alert  alert-<?= $type ?>" role="alert">
            <?= $message ?> <br />
            <?php
            if ($lien) {  ?>
                Cliquez <a href="<?= $lien ?>" class="alert-link px-2"> ici </a> pour continuer la navigation.
            <?php
            }
            ?>
        </div>
    <?php
    }
    // /////////////////////////////////////////////////////    EN TÊTE
    public static function head($title)
    {
    ?>
        <!DOCTYPE html>
        <html lang="fr">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../../assets/css/all.min.css">
            <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="../../assets/css/style.css">
            <title><?php $title ?></title>
        </head>

        <body>
        <?php
    }
    // /////////////////////////////////////////////////////    HEADER
    public static function header()
    {
        ?>
            <header>
                <div class="row container-fluid bg-info text-light p-3 mx-auto">
                    <div class="logo col-md-3">
                        <a class="btn btn-dark" href="/public/controller/index.php">Accueil</a>
                    </div>
                    <div class="title col-md-6 text-center text-dark">
                        <h3>DASHBOARD ADMINISTRATEUR</h3>
                    </div>
                    <div class="actions col-md-3 text-right">
                        <a class="btn btn-dark" href="#####">Dashboard</a>
                        <a class="btn btn-danger" href="/public/controller/user-disconnect.php">Déconnexion</a>
                    </div>
                </div>
            </header>
        <?php
    }
    // /////////////////////////////////////////////////////    LISTE DES GESTIONNAIRES
    public static function managers($inclusion, $function, $parameter)
    {
        ?>
            <div class="container-fluid">
                <div class="row min-vh-100">
                    <nav class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
                        <div class="sidebar-sticky bg-dark text-dark">
                            <ul class="nav flex-column mt-5">
                                <li class="nav-item">
                                    <a class="nav-link active text-light p-3" href="admin-index.php" id="tableau">
                                        <h5><i class="far fa-window-restore"></i>
                                            Tableau de bord
                                            <span class="sr-only">(current)</span>
                                        </h5>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-light p-3" href="admin-categories.php" id="liste-contacts">
                                        <h5>
                                            <i class="fas fa-list-alt"></i>
                                            Catégories
                                        </h5>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-light p-3" href="admin-products.php" id="liste-contacts">
                                        <h5>
                                            <i class="fas fa-list-alt"></i>
                                            Produits
                                        </h5>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-light p-3" href="admin-brands.php" id="liste-contacts">
                                        <h5>
                                            <i class="fas fa-list-alt"></i>
                                            Marques
                                        </h5>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-light p-3" href="admin-deliverers.php" id="liste-contacts">
                                        <h5>
                                            <i class="fas fa-list-alt"></i>
                                            Transporteurs
                                        </h5>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-light p-3" href="admin-users.php" id="liste-contacts">
                                        <h5>
                                            <i class="fas fa-list-alt"></i>
                                            Clients
                                        </h5>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <div class="col-10 p-0">
                    <?php if(false){
                        } else { ViewAdmin::$function($parameter);} ?>
                    </div>
                </div>
            </div>
        <?php
    }
    // /////////////////////////////////////////////////////    FOOTER
    public static function footer()
    {
        ?>
            <footer>
                <div class="container-fluid fixed-bottom text-right bg-info mt-1 p-1">
                    <p class="m-auto">Copyright © <?= date('Y') ?> - Frion Gaetan</p>
                </div>
            </footer>
        <?php
    }
    // /////////////////////////////////////////////////////    FIN DE PAGE
    public static function end($inclusion)
    {
        ?>
            <script src="../../assets/js/jquery.min.js"></script>
            <script src="../../assets/js/main.js"></script>
            <?php
            if ($inclusion === true) {
            ?>
                <script src="../../assets/js/formvalid.js"></script>
            <?php
            }
            ?>
            <script src="../../assets/js/bootstrap.bundle.min.js"></script>
            <script src="../../assets/js/all.min.js"></script>
        </body>

        </html>
<?php
    }
}
