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

$id = intval($_GET['id']);

$user = $userManager->getUser($id);




































include "../views/userDetailsView.php";
 ?>