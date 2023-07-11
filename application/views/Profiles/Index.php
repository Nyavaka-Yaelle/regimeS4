<!doctype html>
<html lang="en">
  <head>
  	<title>Profil</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="<?php echo base_url("assets/css/style.css") ?>">

	</head>
	<body>
		<section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-6 col-lg-5">
						<div class="login-wrap p-4 p-md-5">
					<div class="icon d-flex align-items-center justify-content-center">
						<span class="fa fa-user-o"></span>
					</div>
					<h3 class="text-center mb-4">Profil</h3>
						<form action="<?php echo base_url("ControllerProfiles/FillProfiles") ?>" class="login-form" method="post">
							<div class="form-group d-md-flex">
								<div class="w-50">
									<label class="checkbox-wrap checkbox-primary">Homme
										<input type="radio" name="genre" value="1" checked>
										<span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50">
									<label class="checkbox-wrap checkbox-primary">Femme
										<input type="radio" name="genre" value="0">
										<span class="checkmark"></span>
									</label>
								</div>
							</div>
							<div class="form-group">
								<p>Votre tailles : </p>
								<input type="text" class="form-control rounded-left" placeholder="Centimetres" name="taille" pattern="[0-9]+(\.[0-9]+)?" title="Please enter a numeric value" required>
							</div>
							<div class="form-group">
								<p>Votre poids : </p>
                                <input type="text" class="form-control rounded-left" placeholder="Kilogrammes" name="poids" pattern="[0-9]+(\.[0-9]+)?" title="Please enter a numeric value" required>
							</div>
							<div class="form-group">
								<p>Votre date de naissances : </p>
								<input type="date" class="form-control rounded-left"  name="dateNaissance" required>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary rounded submit p-3 px-5">Continuer</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
		<script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/popper.js"></script>
		<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/main.js"></script>	
	</body>
</html>

