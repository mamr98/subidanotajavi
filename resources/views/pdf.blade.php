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
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
            font-size: 14px;

        }


        /* Encabezado */
        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 3px solid #2a3d4f;
            padding-bottom: 15px;
            margin-bottom: 25px;
        }

        .header img {
            width: 80px;
            height: auto;
        }

        .header h1 {
            font-size: 24px;
            color: #2a3d4f;
            margin: 0;
            font-weight: bold;
        }

        h2 {
            color: #2a3d4f;
            font-size: 20px;
            margin-top: 30px;
            margin-bottom: 10px;
            border-bottom: 2px solid #e04725;
            padding-bottom: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 2px solid #f0f0f0;
        }

        th {
            background-color: #2a3d4f;
            color: white;
            font-weight: bold;
            text-transform: uppercase;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f0f0f0;
        }

        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            text-align: center;
            font-size: 12px;
            color: white;
            padding: 10px 0;
            background-color: #2a3d4f;
            border-top: 2px solid #e04725;
        }

        .footer p {
            margin: 0;
        }


        td {
            max-width: 400px;
            word-wrap: break-word;
            overflow-wrap: break-word;
            white-space: normal;
        }

        .arreglo {
            margin-top: 45px;
        }

        .contenedor-imagenes {
            page-break-inside: avoid;
        }
    </style>
</head>

<body>
    <div>
        <!-- Encabezado -->
        <div class="header">
            <img src="{{ asset('medac.png') }}" alt="Logo Medac">
            <h1>Informe de la Muestra</h1>
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
                @foreach ($interpretaciones_detalladas as $interpretacion)
                    <tr>
                        <td>{{ $tipoEstudio->nombre }}</td>
                        <td>{{ $interpretacion->texto }}</td>
                        <td>{{ \Carbon\Carbon::parse($interpretacion->fecha)->format('d/m/Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Imagenes -->
        <div class="contenedor-imagenes">
            <h2>Imágenes de la Muestra</h2>
            <div class="arreglo">
                @foreach ($imagen as $img)
                    <div style="display: inline-block; width: 160px; padding: 6px; text-align: center;">
                        <div style="
                            width: 160px;
                            height: 160px;
                            background: url('{{ $img->ruta }}') no-repeat center center;
                            background-size: cover;">
                        </div>
                        <p>Zoom: x{{ $img->zoom }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2025 Medac. Todos los derechos reservados.
        </p>
    </div>

    <!-- Scripts -->
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
                $pdf->text(270, 20, "Página $PAGE_NUM", $font, 10);
            ');
        }
    </script>

</body>

</html>
