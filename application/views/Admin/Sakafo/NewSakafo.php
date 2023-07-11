<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
        <div class="login-wrap p-4 p-md-5">
            <h3 class="text-center mb-4">Ajouter un Sakafo ?</h3>
            <form action="<?php echo base_url("ControllerAdmin/insertNewSakafo")?>" method="post" class="login-form">
                <div class="form-group">
                    <select name="idTypeSakafo" class="form-control rounded-left">
                        <?php foreach($typeSakafo as $type){ ?>
                        <option value="<?php echo $type->getIdTypeSakafo();?>"><?php echo $type->getNom();?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control rounded-left" placeholder="Nom du plat" name="nomSakafo" required>
                </div>
                <div class="form-group d-flex">
                <input type="number" class="form-control rounded-left" placeholder="Prix du plat" name="prixSakafo" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary rounded submit p-3 px-5" name="Ajouter" >Ajouter plat</button>
                </div>
            </form>
        </div>
    </div>
</div>