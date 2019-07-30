<?php
  include("template/header.php")
 ?>

<div class="container mb-5">
  
  <h1 class="my-5 text-center">Formulaire d'ajout d'utilisateur</h1>

  <p class="text-center">*Tous les champs sont obligatoires</p>

  <div class="row">
    
    <form class="col-6 mx-auto" action="userAdd.php" method="post">
      <div class="form-group">
        <label for="firstname">Prénom*</label>
        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Le prénom de l'utilisateur" required>
      </div>
      <div class="form-group">
        <label for="lastname">Nom*</label>
        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Le nom de l'utilisateur" required>
      </div>
      <div class="form-group">
        <input type="hidden" class="form-control" id="tokenId" name="tokenId" value="<?php echo $token; ?>">
      </div>
      <button type="submit" name="userAdd" class="btn btn-primary" required>Ajouter</button>
    </form>

  </div>

</div>
 
 <?php
  include("template/footer.php")
 ?>