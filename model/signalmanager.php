<?php

namespace idee;

require_once("Managers.php");

class SignalManager extends Managers
{

    public function SignalementMonde($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE monde SET signalement = \'oui\' WHERE id= :id');
        $req->execute(array(
        'id' => $id
        ));    
    }

    public function SignalementWorldCom($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE monde_comment SET signalement = \'oui\' WHERE id= :id');
        $req->execute(array(
        'id' => $id
        ));    
    }

public function SignalementEntreprise($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE entreprise SET signalement = \'oui\' WHERE id= :id');
        $req->execute(array(
        'id' => $id
        ));    
    }

    public function SignalementEntrepriseCom($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE entreprise_comment SET signalement = \'oui\' WHERE id= :id');
        $req->execute(array(
        'id' => $id
        ));    
    }

    public function SignalementPolitique($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE politique SET signalement = \'oui\' WHERE id= :id');
        $req->execute(array(
        'id' => $id
        ));    
    }

    public function SignalementPolitiqueCom($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE politique_comment SET signalement = \'oui\' WHERE id= :id');
        $req->execute(array(
        'id' => $id
        ));    
    }

    public function SignalementStory($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE story SET signalement = \'oui\' WHERE id= :id');
        $req->execute(array(
        'id' => $id
        ));    
    }

    public function SignalementStoryCom($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE story_comment SET signalement = \'oui\' WHERE id= :id');
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
}