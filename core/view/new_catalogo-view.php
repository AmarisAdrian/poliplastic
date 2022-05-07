<?php
if (isset($_SESSION)) {
    $Usuario = UsuarioModel::GetByDocumento($_SESSION['noDocumento']);
    if ($Usuario->idTipoUsuario == 1) {?>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <br> <br>
                        <h5><i class="fa fa-address-card"></i> Datos de producto</h5>
                        <hr>
                       <?php  $grupo = GrupoModel::GetAll();
                              $linea = LineaModel::GetAll(); ?>
                        <form class="form-horizontal" id="add_producto" action="./?view=add_catalogo" method="POST" role="form">
                            <br />
                            <div class="row">
                            <div class="col-lg-4 col-md-4">
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
                            <div class="col-lg-4 col-md-4">
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
                            <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><b>Elemento * </b></label>
                                        <input class="form-control text-uppercase" name="elemento" id="elemento" type="text"  required />
                                    </div>
                                </div>
                        </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><b>Referencia de fabrica *</b></label>
                                        <input class="form-control text-uppercase" name="referencia_fabrica" id="referencia_fabrica" type="text" required />
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8">
                                    <div class="form-group">
                                        <label class="control-label"><b>Descripcion *</b></label>
                                        <input class="form-control text-uppercase" name="descripcion" id="descripcion" type="text"  required />
                                    </div>
                                </div>
                            </div>   
                            <div class="row">
                                <div class="col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label class="control-label"><b>Codigo siigo * </b></label>
                                        <input class="form-control text-uppercase" name="codigo_siigo" id="codigo_siigo" type="text" readonly />
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-2">
                                    <div class="form-group">
                                        <label class="control-label"><b>Ajustable marca * </b></label>
                                        <input class="form-control text-uppercase" name="ajustable_marca" id="ajustable_marca" type="text"  required />
                                    </div>
                                </div>
                                <div class="col-lg- col-md-3">
                                    <div class="form-group">
                                        <label class="control-label"><b>Unidad* </b></label>
                                        <input class="form-control text-uppercase" name="unidad" id="unidad" type="text"  required />
                                    </div>
                                </div>
                                <div class="col-lg- col-md-3">
                                    <div class="form-group">
                                        <label class="control-label"><b>Peso* </b></label>
                                        <input class="form-control text-uppercase" name="peso" id="peso" type="text"  required />
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