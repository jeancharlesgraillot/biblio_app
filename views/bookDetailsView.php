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


    <form class="bookAttribute text-center col-12 col-md-6 col-lg-3" method="post" action="bookDetails.php" class="text-center col-12 col-md-6 col-lg-3">
      
          <label for="users">Attribuer à</label><br />
          <select name="users" id="users">
              <option value="">Didier</option>
          </select>
     
        <input type="submit" name="add" value="Envoyer" class="btn btn-secondary my-3">
    
    </form>

    <form class="bookRestitute text-center col-12 col-md-6 col-lg-3" action="bookDetails.php" method="post">
			<input type="hidden" name="id" value=""  required>
			<input type="submit" name="restitute" value="Restituer" class="btn btn-secondary my-3">
		</form>
<?php
}
?>
</div>

 <?php
   include("template/footer.php")
  ?>