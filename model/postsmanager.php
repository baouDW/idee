<?php

namespace idee;


require_once("Managers.php");

class PostsManager extends Managers
{

//Compte du nombre de posts
    public function nbrPostsWorld()
    {
        $req = $this->db->query('SELECT COUNT(*) as nbr FROM monde');

        return $req;
    }

    public function nbrPostsEntreprise()
    {
        $req = $this->db->query('SELECT COUNT(*) as nbr FROM entreprise');

        return $req;
    }

    public function nbrPostsPolitique()
    {
        $req = $this->db->query('SELECT COUNT(*) as nbr FROM politique');

        return $req;
    }

    public function nbrPostsStory()
    {
        $req = $this->db->query('SELECT COUNT(*) as nbr FROM story');

        return $req;
    }

    //Get post frontend-------------------------------

    public function getWorldPosts($page)
    {
        $req = $this->db->query('SELECT id, title, content, author, signalement, jaime, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM monde ORDER BY creation_date DESC LIMIT '.(($page-1)*4).', 4');

        return $req;
    }

    public function getEntreprisePosts($page)
    {
        $req = $this->db->query('SELECT id, title, content, author, signalement, jaime, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM entreprise ORDER BY creation_date DESC LIMIT '.(($page-1)*4).', 4');

        return $req;
    }

    public function getPolitiquePosts($page)
    {
        $req = $this->db->query('SELECT id, title, content, author, signalement, jaime, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM politique ORDER BY creation_date DESC LIMIT '.(($page-1)*4).', 4');

        return $req;
    }

    public function getStoryPosts($page)
    {
        $req = $this->db->query('SELECT id, title, content, author, signalement, jaime, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM story ORDER BY creation_date DESC LIMIT '.(($page-1)*4).', 4');

        return $req;
    }

    public function getTheme()
    {
        $req = $this->db->query('SELECT id, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM themeJour ORDER BY creation_date DESC LIMIT 0, 3');

        return $req;
    }

    //get posts for user-----------------------------------------
    public function getWordlUserPosts($pseudo)
    {
        $req = $this->db->prepare('SELECT id, title, content, author, signalement, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM monde WHERE author= ? ORDER BY creation_date DESC LIMIT 0, 5');
            $req->execute(array($pseudo));

        return $req;
        
    }

    public function getEntrepriseUserPosts($pseudo)
    {
        $req = $this->db->prepare('SELECT id, title, content, author, signalement, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM entreprise WHERE author= ? ORDER BY creation_date DESC LIMIT 0, 5');
            $req->execute(array($pseudo));

        return $req;
        
    }

    public function getPolitiqueUserPosts($pseudo)
    {
        $req = $this->db->prepare('SELECT id, title, content, author, signalement, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM politique WHERE author= ? ORDER BY creation_date DESC LIMIT 0, 5');
            $req->execute(array($pseudo));

        return $req;
        
    }

    public function getStoryUserPosts($pseudo)
    {
        $req = $this->db->prepare('SELECT id, title, content, author, signalement, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM story WHERE author= ? ORDER BY creation_date DESC LIMIT 0, 5');
            $req->execute(array($pseudo));

        return $req;
        
    }

    //Get one post---------------------------------------------

    public function getWorldPost($postId)
    {
        $req = $this->db->prepare('SELECT id, title, author, content, signalement, jaime, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM monde WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function getEntreprisePost($postId)
    {
        $req = $this->db->prepare('SELECT id, title, author, content, signalement, jaime, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM entreprise WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function getPolitiquePost($postId)
    {
        $req = $this->db->prepare('SELECT id, title, author, content, signalement, jaime, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM politique WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function getStoryPost($postId)
    {
        $req = $this->db->prepare('SELECT id, title, author, content, signalement, jaime, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM story WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function getThemePost($postId)
    {
        $req = $this->db->prepare('SELECT id, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM themejour WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    //Get all post for admin-------------------------------

    public function getAllWorldPosts()
    {
        $req = $this->db->query('SELECT id, title, content, author, signalement, jaime, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM monde ORDER BY creation_date DESC LIMIT 0, 10');

        return $req;
    }

    public function getAllEntreprisePosts()
    {
        $req = $this->db->query('SELECT id, title, content, author, signalement, jaime, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM entreprise ORDER BY creation_date DESC LIMIT 0, 10');

        return $req;
    }

    public function getAllPolitiquePosts()
    {
        $req = $this->db->query('SELECT id, title, content, author, signalement, jaime, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM politique ORDER BY creation_date DESC LIMIT 0, 10');

        return $req;
    }

    public function getAllStoryPosts()
    {
        $req = $this->db->query('SELECT id, title, content, author, signalement, jaime, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM story ORDER BY creation_date DESC LIMIT 0, 10');

        return $req;
    }


    //Create posts-----------------------------------------

    public function insertWorldPost($title,$content,$author)
    {
        $req = $this->db->prepare('INSERT INTO `monde` (`id`, `title`, `content`, `creation_date`, `author`, `signalement`, `jaime`, `jaimepas`) VALUES (NULL, :title, :content, CURRENT_TIMESTAMP, :author, "non", 0, 0)');
        $req->execute(array(
        'title' => $title,
        'content' => $content,
        'author' => $author   
        ));
    }

    public function insertEntreprisePost($title,$content,$author)
    {
        $req = $this->db->prepare('INSERT INTO `entreprise` (`id`, `title`, `content`, `creation_date`, `author`, `signalement`, `jaime`) VALUES (NULL, :title, :content, CURRENT_TIMESTAMP, :author, "non", 0)');
        $req->execute(array(
        'title' => $title,
        'content' => $content,
        'author' => $author   
        ));
    }

    public function insertPolitiquePost($title,$content,$author)
    {
        $req = $this->db->prepare('INSERT INTO `politique` (`id`, `title`, `content`, `creation_date`, `author`, `signalement`, `jaime`) VALUES (NULL, :title, :content, CURRENT_TIMESTAMP, :author, "non", 0)');
        $req->execute(array(
        'title' => $title,
        'content' => $content,
        'author' => $author   
        ));
    }

    public function insertStoryPost($title,$content,$author)
    {
        $req = $this->db->prepare('INSERT INTO `story` (`id`, `title`, `content`, `creation_date`, `author`, `signalement`, `jaime`) VALUES (NULL, :title, :content, CURRENT_TIMESTAMP, :author, "non", 0)');
        $req->execute(array(
        'title' => $title,
        'content' => $content,
        'author' => $author   
        ));
    }


    public function insertTheme($content)
    {
        $req = $this->db->prepare('INSERT INTO `themeJour` (`id`, `content`, `creation_date`) VALUES (NULL, :content, CURRENT_TIMESTAMP)');
        $req->execute(array(
        'content' => $content   
        ));
    }


    //Update posts------------------------------------------

    public function UptdatePost($title, $content, $id)
    {
        $req = $this->db->prepare('UPDATE monde SET title = :nvtitle, content = :nvcontent WHERE id= :id');
        $req->execute(array(
        'nvtitle' => $title,
        'nvcontent' => $content,
        'id' => $id
        ));    
    }

    public function UptdateEntreprisePost($title, $content, $id)
    {
        $req = $this->db->prepare('UPDATE entreprise SET title = :nvtitle, content = :nvcontent WHERE id= :id');
        $req->execute(array(
        'nvtitle' => $title,
        'nvcontent' => $content,
        'id' => $id
        ));    
    }

    public function UptdatePolitiquePost($title, $content, $id)
    {
        $req = $this->db->prepare('UPDATE politique SET title = :nvtitle, content = :nvcontent WHERE id= :id');
        $req->execute(array(
        'nvtitle' => $title,
        'nvcontent' => $content,
        'id' => $id
        ));    
    }

    public function UptdateStoryPost($title, $content, $id)
    {
        $req = $this->db->prepare('UPDATE story SET title = :nvtitle, content = :nvcontent WHERE id= :id');
        $req->execute(array(
        'nvtitle' => $title,
        'nvcontent' => $content,
        'id' => $id
        ));    
    }

    //Delete post----------------------------------------------

    public function deleteWorldPost($id)
    {
        $req = $this->db->prepare('DELETE FROM monde WHERE id= :id');
        $req->execute(array(
        'id' => $id    
        ));
    }

    public function deleteEntreprisePost($id)
    {
        $req = $this->db->prepare('DELETE FROM entreprise WHERE id= :id');
        $req->execute(array(
        'id' => $id    
        ));
    }

    public function deletePolitiquePost($id)
    {
        $req = $this->db->prepare('DELETE FROM politique WHERE id= :id');
        $req->execute(array(
        'id' => $id    
        ));
    }

    public function deleteStoryPost($id)
    {
        $req = $this->db->prepare('DELETE FROM story WHERE id= :id');
        $req->execute(array(
        'id' => $id    
        ));
    }  

    

}