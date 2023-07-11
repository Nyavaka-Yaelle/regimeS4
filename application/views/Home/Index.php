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
        <div class="content">
            <div class="container">
                <div class="info">
                <h1>Bienvenue dans <b>Re</b>gime</h1>
                <p>Bonjour <?php echo $user->getNom() ?> on vous aide a gerer votre poids et votre alimentation</p>
                <form action="<?php echo base_url("ControllerFront/RegimeJournalier") ?>" method="post">
                <button type="submit">Commencer</button>
                </form>
            </div>
            <div class="image">
                <img src="https://i.postimg.cc/65QxYYzh/001234.png">
            </div>
            </div>
        </div>
    </main>
    </div>

</body>
</html> 