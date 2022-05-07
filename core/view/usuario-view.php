<?php
if (isset($_SESSION)) {
    $Usuario = UsuarioModel::GetByDocumento($_SESSION['noDocumento']);
    if($Usuario->idTipoUsuario==1){
?>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <br> <br>
                    <h4>
                        <div class="dropdown">
                            <i class="fa fa-list"></i> Lista de empleados registrados
                            <a class="btn bg-nav text-light" a href="?view=new_usuario">
                                <i class="fa fa-plus" aria-hidden="true"></i> Registrar empleado</a>
                            <button class="btn btn-info dropdown-toggle" type="button" id="MenuHerramienta" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-download"></i> Exportar
                            </button>
                            <div class="dropdown-menu bg-light" class="Menu_herramienta_empleado" aria-labelledby="MenuHerramienta" id="Menu_herramienta_empleado">

                            </div>
                        </div>
                    </h4>
                    <hr>
                    <div class="table-responsive">
                        <?php
                        $empleado = UsuarioModel::GetAll();
                        if (count($empleado) > 0) {
                        ?>
                            <!--Aqui va la tabla-->
                            <table id="tabla_empleado" class="table table-sm table-striped table-bordered table-hover ">
                                <thead class="text-light bg-nav">
                                    <tr>
                                        <th>No Documento</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Movil</th>
                                        <th>Estado</th>
                                        <th>Tipo</th>
                                        <th>Ultima actividad</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($empleado as $empleado) {
                                        $estado = ComplementModel::GetEstadoUsuarioById($empleado->idEstadoUsuario);
                                        $tipo = ComplementModel::GetTipoUsuarioById($empleado->idTipoUsuario);
                                    ?>
                                        <tr>
                                            <td><?php echo $empleado->noDocumento; ?></td>
                                            <td><?php echo $empleado->nombre; ?></td>
                                            <td><?php echo $empleado->apellido; ?></td>
                                            <td><?php echo $empleado->movil; ?></td>
                                            <td><?php echo $estado->nombre; ?></td>
                                            <td><?php echo $tipo->nombre; ?></td>
                                            <td><?php echo $empleado->ultima_actividad; ?></td>
                                            <td>
                                                <a href="<?php echo "./?view=edit_usuario&id=".$empleado->id; ?>" class="btn btn-info btn-circle btn-sm" title="Editar" data-toggle="tooltip" data-placement="top" data-method="DELETE"><i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="#" class="btn_cambiar_password btn btn-danger btn-circle btn-sm" title="Cambiar Password" data-id="<?php echo $empleado->id; ?>" data-toggle="tooltip" data-placement="top" data-method="DELETE"><i class="fa fa-lock" aria-hidden="true"></i>
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
                                    <b>No hay votantes registrados</b>
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
