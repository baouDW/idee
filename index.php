<?php

require('controller/controller.php');
try{
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'suppr') {
            deletewolrd();
        }

        elseif ($_GET['action'] == 'supprentreprise') {
            deleteentreprise();
        }

        elseif ($_GET['action'] == 'supprpolitique') {
            deletepolitique();
        }

        elseif ($_GET['action'] == 'supprstory') {
            deletestory();
        }

        elseif ($_GET['action'] == 'worldpost') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                worldPosts();
            }
            else {
                throw new Exception('Erreur : aucun identifiant de billet envoyé');
            }
        }


        elseif ($_GET['action'] == 'entreprisepost') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                entreprisePost();
            }
            else {
                throw new Exception('Erreur : aucun identifiant de billet envoyé');
            }
        }
        

        elseif ($_GET['action'] == 'politiquepost') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                politiquePost();
            }
            else {
                throw new Exception('Erreur : aucun identifiant de billet envoyé');
            }
        }

        elseif ($_GET['action'] == 'storypost') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                storyPost();
            }
            else {
                throw new Exception('Erreur : aucun identifiant de billet envoyé');
            }
        }

        elseif ($_GET['action'] == 'themeV') {
            themeV();
        }

        
        elseif ($_GET['action'] == 'signalMonde') {
            if (isset($_GET['id']))
            {
                signalMonde();
            }
            else {
                throw new Exception('Erreur : aucun identifiant de commentaire envoyé');
            }
        }

        elseif ($_GET['action'] == 'signalWorldCo') {
            if (isset($_GET['id']))
            {
                signalWorldCo();
            }
            else {
                throw new Exception('Erreur : aucun identifiant de commentaire envoyé');
            }
        }

        elseif ($_GET['action'] == 'signalEntreprise') {
            if (isset($_GET['id']))
            {
                signalEntreprise();
            }
            else {
                throw new Exception('Erreur : aucun identifiant de commentaire envoyé');
            }
        }

        elseif ($_GET['action'] == 'signalEntrepriseCo') {
            if (isset($_GET['id']))
            {
                signalEntrepriseCo();
            }
            else {
                throw new Exception('Erreur : aucun identifiant de commentaire envoyé');
            }
        }

        elseif ($_GET['action'] == 'signalPolitique') {
            if (isset($_GET['id']))
            {
                signalPolitique();
            }
            else {
                throw new Exception('Erreur : aucun identifiant de commentaire envoyé');
            }
        }

        elseif ($_GET['action'] == 'signalPolitiqueCo') {
            if (isset($_GET['id']))
            {
                signalPolitiqueCo();
            }
            else {
                throw new Exception('Erreur : aucun identifiant de commentaire envoyé');
            }
        }

        elseif ($_GET['action'] == 'signalStory') {
            if (isset($_GET['id']))
            {
                signalStory();
            }
            else {
                throw new Exception('Erreur : aucun identifiant de commentaire envoyé');
            }
        }

        elseif ($_GET['action'] == 'signalStoryCo') {
            if (isset($_GET['id']))
            {
                signalStoryCo();
            }
            else {
                throw new Exception('Erreur : aucun identifiant de commentaire envoyé');
            }
        }

        elseif ($_GET['action'] == 'signalthemecomm') {
            if (isset($_GET['id']))
            {
                signalthemeC();
            }
            else {
                throw new Exception('Erreur : aucun identifiant de commentaire envoyé');
            }
        }


        elseif ($_GET['action'] == 'modif') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                updateworld();
            }
            else {
                throw new Exception('Erreur : aucun identifiant de billet envoyé');
            }
        }

        elseif ($_GET['action'] == 'modifentreprise') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                updateentreprise();
            }
            else {
                throw new Exception('Erreur : aucun identifiant de billet envoyé');
            }
        }

        elseif ($_GET['action'] == 'modifpolitique') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                updatepolitique();
            }
            else {
                throw new Exception('Erreur : aucun identifiant de billet envoyé');
            }
        }

        elseif ($_GET['action'] == 'modifstory') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                updatestory();
            }
            else {
                throw new Exception('Erreur : aucun identifiant de billet envoyé');
            }
        }

        elseif ($_GET['action'] == 'modifstory') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                updatestory();
            }
            else {
                throw new Exception('Erreur : aucun identifiant de billet envoyé');
            }
        }

        elseif ($_GET['action'] == 'upsignature') {
            if (isset($_POST['sign']) && strlen($_POST['sign'])<255) 
            {
                upSignature();
            }
            else {
                throw new Exception('Erreur : texte trop long (255 caractere autorisé)');
            }
        }

        elseif ($_GET['action'] == 'insertentreprisePost') {
            if (isset($_POST['titre']) && isset($_POST['texte'])) {
                insertentrepriseP();
            }
            else {
                throw new Exception('Erreur : aucun titre envoyé ou texte');
            }
        }


        elseif ($_GET['action'] == 'insertpolitiquePost') {
            if (isset($_POST['titre']) && isset($_POST['texte'])) {
                insertpolitiqueP();
            }
            else {
                throw new Exception('Erreur : aucun titre envoyé ou texte');
            }
        }


        elseif ($_GET['action'] == 'insertstoryPost') {
            if (isset($_POST['titre']) && isset($_POST['texte'])) {
                insertstoryP();
            }
            else {
                throw new Exception('Erreur : aucun titre envoyé ou texte');
            }
        }


        elseif ($_GET['action'] == 'insertTheme') {
            if (isset($_POST['texte'])) {
                insertT();
            }
            else {
                throw new Exception('Erreur : aucun titre envoyé ou texte');
            }
        }

        elseif ($_GET['action'] == 'addWorldComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['comment'])) {
                    addWorldComment();
                }
                else {
                    throw new Exception('Erreur : tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Erreur : aucun identifiant de billet envoyé');
            }
        }

        elseif ($_GET['action'] == 'addEntrepriseComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['comment'])) {
                    addEntrepriseComment();
                }
                else {
                    throw new Exception('Erreur : tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Erreur : aucun identifiant envoyé');
            }
        }

        elseif ($_GET['action'] == 'addPolitiqueComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['comment'])) {
                    addPolitiqueComment();
                }
                else {
                    throw new Exception('Erreur : tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Erreur : aucun identifiant envoyé');
            }
        }

        elseif ($_GET['action'] == 'addStoryComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['comment'])) {
                    addStoryComment();
                }
                else {
                    throw new Exception('Erreur : tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Erreur : aucun identifiant envoyé');
            }
        }

        elseif ($_GET['action'] == 'addthemeComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['comment'])) {
                    addthemeComment();
                }
                else {
                    throw new Exception('Erreur : tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Erreur : aucun identifiant envoyé');
            }
        }


        elseif ($_GET['action'] == 'commadmin') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                commentsAdmin();
            }
            else {
                throw new Exception('Erreur : aucun identifiant envoyé');
            }
        }

        elseif ($_GET['action'] == 'entrepriseCommadmin') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                entrepriseCommentsAdmin();
            }
            else {
                throw new Exception('Erreur : aucun identifiant envoyé');
            }
        }

        elseif ($_GET['action'] == 'politiqueCommadmin') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                politiqueCommentsAdmin();
            }
            else {
                throw new Exception('Erreur : aucun identifiant envoyé');
            }
        }

        elseif ($_GET['action'] == 'storyCommadmin') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                storyCommentsAdmin();
            }
            else {
                throw new Exception('Erreur : aucun identifiant envoyé');
            }
        }

        elseif ($_GET['action'] == 'delcomm') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
               delcomm();
            }
            else {
                throw new Exception('id manquant');
            }
        }

        elseif ($_GET['action'] == 'inscription') {
            if (!empty($_POST['Nom']) && !empty($_POST['Prenom']) && !empty($_POST['pseudo']) && ($_POST['password'] == $_POST['confirm_password']) && (preg_match("#@#", $_POST['email'])))
            {    
                signup();
            }
            elseif (($_POST['password'] !== $_POST['confirm_password'])){
                header('Location: view/frontend/signUpView.php?diferent=diferent');
            }
            elseif (!preg_match("#@#", $_POST['email'])){
                header('Location: view/frontend/signUpView.php?mail=mail');
            }else{
                throw new Exception("Tout les champs ne sont pas correctement remplis");
            }
        }

        elseif ($_GET['action'] == 'login') {
            
            if (isset($_POST['pseudo']) && isset($_POST['pass'])) {           
                login();
            }
            else { 
                throw new Exception( 'id et ou mdp manquant <p><a href="view/signUpView.php">Retour</a></p>') ;
            }
        }

        elseif ($_GET['action'] == 'adminaccess') {
            if ((isset($_SESSION['pseudo'])) && ($_SESSION['pseudo'] == 'admin'))
                {
                    adminaccess();
                }
            
        }

        elseif ($_GET['action'] == 'useraccess') {
            if ((isset($_SESSION['pseudo'])) && ($_SESSION['pseudo'] !== 'admin'))
                {
                    useraccess();
                }
            
        }

        elseif ($_GET['action'] == 'deconexion') {
            deconexion();
            
        }

        elseif ($_GET['action'] == 'membreView') {
           membreView();        
            
        }
        elseif ($_GET['action'] == 'upview') {
           updateworldView();        
            
        }

        elseif ($_GET['action'] == 'upentrepriseview') {
           updateentrepriseView();        
            
        }

        elseif ($_GET['action'] == 'uppolitiqueview') {
           updatepolitiqueView();        
            
        }

        elseif ($_GET['action'] == 'upstoryview') {
           updatestoryView();        
            
        }

        elseif ($_GET['action'] == 'createworldView') {
           createworldView();        
            
        }

        elseif ($_GET['action'] == 'createentrepriseView') {
           createentrepriseView();        
            
        }

        elseif ($_GET['action'] == 'createpolitiqueView') {
           createpolitiqueView();        
            
        }

        elseif ($_GET['action'] == 'createstoryView') {
           createstoryView();        
            
        }

        elseif ($_GET['action'] == 'createTheme') {
           createTheme();        
            
        }

        elseif ($_GET['action'] == 'profilview') {       
                profilView();                            
            
        }


        elseif ($_GET['action'] == 'listeworld') {
           if ((isset($_GET['page'])) && ($_GET['page'] > 0))
                {
                    listWorldPosts($_GET['page']);
                } else{
                    listWorldPosts(1);
                };        
            
        }

        elseif ($_GET['action'] == 'listeentreprise') {
           if ((isset($_GET['page'])) && ($_GET['page'] > 0))
                {
                    listeentreprise($_GET['page']);
                } else{
                    listeentreprise(1);
                }                
            
        }

        elseif ($_GET['action'] == 'listepolitique') {
           if ((isset($_GET['page'])) && ($_GET['page'] > 0))
                {
                    listepolitique($_GET['page']);
                } else{
                    listepolitique(1);
                }        
            
        }

        elseif ($_GET['action'] == 'listestory') {
           if ((isset($_GET['page'])) && ($_GET['page'] > 0))
                {
                    listestory($_GET['page']);
                } else{
                    listestory(1);
                }        
            
        }

        elseif ($_GET['action'] == 'acctheme') {
            acctheme();
            
        }

        elseif ($_GET['action'] == 'jaimes') {
           updatejaime();        
            
        }

        elseif ($_GET['action'] == 'sendimage') {

            if (isset($_POST['submit']))
                {
                    //echo "ya un fichier";
                if ($_FILES['monfichier']['error'])
                    {
                        echo "<p>une erreur est survenue</p>";
                        die;
                    }        
                $fileSize = $_FILES['monfichier']['size'];
                $maxSize = 1023680;
                if ($fileSize > $maxSize)
                    {
                        echo "<p>Fichier trop gros</p>";
                        die;
                    }              
                $fileExt = strtolower(substr(strrchr($_FILES['monfichier']['name'], '.'),1));   
                $extention_accepter = array('jpg', 'jpeg', 'gif', 'png');
                if (!in_array($fileExt,$extention_accepter))
                    {
                        echo "<p>Extension incorrecte</p>";
                    }                 
                //$nom = "user_avatars/".$_SESSION['pseudo'].".$fileExt";
                //$nom = "view/backend/user_avatars/".$_SESSION['pseudo'].".jpg";
                $nom = "public/user_image/".$_SESSION['pseudo'].".jpg";
                $resultat = move_uploaded_file($_FILES['monfichier']['tmp_name'],$nom);
                if (!$resultat) 
                    {
                        echo "Transfert echoué";

                    }

                    profilView();
            }       
            
        }
        

    }
    else {
        accueil();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}