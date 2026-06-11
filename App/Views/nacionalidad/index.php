<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Nacionalidades</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php require_once __DIR__ . '/../navbar.php'; ?>
    <h1 class="text-center mb-4">Lista de Nacionalidades</h1>
    <div class="d-flex justify-content-end mb-3">
        <a href="?controller=nacionalidad&action=create_nacionalidad" class="btn btn-success">Crear Nacionalidad</a>
    </div>
    <div class="container my-5">
        <table class="table table-bordered table-striped table-responsive">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Descripción</th>
                    <th>Idioma</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pais as $nacionalidad): ?>
                    <tr>
                        <td><?= htmlspecialchars($nacionalidad['pais_id']) ?></td>
                        <td><?= htmlspecialchars($nacionalidad['descripcion']) ?></td>
                        <td><?= htmlspecialchars($nacionalidad['idioma']) ?></td>
                        <td>
                            <a href="?controller=nacionalidad&action=edit_nacionalidad&pais_id=<?= $nacionalidad['pais_id'] ?>"
                                class="btn btn-warning btn-sm me-2">Editar</a>
                            <a href="?controller=nacionalidad&action=delete_nacionalidad&pais_id=<?= $nacionalidad['pais_id'] ?>"
                                class="btn btn-danger btn-sm">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>