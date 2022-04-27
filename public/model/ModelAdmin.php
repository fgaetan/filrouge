<?php
class ModelAdmin
{
    private $id;
    private $nom;
    private $prenom;
    private $mail;
    private $pass;
    private $role;

    public function __construct($id = null, $nom = null, $prenom = null, $mail = null, $pass = null, $role = null)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->mail = $mail;
        $this->pass = $pass;
        $this->role = $role;
    }
    public function signupAdmin($mail)
    {
        $idcon = connexion();
        $requete = $idcon->prepare("
      SELECT * FROM employe WHERE mail = :mail
    ");
        $requete->execute([
            ':mail' => $mail
        ]);
        return $requete->fetch(PDO::FETCH_ASSOC);
    }
}
