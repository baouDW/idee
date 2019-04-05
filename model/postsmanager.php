
<?php
require_once("Managers.php");

class PostsManager extends Managers
{

    //Get post-------------------------------

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


    //Create posts-----------------------------------------

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


    //Update posts------------------------------------------

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

    //Delete post----------------------------------------------

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

    

}