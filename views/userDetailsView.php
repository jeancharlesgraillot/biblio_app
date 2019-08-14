<?php
  include("template/header.php")
 ?>

<div class="container mt-5">

    <div class="row justify-content-around">

        <div class="card col-12 col-lg-5 p-0 mb-4">
            <div class="card-header bold uppercase">
            Informations Utilisateur :
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><span class="bold">Prénom : </span><?php echo $user->getFirstname();?></li>
                <li class="list-group-item"><span class="bold">Nom : </span><?php echo $user->getLastname();?></li>
                <li class="list-group-item"><span class="bold">Identifiant : </span><?php echo $user->getTokenId();?></li>
                <li class="list-group-item"><span class="bold">Nombre de livre(s) emprunté(s) : </span><?php echo $borrowedBooks;?></li>
            </ul>
        </div>

        <div class="card col-12 col-lg-5 p-0">
            <div class="card-header bold uppercase">
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
