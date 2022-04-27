<?php
require_once 'connexion.php';
class ModelProduct
{
    private $id;
    private $nom;
    private $ref;
    private $description;
    private $quantite;
    private $prix;
    private $photo;
    private $id_categorie;
    private $id_marque;

    public function __construct($id = null, $nom = null, $ref = null, $description = null, $quantite = null, $prix = null, $photo = null, $id_categorie = null, $id_marque = null)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->ref = $ref;
        $this->description = $description;
        $this->quantite = $quantite;
        $this->prix = $prix;
        $this->photo = $photo;
        $this->$id_categorie = $id_categorie;
        $this->id_marque = $id_marque;
    }
    // /////////////////////////////////////////////////////    AJOUTER UN PRODUIT
    public function add($nom, $ref, $description, $quantite, $prix, $photo, $id_categorie, $id_marque)
    {
        $idcon = connexion();
        $requete = $idcon->prepare("
      INSERT INTO produit VALUES (null, :nom, :ref, :description, :quantite, :prix, :photo, :id_categorie, :id_marque)
    ");
        return $requete->execute([
            ':nom' => $nom,
            ':ref' => $ref,
            ':description' => $description,
            ':quantite' => $quantite,
            ':prix' => $prix,
            ':photo' => $photo,
            ':id_categorie' => $id_categorie,
            ':id_marque' => $id_marque
        ]);
    }
    // /////////////////////////////////////////////////////    RECUPERER UN PRODUIT
    public function display($id)
    {
        $idcon = connexion();
        $requete = $idcon->prepare("
        SELECT * FROM produit WHERE id = :id
        ");
        $requete->execute([
            ':id' => $id
        ]);
        return $requete->fetch(PDO::FETCH_ASSOC);
    }
    // /////////////////////////////////////////////////////    RECUPERER TOUS LES PRODUTIS
    public function products()
    {
        $idcon = connexion();
        $requete = $idcon->prepare("
      SELECT * FROM produit
    ");
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }
    // /////////////////////////////////////////////////////    MODIFICIATION
    public function update($id, $nom, $ref, $description, $quantite, $prix, $photo, $id_categorie, $id_marque)
    {
        $idcon = connexion();
        $requete = $idcon->prepare("
        UPDATE produit SET nom = :nom, ref = :ref, description = :description, quantite = :quantite, prix = :prix, photo = :photo, id_categorie = :id_categorie, id_marque = :id_marque WHERE id = :id
      ");
        return $requete->execute([
            ':id' => $id,
            ':nom' => $nom,
            ':ref' => $ref,
            ':description' => $description,
            ':quantite' => $quantite,
            ':prix' => $prix,
            ':photo' => $photo,
            ':id_categorie' => $id_categorie,
            ':id_marque' => $id_marque
        ]);
    }
    // /////////////////////////////////////////////////////    SUPPRESSION
    public function delete($id)
    {
        $idcon = connexion();
        $requete = $idcon->prepare("
        DELETE FROM produit WHERE id= :id
      ");
        return $requete->execute([
            ':id' => $id,
        ]);
    }
}
