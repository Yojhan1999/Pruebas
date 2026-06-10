<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php require_once __DIR__ . '/navbar.php'; ?>
    <h1 class="text-center mb-4">Lista de Usuarios</h1>
    <div class="d-flex justify-content-end mb-3">
        <a href="?controller=user&action=create" class="btn btn-primary">Crear un Usuario</a>
        <a href="?controller=nacionalidad&action=create_nacionalidad" class="btn btn-success">Crear Nacionalidad</a>
    </div>
    <table class="table table-bordered table-striped">
        <thead class="table-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>