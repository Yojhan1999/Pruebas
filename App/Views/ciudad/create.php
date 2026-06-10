<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Ciudad</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center mb-4">Crear Ciudad</h1>
        <form method="POST" class="border p-4 rounded shadow-sm">
            <div class="mb-3">
                <label class="form-label">Departamento:</label>
                <select name="departamento_id" class="form-select" required>
                    <option value="">-- Selecciona un departamento --</option>
                    <?php foreach ($departamentos as $dep): ?>
                        <option value="<?= $dep['departamento_id'] ?>"><?= $dep['descripcion'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Descripción:</label>
                <input type="text" name="descripcion" class="form-control" placeholder="Ingresa la descripción" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Sitio turístico:</label>
                <input type="text" name="sitio_turistico" class="form-control" placeholder="Ingresa el sitio turístico" required>
            </div>
            <div class="d-flex justify-content-between">
                <a href="?controller=ciudad&action=index" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>