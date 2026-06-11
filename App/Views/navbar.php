<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="<?= BASE_URL ?>?controller=nacionalidad&action=index">Mi App</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <!--
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL ?>?controller=user&action=index">Usuarios</a>
                </li>
                -->
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL ?>?controller=nacionalidad&action=index">Nacionalidades</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL ?>?controller=departamento&action=index">Departamentos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL ?>?controller=ciudad&action=index">Ciudades</a>
                </li>
            </ul>
        </div>
    </div>
</nav>