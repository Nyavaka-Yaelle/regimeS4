<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
        <div class="login-wrap p-4 p-md-5">
                <h3 class="text-center mb-4">Modifier cet Enchainement ?</h3>
                    <form action="<?php echo base_url("ControllerAdmin/modifierEnchainement")?>" method="post" class="login-form">
                        <div class="form-group">
                            <select name="idTypeEnchainement" class="form-control rounded-left">
                            <?php foreach($listeTypeEnchainement as $type){ ?>
                                <option value="<?php echo $type->getIdTypeEnchainement();?>"><?php echo $type->getNom();?></option>
                               <?php } ?>
                            </select>
                        </div>
                        <?php //var_dump($typeEnchainement);?>
                        <div class="form-group">
                            <input type="text" value="<?php echo $Enchainement->getNom();?>" class="form-control rounded-left" placeholder="Nom d Enchainement" name="nomEnchainement" required>

                            <input type="hidden" value="<?php echo $Enchainement->getIdEnchainement();?>" name="idEnchainement" >
                        </div>
                        <div class="form-group d-flex">
                            <input type="number" class="form-control rounded-left" placeholder="Duree enchainement" name="dureeEnchainement" required value="<?php echo $Enchainement->getDuree();?>">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary rounded submit p-3 px-5" name="Ajouter" >Modifier Enchainement</button>
                        </div>
                </form>
        </div>
    </div>
</div>