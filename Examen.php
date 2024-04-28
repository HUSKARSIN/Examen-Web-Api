<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen Web 2</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Tabla para mostras los datos de la api</h1>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Estatus</th>
                    <th>Especie</th>
                    <th>Genero</th>
                    <th>Origen</th>
                    <th>Locacion</th>
                    <th>Imagen</th>
                    <th>Primer Episodio</th>
                    <th>Creado</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $Personaje_url = 'https://rickandmortyapi.com/api/character/1,183';
                $Personaje_dato = json_decode(file_get_contents($Personaje_url), true);
                foreach ($Personaje_dato as $Personaje) {
                    echo "<tr>";
                    echo "<td>" . $Personaje['id'] . "</td>";
                    echo "<td>" . $Personaje['name'] . "</td>";
                    echo "<td>" . $Personaje['status'] . "</td>";
                    echo "<td>" . $Personaje['species'] . "</td>";
                    echo "<td>" . $Personaje['gender'] . "</td>";
                    $origen_dato = json_decode(file_get_contents($Personaje['origin']['url']), true);
                    echo "<td>" . $origen_dato['name'] . "</td>";
                    $locacion_dato = json_decode(file_get_contents($Personaje['location']['url']), true);
                    echo "<td>" . $locacion_dato['name'] . "</td>";
                    echo "<td><img src='" . $Personaje['image'] . "' alt='" . $Personaje['name'] . "' width='100'></td>";
                    echo "<td><a href='" . $Personaje['episode'][0] . "'><i class='fas fa-play'></i> First Episode</a></td>";
                    echo "<td>" . $Personaje['created'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
