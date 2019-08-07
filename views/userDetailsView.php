<?php
  include("template/header.php")
 ?>

<div class="container mt-5">

    <div class="row ">

        <div class="col-12 col-lg-6 text-center text-md-left">
            <p>Prénom : <?php echo $user->getFirstname(); ?></p>
            <p>Nom : <?php echo $user->getLastname(); ?></p>
            <p>Identifiant : <?php echo $user->getTokenId(); ?></p>
            <p>Nombre de livre(s) emprunté(s) : <?php echo $borrowedBooks['total']; ?></p>
        </div>

        <div class="booksList col-12 col-lg-6 border border-secondary">
        
            <ul class="pt-3">
                <li>Livres empruntés :</li><br>
                <?php
                foreach ($books as $book) 
                {
                ?> 
                 <li><?php echo $book->getTitle();?></li>
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
