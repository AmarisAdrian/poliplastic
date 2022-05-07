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
                            <button class="btn btn-info dropdown-toggle" type="button" id="MenuHerramienta" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-download"></i> Exportar
                                </button>
                                <div class="dropdown-menu bg-light" class="Menu_herramienta_relacion_subproducto" aria-labelledby="MenuHerramienta" id="Menu_herramienta_relacion_subproducto">

                                </div>
                            </div>
                        </h4>
                        <hr>
                        <div class="table-responsive">
                            <?php
                            $rel = RelacionarSubproductoModel::GetAll();
                            if (count($rel) > 0) {
                            ?>
                                <!--Aqui va la tabla-->
                                <table id="tabla_relacion_subproducto" class="table table-sm table-striped table-bordered table-hover ">
                                    <thead class="text-light bg-nav">
                                        <tr>
                                            <th>Id</th>
                                            <th>grupo</th>
                                            <th>codigo subproducto</th>
                                            <th></th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($rel as $rel) {
                                        ?>
                                            <tr>
                                                <td><?php echo $rel->id; ?></td>
                                                <td><?php echo $rel->grupo_cuenta_contable; ?></td>
                                                <td><?php echo $rel->codigo_subproducto; ?></td>
                                                <td>
                                                    <a href="#" class="open_editar_relacion btn btn-info btn-circle btn-sm" title="Editar grupo" data-target="#modal_grupo" data-id="<?php echo $rel->id; ?>" data-toggle="tooltip" data-placement="top" data-method="DELETE"><i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a href="#" id="btn_eliminar_relacion" class="btn_eliminar_relacion btn btn-danger btn-circle btn-sm" title="Eliminar grupo" data-id="<?php echo $rel->id; ?>" data-toggle="tooltip" data-placement="top" data-method="DELETE"><i class="fa fa-trash"></i>
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
