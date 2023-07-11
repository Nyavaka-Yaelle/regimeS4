<div class="content">
		<section class="ftco-section">
			<div class="container">
			<h3><b>Liste Enchainement par Activite</b></h3>
				<hr>
				<div><button><a href="<?php echo base_url("ControllerAdmin/nouvelleActivite");?>">Ajouter Nouveau Activite</a></button></div>
				<?php foreach($listeActivite as $activite) { ?>
					<div style="display:flex;padding:20px;">
						<h5><strong><?php echo $activite->getNom();?></strong></h5>
						<div><button ><a href="<?php echo base_url("ControllerAdmin/nouvelleActiviteEnchainement");?>">Ajouter Enchainement</a></button></div>
					</div>
					<table>
					<thead>
						<tr>
							<th rowspan=3>Activite</th>
							<th>Type Enchainement</th>
							<th>Nom Enchainement</th>
							<th>Duree</th>
							<th> </th>
							<th> </th>
						</tr>
					</thead>
					<tbody>
					<?php
						$activiteEnchainement = new ActiviteEnchainement(null,$activite->getIdActivite(), null);
						$listeEnchainement = $activiteEnchainement->getEnchainementsByIdActivite();
						foreach($listeEnchainement as $enchainement){ ?>
							<tr>
								<td><?php echo $enchainement->getTypeEnchainement()->getNom();?></td>
								<td><?php echo $enchainement->getNom();?></td>
								<td class="right"><?php echo $enchainement->getDuree(); ?> min</td>
								<td><button><a href="<?php echo base_url("ControllerAdmin/editActiviteEnchainement?idEnchainement=".$enchainement->getIdEnchainement()."&&idActivite=".$activite->getIdActivite());?>">Modifier</a></button></td>
								<td><button><a href="<?php echo base_url("ControllerAdmin/deleteActiviteEnchainement?idEnchainement=".$enchainement->getIdEnchainement()."&&idActivite=".$activite->getIdActivite());?>">Supprimer</a></button></td>
							</tr>
						<?php
                    } ?>
					</tbody>
				</table>
			<?php } ?>			
			</div>
		</section>
	</div>