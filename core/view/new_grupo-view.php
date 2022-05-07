<?php
if (isset($_SESSION)) {
    $Usuario = UsuarioModel::GetByDocumento($_SESSION['noDocumento']);
    if ($Usuario->idTipoUsuario == 1) {?>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <br> <br>
                        <h5><i class="fa fa-address-card"></i> Datos</h5>
                        <hr>
                        <form class="form-horizontal" id="add_grupo" action="./?view=add_grupo" method="POST" role="form">
                            <br />
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><b>Codigo * </b></label>
                                        <input class="form-control" name="codigo" id="codigo" type="text" placeholder="Codigo" required />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><b> Nombre * </b></label>
                                        <input class="form-control" name="nombre" id="nombre" type="text" placeholder="Nombres" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-12">
                                <div class="category">* Campo Requerido</div>
                                <div class="card-footer bg-transparent text-right">
                                    <button type="submit" class="btn bg-nav text-light btn-fill btn-wd">Guardar</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </section>
    <?php } else { ?>
        <div class="alert alert-danger">
            <span>
                <b>No tiene autorizacion para visualizar el modulo</b>
            </span>
        </div>
    <?php }
} else { ?>
    <div class="alert alert-danger">
        <span>
            <b>No tiene autorizacion para visualizar el modulo</b>
        </span>
    </div>
<?php } ?>