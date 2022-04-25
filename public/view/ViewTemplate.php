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
            if (isset($_SESSION['id'])) {
            ?>
                <header>
                    <div class="row container-fluid bg-dark text-light p-3 mb-4 mx-auto">
                        <div class="logo col-md-3">
                            <a class="btn btn-info" href="index.php">Accueil</a>
                        </div>
                        <div class="search col-md-6">
                            <input type="text" class="form-control text-center m-auto w-50" placeholder="Rechercher...">
                        </div>
                        <div class="actions col-md-3 text-right">
                            <a class="btn btn-info" href="user-profile.php">Ma Page</a>
                            <a class="btn btn-danger" href="user-disconnect.php">Déconnexion</a>
                        </div>
                    </div>
                </header>
            <?php
            } else { ?>
                <header>
                    <div class="row container-fluid bg-dark text-light p-3 mb-4 mx-auto">
                        <div class="logo col-md-3">
                            <a class="btn btn-info" href="index.php">Accueil</a>
                        </div>
                        <div class="search col-md-6">
                            <input type="text" class="form-control text-center m-auto w-50" placeholder="Rechercher...">
                        </div>
                        <div class="actions col-md-3 text-right">
                            <a class="btn btn-info" href="signin.php">S'inscrire</a>
                            <a class="btn btn-warning" href="signup.php">Se connecter</a>
                        </div>
                    </div>
                </header>
            <?php }
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
