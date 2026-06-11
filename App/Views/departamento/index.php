<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Departamentos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php require_once __DIR__ . '/../navbar.php'; ?>
    <div class="container my-5">
        <h1 class="text-center mb-4">Lista de Departamentos</h1>
        <div class="d-flex justify-content-end mb-3">
            <a href="?controller=departamento&action=create" class="btn btn-primary">Crear Departamento</a>
        </div>
        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Descripción</th>
                    <th>Comida Típica</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($departamentos as $dep): ?>
                <tr>
                    <td><?= htmlspecialchars($dep['departamento_id']) ?></td>
                    <td><?= htmlspecialchars($dep['descripcion']) ?></td>
                    <td><?= htmlspecialchars($dep['comida_tipica']) ?></td>
                    <td>
                        <a href="?controller=departamento&action=edit&departamento_id=<?= $dep['departamento_id'] ?>" class="btn btn-warning btn-sm me-2">Editar</a>
                        <a href="?controller=departamento&action=delete&departamento_id=<?= $dep['departamento_id'] ?>" class="btn btn-danger btn-sm">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>