<?php
  include("template/headerNavLess.php")
 ?>   

<div class="container">
    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="card bg-light inscriptionLogCards">
                <div class="card-header">
                    <h4 class="card-title">
                        <i class="fas fa-lock"></i>
                        Inscription
                    </h4>
                </div>
                <div class="card-body">
                    <div class="alert alert-warning">
                        <p><?php echo $messageInscription ?></p>  
                    </div>
                    <form method="post">
                        <div class="form-group"><label for="name">Admin</label><input id="name" type="text" class="form-control" placeholder="Nom de l'administrateur..." name="name"></div>
                        <div class="form-group"><label for="email">Email</label><input id="email" type="email" class="form-control" placeholder="Email..." name="email"></div>
                        <div class="form-group"><label for="password">Mot de passe</label><input id="password" type="password" class="form-control" placeholder="Mot de passe..." name="password"></div>
                        <div class="form-group"><label for="passwordCheck">Confirmation du mot de passe</label><input id="passwordCheck" type="password" class="form-control" placeholder="Confirmez votre mot de passe..." name="passwordCheck"></div>
                        <div class="form-group">
                            <button type="submit" name="adminAdd" class="btn btn-primary">
                                <i class="fas fa-lock-open"></i>
                                Inscription !
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="card bg-light inscriptionLogCards">
                <div class="card-header">
                    <h4 class="card-title">
                        <i class="fas fa-lock"></i>
                        Connexion
                    </h4>
                </div>
                <div class="card-body">
                    <div class="alert alert-warning">
                        <p><?php echo $messageConnexion ?></p>    
                    </div>
                    <form method="post">
                        <div class="form-group"><label for="name">Admin</label><input id="name" type="text" class="form-control" placeholder="Nom de l'administrateur..." name="name"></div>
                        <div class="form-group"><label for="password">Mot de passe</label><input id="password" type="password" class="form-control" placeholder="Mot de passe..." name="password"></div>
                        <div class="form-group">
                            <button type="submit" name="connexion" class="btn btn-primary">
                                <i class="fas fa-lock-open"></i>
                                Connexion !
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    
</div>


<?php
  include("template/footer.php")
 ?>