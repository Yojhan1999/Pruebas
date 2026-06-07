<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container my-5">
        <h1 class="text-center mb-4">Editar Usuario</h1>

        <form method="POST" class="border p-4 rounded shadow-sm">

            <div class="mb-3">
                <label for="name" class="form-label">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control"
                    value="<?= htmlspecialchars($user['nombre']) ?>" placeholder="Ingresa el nombre" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Correo:</label>
                <input type="email" name="correo" id="correo" class="form-control"
                    value="<?= htmlspecialchars($user['correo']) ?>" placeholder="Ingresa el correo" required>
            </div>

            <div class="d-flex justify-content-between">
                <a href="?controller=user&action=index" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-warning">Actualizar</button>
            </div>

        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>