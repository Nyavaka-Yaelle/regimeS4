	<div class="content">
		<section class="ftco-section">
			<div class="container">
			<h3><b>Liste Enchainement</b></h3>
				<hr>
				<div><button><a href="<?php echo base_url("ControllerAdmin/nouveauEnchainement");?>">Ajouter Nouveau</a></button></div>
				<table>
					<thead>
						<tr>
							<th>Type Enchainement</th>
							<th>Nom Enchainement</th>
							<th>Duree</th>
							<th> </th>
							<th> </th>
						</tr>
					</thead>
					<tbody>
					<?php foreach($listeEnchainement as $enchainement){ ?>
							<tr>
								<td><?php echo $enchainement->getTypeEnchainement()->getNom();?></td>
								<td><?php echo $enchainement->getNom();?></td>
								<td class="right"><?php echo $enchainement->getDuree(); ?> min</td>
								<td><button><a href="<?php echo base_url("ControllerAdmin/editEnchainement?idEnchainement=".$enchainement->getIdEnchainement());?>">Modifier</a></button></td>
								<td><button><a href="<?php echo base_url("ControllerAdmin/deleteEnchainement?idEnchainement=".$enchainement->getIdEnchainement());?>">Supprimer</a></button></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>			
			</div>
		</section>
	</div>