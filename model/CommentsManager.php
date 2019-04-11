<?php

namespace idee;

require_once("Managers.php");

class CommentsManager extends Managers
{


    
    public function getWorldComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, signalement, signature, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM monde_comment WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function getEntrepriseComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, signalement, signature, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM entreprise_comment WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function getPolitiqueComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, signalement, signature, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM politique_comment WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function getStoryComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, signalement, signature, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM story_comment WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }


    public function getCommentsTheme($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, signalement, signature, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM themecomment WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    
    public function worldPostComment($postId, $author, $comment, $signature)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO `monde_comment` (`id`, `post_id`, `author`, `comment`, `comment_date`, `signalement`, `signature`) VALUES (NULL, :post_id, :author, :comment, CURRENT_TIMESTAMP, "non", :signature)'); 
        $affectedLines = true;
        $comments->execute(array(
        'post_id' => $postId,
        'author' => $author,   
        'comment' => $comment,
        'signature' => $signature  
        ));
        return $affectedLines;
    }

    public function EntreprisePostComment($postId, $author, $comment, $signature)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO `entreprise_comment` (`id`, `post_id`, `author`, `comment`, `comment_date`, `signalement`, `signature`) VALUES (NULL, :post_id, :author, :comment, CURRENT_TIMESTAMP, "non", :signature)'); 
        $affectedLines = true;
        $comments->execute(array(
        'post_id' => $postId,
        'author' => $author,   
        'comment' => $comment,  
        'signature' => $signature
        ));
        return $affectedLines;
    }

    public function politiquePostComment($postId, $author, $comment, $signature)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO `politique_comment` (`id`, `post_id`, `author`, `comment`, `comment_date`, `signalement`, `signature`) VALUES (NULL, :post_id, :author, :comment, CURRENT_TIMESTAMP, "non", :signature)'); 
        $affectedLines = true;
        $comments->execute(array(
        'post_id' => $postId,
        'author' => $author,   
        'comment' => $comment,
        'signature' => $signature  
        ));
        return $affectedLines;
    }

    public function storyPostComment($postId, $author, $comment, $signature)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO `story_comment` (`id`, `post_id`, `author`, `comment`, `comment_date`, `signalement`, `signature`) VALUES (NULL, :post_id, :author, :comment, CURRENT_TIMESTAMP, "non", :signature)'); 
        $affectedLines = true;
        $comments->execute(array(
        'post_id' => $postId,
        'author' => $author,   
        'comment' => $comment,
        'signature' => $signature  
        ));
        return $affectedLines;
    }

    public function themeComment($postId, $author, $comment, $signature)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO `themecomment` (`id`, `post_id`, `author`, `comment`, `comment_date`, `signalement`) VALUES (NULL, :post_id, :author, :comment, CURRENT_TIMESTAMP, "non", :signature)'); 
        $affectedLines = true;
        $comments->execute(array(
        'post_id' => $postId,
        'author' => $author,   
        'comment' => $comment,
        'signature' => $signature  
        ));
        return $affectedLines;
    }

    

       

}