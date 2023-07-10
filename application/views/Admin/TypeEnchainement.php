	<div class="content">
		<section class="ftco-section">
			<div class="container">
				<table>
					<thead>
						<tr>
							<th>Type Enchainement</th>
							<th></th>
							<th> </th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($listeTypeEnchainement as $typeEnchainement){ ?>
							<tr>
								<td><?php echo $typeEnchainement->getNom();?></td>
								<td><button><a href="">Modifier</a></button></td>
								<td><button><a href="">Supprimer</a></button></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>			
			</div>
		</section>
	</div>