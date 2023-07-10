	<div class="content">
		<section class="ftco-section">
			<div class="container">
			<h3><b>Liste Type Enchainement</b></h3>
				<hr>
				<div><button><a href="<?php echo base_url("ControllerAdmin/nouveauTypeEnchainement");?>">Ajouter Nouveau</a></button></div>
				<table>
					<thead>
						<tr>
							<th>Type Enchainement</th>
							<th></th>
							<th> </th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($listeTypeEnchainement as $type){ ?>
							<tr>
								<td><?php echo $type->getNom();?></td>
								<td><button><a href="<?php echo base_url("ControllerAdmin/editTypeEnchainement?idTypeEnchainement=".$type->getIdTypeEnchainement());?>">Modifier</a></button></td>
								<td><button><a href="">Supprimer</a></button></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>			
			</div>
		</section>
	</div>