<?php
if (isset($_SESSION)) {
    $Usuario = UsuarioModel::GetByDocumento($_SESSION['noDocumento']);
    if ($Usuario->idTipoUsuario == 1) { ?>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <br> <br>
                        <h4>
                            <div class="dropdown">
                                <i class="fa fa-list"></i> Grupos
                                <a class="btn bg-nav text-light" a href="?view=new_grupo">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Registrar grupo</a>
                                <button class="btn btn-info dropdown-toggle" type="button" id="MenuHerramienta" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-download"></i> Exportar
                                </button>
                                <div class="dropdown-menu bg-light" class="Menu_herramienta_grupo" aria-labelledby="MenuHerramienta" id="Menu_herramienta_grupo">

                                </div>
                                <a class="btn btn-success btn_importar_grupo text-light" data-target="#modal_importar_grupo" id="btn_importar_grupo">
                                  <i class="fa fa-upload" aria-hidden="true"></i> importar</a>
                            </div>
                        </h4>
                        <hr>
                        <div class="table-responsive">
                            <?php
                            $grupo = GrupoModel::GetAll();
                            if (count($grupo) > 0) {
                            ?>
                                <!--Aqui va la tabla-->
                                <table id="tabla_grupo" class="table table-sm table-striped table-bordered table-hover ">
                                    <thead class="text-light bg-nav">
                                        <tr>
                                            <th>Id</th>
                                            <th>Codigo</th>
                                            <th>Nombre</th>
                                            <th>Acciones</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($grupo as $grupo) {
                                        ?>
                                            <tr>
                                                <td><?php echo $grupo->id; ?></td>
                                                <td><?php echo $grupo->codigo; ?></td>
                                                <td><?php echo $grupo->nombre; ?></td>
                                                <td>
                                                    <a href="#" class="open_modal_grupo btn btn-info btn-circle btn-sm" title="Editar grupo" data-target="#modal_grupo" data-id="<?php echo $grupo->id; ?>" data-toggle="tooltip" data-placement="top" data-method="DELETE"><i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a href="#" class="btn_eliminar_grupo btn btn-danger btn-circle btn-sm" title="Eliminar grupo" data-id="<?php echo $grupo->id; ?>" data-toggle="tooltip" data-placement="top" data-method="DELETE"><i class="fa fa-trash"></i>
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
                                        <b>No hay grupos registrados</b>
                                    </span>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <!--VENTANA MODAL DE GRUPO-->
                <div id="modal_grupo" class="modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-nav">
                                <h5 class="modal-title text-light"><i class="fa fa-address-card" aria-hidden="true"></i></a> Datos grupo</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                            </div>
                        </div>
                    </div>
                </div>
                 <!--VENTANA MODAL IMPORTAR GRUPO-->
                 <div id="modal_importar_grupo" class="modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-nav">
                                <h5 class="modal-title text-light"><i class="fa fa-upload" aria-hidden="true"></i> </a>Importar grupos</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                            </div>
                        </div>
                    </div>
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