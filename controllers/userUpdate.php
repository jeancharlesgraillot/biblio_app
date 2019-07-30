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

if (isset($_SESSION['name'])) {
    
}else
{
    header('location: inscriptionLog.php');
}

$db = Database::DB();

$userManager = new UserManager($db);

$id = intval($_GET['id']);

if (isset($_POST['userUpdate']))
{
    if (!empty($_POST['firstname']) 
    && !empty($_POST['lastname']))
    {
        $firstname = htmlspecialchars ($_POST['firstname']);
        $lastname = htmlspecialchars ($_POST['lastname']);

        $user = new User([
        'id_user' => $id,
        'firstname' => $firstname,
        'lastname' => $lastname
        ]);

        $userManager->updateUser($user);
        header('Location: usersList.php');
        

    }else
    {
        $message = "Veuillez compléter tous les champs !";
    }
}

$user = $userManager->getUser($id);



































include "../views/userUpdateView.php";
 ?>