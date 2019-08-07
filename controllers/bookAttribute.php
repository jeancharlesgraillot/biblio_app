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

if (isset($_POST['bookAttribute'])) 
{
    if (isset($_POST['idUserAttribute']) and isset($_POST['idBookAttribute'])) 
    {
        $userId = (int)$_POST['idUserAttribute'];
        $bookId = (int)$_POST['idBookAttribute'];
    }
}
$bookManager->updateBookDisponibilityAndUserId($bookId, $userId, 0);
header('location: bookDetails.php?id=' . $bookId);