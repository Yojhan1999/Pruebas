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
        <h1 class="text-center mb-4">Editar descripcion del pais</h1>

        <form method="POST" class="border p-4 rounded shadow-sm">

            <div class="mb-3">
                <label for="name" class="form-label">Descripción del pais:</label>
                <input type="text" name="descripcion" id="descripcion" class="form-control"
                    value="<?= htmlspecialchars($pais['descripcion']) ?>" placeholder="Ingresa la descripción del país" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Idioma del pais:</label>
                <input type="text" name="idioma" id="idioma" class="form-control"
                    value="<?= htmlspecialchars($pais['idioma']) ?>" placeholder="Ingresa el idioma" required>
            </div>

            <div class="d-flex justify-content-between">
                <a href="?controller=nacionalidad&action=index" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-warning">Actualizar</button>
            </div>

        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>