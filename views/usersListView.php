<?php
  include("template/header.php")
 ?>


<h2 class="text-center mt-5">Liste des utilisateurs</h2>

<div class="userAdd text-center my-5">
    <a href="userAdd.php">
        <button type="button" class="btn btn-primary my-3">Ajouter un Utilisateur</button>
    </a>
</div>

<div class="container">
    <div class="row">
        <?php
            foreach ($users as $user)
            {
        ?>
        <div class="card col-12 mx-auto mb-4 no-link-style">
            <a href="userDetails.php?id=<?php echo $user->getId_user();?>">
                <div class="card-header row text-center">
                    <p class="col-12 col-md-6 col-lg-3">Nom : <?php echo $user->getLastname();?></p>
                    <p class="col-12 col-md-6 col-lg-3">Prénom : <?php echo $user->getFirstname();?></p>
                    <p class="col-12 col-md-6 col-lg-3">Identifiant : <?php echo $user->getTokenId();?></p>
                    <p class="col-12 col-md-6 col-lg-3">Livres empruntés : <?php echo $bookManager->countBooks($user->getId_user())['total']?></p>
                </div>
                <div class="card-body row">
                    <form class="userUpdate mx-auto text-center col-12 col-md-6 col-lg-3" action="userUpdate.php?id=<?php echo $user->getId_user();?>" method="post">
                        <input type="hidden" name="id" value=""  required>
                        <input type="submit" name="update" value="Mettre à jour" class="btn btn-success text-white my-3">
                    </form>
                    <?php 
                    if (intval($bookManager->countBooks($user->getId_user())['total']) == 0) 
                    {
                    ?>
                        <form class="userDelete mx-auto text-center col-12 col-md-6 col-lg-3" action="usersList.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $user->getId_user(); ?>"  required>
                            <input type="submit" name="delete" value="Supprimer" class="btn btn-danger my-3">
                        </form>
                    <?php
                    }
                    ?>
                </div>
            </a>
        </div>
        <?php
            }
        ?>
    </div>
</div>

<?php
  include("template/footer.php")
 ?>