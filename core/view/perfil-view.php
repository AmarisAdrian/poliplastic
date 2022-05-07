<?php if(isset($_SESSION['noDocumento']) && !is_null($_SESSION['noDocumento'])){
  $usuario = UsuarioModel::GetByDocumento($_SESSION['noDocumento']); ?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <br > <br>
                <h5><i class="fa fa-address-card"></i> Datos personales</h5>
                <hr>
                <?php
                $estado_usuario = ComplementModel::GetAllEstadoUsuario();
                $tipo_usuario = ComplementModel::GetAllTipoUsuario();

                if (($estado_usuario) && ($tipo_usuario)) {
                ?>
                    <form class="form-horizontal" id="add_usuario" action="./?view=update_usuario" method="POST" role="form">
                        <br />
                        <?php if( $usuario->idTipoUsuario ==1): ?>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="control-label"><b> Estado usuario * </b></label>
                                    <select class="form-control" name="idEstadoUsuario" id="idEstadoUsuario" required>
                                        <option value="">Selecione una opcion</option>                                     
                                        <?php
                                        foreach ($estado_usuario as $estado_usuario) {
                                            if (!empty($usuario->idEstadoUsuario) && $usuario->idEstadoUsuario == $estado_usuario->id) : ?>
                                                <option value="<?php echo $estado_usuario->id; ?>" selected>
                                                <?php echo $estado_usuario->nombre; ?>
                                                <?php endif; ?>  
                                            <option value="<?php echo $estado_usuario->id; ?> ">
                                                <?php echo $estado_usuario->nombre; ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="control-label"><b>Tipo usuario * </b></label>
                                    <select class="form-control" name="idTipoUsuario" id="idTipoUsuario" required>
                                        <option value="">Selecione una opcion</option>
                                        <?php
                                        foreach ($tipo_usuario as $tipo_usuario) {
                                            if (!empty($usuario->idTipoUsuario) && $usuario->idTipoUsuario == $tipo_usuario->id) : ?>
                                                <option value="<?php echo $tipo_usuario->id; ?>" selected>
                                                <?php echo $tipo_usuario->nombre; ?>
                                                <?php endif; ?>  
                                            <option value="<?php echo $tipo_usuario->id; ?> ">
                                                <?php echo $tipo_usuario->nombre; ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="control-label"><b>Numero de documento * </b></label>
                                    <input class="form-control" value="<?php echo $usuario->noDocumento; ?>" name="noDocumento" id="noDocumento" type="number" placeholder="Numero de documento" required />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="control-label"><b>Nombre * </b></label>
                                    <input class="form-control" value="<?php echo $usuario->nombre; ?>" name="nombre" id="nombre" type="text" placeholder="Nombres" required />
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label class="control-label"><b> Apellidos *</b></label>
                                    <input type="text" name="apellido" value="<?php echo $usuario->apellido; ?>" id="apellido" class="form-control" placeholder="Apellidos" required />
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label class="control-label"><b> Teléfono Movil * </b></label>
                                    <input class="form-control" value="<?php echo $usuario->movil; ?>"  name="movil" id="movil" type="number" placeholder="300 000 0000" required />
                                </div>

                            </div>
                            <div class="col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label class="control-label"><b> Email *</b></label>
                                    <input class="form-control" value="<?php echo $usuario->id; ?>" name="id" id="id"  type="hidden" />
                                    <input class="form-control" value="<?php echo $usuario->email; ?>" name="email" id="email" type="email"  required />
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="category">* Campo Requerido</div>
                                <div class="card-footer bg-transparent text-right">
                                    <button type="submit" class="btn bg-nav text-light btn-fill btn-wd">Actualizar</button>
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
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <br > <br>
                <h5><i class="fa fa-lock" aria-hidden="true"></i> Datos de seguridad</h5>
                <hr>

                    <form class="form-horizontal" id="update_password" action="./?view=change_password" method="POST" role="form">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="control-label"><b> Fecha creacion *</b></label>
                                    <input type="text" name="fecha_creacion" value="<?php echo $usuario->fecha_creacion; ?>" id="fecha_creacion" class="form-control"  readonly />
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label class="control-label"><b>Ultima actividad * </b></label>
                                    <input class="form-control" value="<?php echo $usuario->ultima_actividad; ?>"  name="ultima_actividad" id="ultima_actividad" readonly/>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="control-label"><b> Nueva password*</b></label>
                                    <input type="password" name="nueva_password" id="nueva_password" class="form-control"  />
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label class="control-label"><b>Repetir password * </b></label>
                                    <input type="hidden"  class="form-control" value="<?php echo $usuario->id; ?>" name="id" id="id"   />
                                    <input  type="password"  name="repetir_password" id="repetir_password"  class="form-control"  />
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="category">* Campo Requerido</div>
                                <div class="card-footer bg-transparent text-right">
                                    <button type="submit" class="btn bg-nav text-light btn-fill btn-wd">Actualizar</button>

                                </div>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</section>
<?php }else{ ?>
    <div class="alert alert-danger">
        <span>
            <b>Error de seguridad</b>
        </span>
    </div>
<?php } ?>