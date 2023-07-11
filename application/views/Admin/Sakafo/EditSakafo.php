<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
        <div class="login-wrap p-4 p-md-5">
                <h3 class="text-center mb-4">Modifier ce Type Sakafo ?</h3>
                    <form action="<?php echo base_url("ControllerAdmin/modifierTypeSakafo")?>" method="post" class="login-form">
                        <div class="form-group">
                            <select name="idTypeObjectif" class="form-control rounded-left">
                            <?php foreach($typeObjectif as $type){ ?>
                                <option value="<?php echo $type->getIdTypeObjectif();?>"><?php echo $type->getNom();?></option>
                               <?php } ?>
                            </select>
                        </div>
                        <?php //var_dump($typeSakafo);?>
                        <div class="form-group">
                            <input type="text" value="<?php echo $typeSakafo->getNom();?>" class="form-control rounded-left" placeholder="Nom du type d'Sakafo" name="nomTypeSakafo" required>

                            <input type="hidden" value="<?php echo $typeSakafo->getIdTypeSakafo();?>" name="idTypeSakafo" >
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary rounded submit p-3 px-5" name="Ajouter" >Modifier type Sakafo</button>
                        </div>
                </form>
        </div>
    </div>
</div>