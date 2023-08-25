<nav class="navbar navbar-dark bg-dark fixed-top navbar-expand-lg">
    <a class="navbar-brand" href="/datatable/menu">Menú</a>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/datatable/clientes">Clientes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/datatable/clientes/estadistica">Estadistica</a>
            </li>
        </ul>
    </div>
    <a href="/datatable/logout" class="btn btn-danger">Cerrar sesión</a>
</nav>
<br>
<h1>ESTADISTICA DE LAS COMPRAS DE LOS CLIENTES</h1>
<button id="btnActualizar" class="btn btn-info">Actualizar</button>
<div class="row">
    <div class="col-lg-4">
        <canvas id="chartCompras" width="100%"></canvas>
    </div>
</div>
<script src="<?=asset('./build/js/clientes/estadistica.js') ?>"></script>