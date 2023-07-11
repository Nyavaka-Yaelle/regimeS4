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
            <fieldset id="accordion" >
            <label>
                    <span style="width:100%;">Exporter en pdf</span>
                    <input type="radio" value="bar" name="accordion">
                    <div>
                        <p>
                            <button>Exporter en PDF</button>
                        </p>
                    </div>
                </label>
                <br>
                <?php foreach($regimeJournaliers as $regimeJournalier){ ?>
                <label>
                    <span>jour <?php echo $regimeJournalier->getNumeroJour() + 1 ?></span>
                    <input type="radio" value="bar<?php echo $regimeJournalier->getNumeroJour() + 1 ?>" name="accordion">
                    <div>
                        <p>
                            <label>votre repas du jour : <i><b><?php echo $regimeJournalier->getSakafo()->getNom() ?> </b></i></label>
                            <br>
                            <label>prix: <?php echo $regimeJournalier->getSakafo()->getPrix() ?> </label>
                            <?php foreach ($regimeJournalier->getSakafo()->getCompoSakafo() as $compoSakafo) { ?>
                                <br>
                                    <strong>-> </strong> <?php echo $compoSakafo->getNomComp() ?> <b> Quantite : <?php echo $compoSakafo->getQuantite() ?> % </b>
                                <?php } ?>
                            <label></label>
                            <br>
                            <label>votre entrainement : 
                                <?php foreach ($regimeJournalier->getEnchainement() as $enchainement) { ?>
                                    <br>
                                    <strong>-> </strong> <?php echo $enchainement->getNom() ?> <b> pendant : <?php echo $enchainement->getDuree() ?> min </b>
                                <?php } ?>
                            </label>
                        </p>
                    </div>
                </label>
                <br>
                <?php } ?>
            </fieldset>
        </main>
    </div>
</body>
</html>