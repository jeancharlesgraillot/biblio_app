<?php
  include("template/header.php")
 ?>

<div class="container mt-5">
<?php
foreach ($books[0] as $book) {
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

    <form class="bookUpdate text-center col-12 col-md-6 col-lg-3" action="bookUpdate.php?id=<?php echo $book->getId(); ?>" method="post">
			<input type="hidden" name="idBookUpdate" value="<?php echo $book->getId() ?>"  required>
			<input type="submit" name="bookUpdate" value="Modifier" class="btn btn-primary my-3">
		</form>

    <form class="bookDelete text-center col-12 col-md-6 col-lg-3" action="bookDelete.php" method="post">
			<input type="hidden" name="idBookDelete" value="<?php echo $book->getId() ?>"  required>
			<input type="submit" name="bookDelete" value="Supprimer" class="btn btn-danger my-3">
		</form>

    <?php
    if ($book->getDisponibility() == 1) 
    {
    ?>
    <form class="bookAttribute text-center col-12 col-md-6 col-lg-3" method="post" action="bookAttribute.php" class="text-center col-12 col-md-6 col-lg-3">
        <input type="hidden" name="bookId" value="<?php echo $book->getId(); ?>">
        <button type="submit" name="attribute" class="btn btn-success my-3">Attribuer à</button>
        <select class="form-control" name="userId" id="userId">
        <option value="" disabled selected>Choisissez l'emprunteur</option>
          <?php 
          foreach ($users as $user) 
          {
          ?>
            <option value="<?php echo $user->getId_user();?>"><?php echo $user->getFirstname() . " " . $user->getLastname(); ?></option>
          <?php
          }
          ?>
        </select>
    </form>
    <?php
    }
    ?>
    <form class="bookRestitute text-center col-12 col-md-6 col-lg-3" action="bookDetails.php" method="post">
			<input type="hidden" name="id" value=""  required>
			<button type="submit" name="restitute" class="btn btn-warning my-3 text-white">Restituer</button>
		</form>
<?php
}
?>
</div>

 <?php
   include("template/footer.php")
  ?>