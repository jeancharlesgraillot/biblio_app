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

$userManager = new UserManager($db);

$bookManager = new BookManager($db);

$user_id = intval($_GET['id']);

$user = $userManager->getUser($user_id);

$borrowedBooks = $bookManager->countBooks($user_id);

$books = $bookManager->getBooksByUserId($user_id);




































include "../views/userDetailsView.php";
 ?>