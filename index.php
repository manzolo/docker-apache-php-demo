<!DOCTYPE html>
<html>
<head>
    <title>Info Server</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
            color: #007bff;
        }
        .variable {
            font-style: italic;
            color: #28a745;
        }
        p {
            color: #666;
            margin-bottom: 10px;
        }
        pre {
            background-color: #f8f9fa;
            padding: 10px;
            border-radius: 5px;
            overflow-x: auto;
            margin-top: 10px;
        }
        .info-section {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #f0f0f0;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Informazioni del server</h1>
        <div class="info-section">
            <p><label>Versione di PHP:</label><span class="variable"> <?php echo phpversion(); ?></span></p>
            <p><label>Nome host:</label><span class="variable"> <?php echo gethostname(); ?></span></p>
            <p><label>Indirizzo IP del server:</label><span class="variable"> <?php $host = gethostname(); echo gethostbyname($host); ?></span></p>
            <p><label>Data e ora del server:</label><span class="variable"> <?php echo date('Y-m-d H:i:s'); ?></span></p>
            <p><label>Sistema operativo:</label><span class="variable"> <?php echo php_uname(); ?></span></p>
            <p><label>Memoria disponibile:</label><span class="variable"> <?php echo ini_get('memory_limit'); ?></span></p>
            <p><label>Estensioni PHP abilitate:</label><span class="variable"> <?php echo implode(', ', get_loaded_extensions()); ?></p>
        </div>
        <div class="info-section">
            <p><label>Variabili di ambiente:</label></p>
            <pre><?php print_r($_ENV); ?></pre>
        </div>
        <div class="info-section">
            <p><label>Informazioni server:</label></p>
            <pre><?php print_r($_SERVER); ?></pre>
        </div>
        <!-- Aggiungi altre informazioni a piacere -->
    </div>
</body>
</html>

