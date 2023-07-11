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
        <fieldset id="accordion">
            <?php foreach($regimeJournaliers as $regimeJournalier){ ?>
            <label>
                <span>jour <?php echo $regimeJournalier->getNumeroJour() + 1 ?></span>
                <input type="radio" value="bar1" name="accordion">
                <div>
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Labore impedit ducimus sequi quis voluptatem id aliquid quod distinctio, maiores iste eos fugiat aliquam minima sed? Numquam tempora, quaerat illo error deserunt ad, possimus repudiandae tempore corporis eaque magnam consequuntur nisi?
                    </p>
                </div>
            </label>
            <?php } ?>
        </fieldset>
        </main>
    </div>
</body>
</html>