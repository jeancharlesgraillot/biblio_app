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

$db = Database::Db();

$bookManager = new BookManager($db);

$userManager = new UserManager($db);

$id = intval($_GET['id']);

$books = $bookManager->getBookAndLinkedAttributesById($id);

$users = $userManager->getUsers();

// $borrowedBooks = intval($bookManager->countBooks($user_id)['total']);

include "../views/bookDetailsView.php";
 ?>