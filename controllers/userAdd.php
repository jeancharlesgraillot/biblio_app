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

$db = Database::DB();
$message = "";

$userManager = new UserManager($db);
$bytes = random_bytes(4);
$token = bin2hex($bytes);

if (isset($_POST['userAdd']))
{
    if (!empty($_POST['firstname']) 
    && !empty($_POST['lastname']) 
    && !empty($_POST['tokenId']))
    {
        $firstname = htmlspecialchars ($_POST['firstname']);
        $lastname = htmlspecialchars ($_POST['lastname']);
        $tokenId = htmlspecialchars ($_POST['tokenId']);

        $user = new User([
        'firstname' => $firstname,
        'lastname' => $lastname,
        'tokenId' => $tokenId
        ]);

        $userManager->addUser($user);
        header('Location: usersList.php');
        

    }else
    {
        $message = "Veuillez compléter tous les champs !";
    }
}








































include "../views/userAddView.php";
 ?>