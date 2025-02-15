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
        .input-section {
            margin-bottom: 20px;
        }
        .input-section input {
            padding: 8px;
            width: 300px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .input-section button {
            padding: 8px 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .input-section button:hover {
            background-color: #0056b3;
        }
        .response-section {
            margin-top: 20px;
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

        <!-- Sezione per l'input dell'host e la chiamata API -->
        <div class="input-section">
            <label for="hostInput">Inserisci l'host da chiamare:</label>
            <input type="text" id="hostInput" placeholder="Esempio: http://example.com">
            <button onclick="callEndpoint()">Chiama Endpoint</button>
        </div>

        <!-- Sezione per visualizzare la risposta JSON -->
        <div class="response-section">
            <p><label>Risposta JSON:</label></p>
            <pre id="jsonResponse"></pre>
        </div>
    </div>

    <script>
        function callEndpoint() {
            const host = document.getElementById('hostInput').value;
            const url = `${host}`;

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('jsonResponse').textContent = JSON.stringify(data, null, 2);
                })
                .catch(error => {
                    document.getElementById('jsonResponse').textContent = `Errore: ${error.message}`;
                });
        }
    </script>
</body>
</html>