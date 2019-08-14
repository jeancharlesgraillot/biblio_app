<?php
  include("template/header.php")
 ?>

<div class="container mt-5">
  <?php
  foreach ($books[0] as $book) 
  {
  ?>
    <div class="row">

      <div class="imgBox col-12 col-lg-6 text-center">
      <?php
      foreach ($books[1] as $image)
      {
      ?>

      <img src="<?php echo $image->getSource(); ?>" alt="<?php echo $image->getAlt(); ?>">

      <?php
      }
      ?>
      
      </div>

      <div class="col-12 text-center col-lg-6 text-lg-left mt-3">

        <p>Titre : <?php echo $book->getTitle(); ?></p>
        <p>Auteur : <?php echo $book->getAuthor(); ?></p>
        <p>Publication : <?php echo $book->getRelease_date(); ?></p>
        <p>Résumé : <?php echo $book->getDescription(); ?></p>
        <p>Disponibilité : <?php echo $book->getDisponibility(); ?></p>

      <?php
      foreach ($books[2] as $category) {
      ?>
        <p>Catégorie : <?php echo $category->getName(); ?></p>
      <?php
      }
      ?>
        
      </div>

    </div>

    <div class="row mt-5">

      <form class="bookUpdate text-center col-12 col-md-6 col-lg-3" method="post" action="bookUpdate.php?id=<?php echo $book->getId(); ?>">
        <input type="hidden" name="idBookUpdate" value="<?php echo $book->getId(); ?>"  required>
        <button type="submit" name="bookUpdate" class="btn btn-success my-3">Modifier</button>
      </form>
      
      <?php
      if ($book->getDisponibility() == 1) 
      {
      ?>

      <form class="bookDelete text-center col-12 col-md-6 col-lg-3" method="post" action="bookDelete.php">
        <input type="hidden" name="idBookDelete" value="<?php echo $book->getId(); ?>"  required>
        <button type="submit" name="bookDelete" class="btn btn-danger my-3">Supprimer</button>
      </form>

      <form class="bookAttribute text-center col-12 col-md-6 col-lg-3" method="post" action="bookAttribute.php">
          <input type="hidden" name="idBookAttribute" value="<?php echo $book->getId(); ?>" required>
          <button type="submit" name="bookAttribute" class="btn btn-warning text-white my-3">Attribuer à</button>
          <select class="form-control" name="idUserAttribute">
          <option value="" disabled selected>Choisissez l'emprunteur</option>
            <?php 
            foreach ($users as $user) 
            {
              if ($bookManager->countBooks($user->getId_user())['total'] < 3) 
              {
            ?>
                <option value="<?php echo $user->getId_user();?>"><?php echo $user->getFirstname() . " " . $user->getLastname(); ?></option>
            <?php
              }
            }
            ?>
          </select>
      </form>
      <?php
      }else
      {
      ?>
      <form class="bookRestitute text-center col-12 col-md-6 col-lg-3" action="bookRestitute.php" method="post">
        <input type="hidden" name="idBookRestitute" value="<?php echo $book->getId(); ?>"  required>
        <button type="submit" name="bookRestitute" class="btn btn-warning my-3 text-white">Restituer</button>
      </form>
      <?php
      }
      ?>
  <?php
  }
  ?>
  </div>
</div>

 <?php
   include("template/footer.php")
  ?>