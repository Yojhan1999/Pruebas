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
    <div class="container my-5">
        <h1 class="text-center mb-4">Lista de Usuarios</h1>
        <div class="d-flex justify-content-end mb-3">
            <a href="?controller=user&action=create" class="btn btn-primary">Crear un Usuario</a>
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
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= htmlspecialchars($user['id']) ?></td>
                    <td><?= htmlspecialchars($user['nombre']) ?></td>
                    <td><?= htmlspecialchars($user['correo']) ?></td>
                    <td>
                        <a href="?controller=user&action=edit&id=<?= $user['id'] ?>" class="btn btn-warning btn-sm me-2">Editar</a>
                        <a href="?controller=user&action=delete&id=<?= $user['id'] ?>" class="btn btn-danger btn-sm">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>