<?php
require_once 'connexion.php';
class ModelBrand
{
    private $id;
    private $nom;

    public function __construct($id = null, $nom = null, $logo = null)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->logo = $logo;
    }
    // /////////////////////////////////////////////////////    AJOUTER UNE MARQUE
    public function add($nom, $logo)
    {
        $idcon = connexion();
        $requete = $idcon->prepare("
      INSERT INTO marque VALUES (null, :nom, :logo)
    ");
        return $requete->execute([
            ':nom' => $nom,
            ':logo' => $logo
        ]);
    }
    // /////////////////////////////////////////////////////    RECUPERER UNE MARQUE
    public function display($id)
    {
        $idcon = connexion();
        $requete = $idcon->prepare("
        SELECT * FROM marque WHERE id = :id
        ");
        $requete->execute([
            ':id' => $id
        ]);
        return $requete->fetch(PDO::FETCH_ASSOC);
    }
    // /////////////////////////////////////////////////////    RECUPERER TOUTES LES MARQUES
    public function brand()
    {
        $idcon = connexion();
        $requete = $idcon->prepare("
      SELECT * FROM marque
    ");
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }
    // /////////////////////////////////////////////////////    MODIFICIATION
    public function update($id, $nom, $logo)
    {
        $idcon = connexion();
        $requete = $idcon->prepare("
        UPDATE marque SET nom = :nom, logo = :logo WHERE id = :id
      ");
        return $requete->execute([
            ':id' => $id,
            ':nom' => $nom,
            ':logo' => $logo
        ]);
    }
    // /////////////////////////////////////////////////////    SUPPRESSION
    public function delete($id)
    {
        $idcon = connexion();
        $requete = $idcon->prepare("
        DELETE FROM marque WHERE id= :id
      ");
        return $requete->execute([
            ':id' => $id
        ]);
    }
}