<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #d9edfa;
            color: #333;
            text-align: center;
            padding: 50px 0;
        }

        .gif-image {
            display: block;
            margin: 0 auto 20px; /* Центрируем изображение и добавляем отступ снизу */
        }

        h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            margin-bottom: 20px;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<h1>404 Not Found</h1>
<p>The page you requested could not be found.</p>
<p>Return to <a href="/">homepage</a>.</p>
<img src="{{ asset('Images/MrF.gif') }} " alt="404 Not Found" class="gif-image" width="30%">
</body>
</html>
