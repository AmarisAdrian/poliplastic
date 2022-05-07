<?php $Usuario = UsuarioModel::GetByDocumento($_SESSION['noDocumento']); ?>
<div class="main" id="main">
<nav class="navbar fixed-top navbar-light  navbar-expand-lg bg-nav">

        <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#navbarsExample10" aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" ></span>
        </button>
        <a class="navbar-brand justify-content-md-left" href="./?view=home">
            <img src="./asset/img/logo.png" width="100" height="50" alt="" loading="lazy">
        </a>
        <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample10">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active text-light"  href="./?view=home"><b><i class="fa fa-home" aria-hidden="true"></i> Home</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="./?view=explosion"><b><i class="fas fa-file-excel"></i> Explosion</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="./?view=perfil" href="#"><b><i class="fas fa-id-card-alt"></i> Mi perfil</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="./?action=destroysession"><b><i class="fas fa-sign-out-alt"></i> Salir</b></a>
                </li>
            </ul>
        </div>
</nav>
<div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="push"></div>
            <?php
            View::load("index"); ?>
        </div>
        <!-- END content -->
    </div>
    <footer class="footer">
      <span class="text-right">
        Copyright <a target="_blank" href="#">Poliplastics S.A.S</a>
      </span>
      <span class="float-right">
        En linea <b class=" text-lowercase"><?php echo $Usuario->nombre. ' ' .$Usuario->apellido; ?></b>
      </span>
    </footer>
</div>