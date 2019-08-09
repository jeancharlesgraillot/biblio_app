<?php
  include("template/header.php")
 ?>

<div class="container mt-5">

    <div class="row justify-content-around">

        <div class="card col-12 col-lg-5 p-0 mb-4">
            <div class="card-header">
            Informations Utilisateur :
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Prénom : <?php echo $user->getFirstname();?></li>
                <li class="list-group-item">Nom : <?php echo $user->getLastname();?></li>
                <li class="list-group-item">Identifiant : <?php echo $user->getTokenId();?></li>
                <li class="list-group-item">Nombre de livre(s) emprunté(s) : <?php echo $borrowedBooks;?></li>
            </ul>
        </div>

        <div class="card col-12 col-lg-5 p-0">
            <div class="card-header">
                Livres empruntés :
            </div>
            <ul class="list-group list-group-flush">
                <?php
                foreach ($books as $book) 
                {
                ?> 
                 <li class="list-group-item"><?php echo $book->getTitle();?></li>
                <?php
                }
                ?>
            </ul>
        </div>

    </div>

</div>




































<?php
  include("template/footer.php")
 ?>
