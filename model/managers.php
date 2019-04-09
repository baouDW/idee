<?php
namespace idee;
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
    




