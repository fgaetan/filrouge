<?php

require_once '../model/ModelUser.php';

class ViewUser
{
    // /////////////////////////////////////////////////////    INSCRIPTION
    public static function userSignin()
    {
?>
        <p class="h2 text-center my-4">INSCRIPTION</p>
        <div class="container jumbotron m-auto px-5 text-center">
            <form class="m-auto" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                <div class="form-group">
                    <input id="nom" class="form-control" type="text" name="nom" placeholder="Nom" aria-describedby="nom" data-type="nom" data-message="Erreur">
                    <small id="nom" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <input id="prenom" class="form-control" type="text" name="prenom" placeholder="Prénom" aria-describedby="prenom" data-type="nom" data-message="Erreur">
                    <small id="prenom" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <input id="mail" class="form-control" type="mail" name="mail" placeholder="Adresse mail" required="required" aria-describedby="mail" data-type="mail" data-message="Erreur">
                    <small id="mail" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <input id="pass" class="form-control" type="password" name="pass" placeholder="Mot de passe" required="required" aria-describedby="pass" data-type="pass" data-message="Erreur">
                    <small id="pass" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <input id="pass2" class="form-control" type="password" name="pass2" placeholder="Confirmation" required="required" aria-describedby="pass2" data-type="pass" data-message="Erreur">
                    <small id="pass2" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <input id="adresse" class="form-control" type="text" name="adresse" placeholder="Adresse" aria-describedby="adresse" data-type="adresse" data-message="Erreur">
                    <small id="adresse" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <input id="code_post" class="form-control" type="number" name="code_post" placeholder="Code Postal" aria-describedby="code_post" data-type="code_post" data-message="Erreur">
                    <small id="code_post" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <input id="ville" class="form-control" type="text" name="ville" placeholder="Ville" aria-describedby="ville" data-type="nom" data-message="Erreur">
                    <small id="ville" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <input id="tel" class="form-control" type="tel" name="tel" placeholder="Téléphone" aria-describedby="tel" data-type="tel" data-message="Erreur">
                    <small id="tel" class="form-text text-muted"></small>
                </div>
                <input class="btn btn-info mr-auto" type="submit" name="signin" id="signin" value="S'inscrire">
                <input class="btn btn-danger ml-auto" type="reset" name="reset" id="reset" value="Réinitialiser">
            </form>
        </div>

    <?php
    }
    // /////////////////////////////////////////////////////    CONNEXION
    public static function userSignup()
    {
    ?>
        <p class="h2 text-center my-4">CONNEXION</p>
        <div class="container jumbotron m-auto text-center">
            <form class="m-auto" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                <div class="form-group">
                    <input id="mail" class="form-control" type="mail" name="mail" placeholder="Adresse mail" required="required" aria-describedby="mail" data-type="mail" data-message="Erreur">
                    <small id="mail" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <input id="pass" class="form-control" type="password" name="pass" placeholder="Mot de passe" required="required" aria-describedby="pass" data-type="pass" data-message="Erreur">
                    <small id="pass" class="form-text text-muted"></small>
                </div>
                <input class="btn btn-info mr-auto" type="submit" name="signup" id="signup" value="Se connecter">
                <input type="hidden" name="hidden">
                <a class="btn btn-warning" href="signin.php">S'inscrire</a>
                <br>
                <a class="btn" href="user-forget.php">Mot de passe oublié?</a>
            </form>
        </div>
    <?php
    }
    // /////////////////////////////////////////////////////    MDP OUBLIE
    // formulaire où entrer l'e-mail pour l'envoi du lien
    public static function userForget()
    {
    ?>
        <p class="h2 text-center my-4">RECUPERATION DU MOT DE PASSE
        <p>
        <div class="container jumbotron m-auto text-center">
            <form class="m-auto" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                <input type="hidden" name="id">
                <div class="form-group">
                    <input id="mail" class="form-control" type="mail" name="mail" placeholder="Adresse mail" required="required" aria-describedby="mail" data-type="mail" data-message="Erreur">
                    <small id="mail" class="form-text text-muted"></small>
                </div>
                <input class="btn btn-info mr-auto" type="submit" name="forget" id="forget" value="Récupérer">
                <input type="hidden" name="">
            </form>
        </div>
    <?php
    }
    // formulaire où entrer le nouveau mot de passe
    public static function userRecuperation()
    {
    ?>
        <p class="h2 text-center my-4">CHANGEMENT DE MOT DE PASSE</p>
        <div class="container jumbotron m-auto px-5 text-center">
            <form class="m-auto" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                <div class="form-group">
                    <input id="pass" class="form-control" type="password" name="pass" placeholder="Mot de passe" required="required" aria-describedby="pass" data-type="pass" data-message="Erreur">
                    <small id="pass" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <input id="pass2" class="form-control" type="password" name="pass2" placeholder="Confirmation" required="required" aria-describedby="pass2" data-type="pass" data-message="Erreur">
                    <small id="pass2" class="form-text text-muted"></small>
                </div>
                <input class="btn btn-info mr-auto" type="submit" name="recuperation" id="recuperation" value="Changer de mot de passe">
                <input class="btn btn-danger ml-auto" type="reset" name="reset" id="reset" value="Réinitialiser">
            </form>
        </div>
    <?php
    }
    // /////////////////////////////////////////////////////    PROFIL
    public static function userProfile($id)
    {
        $client = new ModelUser();
        $user = $client->display($id);
    ?>
        <p class="h2 text-center my-4">BONJOUR <?= $user['prenom'] ?></p>
        <div class="container jumbotron mx-auto p-4">
            <p class="h4 text-center font-weight-bold">Vos informations</p>
            <div class="m-auto">
                <div class="h5">
                    <span class="input-group-text bg-light my-2 mx-auto"><?= $user['prenom'] . ' ' . $user['nom'] ?></span>
                    <span class="input-group-text bg-light my-2 mx-auto"><?= $user['adresse'] . ', ' . $user['code_post'] . ' ' . $user['ville'] ?></span>
                    <span class="input-group-text bg-light my-2 mx-auto"><?= $user['mail'] ?></span>
                    <span class="input-group-text bg-light my-2 mx-auto"><?= $user['tel'] ?></span>
                </div>
                <div class="text-center">
                    <a class="btn btn-warning" href="index.php">Retour</a>
                    <a class="btn btn-info" href="user-update.php?id=<?= $user['id'] ?>">Modifier</a>
                    <a class="btn btn-danger" href="user-delete.php?id=<?= $user['id'] ?>">Supprimer</a>
                </div>
            </div>
        </div>
    <?php
    }
    // /////////////////////////////////////////////////////    MODIFICIATION
    public static function userUpdate($id)
    {
        $client = new ModelUser();
        $user = $client->display($id);
    ?>
        <p class="h2 text-center my-4">MODIFICATION DU PROFIL</p>
        <div class="container jumbotron m-auto text-center">
            <form class="m-auto" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                <input type="hidden" name="id" id="id" value="<?= $user['id'] ?>">
                <div class="form-group">
                    <input value="<?= $user['nom'] ?>" id="nom" class="form-control" type="text" name="nom" placeholder="Nom" aria-describedby="nom" data-type="nom" data-message="Erreur">
                    <small id="nom" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <input value="<?= $user['prenom'] ?>" id="prenom" class="form-control" type="text" name="prenom" placeholder="Prénom" aria-describedby="prenom" data-type="nom" data-message="Erreur">
                    <small id="prenom" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <input value="<?= $user['mail'] ?>" id="mail" class="form-control" type="mail" name="mail" placeholder="Adresse mail" required="required" aria-describedby="mail" data-type="mail" data-message="Erreur">
                    <small id="mail" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <input value="<?= $user['adresse'] ?>" id="adresse" class="form-control" type="text" name="adresse" placeholder="Adresse" aria-describedby="adresse" data-type="adresse" data-message="Erreur">
                    <small id="adresse" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <input value="<?= $user['code_post'] ?>" id="code_post" class="form-control" type="number" name="code_post" placeholder="Code Postal" aria-describedby="code_post" data-type="code_post" data-message="Erreur">
                    <small id="code_post" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <input value="<?= $user['ville'] ?>" id="ville" class="form-control" type="text" name="ville" placeholder="Ville" aria-describedby="ville" data-type="nom" data-message="Erreur">
                    <small id="ville" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <input value="<?= $user['tel'] ?>" id="tel" class="form-control" type="tel" name="tel" placeholder="Téléphone" aria-describedby="tel" data-type="tel" data-message="Erreur">
                    <small id="tel" class="form-text text-muted"></small>
                </div>
                <input class="btn btn-info" type="submit" name="update" id="update" value="Confirmer">
                <input class="btn btn-danger" type="reset" name="reset" id="reset" value="Réinitialiser">
            </form>
        </div>
<?php
    }
}
