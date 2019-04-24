<?php

namespace idee;

require_once("Managers.php");

class SignalManager extends Managers
{

    public function SignalementMonde($id)
    {
        $req = $this->db->prepare('UPDATE monde SET signalement = \'oui\' WHERE id= :id');
        $req->execute(array(
        'id' => $id
        ));    
    }

    public function SignalementWorldCom($id)
    {
        $req = $this->db->prepare('UPDATE monde_comment SET signalement = \'oui\' WHERE id= :id');
        $req->execute(array(
        'id' => $id
        ));    
    }

public function SignalementEntreprise($id)
    {
        $req = $this->db->prepare('UPDATE entreprise SET signalement = \'oui\' WHERE id= :id');
        $req->execute(array(
        'id' => $id
        ));    
    }

    public function SignalementEntrepriseCom($id)
    {
        $req = $this->db->prepare('UPDATE entreprise_comment SET signalement = \'oui\' WHERE id= :id');
        $req->execute(array(
        'id' => $id
        ));    
    }

    public function SignalementPolitique($id)
    {
        $req = $this->db->prepare('UPDATE politique SET signalement = \'oui\' WHERE id= :id');
        $req->execute(array(
        'id' => $id
        ));    
    }

    public function SignalementPolitiqueCom($id)
    {
        $req = $this->db->prepare('UPDATE politique_comment SET signalement = \'oui\' WHERE id= :id');
        $req->execute(array(
        'id' => $id
        ));    
    }

    public function SignalementStory($id)
    {
        $req = $this->db->prepare('UPDATE story SET signalement = \'oui\' WHERE id= :id');
        $req->execute(array(
        'id' => $id
        ));    
    }

    public function SignalementStoryCom($id)
    {
        $req = $this->db->prepare('UPDATE story_comment SET signalement = \'oui\' WHERE id= :id');
        $req->execute(array(
        'id' => $id
        ));    
    }

    public function SignalThemeCom($id)
    {
        $req = $this->db->prepare('UPDATE themecomment SET signalement = \'oui\' WHERE id= :id');
        $req->execute(array(
        'id' => $id
        ));    
    }
}