<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
        <div class="login-wrap p-4 p-md-5">
            <h3 class="text-center mb-4">Ajouter une Activite sportive ?</h3>
            <form action="<?php echo base_url("ControllerAdmin/insertNewActivite")?>" method="post" class="login-form">
                <div class="form-group">
                    <input type="text" class="form-control rounded-left" placeholder="Nom de l Activite" name="nomActivite" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary rounded submit p-3 px-5" name="Ajouter" >Ajouter Activite</button>
                </div>
            </form>
        </div>
    </div>
</div>