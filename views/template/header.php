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
  <link rel="stylesheet" href="../assets/css/aos.css">
  <link rel="stylesheet" href="../assets/css/normalize.css">
  <link rel="stylesheet" href="../assets/css/main.css">
</head>

<body>

<div id="page">

  <!-- Header -->
  <div class="navbar-responsive">
    <nav class="text-center my-4">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="scroll" href="index.php"><i class="fas fa-book fa-lg mr-1"></i>Liste des livres</a>
        </li>
        <li class="nav-item my-3">
          <a class="scroll" href="usersList.php"><i class="fas fa-users fa-lg mr-1"></i>Utilisateurs</a>
        </li>
        <li>
          <form action="deconnexion.php" method="post" class="d-inline">
            <input type="submit" name="deconnexion" value="Déconnexion" class="btn btn-danger">
          </form>
        </li>
      </ul>
    </nav>
  </div>

  <header class="d-flex align-items-center navbar-dark bg-dark" style="height: 125px;">
    <div class="container">
      <nav class="navbar navbar-expand-lg">

          <a class="navbar-brand" href="index.php"><i class="fas fa-book-reader fa-lg mr-3"></i><span class="h2">Ma Bibliothèque</span></a>

          <ul class="navbar-nav d-none d-lg-flex ml-auto">
              <li class="nav-item mr-2">
                  <a class="nav-link" href="index.php">
                      <i class="fas fa-book fa-lg mr-1"></i>
                      Liste des livres
                  </a>
              </li>
              <li class="nav-item mr-2">
                  <a class="nav-link" href="usersList.php">
                      <i class="fas fa-users fa-lg mr-1"></i>
                      Utilisateurs
                  </a>
              </li>
              <li class="nav-item">
                  <form action="deconnexion.php" method="post">
                    <input type="submit" name="deconnexion" value="Déconnexion" class="btn btn-danger">
                  </form>
              </li>
          </ul>

          <a class="d-lg-none ml-auto" href="#"><img class="menu" src="../assets/img/menu.svg" alt="menu.svg"></a>

      </nav>
    </div>  
  </header>

  <div id="content">
















































<!-- <header class="border border-bottom-2">
  <div class="container">
    <div class="logonavbar row d-flex justify-content-between">
      <div class="logo col-9 col-lg-4">
        <a href="index.php"><h1 class="h2 my-4">Ma bibliothèque</h1></a>
      </div>
      <div class="navbar col-3 col-lg-8">
        <nav class="d-none d-lg-block ml-auto">
          <div>
            <p class="d-inline "><a class="scroll" href="index.php">Accueil / Liste des livres</a></p>
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
</header> -->
