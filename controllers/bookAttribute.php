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


if (isset($_POST['userId']) and isset($_POST['bookId'])) {
    $userId = (int)$_POST['userId'];
    $bookId = (int) $_POST['bookId'];
}
$bookManager->updateBookDisponibilityAndUserId($bookId, $userId, 0);
header('location: bookDetails.php?id=' . $bookId);


include "../views/bookDetailsView.php";
 ?>