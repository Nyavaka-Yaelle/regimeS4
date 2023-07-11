<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
        <div class="login-wrap p-4 p-md-5">
                <h3 class="text-center mb-4">Modifier Enchainement dans Activite <?php echo $activite->getNom(); ?> ?</h3>
                    <form action="<?php echo base_url("ControllerAdmin/modifierActiviteEnchainement")?>" method="post" class="login-form">
                        <div class="form-group">
                            <select name="idEnchainement" class="form-control rounded-left">
                            <?php foreach($listeEnchainement as $enchainement){ ?>
                                <option value="<?php echo $enchainement->getIdEnchainement();?>"><?php echo $enchainement->getNom();?></option>
                               <?php } ?>
                            </select>
                        </div>
                        <?php //var_dump($typeEnchainement);?>
                        <div class="form-group">
                            <input type="hidden" name="idActivite" value="<?php echo $activite->getIdActivite(); ?>" required>
                            <input type="hidden" name="idActiviteEnchainement" value="<?php echo $activite->getIdActiviteEnchainement(); ?>" required>
                        </div>
                         <div class="form-group">
                            <button type="submit" class="btn btn-primary rounded submit p-3 px-5" name="Ajouter" >Modifier Enchainement</button>
                        </div>
                </form>
        </div>
    </div>
</div>