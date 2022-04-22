<?php
require_once 'connexion.php';
class ModelUser
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
    // /////////////////////////////////////////////////////    INSCRIPTION
    public function signin($nom, $prenom, $mail, $pass, $adresse, $ville, $code_post, $tel)
    {
        $idcon = connexion();
        $requete = $idcon->prepare("
      INSERT INTO client VALUES (null, :nom, :prenom, :mail, :pass, :adresse, :ville, :code_post, :tel, null)
    ");
        return $requete->execute([
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':mail' => $mail,
            ':pass' => $pass,
            ':adresse' => $adresse,
            ':ville' => $ville,
            ':code_post' => $code_post,
            ':tel' => $tel,
        ]);
    }
    // /////////////////////////////////////////////////////    CONNEXION
    public function signup($mail)
    {
        $idcon = connexion();
        $requete = $idcon->prepare("
      SELECT * FROM client WHERE mail = :mail
    ");
        $requete->execute([
            ':mail' => $mail
        ]);
        return $requete->fetch(PDO::FETCH_ASSOC);
    }
    // /////////////////////////////////////////////////////    RECUPERATION
    public function display($id)
    {
        $idcon = connexion();
        $requete = $idcon->prepare("
      SELECT * FROM client WHERE id = :id
    ");
        $requete->execute([
            ':id' => $id
        ]);
        return $requete->fetch(PDO::FETCH_ASSOC);
    }
    // /////////////////////////////////////////////////////    MODIFICIATION
    public function update($id, $nom, $prenom, $mail, $adresse, $ville, $code_post, $tel)
    {
        $idcon = connexion();
        $request = $idcon->prepare("
        UPDATE client SET nom = :nom, prenom = :prenom, mail = :mail, adresse = :adresse, ville = :ville, code_post = :code_post, tel = :tel WHERE id = :id
      ");
        return $request->execute([
            ':id' => $id,
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':mail' => $mail,
            ':adresse' => $adresse,
            ':ville' => $ville,
            ':code_post' => $code_post,
            ':tel' => $tel
        ]);
    }
    // /////////////////////////////////////////////////////    SUPPRESSION
    public function delete($id)
    {
        $idcon = connexion();
        $requete = $idcon->prepare("
        DELETE FROM client WHERE id= :id;
      ");
        return $requete->execute([
            ':id' => $id,
        ]);
    }
}
