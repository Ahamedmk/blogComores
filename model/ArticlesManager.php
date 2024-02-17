<?php

require_once('Manager.php');

class ArticlesManager extends Manager {

    public function getArticles() {
        $bdd = $this->connection();
            $article_id = $_GET['id'];
            // Prépare et exécute la requête pour récupérer l'article spécifique
            $requete = $bdd->prepare('SELECT * FROM creations WHERE id = :article_id');
            $requete->execute(array('article_id' => $article_id));
            // Retourne le résultat de la requête
            return $requete;
        
    }

    public function addComment($contenu, $id_utilisateur) {
        $bdd = $this->connection();
            $article_id = $_GET['id'];
            // Prépare et exécute la requête pour insérer un nouveau commentaire
            $requeteInsert = $bdd->prepare('INSERT INTO commentaires(contenu, utilisateur_id, article_id) VALUES(?, ?, ?)');
            $result=$requeteInsert->execute([$contenu, $id_utilisateur, $article_id]);
            return $result;
            
    }

    public function getArticleComments() {
        $bdd = $this->connection();
        // Vérifie si l'ID de l'article est défini dans la requête GET
             $article_id = $_GET['id'];
            // Prépare et exécute la requête pour récupérer les commentaires spécifiques à cet article
            $requeteCommentaires = $bdd->prepare('SELECT commentaires.contenu, commentaires.day_date, user.pseudo
            FROM commentaires
            INNER JOIN user ON commentaires.utilisateur_id = user.id
            WHERE commentaires.article_id = :article_id');
            $requeteCommentaires->execute(array('article_id' => $article_id));
            // Retourne les commentaires récupérés
            return $requeteCommentaires;
        
    }
}
