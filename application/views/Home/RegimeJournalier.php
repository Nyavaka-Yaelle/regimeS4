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
                            <button id="buttonPdf">Exporter en PDF</button>
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
    <script src="<?php echo base_url() ?>assets/jsPdf/Chart.min.js"></script>
    <script src="<?php echo base_url() ?>assets/jsPdf/html2pdf.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>assets/jsPdf/jquery.min.js"></script>
    <script>
        const options = {
            margin: 0.3,
            filename: 'filename.pdf',
            image: { 
            type: 'jpeg', 
            quality: 0.98 
            },
            html2canvas: { 
            scale: 2 
            },
            jsPDF: { 
            unit: 'in', 
            format: 'a4', 
            orientation: 'portrait' 
            }
        }
        
        var objstr = document.getElementById('block1').innerHTML;
        var objstr1 = document.getElementById('block2').innerHTML;
        
        var strr = '<html><head><title>Testing</title>';   
        strr += '</head><body>';
        strr += '<div style="border:0.1rem solid #ccc!important;padding:0.5rem 1.5rem 0.5rem 1.5rem;margin-top:1.5rem">'+objstr+'</div>';
        strr += '<div style="border:0.1rem solid #ccc!important;padding:0.5rem 1.5rem 0.5rem 1.5rem;margin-top:1.5rem">'+objstr1+'</div>';
        strr += '</body></html>';
        
        $('.btn-download').click(function(e){
            e.preventDefault();
            var element = document.getElementById('demo');
            //html2pdf().from(element).set(options).save();
            //html2pdf(element);
            html2pdf().from(strr).set(options).save();
        });
    </script>	
</body>
</html>