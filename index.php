<?php
session_start();
require 'controller/UserController.php';
require 'controller/CrudController.php';
require 'controller/ViewController.php';

//require 'vendor/autoload.php';

$crudcontroller = new CrudController;
$viewcontroller = new ViewController;
$usercontroller = new UserController;

try{
    if (isset($_GET['action'])) {        
        switch ($_GET['action']) 
        { 

            case 'suppr': 
                $crudcontroller->deletewolrd();
            break;

            case 'supprentreprise':
                $crudcontroller->deleteentreprise();

            break;

            case 'supprpolitique':
                $crudcontroller->deletepolitique();
            break;

            case 'supprstory':
                $crudcontroller->deletestory();
            break;
            
            case "worldpost": 
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                        $viewcontroller->worldPosts();
                }else {
                    throw new Exception('Erreur : aucun identifiant de billet envoyé');
                }
            break;        
            
            
            case 'entreprisepost':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $viewcontroller->entreprisePost();
                }
                else {
                    throw new Exception('Erreur : aucun identifiant de billet envoyé');
                } 
            break;               

            case 'politiquepost':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $viewcontroller->politiquePost();
                }
                else {
                    throw new Exception('Erreur : aucun identifiant de billet envoyé');
                } 
            break;       

            case 'storypost':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $viewcontroller->storyPost();
                }
                else {
                    throw new Exception('Erreur : aucun identifiant de billet envoyé');
                }
            break;
            

            case 'themeV':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $viewcontroller->themeV();
                }
                else {
                    throw new Exception('Erreur : aucun identifiant de billet envoyé');
                }
            break;

            
            case 'signalMonde':
                if (isset($_GET['id']))
                {
                    $usercontroller->signalMonde();
                }
                else {
                    throw new Exception('Erreur : aucun identifiant de commentaire envoyé');
                }
            break;

            case 'signalWorldCo':
                if (isset($_GET['id']))
                {
                    $usercontroller->signalWorldCo();
                }
                else {
                    throw new Exception('Erreur : aucun identifiant de commentaire envoyé');
                }
            break;

            case 'signalEntreprise':
                if (isset($_GET['id']))
                {
                    $usercontroller->signalEntreprise();
                }
                else {
                    throw new Exception('Erreur : aucun identifiant de commentaire envoyé');
                }
            break;

            case 'signalEntrepriseCo':
                if (isset($_GET['id']))
                {
                    $usercontroller->signalEntrepriseCo();
                }
                else {
                    throw new Exception('Erreur : aucun identifiant de commentaire envoyé');
                }
            break;

            case 'signalPolitique':
                if (isset($_GET['id']))
                {
                    $usercontroller->signalPolitique();
                }
                else {
                    throw new Exception('Erreur : aucun identifiant de commentaire envoyé');
                }
            break;

            case 'signalPolitiqueCo':
                if (isset($_GET['id']))
                {
                    $usercontroller->signalPolitiqueCo();
                }
                else {
                    throw new Exception('Erreur : aucun identifiant de commentaire envoyé');
                }
            break;

            case 'signalStory':
                if (isset($_GET['id']))
                {
                    $usercontroller->signalStory();
                }
                else {
                    throw new Exception('Erreur : aucun identifiant de commentaire envoyé');
                }
            break;

            case 'signalStoryCo':
                if (isset($_GET['id']))
                {
                    $usercontroller->signalStoryCo();
                }
                else {
                    throw new Exception('Erreur : aucun identifiant de commentaire envoyé');
                }
            break;

            case 'signalthemecomm':
                if (isset($_GET['id']))
                {
                    $usercontroller->signalthemeC();
                }
                else {
                    throw new Exception('Erreur : aucun identifiant de commentaire envoyé');
                }
            break;


            case 'modif':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $crudcontroller->updateworld();
                }
                else {
                    throw new Exception('Erreur : aucun identifiant de billet envoyé');
                }
            break;

            case 'modifentreprise':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $crudcontroller->updateentreprise();
                }
                else {
                    throw new Exception('Erreur : aucun identifiant de billet envoyé');
                }
            break;

            case 'modifpolitique':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $crudcontroller->updatepolitique();
                }
                else {
                    throw new Exception('Erreur : aucun identifiant de billet envoyé');
                }
            break;

            case 'modifstory':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $crudcontroller->updatestory();
                }
                else {
                    throw new Exception('Erreur : aucun identifiant de billet envoyé');
                }
            break;

            case 'modifstory':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $crudcontroller->updatestory();
                }
                else {
                    throw new Exception('Erreur : aucun identifiant de billet envoyé');
                }
            break;

            case 'upsignature':
                if (isset($_POST['sign']) && strlen($_POST['sign'])<255) 
                {
                    $crudcontroller->upSignature();
                }
                else {
                    throw new Exception('Erreur : texte trop long (255 caractere autorisé)');
                }
            break;

            case 'insertworldPost':
                if (isset($_POST['titre']) && isset($_POST['texte'])) {
                    $crudcontroller->insertworldP();
                }
                else {
                    throw new Exception('Erreur : aucun titre envoyé ou texte');
                }
            break;

            case 'insertentreprisePost':
                if (isset($_POST['titre']) && isset($_POST['texte'])) {
                    $crudcontroller->insertentrepriseP();
                }
                else {
                    throw new Exception('Erreur : aucun titre envoyé ou texte');
                }
            break;


            case 'insertpolitiquePost':
                if (isset($_POST['titre']) && isset($_POST['texte'])) {
                    $crudcontroller->insertpolitiqueP();
                }
                else {
                    throw new Exception('Erreur : aucun titre envoyé ou texte');
                }
            break;


            case 'insertstoryPost':
                if (isset($_POST['titre']) && isset($_POST['texte'])) {
                    $crudcontroller->insertstoryP();
                }
                else {
                    throw new Exception('Erreur : aucun titre envoyé ou texte');
                }
            break;


            case 'insertTheme':
                if (isset($_POST['texte'])) {
                    $crudcontroller->insertT();
                }
                else {
                    throw new Exception('Erreur : aucun titre envoyé ou texte');
                }
            break;

            case 'addWorldComment':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    if (!empty($_POST['comment'])) {
                        $crudcontroller->addWorldComment();
                    }
                    else {
                        throw new Exception('Erreur : tous les champs ne sont pas remplis !');
                    }
                }
                else {
                    throw new Exception('Erreur : aucun identifiant de billet envoyé');
                }
            break;

            case 'addEntrepriseComment':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    if (!empty($_POST['comment'])) {
                        $crudcontroller->addEntrepriseComment();
                    }
                    else {
                        throw new Exception('Erreur : tous les champs ne sont pas remplis !');
                    }
                }
                else {
                    throw new Exception('Erreur : aucun identifiant envoyé');
                }
            break;

            case 'addPolitiqueComment':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    if (!empty($_POST['comment'])) {
                        $crudcontroller->addPolitiqueComment();
                    }
                    else {
                        throw new Exception('Erreur : tous les champs ne sont pas remplis !');
                    }
                }
                else {
                    throw new Exception('Erreur : aucun identifiant envoyé');
                }
            break;

            case 'addStoryComment':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    if (!empty($_POST['comment'])) {
                        $crudcontroller->addStoryComment();
                    }
                    else {
                        throw new Exception('Erreur : tous les champs ne sont pas remplis !');
                    }
                }
                else {
                    throw new Exception('Erreur : aucun identifiant envoyé');
                }
            break;

            case 'addthemeComment':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    if (!empty($_POST['comment'])) {
                        $crudcontroller->addthemeComment();
                    }
                    else {
                        throw new Exception('Erreur : tous les champs ne sont pas remplis !');
                    }
                }
                else {
                    throw new Exception('Erreur : aucun identifiant envoyé');
                }
            break;


            case 'commadmin':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $viewcontroller->commentsAdmin();
                }
                else {
                    throw new Exception('Erreur : aucun identifiant envoyé');
                }
            break;

            case 'entrepriseCommadmin':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $viewcontroller->entrepriseCommentsAdmin();
                }
                else {
                    throw new Exception('Erreur : aucun identifiant envoyé');
                }
            break;

            case 'politiqueCommadmin':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $viewcontroller->politiqueCommentsAdmin();
                }
                else {
                    throw new Exception('Erreur : aucun identifiant envoyé');
                }
            break;

            case 'storyCommadmin':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $viewcontroller->storyCommentsAdmin();
                }
                else {
                    throw new Exception('Erreur : aucun identifiant envoyé');
                }
            break;

            case 'delcomm':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                   $crudcontroller->delcomm();
                }
                else {
                    throw new Exception('id manquant');
                }
            break;

            case 'inscription':
                if (!empty($_POST['Nom']) && !empty($_POST['Prenom']) && !empty($_POST['pseudo']) && ($_POST['password'] == $_POST['confirm_password']) && (preg_match("#@#", $_POST['email'])))
                {    
                    $usercontroller->signup();
                }
                elseif (($_POST['password'] !== $_POST['confirm_password'])){
                    header('Location: view/frontend/signUpView.php?diferent=diferent');
                }
                elseif (!preg_match("#@#", $_POST['email'])){
                    header('Location: view/frontend/signUpView.php?mail=mail');
                }else{
                    throw new Exception("Tout les champs ne sont pas correctement remplis");
                }
            break;

            case 'login':
                
                if (isset($_POST['pseudo']) && isset($_POST['pass'])) {           
                    $usercontroller->login();
                }
                else { 
                    throw new Exception( 'id et ou mdp manquant <p><a href="view/signUpView.php">Retour</a></p>') ;
                }
            break;

            case 'adminaccess':
                if ((isset($_SESSION['pseudo'])) && ($_SESSION['pseudo'] == 'admin'))
                    {
                        $usercontroller->adminaccess();
                    }
                
            break;

            case 'useraccess':
                if ((isset($_SESSION['pseudo'])) && ($_SESSION['pseudo'] !== 'admin'))
                    {
                        $usercontroller->useraccess();
                    }
                
            break;

            case 'deconexion':
                $usercontroller->deconexion();
                
            break;

            case 'membreView':
               $usercontroller->membreView();        
                
            break;
            case 'upview':
               $crudcontroller->updateworldView();        
                
            break;

            case 'upentrepriseview':
               $crudcontroller->updateentrepriseView();        
                
            break;

            case 'uppolitiqueview':
               $crudcontroller->updatepolitiqueView();        
                
            break;

            case 'upstoryview':
               $crudcontroller->updatestoryView();        
                
            break;

            case 'createworldView':
               $crudcontroller->createworldView();        
                
            break;

            case 'createentrepriseView':
               $crudcontroller->createentrepriseView();        
                
            break;

            case 'createpolitiqueView':
               $crudcontroller->createpolitiqueView();        
                
            break;

            case 'createstoryView':
               $crudcontroller->createstoryView();        
                
            break;

            case 'createTheme':
               $crudcontroller->createTheme();        
                
            break;

            case 'profilview':     
                    $crudcontroller->profilView();                            
                
            break;


            case 'listeworld':
               if ((isset($_GET['page'])) && ($_GET['page'] > 0))
                    {
                        $viewcontroller->listWorldPosts($_GET['page']);
                    } else{
                        $viewcontroller->listWorldPosts(1);
                    };        
                
            break;

            case 'listeentreprise':
               if ((isset($_GET['page'])) && ($_GET['page'] > 0))
                    {
                        $viewcontroller->listeentreprise($_GET['page']);
                    } else{
                        $viewcontroller->listeentreprise(1);
                    }                
                
            break;

            case 'listepolitique':
               if ((isset($_GET['page'])) && ($_GET['page'] > 0))
                    {
                        $viewcontroller->listepolitique($_GET['page']);
                    } else{
                        $viewcontroller->listepolitique(1);
                    }        
                
            break;

            case 'listestory':
               if ((isset($_GET['page'])) && ($_GET['page'] > 0))
                    {
                        $viewcontroller->listestory($_GET['page']);
                    } else{
                        $viewcontroller->listestory(1);
                    }        
                
            break;

            case 'acctheme':
                $viewcontroller->acctheme();
                
            break;


            case 'sendimage':
            //verifie que le fichier est envoyé
                if (isset($_POST['submit']))
                    {
                    if ($_FILES['monfichier']['error'])
                        {
                            echo "<p>une erreur est survenue</p>";
                            die;
                        }        
                    $fileSize = $_FILES['monfichier']['size'];
                    $maxSize = 1023680;
                    //Verifie la taille du fichier
                    if ($fileSize > $maxSize)
                        {
                            echo "<p>Fichier trop gros</p>";
                            die;
                        }  
                    //retien l'extention du fichier            
                    $fileExt = strtolower(substr(strrchr($_FILES['monfichier']['name'], '.'),1));   
                    $extention_accepter = array('jpg', 'jpeg', 'gif', 'png');
                    //comparre l'extention aux tableau
                    if (!in_array($fileExt,$extention_accepter))
                        {
                            echo "<p>Extension incorrecte</p>";
                        }
                    //Nome le fichier en fonction de l'user
                    $nom = "public/user_image/".$_SESSION['pseudo'].".jpg";
                    //deplace le fichier dans le dossier choisi
                    $resultat = move_uploaded_file($_FILES['monfichier']['tmp_name'],$nom);
                    if (!$resultat) 
                        {
                            echo "Transfert echoué";

                        }
                        $crudcontroller->profilView();
                    }                  
            break;

            case 0:
                $viewcontroller->accueil();
                
            break;     

            default:
                $viewcontroller->accueil();
        }
    
    }else
        {
            $viewcontroller->accueil();
        }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
