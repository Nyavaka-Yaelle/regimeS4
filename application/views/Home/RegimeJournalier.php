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
                <li><a href="<?php echo base_url("ControllerFront/AjourCaisse") ?>">0 ar +</a></li>
                <li><a href="<?php echo base_url("ControllerFront/Deconnexion") ?>">Deconnexion</a></li>
                </ul>
            </div>
        </header>
        <main>
            <fieldset id="accordion">
                <?php foreach($regimeJournaliers as $regimeJournalier){ ?>
                <label>
                    <span style="width:100%;">jour <?php echo $regimeJournalier->getNumeroJour() + 1 ?></span>
                    <input type="radio" value="bar<?php echo $regimeJournalier->getNumeroJour() + 1 ?>" name="accordion">
                    <div>
                        <p>
                            <label>votre repas du jour : <?php echo $regimeJournalier->getSakafo()->getNom() ?> </label>
                            <br>
                            <label>prix: <?php echo $regimeJournalier->getSakafo()->getPrix() ?> </label>
                            <br>
                            <label>votre entrainement : 
                                <?php foreach ($regimeJournalier->getEnchainement() as $enchainement) { ?>
                                    <strong>-> </strong> <?php echo $enchainement->getNom() ?> <b> pendant : <?php echo $enchainement->getDuree() ?> min </b>
                                    <br>
                                <?php } ?>
                            </lable>
                        </p>
                    </div>
                </label>
                <?php } ?>
            </fieldset>
        </main>
    </div>
</body>
</html>