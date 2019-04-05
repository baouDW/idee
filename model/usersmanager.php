<?php

//namespace idee;

require_once("Managers.php");

class UsersManager extends Managers
{


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


    public function updateLike($nbrlikes, $id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE texte SET jaime = :nbrlikes WHERE id=  :id');
        $req->execute(array(
        'nbrlikes' => $nbrlikes,
        'id' => $id
        ));    
    }

}