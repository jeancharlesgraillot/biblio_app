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

$categoryManager = new CategoryManager($db);

$books = $bookManager->getBooks();

$categories = $categoryManager->getCategories();




































include "../views/indexView.php";
 ?>