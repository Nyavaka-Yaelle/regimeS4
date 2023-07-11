<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style2.css">
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
                <li><a href="<?php echo base_url("ControllerFront/AjourCaisse") ?>">0 ar +</a></li>
                <li><a href="<?php echo base_url("ControllerFront/Deconnexion") ?>">Deconnexion</a></li>
                </ul>
            </div>
        </header>
        <main>
        <section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="">
		      	        <div class="icon d-flex align-items-center justify-content-center">
		      		        <span class="fa fa-user-o"></span>
		      	        </div>
		      	        <h3 class="text-center mb-4">
                            Fitia Lalaina
				        </h3>
						<form action="Objectif.html" class="login-form">
							<div class="form-group d-md-flex">
                                 <p>Email : Test@gmail.com</p>
							</div>
                            <hr>
		      		        <div class="form-group">
                                <p>
                                    Genre : Homme
                                </p>
		      		        </div>
                            <div class="form-group">
                                <p>Votre taille : 180 cm</p>
                            </div>
                            <div class="form-group">
                                <p>Votre poids : 75 Kg</p>
                            </div>
                            <div class="form-group">
                                <p>Votre date de naissances : 20 Dec 2003</p>
                            </div>
                            <hr>
                            <div class="form-group">
                                <p>Votre date objectif : Perdre du poids</p>
                            </div>
                            <div class="form-group">
                                <ul>
                                    <li>Ventre et taille</li>
                                    <li>Bras et epaules</li>
                                </ul>
                            </div>
	                    </form>
	                </div>
				</div>
			</div>
		</div>
	</section>
        </main>
    </div>
</body>
</html>