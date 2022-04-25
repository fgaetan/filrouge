<?php
require_once 'connexion.php';
class ModelDeliverer
{
    private $id;
    private $nom;

    public function __construct($id = null, $nom = null, $logo = null)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->logo = $logo;
    }
    // /////////////////////////////////////////////////////    AJOUTER UN TRANSPORTEUR
    public function add($nom, $logo)
    {
        $idcon = connexion();
        $requete = $idcon->prepare("
      INSERT INTO transporteur VALUES (null, :nom, :logo)
    ");
        return $requete->execute([
            ':nom' => $nom,
            ':logo' => $logo
        ]);
    }
    // /////////////////////////////////////////////////////    RECUPERER UN TRANSPORTEUR
    public function display($id)
    {
        $idcon = connexion();
        $requete = $idcon->prepare("
        SELECT * FROM transporteur WHERE id = :id
        ");
        $requete->execute([
            ':id' => $id
        ]);
        return $requete->fetch(PDO::FETCH_ASSOC);
    }
    // /////////////////////////////////////////////////////    RECUPERER TOUS LES TRANSPORTEURS
    public function deliverer()
    {
        $idcon = connexion();
        $requete = $idcon->prepare("
      SELECT * FROM transporteur
    ");
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }
    // /////////////////////////////////////////////////////    MODIFICIATION
    public function update($id, $nom, $logo)
    {
        $idcon = connexion();
        $requete = $idcon->prepare("
        UPDATE categorie SET nom = :nom, logo = :logo WHERE id = :id
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
        DELETE FROM transporteur WHERE id= :id;
      ");
        return $requete->execute([
            ':id' => $id,
        ]);
    }
}
