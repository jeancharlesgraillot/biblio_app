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

// Connexion à la base de données
$db = Database::DB();

$userManager = new UserManager($db);

//Suppression d'un utilisateur
if(isset($_POST['delete'])){

	if(isset($_POST['id']) && !empty($_POST['id'])){

		$id = (int) $_POST['id'];


		$userManager->deleteUser($id);
	}

}

$users = $userManager->getUsers();






































include "../views/usersListView.php";
 ?>