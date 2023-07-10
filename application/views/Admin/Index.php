<!doctype html>
<html lang="en">
  <head>
  	<title>Regimes backOffice</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="<?php echo base_url("assets/css/style.css") ?>">
	<style>
    table {
        border-collapse: collapse;
        width: 100%;
        max-width: 800px;
        margin: 0 auto;
    }
    th, td {
        padding: 10px;
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
    body {
        margin: 0;
        padding: 0;
    }
    .header {
        background-color: #6f42c1;
        color: #fff;
        padding: 20px;
        text-align: center;
    }
    .header h1 {
        margin: 0;
    }
	.header h2 {
        text-align: left;
        padding: 5px;
		color:white;
		font-weight:bold;
    }
	.logo {
        
    }
    .navbar {
        background-color: #f5f5f5;
        padding: 10px;
		width:max-content;
		margin:0 auto;
    }
    .navbar ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
    }
    .navbar li {
        margin-right: 10px;
    }
    .navbar a {
        color: #6f42c1;
        text-decoration: none;
        padding: 5px 10px;
        border-radius: 3px;
    }
    .navbar a:hover {
        background-color: #6f42c1;
        color: #fff;
    }
	.content {
        flex-grow: 1;
        padding: 20px;
    }
    .footer {
        background-color: #6610f2;
        color: #fff;
        padding: 20px;
        text-align: center;
		left:0;
		bottom:0;
		position: fixed;
		width:100vw;
    }
	.right{
		text-align:right;
	}
    @media (max-width: 768px) {
        .header {
            padding: 10px;
        }
        .navbar {
            padding: 5px;
        }
        .navbar ul {
            flex-wrap: wrap;
            justify-content: center;
        }
        .navbar li {
            margin: 5px;
        }
    }
</style>
</head>
<body>	
	<header class="header">
		<h2><em>Re<small>gime</small> </em></h2>
	</header>
	<nav class="navbar">
		<ul>
			<li><a href="<?php echo base_url("ControllerAdmin/content?action=1")?>">Type Sakafo</a></li>
			<li><a href="<?php echo base_url("ControllerAdmin/content?action=11")?>">Sakafo</a></li>
			<li><a href="<?php echo base_url("ControllerAdmin/content?action=2")?>">Type Enchainement</a></li>
			<li><a href="<?php echo base_url("ControllerAdmin/content?action=21")?>">Enchainement</a></li>
		</ul>
	</nav>
	<div class="content">
		<?php //var_dump($listeSakafo);?>
		<section class="ftco-section">
			<div class="container">
				<table>
					<thead>
						<tr>
							<th>Type Sakafo</th>
							<th>Nom sakafo</th>
							<th>Prix</th>
							<th> </th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($listeSakafo as $sakafo){ ?>
							<tr>
								<td><?php echo $sakafo->getTypeSakafo()->getNom();?></td>
								<td><?php echo $sakafo->getNom();?></td>
								<td class="right"><?php echo $this->Formater->format($sakafo->getPrix());?> Ar</td>
								<td><button><a href="<?php echo base_url("ControllerAdmin/modifierSakafo?idSakafo=".$sakafo->getIdSakafo())?>">Modifier</a></button></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>			
			</div>
		</section>
	</div>
	<footer class="footer">
    	<small>Copyright Regime &copy 2023</small>
	</footer>
		<script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/popper.js"></script>
		<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/main.js"></script>	
	</body>
</html>

