<?php

namespace idee;

require_once("Managers.php");

class UsersManager extends Managers
{

    public function inscription($nom, $prenom, $pseudo, $pass, $email){
        $req = $this->db->prepare('INSERT INTO membres (nom, prenom, pseudo, pass, email, date_inscription, signature) VALUES (:nom, :prenom, :pseudo, :pass, :email, NOW(), "aucune")');
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
        $user = $this->db->query('SELECT nom, pseudo, email, date_inscription FROM membres ORDER BY date_inscription DESC');    

        return $user;
    }

    public function getOneUser($pseudo)
    {
        $user = $this->db->prepare('SELECT id, nom, prenom, pseudo, email, date_inscription, signature FROM membres WHERE pseudo = :pseudo');    
        $user->execute(array(
        'pseudo' => $pseudo));
        $resultat = $user->fetch();
        return $resultat;
    }

    public function verifUser($pseudo){
        $req = $this->db->prepare('SELECT id, pass FROM membres WHERE pseudo = :pseudo');
        $req->execute(array(
        'pseudo' => $pseudo));
        $resultat = $req->fetch();
        return $resultat;    
    }

    public function verifPseudo($pseudo){
        $req = $this->db->prepare('SELECT pseudo FROM membres WHERE pseudo = :pseudo');
        $req->execute(array(
        'pseudo' => $pseudo));
        $resultat = $req->fetch();
        return $resultat;    
    }

    public function addSignature($signature, $id)
    {
        $req = $this->db->prepare('UPDATE membres SET signature = :signature WHERE id= :id');
        $req->execute(array(
        'signature' => $signature,
        'id' => $id
        ));    
    }

    

}