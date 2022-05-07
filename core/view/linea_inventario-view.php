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
                            <i class="fa fa-list"></i> parametros lineas de inventarios
                            <a class="btn btn-primary" a href="?view=new_item_inventario">
                                <i class="fa fa-plus" aria-hidden="true"></i> Registrar item</a>
                            <button class="btn btn-info dropdown-toggle" type="button" id="MenuHerramienta" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-download"></i> Exportar
                            </button>
                            <div class="dropdown-menu bg-light" class="Menu_herramienta_inventario" aria-labelledby="MenuHerramienta" id="Menu_herramienta_inventario">

                            </div>
                            <a class="btn btn-success btn_importar_inventario text-light" data-target="#modal_importar_inventario" id="btn_importar_inventario">
                                  <i class="fa fa-upload" aria-hidden="true"></i> importar</a>
                        </div>
                    </h4>
                    <hr>
                    <div class="table-responsive">
  
                        <?php
                        $linea = LineaInventarioModel::GetAll();
                        if (count($linea) > 0) {
                        ?>
                            <!--Aqui va la tabla-->
                            <table id="tabla_inventario" class="table table-sm table-striped table-bordered table-hover ">
                                <thead class="text-light bg-nav">
                                    <tr>
                                        <th style="width:80px">Linea</th>
                                        <th style="width:100px">Grupo</th>
                                        <th style="width:100px">cta inventario</th>
                                        <th style="width:150px">cta costo</th>
                                        <th style="width:90px">cta venta</th>
                                        <th style="width:100px">cta devolucion</th>
                                        <th style="width:80px">cta compra</th>
                                        <th style="width:50px">cta deb ja</th>
                                        <th style="width:50px">cta cred aj</th>
                                        <th style="width:50px">cta ivadif vta</th>
                                        <th style="width:50px">cta ivadif comp</th>
                                        <th style="width:50px">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($linea as $linea) {
                                        $grupo = GrupoModel::GetByCodigo($linea->idGrupo);
                                        $lineas = LineaModel::GetByCodigo($linea->idLinea);
                                    ?>
                                        <tr>
                                            <td><?php echo $lineas->codigo.' '. $lineas->nombre ; ?></td>
                                            <td><?php echo $grupo->codigo.' '. $grupo->nombre ;  ?></td>
                                            <td><?php echo $linea->cta_inventario; ?></td>
                                            <td><?php echo $linea->cta_costo; ?></td>
                                            <td><?php echo $linea->cta_venta; ?></td>
                                            <td><?php echo $linea->cta_devolucion; ?></td>
                                            <td><?php echo $linea->cta_compra; ?></td>
                                            <td><?php echo $linea->cta_deb_ja; ?></td>
                                            <td><?php echo $linea->cta_cred_aj; ?></td>
                                            <td><?php echo $linea->cta_ivadif_vta; ?></td>
                                            <td><?php echo $linea->cta_ivadif_comp; ?></td>
                                            <td>
                                                <a href="<?php echo "./?view=edit_inventario&id=".$linea->id; ?>" class="btn btn-info btn-circle btn-sm" title="Editar" data-toggle="tooltip" data-placement="top" data-method="DELETE"><i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="#" class="btn_eliminar_inventario btn btn-danger btn-circle btn-sm" title="Eliminar inventario" data-id="<?php echo $linea->id; ?>" data-toggle="tooltip" data-placement="top" data-method="DELETE"><i class="fa fa-trash"></i>
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
                                    <b>No hay parametros de inventario</b>
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
        <!--VENTANA MODAL IMPORTAR INVENTARIO-->
        <div id="modal_importar_inventario" class="modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-nav">
                                <h5 class="modal-title text-light"><i class="fa fa-upload" aria-hidden="true"></i> </a>Importar parametros de inventario</h5>
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
