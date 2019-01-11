<?php

class Manager
{


    public function getWorldPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, author, signalement, jaime, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM monde ORDER BY creation_date DESC LIMIT 0, 5');

        return $req;
    }

    public function getEntreprisePosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, author, signalement, jaime, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM entreprise ORDER BY creation_date DESC LIMIT 0, 5');

        return $req;
    }

    public function getPolitiquePosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, author, signalement, jaime, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM politique ORDER BY creation_date DESC LIMIT 0, 5');

        return $req;
    }

    public function getStoryPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, author, signalement, jaime, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM story ORDER BY creation_date DESC LIMIT 0, 5');

        return $req;
    }

    public function getTheme()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM themeJour ORDER BY creation_date DESC LIMIT 0, 1');

        return $req;
    }

    public function getVidT()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM vidjour ORDER BY creation_date DESC LIMIT 0, 1');

        return $req;
    }
/*
    public function getUserPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM texte WHERE author="aaa" ORDER BY creation_date DESC LIMIT 0, 5');

        return $req;
        
    }


    public function getUserPosts($pseudo)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, author, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM texte WHERE author= ? ORDER BY creation_date DESC LIMIT 0, 5');
            $req->execute(array($pseudo));

        return $req;
        
    }
*/
    public function getWordlUserPosts($pseudo)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, author, signalement, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM monde WHERE author= ? ORDER BY creation_date DESC LIMIT 0, 5');
            $req->execute(array($pseudo));

        return $req;
        
    }

    public function getEntrepriseUserPosts($pseudo)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, author, signalement, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM entreprise WHERE author= ? ORDER BY creation_date DESC LIMIT 0, 5');
            $req->execute(array($pseudo));

        return $req;
        
    }

    public function getPolitiqueUserPosts($pseudo)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, author, signalement, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM politique WHERE author= ? ORDER BY creation_date DESC LIMIT 0, 5');
            $req->execute(array($pseudo));

        return $req;
        
    }

    public function getStoryUserPosts($pseudo)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, author, signalement, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM story WHERE author= ? ORDER BY creation_date DESC LIMIT 0, 5');
            $req->execute(array($pseudo));

        return $req;
        
    }

    public function getWorldPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, author, content, signalement, jaime, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM monde WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function getEntreprisePost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, author, content, signalement, jaime, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM entreprise WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function getPolitiquePost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, author, content, signalement, jaime, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM politique WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function getStoryPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, author, content, signalement, jaime, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM story WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function getWorldComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, signalement, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM monde_comment WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function getEntrepriseComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, signalement, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM entreprise_comment WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function getPolitiqueComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, signalement, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM politique_comment WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function getStoryComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, signalement, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM story_comment WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }


    public function getCommentsTheme($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, signalement, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM themecomment WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function getCommentsVid($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, signalement, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM vidcomment WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }
    /*public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO commentaires (post_id, author, comment, comment_date) VALUES(:post_id, :author, :comment, NOW())');
        $affectedLines = true;
        $comments->execute(array(
        'post_id' => $postId,
        'author' => $author,   
        'comment' => $comment  
        ));
        return $affectedLines;
    }*/

    public function worldPostComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO `monde_comment` (`id`, `post_id`, `author`, `comment`, `comment_date`, `signalement`) VALUES (NULL, :post_id, :author, :comment, CURRENT_TIMESTAMP, "non")'); 
        $affectedLines = true;
        $comments->execute(array(
        'post_id' => $postId,
        'author' => $author,   
        'comment' => $comment  
        ));
        return $affectedLines;
    }

    public function EntreprisePostComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO `entreprise_comment` (`id`, `post_id`, `author`, `comment`, `comment_date`, `signalement`) VALUES (NULL, :post_id, :author, :comment, CURRENT_TIMESTAMP, "non")'); 
        $affectedLines = true;
        $comments->execute(array(
        'post_id' => $postId,
        'author' => $author,   
        'comment' => $comment  
        ));
        return $affectedLines;
    }

    public function politiquePostComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO `politique_comment` (`id`, `post_id`, `author`, `comment`, `comment_date`, `signalement`) VALUES (NULL, :post_id, :author, :comment, CURRENT_TIMESTAMP, "non")'); 
        $affectedLines = true;
        $comments->execute(array(
        'post_id' => $postId,
        'author' => $author,   
        'comment' => $comment  
        ));
        return $affectedLines;
    }

    public function storyPostComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO `story_comment` (`id`, `post_id`, `author`, `comment`, `comment_date`, `signalement`) VALUES (NULL, :post_id, :author, :comment, CURRENT_TIMESTAMP, "non")'); 
        $affectedLines = true;
        $comments->execute(array(
        'post_id' => $postId,
        'author' => $author,   
        'comment' => $comment  
        ));
        return $affectedLines;
    }

    public function themeComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO `themecomment` (`id`, `post_id`, `author`, `comment`, `comment_date`, `signalement`) VALUES (NULL, :post_id, :author, :comment, CURRENT_TIMESTAMP, "non")'); 
        $affectedLines = true;
        $comments->execute(array(
        'post_id' => $postId,
        'author' => $author,   
        'comment' => $comment  
        ));
        return $affectedLines;
    }

    public function vidComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO `vidcomment` (`id`, `post_id`, `author`, `comment`, `comment_date`, `signalement`) VALUES (NULL, :post_id, :author, :comment, CURRENT_TIMESTAMP, "non")'); 
        $affectedLines = true;
        $comments->execute(array(
        'post_id' => $postId,
        'author' => $author,   
        'comment' => $comment  
        ));
        return $affectedLines;
    }

    public function deleteComment($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM commentaires WHERE id= :id');
        $req->execute(array(
        'id' => $id    
        ));
    }

    /*public function insertPost($title,$content)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO texte (title, content, creation_date) VALUES (:title, :content, NOW())');
        $req->execute(array(
        'title' => $title,
        'content' => $content    
        ));
            
    }*/


    public function insertWorldPost($title,$content,$author)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO `monde` (`id`, `title`, `content`, `creation_date`, `author`, `signalement`, `jaime`, `jaimepas`) VALUES (NULL, :title, :content, CURRENT_TIMESTAMP, :author, "non", 0, 0)');
        $req->execute(array(
        'title' => $title,
        'content' => $content,
        'author' => $author   
        ));
    }

    public function insertEntreprisePost($title,$content,$author)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO `entreprise` (`id`, `title`, `content`, `creation_date`, `author`, `signalement`, `jaime`) VALUES (NULL, :title, :content, CURRENT_TIMESTAMP, :author, "non", 0)');
        $req->execute(array(
        'title' => $title,
        'content' => $content,
        'author' => $author   
        ));
    }

    public function insertPolitiquePost($title,$content,$author)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO `politique` (`id`, `title`, `content`, `creation_date`, `author`, `signalement`, `jaime`) VALUES (NULL, :title, :content, CURRENT_TIMESTAMP, :author, "non", 0)');
        $req->execute(array(
        'title' => $title,
        'content' => $content,
        'author' => $author   
        ));
    }

    public function insertStoryPost($title,$content,$author)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO `story` (`id`, `title`, `content`, `creation_date`, `author`, `signalement`, `jaime`) VALUES (NULL, :title, :content, CURRENT_TIMESTAMP, :author, "non", 0)');
        $req->execute(array(
        'title' => $title,
        'content' => $content,
        'author' => $author   
        ));
    }


    public function insertTheme($content)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO `themeJour` (`id`, `content`, `creation_date`) VALUES (NULL, :content, CURRENT_TIMESTAMP)');
        $req->execute(array(
        'content' => $content   
        ));
    }

    public function insertVidT($content)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO `vidjour` (`id`, `content`, `creation_date`) VALUES (NULL, :content, CURRENT_TIMESTAMP)');
        $req->execute(array(
        'content' => $content   
        ));
    }


    public function UptdatePost($title, $content, $id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE monde SET title = :nvtitle, content = :nvcontent WHERE id= :id');
        $req->execute(array(
        'nvtitle' => $title,
        'nvcontent' => $content,
        'id' => $id
        ));    
    }

    public function UptdateEntreprisePost($title, $content, $id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE entreprise SET title = :nvtitle, content = :nvcontent WHERE id= :id');
        $req->execute(array(
        'nvtitle' => $title,
        'nvcontent' => $content,
        'id' => $id
        ));    
    }

    public function UptdatePolitiquePost($title, $content, $id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE politique SET title = :nvtitle, content = :nvcontent WHERE id= :id');
        $req->execute(array(
        'nvtitle' => $title,
        'nvcontent' => $content,
        'id' => $id
        ));    
    }

    public function UptdateStoryPost($title, $content, $id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE story SET title = :nvtitle, content = :nvcontent WHERE id= :id');
        $req->execute(array(
        'nvtitle' => $title,
        'nvcontent' => $content,
        'id' => $id
        ));    
    }

    public function Signalement($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE commentaires SET signalement = \'oui\' WHERE id= :id');
        $req->execute(array(
        'id' => $id
        ));    
    }

    public function SignalementPost($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE texte SET signalement = \'oui\' WHERE id= :id');
        $req->execute(array(
        'id' => $id
        ));    
    }

    public function SignalThemeCom($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE themecomment SET signalement = \'oui\' WHERE id= :id');
        $req->execute(array(
        'id' => $id
        ));    
    }

    public function SignalVidCom($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE vidcomment SET signalement = \'oui\' WHERE id= :id');
        $req->execute(array(
        'id' => $id
        ));    
    }


    public function updateLike($nbrlikes, $id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE texte SET jaime = :nbrlikes WHERE id=  :id');
        $req->execute(array(
        'nbrlikes' => $nbrlikes,
        'id' => $id
        ));    
    }

    public function deleteWorldPost($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM monde WHERE id= :id');
        $req->execute(array(
        'id' => $id    
        ));
    }

    public function deleteEntreprisePost($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM entreprise WHERE id= :id');
        $req->execute(array(
        'id' => $id    
        ));
    }

    public function deletePolitiquePost($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM politique WHERE id= :id');
        $req->execute(array(
        'id' => $id    
        ));
    }

    public function deleteStoryPost($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM story WHERE id= :id');
        $req->execute(array(
        'id' => $id    
        ));
    }

    public function inscription($nom, $prenom, $pseudo, $pass, $email){
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO membres(nom, prenom, pseudo, pass, email, date_inscription) VALUES(:nom, :prenom, :pseudo, :pass, :email, NOW())');
            $req->execute(array(
            'nom' => $nom,
            'prenom' => $prenom,
            'pseudo' => $pseudo,
            'pass' => $pass,
            'email' => $email
        ));
    }

    public function getUser()
    {
        $db = $this->dbConnect();
        $user = $db->query('SELECT nom, pseudo, email, date_inscription FROM membres ORDER BY date_inscription DESC');    

        return $user;
    }

    public function verifUser($pseudo){
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, pass FROM membres WHERE pseudo = :pseudo');
        $req->execute(array(
        'pseudo' => $pseudo));
        $resultat = $req->fetch();
        return $resultat;    
    }

    public function verifPseudo($pseudo){
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT pseudo FROM membres WHERE pseudo = :pseudo');
        $req->execute(array(
        'pseudo' => $pseudo));
        $resultat = $req->fetch();
        return $resultat;    
    }

    private function dbConnect()
    {
        try
        {
            $db = new PDO('mysql:host=localhost;dbname=idee;charset=utf8', 'root', '');
            return $db;
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }




}