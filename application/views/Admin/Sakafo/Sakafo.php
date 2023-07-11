	<div class="content">
		<section class="ftco-section">
			<div class="container">
			<h3><b>Liste Sakafo</b></h3>
				<hr>
				<div><button><a href="<?php echo base_url("ControllerAdmin/nouveauTypeSakafo");?>">Ajouter Nouveau</a></button></div>
				<table>
					<thead>
						<tr>
							<th>Type Sakafo</th>
							<th>Nom sakafo</th>
							<th>Prix</th>
							<th> </th>
							<th> </th>
						</tr>
					</thead>
					<tbody>
					<?php foreach($listeSakafo as $sakafo){ ?>
							<tr>
								<td><?php echo $sakafo->getTypeSakafo()->getNom();?></td>
								<td><?php echo $sakafo->getNom();?></td>
								<td class="right"><?php echo $this->Formater->format($sakafo->getPrix());?> Ar</td>
								<td><button><a href="<?php echo base_url("ControllerAdmin/editSakafo?idSakafo=".$sakafo->getIdSakafo());?>">Modifier</a></button></td>
								<td><button><a href="<?php echo base_url("ControllerAdmin/deleteSakafo?idSakafo=".$sakafo->getIdSakafo());?>">Supprimer</a></button></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>			
			</div>
		</section>
	</div>