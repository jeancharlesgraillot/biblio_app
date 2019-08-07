<?php
  include("template/header.php")
 ?>

   <form class="bookAdd mx-auto text-center col-12 col-md-6 col-lg-3 my-5" action="bookAdd.php" method="post">
		<input type="hidden" name="id" value=""  required>
		<input type="submit" name="add" value="Ajouter un livre" class="btn btn-primary my-3">
	</form>


  <div class="container">
   <div class="row">

   <?php
   foreach ($books[0] as $book)
   {
   ?>
   
      <div class="card-to-anime col-12 col-md-6 col-lg-3 ">
         <a href="bookDetails.php?id=<?php echo $book->getId() ?>">
            <div class="card mb-3 text-white bg-dark">
               <div class="card-body text-center" >
                  <h5 class="card-title mb-0"><?php echo $book->getTitle(); ?></h5>
               </div>
               <?php
               foreach ($books[1] as $image)
               {
                  if ($book->getImage_id() == $image->getId_image() ) {
               ?>
               
               <img style="min-width: 100px; max-width: 100%; max-height: 300px; min-height: 300px;" class="card-img-bottom" src="<?php echo $image->getSource(); ?>" alt="<?php echo $image->getAlt(); ?>">
   
            <?php
                  }
            }
            ?>

            </div>
         </a>
      </div>

   <?php   
   }
   ?>
   
 <?php
   include("template/footer.php")
  ?>
