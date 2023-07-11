<!doctype html>
<html lang="en">
  <head>
  	<title>Liste Regime FrontOffice</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style2.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/style.css">
	<style>
    table {
        border-collapse: collapse;
        width: 100%;
        max-width: 800px;
        margin: 0 auto;
    }
    th, td {
        /* padding: 20px; */
        font-size:smaller;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    th {
        background-color: #f5f5f5;
        font-weight: bold;
    }
    tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    tr:hover {
        background-color: #f2f2f2;
    }
    
</style>
</head>
<body>	
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
    
    <div class="content">
		<section class="ftco-section">
            <div class="container">

        <div id="demo">
        <div class="border-bottom px-5 pt-5 pb-4" id="block1">
          <h3></h3>
        </div>
        <div class="px-5 pt-5 pb-4" id="block2"> 
			<h3><b>Votre regime</b></h3>
				<hr>
                <a href="javascript:void(0)" class="btn btn-download">Exporter en  PDF</a>
                <?php 
                
                foreach($regimeJournaliers as $regimeJournalier){ 
                var_dump($regimeJournalier);
                 } ?>
				<table>
					<thead>
						<tr>
							<th></th>
							<th>Jour1</th>
                            <th>Jour2</th>
							<th>Jour3</th>
							<th>Jour4</th>
                            <th>Jour5</th>
                            <th>Jour6</th>
                            <th>Jour7</th>
						</tr>
					</thead>
					<tbody>
                        <tr>
							<td>Repas</td>
					<?php	foreach($regimeJournaliers as $regimeJournalier) { ?>
							
                                <td>
                                    <?php echo $regimeJournalier->getSakafo()->getNom();?>
                                    <br/>
                                    <?php echo $regimeJournalier->getSakafo()->getPrix();?> Ar
                                </td>
                                <?php } ?>
							</tr>
                            <!-- Exercices -->
                            <?php foreach($regimeJournaliers as $regimeJournalier) {   ?>
                                <tr>
                                    <!-- <td>Exercices</td> -->
                                <?php foreach($regimeJournalier->getEnchainement() as $enchainement) { ?>
                                   <td><?php echo $enchainement->getNom() ?>  <br> (<?php echo $enchainement->getDuree() ?> min)</td>
                                   <?php } ?>
                                </tr>
                                
                                <?php }?>
							</tr>
					</tbody>
				</table>			
			</div>
			</div>
		</div>
    </section>
	</div>
    <footer class="footer">
    	<small>Copyright Regime &copy 2023</small>
	</footer>
		<script src="<?php echo base_url("assets/js/jquery.min.js")?>"></script>
		<script src="<?php echo base_url("assets/js/popper.js")?>"></script>
		<script src="<?php echo base_url("assets/js/bootstrap.min.js")?>"></script>
		<script src="<?php echo base_url("assets/jsPdf/html2pdf.bundle.min.js")?>"></script>
		<script src="<?php echo base_url("assets/jsPdf/jquery.min.js")?>"></script>
	</body>
</html>
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