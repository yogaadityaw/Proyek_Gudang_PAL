<?php
show404();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 Forbidden</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }
        .error-code {
            font-size: 8rem;
            color: #333;
        }
        .error-message {
            font-size: 1.5rem;
            color: #555;
            margin-top: 20px;
        }
        .back-link {
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="error-code">404</div>
    <div class="error-message">Forbidden - Not Found!</div>
    <a class="back-link" href="javascript:history.back()">Go Back</a>
</body>
</html>