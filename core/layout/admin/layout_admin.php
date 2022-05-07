<div class="main" id="main">
    <?php $Usuario = UsuarioModel::GetByDocumento($_SESSION['noDocumento']); ?>
    <nav class="navbar fixed-top navbar-light  navbar-expand-lg bg-nav">
        <button class="navbar-toggler bg-light text-light" type="button" data-toggle="collapse" data-target="#navbarsExample10" aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon text-light"></span>
        </button>
        <a class="navbar-brand justify-content-md-left" href="./?view=home">
            <img src="./asset/img/logo.png" width="100" height="50" alt="" loading="lazy">
        </a>
        <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample10">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active text-light" href="./?view=home"><b><i class="fa fa-home" aria-hidden="true"></i> Home</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="./?view=usuario"><b><i class="fa fa-user" aria-hidden="true"></i> Usuarios</b></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-list" aria-hidden="true"></i> <b>Catalogo </b>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item"href="./?view=catalogo"> <i class="fa fa-list" aria-hidden="true"></i> Catalogo</a>
                        <a class="dropdown-item" href="./?view=grupo"><i class="fas fa-layer-group"></i> Grupos</a>
                        <a class="dropdown-item" href="./?view=linea"><i class="fa fa-link" aria-hidden="true"></i> Lineas</a>
                        <a class="dropdown-item" href="./?view=subproductos"><i class="fab fa-product-hunt"></i> Relacion de subproductos</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="./?view=linea_inventario"><b><i class="fas fa-dolly-flatbed"></i> linea inventario</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="./?view=explosion"><b><i class="fas fa-file-excel"></i> Explosion</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="./?view=perfil"><b><i class="fas fa-id-card-alt"></i> Mi perfil</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="./?action=destroysession"><b><i class="fas fa-sign-out-alt"></i> Salir</b></a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Start content -->
    <section>
        <div class="container-fluid">
            <div class="content-page">
                <?php View::load("index"); ?>
            </div>
        </div>
    </section>
    <!-- END content -->
    <footer class="footer">
        <span class="text-right">
            Copyright <a target="_blank" href="#">Poliplastics S.A.S</a>
        </span>
        <span class="float-right">En linea <b class=" text-lowercase"> <?php echo $Usuario->nombre . ' ' . $Usuario->apellido;?></b></span>
    </footer>
</div>