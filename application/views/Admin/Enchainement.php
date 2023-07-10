	<div class="content">
		<section class="ftco-section">
			<div class="container">
				<h3><b>Liste Enchainement</b></h3>
				<hr>
				<table>
					<thead>
						<tr>
							<th>Nom Enchainement</th>
							<th>Type Enchainement</th>
							<th>duree</th>
							<th> </th>
							<th> </th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($listeEnchainement as $enchainement){ ?>
							<tr>
								<td><?php echo $enchainement->getNom();?></td>
								<td><?php echo $enchainement->getTypeEnchainement()->getNom();?></td>
								<td class="right"><?php echo $enchainement->getDuree();?> min</td>
								<td><button><a href="">Modifier</a></button></td>
								<td><button><a href="">Supprimer</a></button></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>			
			</div>
		</section>
	</div>