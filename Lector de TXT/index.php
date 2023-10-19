<!DOCTYPE html>
<html>
<head>
    <title>Contenido de archivos de texto</title>
</head>
<body>
    <h1>Contenido de archivos de texto</h1>
    <?php
    //Si se seleccionaron archivos,comienza el programa
    if (isset($_FILES['archivos'])) {

        //Guarda los archivos seleccionados en un aray
        $archivos = $_FILES['archivos'];

        //Lo recorremos
        foreach ($archivos['tmp_name'] as $key => $tmp_name) {
            if ($archivos['error'][$key] === UPLOAD_ERR_OK) {
                $nombre = $archivos['name'][$key];

                //Imprimo por pantalla su contenido
                if (pathinfo($nombre, PATHINFO_EXTENSION) === 'txt') {
                    $contenido = file_get_contents($tmp_name);
                    echo "<h2>Contenido de $nombre:</h2>";
                    echo "<pre>$contenido</pre>";
                } else {
                    echo "<p>$nombre no es un archivo de texto.</p>";
                }
            }
        }
    } else {
        echo "No se seleccionaron archivos.";
    }
    ?>
</body>
</html>