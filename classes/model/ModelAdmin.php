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
    public function signinAdmin($nom, $prenom, $mail, $pass, $role)
    {
        $idcon = connexion();
        $requete = $idcon->prepare("
      INSERT INTO client VALUES (null, :nom, :prenom, :mail, :pass, :role)
    ");
        return $requete->execute([
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':mail' => $mail,
            ':pass' => $pass,
            ':role' => $role
        ]);
    }
}
