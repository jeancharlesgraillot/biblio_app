<?php
  include("template/header.php")
 ?>

<div class="container mb-5">
  
  <h1 class="my-5 text-center">Formulaire de modification de livre</h1>

  <p class="text-center">*Tous les champs sont obligatoires</p>

  <div class="row">
    <?php
    foreach ($bookAndLinkedAttributesById[0] as $book) 
    {
    ?>
    <form class="col-6 mx-auto" action="bookUpdate.php?id=<?php echo $book->getId(); ?>" method="post" enctype="multipart/form-data">

      <div class="form-group">
        <label for="title">Titre*</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="<?php echo $book->getTitle(); ?>" required>
      </div>
      <div class="form-group">
        <label for="author">Auteur*</label>
        <input type="text" class="form-control" id="author" name="author" placeholder="<?php echo $book->getAuthor(); ?>" required>
      </div>
      <div class="form-group">
        <label for="release_date">Date de publication*</label>
        <input type="date" class="form-control" id="release_date" name="release_date" value="<?php echo $book->getRelease_date(); ?>" required>
      </div>
      <div class="form-group">
        <label for="category_id">Catégorie*</label>
        <select class="form-control" id="category_id" name="category_id" required>
          <option value="" disabled>Choisissez une catégorie</option>
          <?php
          foreach ($bookAndLinkedAttributesById[2] as $categorySelected) 
          { 
          ?>
              <?php
              foreach ($categories as $category) 
              {
              if ($categorySelected->getName() == $category->getName()) 
              {
              ?>
                <option value="<?php echo $category->getId_category() ;?>" selected><?php echo $category->getName() ;?></option>
              <?php
              }else{
              ?>
                <option value="<?php echo $category->getId_category() ;?>"><?php echo $category->getName() ;?></option>
              <?php
              }
              ?>
                  
              <?php
              }
              ?>
          <?php 
          } 
          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="description">Description*</label>
        <textarea class="form-control" id="description" name="description" rows="3" placeholder="<?php echo $book->getDescription(); ?>"required></textarea>
      </div>
      <div class="form-group">
        <label for="source">Image*</label>
        <input type="file" class="form-control-file" id="source" name="source" required>
      </div>
      <div class="form-group">
        <label for="alt">Alt*</label>
        <?php
        foreach ($bookAndLinkedAttributesById[1] as $image) 
        {
        ?>
          <input type="text" class="form-control" id="alt" name="alt" placeholder="<?php echo $image->getAlt(); ?>" required>
        <?php
        }
        ?>
      </div>
      <button type="submit" name="bookUpdate" class="btn btn-primary" required>Mettre à jour</button>
    <?php
    }
    ?>
    </form>

  </div>

</div>

 <?php
  include("template/footer.php")
 ?>