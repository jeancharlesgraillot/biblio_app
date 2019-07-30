<?php
  include("template/header.php")
 ?>

<div class="container mb-5">
  
  <h1 class="my-5 text-center">Formulaire d'ajout de livre</h1>

  <p class="text-center">*Tous les champs sont obligatoires</p>

  <div class="row">
    
    <form class="col-6 mx-auto" action="bookAdd.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="title">Titre*</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Le titre du livre" required>
      </div>
      <div class="form-group">
        <label for="author">Auteur*</label>
        <input type="text" class="form-control" id="author" name="author" placeholder="Le nom de l'auteur" required>
      </div>
      <div class="form-group">
        <label for="release_date">Date de publication*</label>
        <input type="date" class="form-control" id="release_date" name="release_date" placeholder="La date de publication" required>
      </div>
      <div class="form-group">
        <label for="category_id">Catégorie*</label>
        <select class="form-control" id="category_id" name="category_id" required>
          <option value="" disabled selected>Choisissez une catégorie</option>
          <?php
          foreach ($categories as $category) 
          { 
          ?>
          <option value="<?php echo $category->getId_category() ;?>"><?php echo $category->getName() ;?></option>
          <?php 
          } 
          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="description">Description*</label>
        <textarea class="form-control" id="description" name="description" rows="3" placeholder="La description du livre"required></textarea>
      </div>
      <div class="form-group">
        <label for="source">Image*</label>
        <input type="file" class="form-control-file" id="source" name="source" required>
      </div>
      <div class="form-group">
        <label for="alt">Alt*</label>
        <input type="text" class="form-control" id="alt" name="alt" placeholder="Le nom alternatif" required>
      </div>
      <button type="submit" name="bookAdd" class="btn btn-primary" required>Ajouter</button>
    </form>

  </div>

</div>

 <?php
  include("template/footer.php")
 ?>