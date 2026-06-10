<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ciudades</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php require_once __DIR__ . '/../navbar.php'; ?>
    <div class="container my-5">
        <h1 class="text-center mb-4">Lista de Ciudades</h1>
        <div class="d-flex justify-content-end mb-3">
            <a href="?controller=ciudad&action=create" class="btn btn-primary">Crear Ciudad</a>
        </div>
        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Descripción</th>
                    <th>Sitio Turístico</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ciudades as $ciudad): ?>
                <tr>
                    <td><?= htmlspecialchars($ciudad['ciudad_id']) ?></td>
                    <td><?= htmlspecialchars($ciudad['descripcion']) ?></td>
                    <td><?= htmlspecialchars($ciudad['sitio_turistico']) ?></td>
                    <td>
                        <a href="?controller=ciudad&action=edit&ciudad_id=<?= $ciudad['ciudad_id'] ?>" class="btn btn-warning btn-sm me-2">Editar</a>
                        <a href="?controller=ciudad&action=delete&ciudad_id=<?= $ciudad['ciudad_id'] ?>" class="btn btn-danger btn-sm">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>