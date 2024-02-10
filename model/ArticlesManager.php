<?php

require_once('Manager.php');

class ArticlesManager extends Manager {

    public function getArticles() {
        $bdd = $this->connection();
        // Vérifie si l'ID de l'article est défini dans la requête GET
        if (isset($_GET['id'])) {
            $article_id = $_GET['id'];
            // Prépare et exécute la requête pour récupérer l'article spécifique
            $requete = $bdd->prepare('SELECT * FROM creations WHERE id = :article_id');
            $requete->execute(array('article_id' => $article_id));
            // Retourne le résultat de la requête
            return $requete;
        }
        // Si aucun ID d'article n'est spécifié, peut-être devriez-vous renvoyer un message d'erreur ou une liste d'articles ?
        // return null; // ou un message d'erreur, etc.
    }

    public function addComment($contenu, $id_utilisateur) {
        $bdd = $this->connection();
        // Vérifie si l'ID de l'article est défini dans la requête GET
        if (isset($_GET['id'])) {
            $article_id = $_GET['id'];
            // Prépare et exécute la requête pour insérer un nouveau commentaire
            $requeteInsert = $bdd->prepare('INSERT INTO commentaires(contenu, utilisateur_id, article_id) VALUES(?, ?, ?)');
            $requeteInsert->execute([$contenu, $id_utilisateur, $article_id]);
            // Redirection uniquement si l'insertion est réussie
            if ($requeteInsert->rowCount() > 0) {
                // Redirection vers la même page pour éviter la soumission répétée du formulaire
                header("Location: article.php?id=$article_id");
                exit();
            }
        } else {
            // Si aucun ID d'article n'est spécifié, peut-être devriez-vous renvoyer un message d'erreur ou gérer cette situation d'une autre manière ?
            // return null; // ou un message d'erreur, etc.
        }
    }

    public function getArticleComments() {
        $bdd = $this->connection();
        // Vérifie si l'ID de l'article est défini dans la requête GET
        if (isset($_GET['id'])) {
            $article_id = $_GET['id'];
            // Prépare et exécute la requête pour récupérer les commentaires spécifiques à cet article
            $requeteCommentaires = $bdd->prepare('SELECT commentaires.contenu, commentaires.day_date, user.pseudo
            FROM commentaires
            INNER JOIN user ON commentaires.utilisateur_id = user.id
            WHERE commentaires.article_id = :article_id');
            $requeteCommentaires->execute(array('article_id' => $article_id));
            // Retourne les commentaires récupérés
            return $requeteCommentaires;
        } else {
            // Si aucun ID d'article n'est spécifié, peut-être devriez-vous renvoyer un message d'erreur ou gérer cette situation d'une autre manière ?
            // return null; // ou un message d'erreur, etc.
        }
    }
}
