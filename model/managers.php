<?php
namespace idee;

class Managers
{
    public $db;

    public function __construct()
    {
        try
        {
            $this->db = new \PDO('mysql:host=localhost;dbname=idee;charset=utf8', 'root', '');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }
}
    




