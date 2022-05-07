<?php
if (isset($_SESSION)) {
    $Usuario = UsuarioModel::GetByDocumento($_SESSION['noDocumento']);
    if($Usuario->idTipoUsuario==1){
?>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <br> <br>
                    <h4>
                        <div class="dropdown">
                            <i class="fa fa-list"></i> Catalogo de productos
                            <a class="btn bg-nav text-light" a href="?view=new_catalogo">
                                <i class="fa fa-plus" aria-hidden="true"></i> Registrar producto</a>
                            <button class="btn btn-info dropdown-toggle" type="button" id="MenuHerramienta" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-download"></i> Exportar
                            </button>
                            <div class="dropdown-menu bg-light" class="Menu_herramienta_catalogo" aria-labelledby="MenuHerramienta" id="Menu_herramienta_catalogo">

                            </div>
                            <a class="btn btn-success btn_importar_catalogo text-light" data-target="#modal_importar_catalogo" id="btn_importar_catalogo">
                                  <i class="fa fa-upload" aria-hidden="true"></i> importar</a>
                        </div>
                    </h4>
                    <hr>
                    <div class="table-responsive">
                    <div class="loader-page"></div>   
                        <?php
                        $catalogo = CatalogoModel::GetAll();
                        if (count($catalogo) > 0) {
                        ?>
                            <!--Aqui va la tabla-->
                            <table id="tabla_catalogo" class="table table-sm table-striped table-bordered table-hover ">
                                <thead class="text-light bg-nav">
                                    <tr>
                                        <th style="width:190px">Referencia fabrica</th>
                                        <th style="width:300px">Descripcion</th>
                                        <th style="width:150px">Linea</th>
                                        <th style="width:150px">Grupo</th>
                                        <th style="width:90px">Elemento</th>
                                        <th style="width:100px">Codigo Siigo</th>
                                        <th style="width:80px">Aj marca</th>
                                        <th style="width:50px">Unidad</th>
                                        <th style="width:50px">Peso</th>
                                        <th style="width:50px">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($catalogo as $catalogo) {
                                        $grupo = GrupoModel::GetByCodigo($catalogo->idGrupo);
                                        $linea = LineaModel::GetByCodigo($catalogo->idLinea);
                                    ?>
                                        <tr>
                                            <td><?php echo $catalogo->referencia_fabrica; ?></td>
                                            <td ><?php echo $catalogo->descripcion; ?></td>
                                            <td><?php echo $linea->codigo.' '.$linea->nombre; ?></td>
                                            <td><?php echo $grupo->codigo.' '.$grupo->nombre; ?></td>
                                            <td><?php echo $catalogo->elemento; ?></td>
                                            <td><?php echo $catalogo->codigo_siigo; ?></td>
                                            <td><?php echo $catalogo->ajustable_marca; ?></td>
                                            <td><?php echo $catalogo->unidad; ?></td>
                                            <td><?php echo $catalogo->peso; ?></td>
                                            <td>
                                                <a href="<?php echo "./?view=edit_catalogo&id=".$catalogo->id; ?>" class="btn btn-info btn-circle btn-sm" title="Editar" data-toggle="tooltip" data-placement="top" data-method="DELETE"><i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="#" class="btn_eliminar_producto btn btn-danger btn-circle btn-sm" title="Eliminar producto" data-id="<?php echo $catalogo->id; ?>" data-toggle="tooltip" data-placement="top" data-method="DELETE"><i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        <?php } else { ?>
                            <div class="alert alert-danger">
                                <span>
                                    <b>No hay productos en el catalogo</b>
                                </span>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>
        <!--VENTANA MODAL IMPORTAR CATALOGO-->
        <div id="modal_importar_catalogo" class="modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-nav">
                                <h5 class="modal-title text-light"><i class="fa fa-upload" aria-hidden="true"></i> </a>Importar catalogo</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                            </div>
                        </div>
                    </div>
                </div>
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
