<!doctype html>
<html class="no-js" lang="fr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Gestionnaire de bibliothèque</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/normalize.css">
  <link rel="stylesheet" href="../assets/css/main.css">
</head>

<body>

  <!-- Header -->
<div class="navbar-responsive">
  <nav class="text-center">
    <div class="my-3">
      <p><a class="scroll" href="index.php">Accueil</a></p>
      <p><a class="scroll" href="usersList.php">Utilisateurs</a></p>
      <form action="deconnexion.php" method="post" class="d-inline">
        <input type="submit" name="deconnexion" value="Déconnexion" class="btn btn-danger">
      </form>
    </div>
  </nav>
</div>
<header class="border border-bottom-2">
  <div class="container">
    <div class="logonavbar row d-flex justify-content-between">
      <div class="logo col-9 col-lg-4">
        <a href="index.php"><h1 class="h2 my-4">Ma bibliothèque</h1></a>
      </div>
      <div class="navbar col-3 col-lg-8">
        <nav class="d-none d-lg-block ml-auto">
          <div>
            <p class="d-inline "><a class="scroll" href="index.php">Accueil</a></p>
            <p class="d-inline ml-3"><a class="scroll" href="usersList.php">Utilisateurs</a></p>
        
            <form action="deconnexion.php" method="post" class="d-inline ml-3">
              <input type="submit" name="deconnexion" value="Déconnexion" class="btn btn-danger">
            </form>
            
          </div>
        </nav>
        <nav class="d-lg-none ml-auto">
            <a href="#"><img class="menu" src="../assets/img/menu.svg" alt="menu.svg"></a>
        </nav>
      </div>
    </div>
  </div>
</header>
