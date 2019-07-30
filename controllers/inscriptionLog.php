<?php

function loadClass($classname)
{
    if(file_exists('../models/'. $classname.'.php'))
    {
        require '../models/'. $classname.'.php';
    }
    else 
    {
        require '../entities/' . $classname . '.php';
    }
}

spl_autoload_register('loadClass');

session_start();

// We connect to the database
$db = Database::DB();

$adminManager = new AdminManager($db);
$messageInscription = "";
$messageConnexion = "";


//Inscription
if (isset($_POST['adminAdd'])) 
{
    
    if (!empty($_POST['name']) AND !empty($_POST['password']) AND !empty($_POST['passwordCheck'])
    AND !empty($_POST['email']) AND preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email']) AND $_POST['password'] == $_POST['passwordCheck'])
    {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $passwordCheck = htmlspecialchars($_POST['passwordCheck']);
        $pass_hache = password_hash($password, PASSWORD_DEFAULT);

        $admin = new Admin([
        'name' => $name,
        'email' => $email,
        'password' => $pass_hache
        ]);
        
        $adminManager->add($admin);

        $messageInscription = "Vous avez bien été enregistré comme administrateur !";

    }elseif ($_POST['password'] !== $_POST['passwordCheck'])
    {
        $messageInscription = "La confirmation du mot de passe n'est pas valide !";
    }else
    {
        $messageInscription = "Veuillez remplir tous les champs !";
    }
   
}



//Connexion
if (isset($_POST['connexion'])) 
{
    if (!empty($_POST['name']) AND !empty($_POST['password'])) 
    {
        $name = htmlspecialchars($_POST['name']);
        $password = htmlspecialchars($_POST['password']);

        $checkIfExist = $adminManager->checkIfExist($name);
        $savedPassword = $checkIfExist->getPassword();

        // Comparaison du pass envoyé via le formulaire avec la base
        $passwordCheck = password_verify($password, $savedPassword);
        
        if ($checkIfExist && $passwordCheck)
        {
            
            $_SESSION['name'] = $name;
            header('Location: index.php');
            
        }else
        {
            $messageConnexion = "Vous n'êtes pas inscrit ou votre mot de passe n'est pas bon !";
        }
    }else
    {
        $messageConnexion = "Veuillez remplir tous les champs !";
    }
}

include "../views/inscriptionLogView.php";

 ?>