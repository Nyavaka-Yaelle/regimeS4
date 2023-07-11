<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
        <div class="login-wrap p-4 p-md-5">
                <h3 class="text-center mb-4">Modifier ce Sakafo ?</h3>
                    <form action="<?php echo base_url("ControllerAdmin/modifierSakafo")?>" method="post" class="login-form">
                        <div class="form-group">
                            <select name="idTypeSakafo" class="form-control rounded-left">
                            <?php foreach($listeTypeSakafo as $type){ ?>
                                <option value="<?php echo $type->getIdTypeSakafo();?>"><?php echo $type->getNom();?></option>
                               <?php } ?>
                            </select>
                        </div>
                        <?php //var_dump($typeSakafo);?>
                        <div class="form-group">
                            <input type="text" value="<?php echo $sakafo->getNom();?>" class="form-control rounded-left" placeholder="Nom du type d'Sakafo" name="nomSakafo" required>

                            <input type="hidden" value="<?php echo $sakafo->getIdSakafo();?>" name="idSakafo" >
                        </div>
                        <div class="form-group d-flex">
                            <input type="number" class="form-control rounded-left" placeholder="Prix du plat" name="prixSakafo" required value="<?php echo $sakafo->getPrix();?>">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary rounded submit p-3 px-5" name="Ajouter" >Modifier Sakafo</button>
                        </div>
                </form>
        </div>
    </div>
</div>