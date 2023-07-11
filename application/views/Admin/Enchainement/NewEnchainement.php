<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
        <div class="login-wrap p-4 p-md-5">
            <h3 class="text-center mb-4">Ajouter un Enchainement ?</h3>
            <form action="<?php echo base_url("ControllerAdmin/insertNewEnchainement")?>" method="post" class="login-form">
                <div class="form-group">
                    <select name="idTypeEnchainement" class="form-control rounded-left">
                        <?php foreach($typeEnchainement as $type){ ?>
                        <option value="<?php echo $type->getIdTypeEnchainement();?>"><?php echo $type->getNom();?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control rounded-left" placeholder="Nom de l enchainement" name="nomEnchainement" required>
                </div>
                <div class="form-group d-flex">
                <input type="number" class="form-control rounded-left" placeholder="Duree de l enchainement" name="dureeEnchainement" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary rounded submit p-3 px-5" name="Ajouter" >Ajouter Enchainement</button>
                </div>
            </form>
        </div>
    </div>
</div>