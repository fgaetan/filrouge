<?php
require_once 'connexion.php';
class ModelAdmin
{
    private $id;
    private $nom;
    private $prenom;
    private $mail;
    private $pass;
    private $adresse;
    private $ville;
    private $code_post;
    private $tel;
    private $token;

    public function __construct($id = null, $nom = null, $prenom = null, $mail = null, $pass = null, $adresse = null, $ville = null, $code_post = null, $tel = null, $token = null)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->mail = $mail;
        $this->pass = $pass;
        $this->adresse = $adresse;
        $this->ville = $ville;
        $this->code_post = $code_post;
        $this->tel = $tel;
        $this->token = $token;
    }
        // /////////////////////////////////////////////////////    RECUPERATION ADMIN
    public function signupAdmin($mail)
    {
        $idcon = connexion($mail);
        $requete = $idcon->prepare("
      SELECT * FROM employe WHERE mail = :mail
    ");
        $requete->execute([
            ':mail' => $mail
        ]);
        return $requete->fetch(PDO::FETCH_ASSOC);
    }
}
