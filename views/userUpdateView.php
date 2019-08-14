<?php
  include("template/header.php")
 ?>

<div class="container mb-5">
  
  <h1 class="my-5 text-center">Formulaire de mise à jour d'utilisateur</h1>

  <p class="text-center">*Tous les champs sont obligatoires</p>

  <div class="row">

    <form class="col-6 mx-auto" action="userUpdate.php?id=<?php echo $user->getId_user(); ?>" method="post">
      <div class="form-group">
        <label for="firstname">Prénom*</label>
        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="<?php echo $user->getFirstname();?>" required>
      </div>
      <div class="form-group">
        <label for="lastname">Nom*</label>
        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="<?php echo $user->getLastname();?>" required>
      </div>
      <button type="submit" name="userUpdate" class="btn btn-success" required>Mettre à jour</button>
    </form>


  </div>

</div>

 <?php
  include("template/footer.php")
 ?>