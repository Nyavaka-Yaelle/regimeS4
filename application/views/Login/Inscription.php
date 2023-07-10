<!DOCTYPE html>
<html class="text-center" lang="en" style="height: 797px;">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Inscription</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/Login.css">
</head>

<body id="body_inscription">
    <section class="register-photo">
        <div data-aos="fade-up" data-aos-duration="850" data-aos-delay="150" class="form-container">
            <div id="img_inscription" class="image-holder">
            </div>
            <form method="POST" action="<?php echo base_url("ControllerHome/SingUp") ?>" >
                <h2 class="text-center">
                    <strong>INSCRIPTION</strong>
                </h2>

                <div class="mb-3">
                    <label for="">Nom</label>
                    <input class="form-control" type="text" name="name" placeholder="Nom" required>
                </div>
                <div class="mb-3"></div>

                <div class="mb-3">
                    <label for="">Email</label>
                    <input class="form-control" type="email" name="email" placeholder="Email" required>
                </div>
                <div class="mb-3"></div>

                <div class="mb-3">
                    <label for="">Mot de passe</label>

                    <input class="form-control" type="password" name="password" placeholder="Mot de passe" required>
                </div>
                <div class="mb-3"></div>

                <div class="mb-3">
                    <label for="">Confirmaton</label>

                    <input class="form-control" type="password" name="password2" placeholder="Confirmation Mot de passe" required>
                </div>

                <div class="mb-3"></div>
                <div class="mb-3">
                    <button class="btn btn-primary d-block w-100" type="submit" name="inscription">S'inscrire</button>
                </div>
                <a class="already" href="<?php echo base_url("ControllerHome/Index") ?>">Login</a>
            </form>

        </div>
    </section>
</body>

</html>