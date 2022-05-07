<?php
if (isset($_SESSION)) {
    $Usuario = UsuarioModel::GetByDocumento($_SESSION['noDocumento']);
    if ($Usuario->idTipoUsuario == 1) {
?>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 col-md-10 col-lg-10">
                        <h4>
                            <div class="dropdown">
                                <i class="fa fa-list"></i> Catalogo
                                <a class="btn btn-primary" a href="?view=new_subproductos">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Registrar subproductos</a>
                                <button class="btn btn-info dropdown-toggle" type="button" id="MenuHerramienta" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-download"></i> Exportar
                                </button>
                                <div class="dropdown-menu bg-light" class="Menu_herramienta_subproducto" aria-labelledby="MenuHerramienta" id="Menu_herramienta_subproducto">

                                </div>
                                <a class="btn btn-success btn_importar_subproducto text-light" data-target="#modal_importar_subproducto" id="btn_importar_subproducto">
                                    <i class="fa fa-upload" aria-hidden="true"></i> importar</a>
                            </div>
                    </div>
                    <div class="col-xl-2  col-md-2 col-lg-2">
                        <div class="dropdown">
                            <button class="btn text-light bg-nav  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-link"></i> Relacionar
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <button class="dropdown-item btn_relacionar" type="button" data-toggle="modal" data-target="#modal_relacionar" id="btn_relacionar"><i class="fa fa-upload" aria-hidden="true"></i> Importar archivo</button>
                                <button class="dropdown-item btn_cruzar" type="button" data-toggle="modal" data-target="#modal_cruzar" id="btn_cruzar"><i class="fas fa-angle-double-right"></i> Cruzar automaticamente</button>
                                <button class="dropdown-item btn_cruzar_manual" type="button" data-toggle="modal" data-target="#modal_cruzar_manual" id="btn_cruzar_manual"><i class="fas fa-hand-holding-medical"></i> Crear cruce manual</button>
                                <button class="dropdown-item btn_cruzar_lista" type="button" data-toggle="modal" data-target="#modal_cruzar_lista" id="btn_cruzar_lista"><i class="fa fa-pencil"></i> Listado y edicion</button>
                            </div>
                        </div>
                    </div>
                </div>
                </h4>
                <hr>
                <div class="table-responsive">
                    <div class="loader-page"></div>
                    <?php
                    $sub = SubproductoModel::GetAll();
                    if (count($sub) > 0) {
                    ?>
                        <!--Aqui va la tabla-->
                        <table id="tabla_subproducto" class="table table-sm table-striped table-bordered table-hover ">
                            <thead class="text-light bg-nav">
                                <tr>
                                    <th style="width:5px">Codigo</th>
                                    <th style="width:50px">nombre</th>
                                    <th style="width:50px">grupo</th>
                                    <th style="width:50px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($sub as $sub) {
                                ?>
                                    <tr>
                                        <td><?php echo $sub->codigo; ?></td>
                                        <td><?php echo $sub->nombre; ?></td>
                                        <td><?php echo $sub->grupo; ?></td>
                                        <td>
                                            <a href="#" class="open_modal_subproducto btn btn-info btn-circle btn-sm" title="Editar" data-target="#modal_subproducto" data-id="<?php echo $sub->id; ?>" data-toggle="tooltip" data-placement="top" data-method="DELETE"><i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="#" class="btn_eliminar_subproducto btn btn-danger btn-circle btn-sm" title="Eliminar producto" data-id="<?php echo $sub->id; ?>" data-toggle="tooltip" data-placement="top" data-method="DELETE"><i class="fa fa-trash"></i>
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
                                <b>No hay subproductos registrados</b>
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
        <!--VENTANA MODAL IMPORTAR SUBPRODUCTO-->
        <div id="modal_importar_subproducto" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-nav">
                        <h5 class="modal-title text-light"><i class="fa fa-upload" aria-hidden="true"></i> </a>Importar subproductos</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    </div>
                </div>
            </div>
        </div>
        <!--VENTANA MODAL DE SUBPRODUCTO-->
        <div id="modal_subproducto" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-nav">
                        <h5 class="modal-title text-light"><i class="fa fa-address-card" aria-hidden="true"></i></a> Datos Subproducto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    </div>
                </div>
            </div>
        </div>
        <!--VENTANA MODAL DE RELACIONES DE PRODUCTO-->
        <div id="modal_relacionar" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-nav">
                        <h5 class="modal-title text-light"><i class="fa fa-address-card" aria-hidden="true"></i></a> Relacionar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    </div>
                </div>
            </div>
        </div>
        <!--VENTANA MODAL DE CRUZAR-->
        <div id="modal_cruzar" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-nav">
                        <h5 class="modal-title text-light"><i class="fas fa-angle-double-right"></i></a> cruzar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    </div>
                </div>
            </div>
        </div>
        <!--VENTANA MODAL DE CRUZAR MANUAL-->
        <div id="modal_cruzar_manual" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-nav">
                        <h5 class="modal-title text-light"><i class="fas fa-hand-holding-medical"></i> cruzar manual</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    </div>
                </div>
            </div>
        </div>
        <!--VENTANA MODAL DE CRUZAR LISTA-->
        <div id="modal_cruzar_lista" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-nav">
                        <h5 class="modal-title text-light"> <i class="fa fa-list"></i> Lista</h5>
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
    <?php }
} else { ?>
    <div class="alert alert-danger">
        <span>
            <b>No tiene autorizacion para visualizar el modulo</b>
        </span>
    </div>
<?php } ?>