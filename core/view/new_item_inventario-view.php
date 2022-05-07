<?php
if (isset($_SESSION)) {
    $Usuario = UsuarioModel::GetByDocumento($_SESSION['noDocumento']);
    if($Usuario->idTipoUsuario==1){
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <br > <br>
                <h5><i class="fa fa-plus" aria-hidden="true"></i> Nuevo Item</h5>
                <hr>
                <?php
                $linea = LineaModel::GetAll();
                $grupo = GrupoModel::GetAll();

                if (($linea) && ($grupo)) {
                ?>
                    <form class="form-horizontal" id="add_inventario" action="./?view=add_inventario" method="POST" role="form">
                        <br />
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="control-label"><b>Grupo * </b></label>
                                    <select class="form-control" name="idGrupo" id="idGrupo" required>
                                        <option value="">Selecione una opcion</option>
                                        <?php
                                        foreach ($grupo as $grupo) {
                                        ?>
                                            <option value="<?php echo $grupo->codigo; ?> ">
                                            <?php echo $grupo->codigo; ?> <?php echo $grupo->nombre; ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="control-label"><b>Linea * </b></label>
                                    <select class="form-control" name="idLinea" id="idLinea" required>
                                        <option value="">Selecione una opcion</option>
                                        <?php
                                        foreach ($linea as $linea) {
                                        ?>
                                            <option value="<?php echo $linea->codigo; ?> ">
                                            <?php echo $linea->codigo; ?> <?php echo $linea->nombre; ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="control-label"><b>Cuenta inventario *</b></label>
                                    <input class="form-control" name="cta_inventario" id="cta_inventario" type="number" placeholder="Cuenta inventario " required />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="control-label"><b>Cuenta costo * </b></label>
                                    <input class="form-control" name="cta_costo" id="cta_costo" type="text" placeholder="Cuenta costo" required />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="control-label"><b>Cuenta venta *</b></label>
                                    <input class="form-control" name="cta_venta" id="cta_venta" type="number" placeholder="Cuenta venta " required />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="control-label"><b>Cuenta devolucion * </b></label>
                                    <input class="form-control" name="cta_devolucion" id="cta_devolucion" type="text" placeholder="Cuenta devolucion" required />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="control-label"><b>Cuenta compra *</b></label>
                                    <input class="form-control" name="cta_compra" id="cta_compra" type="number" placeholder="Cuenta compra " required />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="control-label"><b>Cuenta deb-ja * </b></label>
                                    <input class="form-control" name="cta_deb_ja" id="cta_deb_ja" type="text" placeholder="Cuenta deb-ja" required />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="control-label"><b>Cuenta cred-ja  *</b></label>
                                    <input class="form-control" name="cta_cred_aj" id="cta_cred_aj" type="number" placeholder="cuenta cred_aj " required />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="control-label"><b>Cuenta ivadif_vta-ja * </b></label>
                                    <input class="form-control" name="cta_ivadif_vta" id="cta_ivadif_vta" type="text" placeholder="Cuenta ivadif_vta-ja " required />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="control-label"><b>Cuenta ivadif-comp-ja  *</b></label>
                                    <input class="form-control" name="cta_ivadif_comp" id="cta_ivadif_comp" type="number" placeholder="Cuenta ivadif-comp-ja" required />
                                </div>
                            </div>
    
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="category">* Campo Requerido</div>
                                <div class="card-footer bg-transparent text-right">
                                    <button type="submit" class="btn bg-nav text-light btn-fill btn-wd">Guardar</button>
                                    <input class="btn btn-secondary" type="reset" value="Limpiar">
                                </div>
                            </div>
                        </div>
                    </form>
                <?php } else { ?>
                    <div class="alert alert-danger">
                        <span>
                            <b>Error de base de datos.Hay datos vacios</b>
                        </span>
                    </div>
                <?php } ?>
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
<?php } }else{ ?>
    <div class="alert alert-danger">
        <span>
            <b>No tiene autorizacion para visualizar el modulo</b>
        </span>
    </div>
<?php } ?>
