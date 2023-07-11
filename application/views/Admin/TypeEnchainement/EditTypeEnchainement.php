<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
        <div class="login-wrap p-4 p-md-5">
                <h3 class="text-center mb-4">Modifier ce Type enchainement ?</h3>
                    <form action="<?php echo base_url("ControllerAdmin/modifierTypeEnchainement")?>" method="post" class="login-form">
                        <div class="form-group">
                            <select name="idTypeObjectif" class="form-control rounded-left">
                            <?php foreach($typeObjectif as $type){ ?>
                                <option value="<?php echo $type->getIdTypeObjectif();?>"><?php echo $type->getNom();?></option>
                               <?php } ?>
                            </select>
                        </div>
                        <?php //var_dump($typeEnchainement);?>
                        <div class="form-group">
                            <input type="text" value="<?php echo $typeEnchainement->getNom();?>" class="form-control rounded-left" placeholder="Nom du type d'enchainement" name="nomTypeEnchainement" required>

                            <input type="hidden" value="<?php echo $typeEnchainement->getIdTypeEnchainement();?>" name="idTypeEnchainement" >
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary rounded submit p-3 px-5" name="Ajouter" >Ajouter type d'enchainement</button>
                        </div>
                </form>
        </div>
    </div>
</div>