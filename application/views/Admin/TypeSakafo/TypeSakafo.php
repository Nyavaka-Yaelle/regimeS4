	<div class="content">
		<section class="ftco-section">
			<div class="container">
			<h3><b>Liste Type Sakafo</b></h3>
				<hr>
				<div><button><a href="<?php echo base_url("ControllerAdmin/nouveauTypeSakafo");?>">Ajouter Nouveau</a></button></div>
				<table>
					<thead>
						<tr>
							<th>Type Sakafo</th>
							<th>Type Objectif</th>
							<th></th>
							<th> </th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($listeTypeSakafo as $type){ ?>
							<tr>
								<td><?php echo $type->getNom();?></td>
								<td><?php echo $type->getTypeObjectif()->getNom();?></td>
								<td><button><a href="<?php echo base_url("ControllerAdmin/editTypeSakafo?idTypeSakafo=".$type->getIdTypeSakafo());?>">Modifier</a></button></td>
								<td><button><a href="<?php echo base_url("ControllerAdmin/deleteTypeSakafo?idTypeSakafo=".$type->getIdTypeSakafo());?>">Supprimer</a></button></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>			
			</div>
		</section>
	</div>