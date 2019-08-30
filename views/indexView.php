<?php
  include("template/header.php")
 ?>

   <form class="bookAdd mx-auto text-center col-12 col-md-6 col-lg-3 my-5" action="bookAdd.php" method="post">
		<input type="hidden" name="id" value=""  required>
		<input type="submit" name="add" value="Ajouter un livre" class="btn btn-primary my-3">
	</form>

   <div class="container mb-5">

      <div class="row">

         <form class="selectBooksByCategory text-center col-12 col-lg-6 mx-auto" method="post" action="index.php">
               <div class="form-group d-flex justify-content-center">
                  <select class="form-control" name="categorySelect">
                  <option value="" disabled selected>Choisissez une catégorie</option>
                     <?php 
                     foreach ($categories as $category) 
                     {
                     ?>
                     <option value="<?php echo $category->getName();?>"><?php echo $category->getName();?></option>
                     <?php
                     }
                     ?>
                  </select>
                  <button class="btn btn-success ml-3" type="submit" name="selectBooksByCategory"><i class="fas fa-arrow-right"></i> Trier</button>
                  <a href="index.php" class="btn btn-warning text-white ml-3">Tous les livres</a>
               </div>
         </form>

      </div>

   </div>

   <div class="container">
      
      <?php
      if (isset($_POST['selectBooksByCategory'])) 
      {
      
         if (isset($_POST['categorySelect']))
         {
            $name = htmlspecialchars($_POST['categorySelect']);
            $booksByCategory = $bookManager->getBooksByCategoryName($name);
      ?>
      <p class="h3 mb-5">Catégorie : <?php echo $name?></p>  
      <div class="row">

            <?php
            foreach ($booksByCategory[0] as $book) 
            {
            ?>
      
               <div data-aos="zoom-in" class="col-12 col-md-6 col-lg-3 no-link-style">
                  <a href="bookDetails.php?id=<?php echo $book->getId() ?>">
                     <div class="card mb-3 text-white bg-dark mx-auto" style="max-width: 300px;">
                        <div class="card-body text-center" >
                           <h5 class="card-title mb-0"><?php echo $book->getTitle(); ?></h5>
                        </div>
                        <?php
                        foreach ($booksByCategory[1] as $image)
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
         }
      }else 
      {
      ?>
      <div class="row">
            <?php
            foreach ($books[0] as $book) 
            {
            ?>
               <div data-aos="zoom-in" class="col-12 col-md-6 col-lg-3 no-link-style">
                  <a href="bookDetails.php?id=<?php echo $book->getId() ?>">
                     <div class="card mb-3 text-white bg-dark mx-auto" style="max-width: 300px;">
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
      }
      ?>
      </div>
   </div>
   
 <?php
   include("template/footer.php")
  ?>
