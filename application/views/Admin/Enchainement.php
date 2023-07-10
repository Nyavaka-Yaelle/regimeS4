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