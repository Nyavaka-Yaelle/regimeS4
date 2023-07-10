	<div class="content">
		<section class="ftco-section">
			<div class="container">
			<h3><b>Liste Type Sakafo</b></h3>
			<div><button><a href="<?php echo base_url("ControllerAdmin/nouveauTypeSakafo");?>">Ajouter Nouveau</a></button></div>
				<hr>
				<table>
					<thead>
						<tr>
							<th>Nom Type Sakafo</th>
							<th>Type Objectif</th>
							<th> </th>
							<th> </th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($listeTypeSakafo as $typeSakafo){ ?>
							<tr>
								<td><?php echo $typeSakafo->getNom();?></td>
								<td><?php echo $typeSakafo->getTypeObjectif()->getNom();?></td>
								<td><button><a href="">Modifier</a></button></td>
								<td><button><a href="">Supprimer</a></button></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>			
			</div>
		</section>
	</div>