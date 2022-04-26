<?php
require_once 'connexion.php';
class ModelProducts
{
    private $id;
    private $nom;
    private $ref;
    private $descr;
    private $qte;
    private $prix;
    private $photo;
    private $id_categorie;
    private $id_marque;

    public function __construct($id =null, $nom =null, $ref= null, $descr =null, $qte =null, $prix =null, $photo =null, $id_categorie =null, $id_marque =null)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->ref = $ref;
        $this->descr = $descr;
        $this->qte = $qte;
        $this->prix = $prix;
        $this->photo = $photo;
        $this->$id_categorie = $id_categorie;
        $this->id_marque = $id_marque;
    }
    // /////////////////////////////////////////////////////    AJOUTER UNE CATEGORIE
    public function add($nom, $ref, $descr, $qte, $prix, $photo, $id_categorie, $id_marque)
    {
        $idcon = connexion();
        $requete = $idcon->prepare("
      INSERT INTO produit VALUES (null, :nom, :ref, :descr, :qte, :prix, :photo, :id_categorie, :id_marque)
    ");
        return $requete->execute([
            ':nom' => $nom
            ':nom' => $nom
            ':nom' => $nom
            ':nom' => $nom
            ':nom' => $nom
            ':nom' => $nom
            ':nom' => $nom
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
