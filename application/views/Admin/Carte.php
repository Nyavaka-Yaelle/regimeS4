	<div class="content">
		<section class="ftco-section">
			<div class="container">
				<h3><b>Liste Carte</b></h3>
				<hr>
				<table>
					<thead>
						<tr>
							<th>Code Carte</th>
							<th>Montant</th>
							<th> </th>
							<th> </th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($listeCarte as $carte){ ?>
							<tr>
								<td><?php echo $carte->getCode();?></td>
								<td><?php echo $montant->getMontant();?></td>
								<td><button><a href="">Modifier</a></button></td>
								<td><button><a href="">Supprimer</a></button></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>			
			</div>
		</section>
	</div>