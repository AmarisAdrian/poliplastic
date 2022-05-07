<section>
      <?php $usuario = UsuarioModel::GetByDocumento($_SESSION['noDocumento']) ?>
      <br > <br > <br >
      <div class="container text-center">
            <p class="text-center">
                  <h2>Bienvenid@ <?php echo $usuario->nombre . ' ' . $usuario->apellido; ?> </h2>
            </p>
            <br>
            <p class="text-center">
                  <h4>Su ultima actividad fue : <?php echo $usuario->ultima_actividad; ?></h4>
            </p>
      </div>
</section>