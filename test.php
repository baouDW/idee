<?php
class Managers
{
    protected function dbConnect()
    {
        try
        {
            $db = new \PDO('mysql:host=localhost;dbname=idee;charset=utf8', 'root', '');
            return $db;
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }
}


class PostsManager extends Managers
{
    public function getTheme()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM themeJour ORDER BY creation_date DESC LIMIT 0, 3');

        return $req;
    }
}

$postmanager = new PostsManager();
$theme = $postmanager->getTheme();

while ($comment = $themeCom->fetch())
    {
        echo $theme['id'];
    }
