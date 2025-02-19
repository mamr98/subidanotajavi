<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalles de la Muestra</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
            font-size: 12px;
        }

        /* Contenedor principal */
        .container {
            width: 100%;
            padding: 20px;
        }

        /* Encabezado */
        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 2px solid #e04725;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .header img {
            width: 60px;
            height: auto;
        }

        .header h1 {
            font-size: 18px;
            color: #102D4B;
            margin: 0;
        }

        /* Tabla */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #102D4B;
            color: white;
            font-weight: bold;
            text-transform: uppercase;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Footer */
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            text-align: center;
            background-color: #102D4B;
            color: white;
            padding: 5px 0;
            font-size: 10px;
    }

        /* Estilos para salto de página */
        .page-break {
            page-break-after: always;
        }

        h2 {
            color: #102D4B;
            font-size: 16px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <!-- Encabezado -->
    <div class="container">
        <div class="header">
            <img src="{{ public_path('medac.png') }}" alt="Logo Medac">
            <h1>Datos de la Muestra</h1>
        </div>

        <!-- Detalles de la Muestra -->
        <h2>Detalles de la Muestra</h2>
        <table>
            <tbody>
                <tr>
                    <th>Código</th>
                    <td>{{ $muestra->codigo }}</td>
                </tr>
                <tr>
                    <th>Fecha</th>
                    <td>{{ \Carbon\Carbon::parse($muestra->fecha)->format('d/m/Y') }}</td>
                </tr>
                <tr>
                    <th>Órgano</th>
                    <td>{{ $muestra->organo }}</td>
                </tr>
                <tr>
                    <th>Tipo</th>
                    <td>{{ $muestra->tipo->nombre }}</td>
                </tr>
                <tr>
                    <th>Formato</th>
                    <td>{{ $muestra->formato->nombre }}</td>
                </tr>
                <tr>
                    <th>Calidad</th>
                    <td>{{ $muestra->calidad->nombre }}</td>
                </tr>
                <tr>
                    <th>Descripción Calidad</th>
                    <td>{{ $muestra->calidad->descripcion }}</td>
                </tr>
                <tr>
                    <th>Usuario</th>
                    <td>{{ $muestra->usuario->email }}</td>
                </tr>
                <tr>
                    <th>Sede del Usuario</th>
                    <td>{{ $muestra->sede->nombre }}</td>
                </tr>
            </tbody>
        </table>

        <!-- Interpretaciones -->
        <h2>Interpretaciones de la Muestra</h2>
        <table>
            <thead>
                <tr>
                    <th>Tipo Estudio</th>
                    <th>Descripción</th>
                    <th>Fecha de Interpretación</th>
                </tr>
            </thead>
            <tbody>
                @foreach($interpretaciones_detalladas as $interpretacion)
                    <tr>
                        <td>{{ $tipoEstudio->nombre }}</td>
                        <td>{{ $interpretacion->texto }}</td>
                        <td>{{ \Carbon\Carbon::parse($interpretacion->fecha)->format('d/m/Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Imagenes -->
        <h2>Imagenes de la Muestra</h2>
        <table>
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Zoom</th>
                </tr>
            </thead>
            <tbody>
                @foreach($imagen as $img)
                    <tr>
                        <td><img src={{ $img->ruta }}></td>
                        <td>{{ $img->zoom }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>muestras.com - Todos los derechos reservados - Página 
            <span class="pagenum"></span>
        </p>
    </div>

    <script type="text/php">
        if (isset($pdf)) {
            $pdf->page_script('
                $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                $pdf->text(270, 780, "Página $PAGE_NUM de $PAGE_COUNT", $font, 10);
            ');
        }
    </script>

    <script type="text/php">
        if (isset($pdf)) {
            $pdf->page_script('
                $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                $pdf->text(30, 750, "muestras.com - Todos los derechos reservados", $font, 8);
                $pdf->text(520, 750, "Página $PAGE_NUM de $PAGE_COUNT", $font, 8);
            ');
        }
    </script>
</body>
</html>