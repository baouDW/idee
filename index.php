<?php

require('controller/controller.php');
try{
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'suppr') {
            delete();
        }
        elseif ($_GET['action'] == 'comm') {
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

        elseif ($_GET['action'] == 'videoView') {
            videoView();
        }

        elseif ($_GET['action'] == 'signal') {
            if (isset($_GET['id']))
            {
                signal();
            }
            else {
                throw new Exception('Erreur : aucun identifiant de commentaire envoyé');
            }
        }

        elseif ($_GET['action'] == 'signalPost') {
            if (isset($_GET['id']))
            {
                signalPost();
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


        elseif ($_GET['action'] == 'signalvidcomm') {
            if (isset($_GET['id']))
            {
                signalvidC();
            }
            else {
                throw new Exception('Erreur : aucun identifiant de commentaire envoyé');
            }
        }


        elseif ($_GET['action'] == 'modif') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                update();
            }
            else {
                throw new Exception('Erreur : aucun identifiant de billet envoyé');
            }
        }

        elseif ($_GET['action'] == 'insertworldPost') {
            if (isset($_POST['titre']) && isset($_POST['texte'])) {
                insertworldP();
            }
            else {
                throw new Exception('Erreur : aucun titre envoyé ou texte');
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

        elseif ($_GET['action'] == 'addComment') {
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
                throw new Exception('Erreur : aucun identifiant de billet envoyé');
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
                throw new Exception('Erreur : aucun identifiant de billet envoyé');
            }
        }

        // elseif ($_GET['action'] == 'addvidComment') {
        //     if (isset($_GET['id']) && $_GET['id'] > 0) {
        //         if (!empty($_POST['comment'])) {
        //             addvidComment();
        //         }
        //         else {
        //             throw new Exception('Erreur : tous les champs ne sont pas remplis !');
        //         }
        //     }
        //     else {
        //         throw new Exception('Erreur : aucun identifiant de billet envoyé');
        //     }
        // }


        elseif ($_GET['action'] == 'commadmin') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                commentsAdmin();
            }
            else {
                throw new Exception('erreur');
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
           updateView();        
            
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

        elseif ($_GET['action'] == 'listworldpost') {
           listWorldPosts();        
            
        }

        elseif ($_GET['action'] == 'listeentreprise') {
           listeentreprise();        
            
        }

        elseif ($_GET['action'] == 'listepolitique') {
           listepolitique();        
            
        }

        elseif ($_GET['action'] == 'listestory') {
           listestory();        
            
        }

        elseif ($_GET['action'] == 'jaimes') {
           updatejaime();        
            
        }
        

    }
    else {
        accueil();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}