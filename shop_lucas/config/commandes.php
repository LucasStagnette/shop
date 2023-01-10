<?php
    // fonction pour ajouter un produit a la base de données
    function ajouter($type_id,$modele, $desc, $taille, $prix, $image)
    {
        // verifie la connexion a la base
        if(require("connexion.php"))
        {

            // commande avec les differentes valeur a ajouter
            $req = $access->prepare("INSERT INTO produits (type_id, modele, description_produit, taille, prix, image_produit) VALUES (?,?,?,?,?,?)");

            // on execute la commande avec les variables a rentrer dans la commande
            $req -> execute(array($type_id,$modele, $desc, $taille, $prix, $image));

            $req -> closeCursor();
        }
    }
    
    // fonction qui renvoie tous les produits par date d'ajout decroissante
    function afficher()
    {
        if(require("connexion.php"))
        {
            $req = $access -> prepare("SELECT * FROM produits ORDER BY id DESC");

            $req -> execute();

            $data = $req -> fetchAll(PDO::FETCH_OBJ);

            return $data;
            
            $req -> closeCursor();
        }
    }

    // fonction pour se connecter en administrateur
    function getAdmin($pseudo, $motdepasse)
    {
        if(require("connexion.php"))
        {
            // prepare la commande pour avec les differents parametres
            $req = $access->prepare("SELECT * FROM admin WHERE pseudo=? AND motdepasse=?");

            $req -> execute(array($pseudo, $motdepasse));

            // si on a 1 ligne on renvoie les donnes de la requete
            if($req->rowCount()==1) {
                
                $data = $req->fetch();
                
                return $data;
            }
            else {
                return False;
            }

            $req -> closeCursor();
        }        
    }

    // fonction qui renvoie toutes les donnees d'un produit
    function afficherProduit($id)
    {
        if(require("connexion.php"))
        {
            // on affiche le produit selon son identifiant
            $req=$access->prepare("SELECT * FROM produits WHERE id=?");

            $req->execute(array($id));

            $data = $req->fetchAll(PDO::FETCH_OBJ);

            return $data;

            $req->closeCursor();
        }
    }


    // fonction pour modifier un produit
    function modifier($modele, $desc, $taille, $prix, $image, $id)
    {
        if(require("connexion.php"))
        {
            // modification du produit
            $req = $access->prepare("UPDATE produits SET modele=?, description_produit=?, taille=?, prix=?, image_produit=? WHERE id=?");

            $req->execute(array($modele, $desc, $taille, $prix, $image, $id));

            $req->closeCursor();
        }
    }


    // fonction qui renvoie les types de vetements
    function afficherType()
    {
        if(require("connexion.php"))
        {
            // on affiche tous par ordre d'identifiant 
            $req = $access -> prepare("SELECT * FROM type ORDER BY type_id");

            $req -> execute();

            $data = $req -> fetchAll(PDO::FETCH_OBJ);

            return $data;
            
            $req -> closeCursor();
        }
    }

    // verifie si on recoit une demande de suppression
    if (isset($_GET['action']) && $_GET['action'] == 'supprimer') {
        $idProduit = $_GET['parametre'];
    
        if(require("connexion.php"))
        {
            
            // pour supprimer un produit selon son identifiant
            $req = $access -> prepare("DELETE FROM produits WHERE id=?");

            $req -> execute(array($idProduit));

            // retour sur la page de suppression de produit
            header('Location: ../admin/delete.php');
            
        }
    }
?>
