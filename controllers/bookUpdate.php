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

// On instancie nos managers
$categoryManager = new CategoryManager($db);
$bookManager = new BookManager($db);
$imageManager = new ImageManager($db);
$message="";
$id = intval($_GET['id']);
$bookImageId = intval($bookManager->getBookById($id)->getImage_id());


if (isset($_POST['bookUpdate']))
{
    // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
    if (!empty($_POST['alt']) AND isset($_FILES['source']) AND $_FILES['source']['error'] == 0)
    {
        $alt = 'Couverture du livre ' . htmlspecialchars($_POST['alt']);
        // Testons si le fichier n'est pas trop gros
        if ($_FILES['source']['size'] <= 1000000)
        {
            // Testons si l'extension est autorisée
            $datafile = pathinfo($_FILES['source']['name']);
            $extension_upload = $datafile['extension'];
            $allowed_extensions = array('jpg', 'jpeg', 'gif', 'png');
            if (in_array($extension_upload, $allowed_extensions))
            {
                // On peut valider le fichier et le stocker définitivement
                move_uploaded_file($_FILES['source']['tmp_name'], '../assets/img/books/' . basename($_FILES['source']['name']));

                $source = '../assets/img/books/' . basename($_FILES['source']['name']);

                $image = new Image([
                'source' => $source,
                'alt' => $alt,
                'id_image' => $bookImageId 
                ]);

                $imageManager->updateImage($image);
                $image_id = $bookImageId;
            }
        }
    }

    if (!empty($_POST['category_id'])) 
    {

        $category_id = (int) $_POST['category_id'];
     
    }

    if (!empty($_POST['title']) and !empty($_POST['author']) && !empty($_POST['release_date']) && !empty($_POST['description'])) 
    {
  
            $title = htmlspecialchars($_POST['title']);
            $author = htmlspecialchars($_POST['author']);
            $release_date = htmlspecialchars($_POST['release_date']);
            $description = htmlspecialchars($_POST['description']);
    
                $book = new Book([
                'title' => $title,
                'author' => $author,
                'release_date' => $release_date,
                'description' => $description,
                'category_id' => $category_id,
                'image_id' => $image_id,
                'id' => $id
                ]);

                $bookManager->updateBook($book);
                header('location: index.php');
   }
}

$bookAndLinkedAttributesById = $bookManager->getBookAndLinkedAttributesById($id);
$categories = $categoryManager->getCategories();









































include "../views/bookUpdateView.php";
 ?>