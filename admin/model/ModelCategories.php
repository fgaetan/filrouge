<?php
require_once 'connexion.php';
class ModelCategories
{
    private $id;
    private $nom;

    public function __construct($id =null, $nom =null)
    {
        $this->id = $id;
        $this->nom = $nom;
    }
    // /////////////////////////////////////////////////////    AJOUTER UNE CATEGORIE
    public function add($nom)
    {
        $idcon = connexion();
        $requete = $idcon->prepare("
      INSERT INTO categorie VALUES (null, :nom)
    ");
        return $requete->execute([
            ':nom' => $nom
        ]);
    }
    // /////////////////////////////////////////////////////    RECUPERER UNE CATEGORIE
    public function display($id)
    {
        $idcon = connexion();
        $requete = $idcon->prepare("
        SELECT * FROM categorie WHERE id = :id
        ");
        $requete->execute([
            ':id' => $id
        ]);
        return $requete->fetch(PDO::FETCH_ASSOC);
    }
    // /////////////////////////////////////////////////////    RECUPERER TOUTES LES CATEGORIES
    public function categories()
    {
        $idcon = connexion();
        $requete = $idcon->prepare("
      SELECT * FROM categorie
    ");
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }
    // /////////////////////////////////////////////////////    MODIFICIATION
    public function update($id, $nom)
    {
        $idcon = connexion();
        $requete = $idcon->prepare("
        UPDATE categorie SET nom = :nom WHERE id = :id
      ");
        return $requete->execute([
            ':id' => $id,
            ':nom' => $nom
        ]);
    }
    // /////////////////////////////////////////////////////    SUPPRESSION
    public function delete($id)
    {
        $idcon = connexion();
        $requete = $idcon->prepare("
        DELETE FROM categorie WHERE id= :id;
      ");
        return $requete->execute([
            ':id' => $id,
        ]);
    }
}
