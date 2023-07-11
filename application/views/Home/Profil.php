<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style2.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/style.css">
</head>
<body>
    <div class="landing-page">
        <header>
            <div class="container">
                <a href="<?php echo base_url("ControllerFront/Index") ?>" class="logo"><b>Re</b>gime</a>
                <ul class="links">
                <li><a href="<?php echo base_url("ControllerFront/Index") ?>">Home</a></li>
                <li><a href="<?php echo base_url("ControllerFront/RegimeJournalier") ?>">Votre regime journalier</a></li>
                <li><a href="<?php echo base_url("ControllerFront/Profile") ?>">Profil</a></li>
                <li><a href="<?php echo base_url("ControllerFront/AjourCaisse") ?>"><?php echo $user->getPorteFeuille()->getMontant() ?> ar +</a></li>
                <li><a href="<?php echo base_url("ControllerFront/Deconnexion") ?>">Deconnexion</a></li>
                </ul>
            </div>
        </header>
        <main>
		<div class="container">
            <div class="col-md-6 col-lg-5">
                
                <div class="icon d-flex align-items-center justify-content-center">
                    <span class="fa fa-user-o"></span>
                </div>
                <h3 class="text-center mb-4">
                    <strong>
                        <?php echo $user->getNom() ?>
                    </strong>
                </h3>
                    <div class="form-group d-md-flex">
                        <p>
                            <strong>
                                Email :
                            </strong>
                            <?php echo $user->getEmail() ?>
                        </p>
                    </div>
                    <hr>
                    <div class="form-group">
                        <p>
                            <strong>
                                Genre :
                            </strong>
                            <?php echo $profile->getGenreLettre() ?>
                        </p>
                    </div>
                    <div class="form-group">
                        <p>
                            <strong>
                                Votre taille :
                            </strong>
                            <?php echo $profile->getTaille() ?>
                        </p>
                    </div>
                    <div class="form-group">
                        <p>
                            <strong>
                                Votre Poids :
                            </strong>
                            <?php echo $profile->getPoids() ?>
                        </p>
                    </div>
                    <div class="form-group">
                        <p>
                            <strong>
                                Votre date de naissance :
                            </strong>
                            <?php echo $profile->getDateNaissance() ?>
                        </p>
                    </div>
                    <hr>
                    <div class="form-group">
                        <p>
                            <strong>
                                Votre objectif :
                            </strong>
                            <?php echo $user->getTypeObjectif()->getNom() ?>
                        </p>
                    </div>
                    <div class="form-group">
                        <ul>
                            <?php foreach ($user->getObjectifUtilisateurs() as $objectif) { ?>
                                <li>-> <?php echo $objectif->getObjectif()->getNom() ?></li>
                            <?php } ?>
                        </ul>
                    </div>
            </div>
			
		</div>
        </main>
    </div>
</body>
</html>