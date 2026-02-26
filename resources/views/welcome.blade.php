<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Servidor Disponible</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI",
                         Roboto, Helvetica, Arial, sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #0f172a, #020617);
            color: #e5e7eb;
        }

        .container {
            text-align: center;
            padding: 60px;
            background: rgba(15, 23, 42, 0.65);
            backdrop-filter: blur(12px);
            border-radius: 16px;
            border: 1px solid rgba(255,255,255,0.08);
            box-shadow: 0 20px 60px rgba(0,0,0,.5);
            max-width: 500px;
            width: 90%;
        }

        .status {
            width: 12px;
            height: 12px;
            background: #22c55e;
            border-radius: 50%;
            margin: 0 auto 20px;
            box-shadow: 0 0 12px #22c55e;
        }

        h1 {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        p {
            opacity: .7;
            margin-bottom: 25px;
            font-size: 15px;
        }

        .footer {
            font-size: 13px;
            opacity: .5;
            letter-spacing: .5px;
        }
    </style>
</head>
<body>

<div class="container">

    <div class="status"></div>

    <h1>Servidor Operativo</h1>

    <p>
        Acceso autorizado.<br>
        Servicio de archivos disponible.
    </p>

    <div class="footer">
        {{ config('app.name') }} · {{ now()->format('d/m/Y H:i') }}
    </div>

</div>

</body>
</html>