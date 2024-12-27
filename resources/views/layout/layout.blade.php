<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лучшие фильмы</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            padding: 20px;
            background-color: #333;
            color: white;
            margin: 0;
        }

        .container {
            width: 80%;
            margin: 20px auto;
        }

        .add-movie-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 9px;
            margin-bottom: 20px;
            font-size: 16px;
            text-align: center;
            border: none;
            cursor: pointer;
        }
        .add-movie-btn1 {
            display: inline-block;
            padding: 5px 15px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 19px;
            margin-top: 30px;
            margin-bottom: 1px;
            font-size: 16px;
            text-align: center;
            border: none;
            cursor: pointer;
        }
        .add-movie-btn4 {
            display: inline-block;
            padding: 5px 15px;
            background-color: #8f3cb0;
            color: white;
            text-decoration: none;
            border-radius: 19px;
            margin-top: 10px;
            margin-bottom: 1px;
            font-size: 16px;
            text-align: center;
            border: none;
            cursor: pointer;
        }

        .add-movie-btn2 {
            display: inline-block;
            padding: 5px 15px;
            background-color: #509e47;
            color: white;
            text-decoration: none;
            border-radius: 19px;
            margin-top: 10px;
            margin-bottom: 1px;
            font-size: 16px;
            text-align: center;
            border: none;
            cursor: pointer;
        }
        .add-movie-btn3 {
            display: inline-block;
            padding: 5px 15px;
            background-color: mediumvioletred;
            color: white;
            text-decoration: none;
            border-radius: 19px;
            margin-top: 30px;
            margin-bottom: 1px;
            font-size: 16px;
            text-align: center;
            border: none;
            cursor: pointer;
        }

        .add-movie-btn:hover {
            background-color: #2980b9;
        }
        .add-movie-btn1:hover {
            background-color: #2980b9;
        }
        .add-movie-btn2:hover {
            background-color: #3f6129;
        }
        .add-movie-btn3:hover {
            background-color: #612063;
        }
        .add-movie-btn4:hover {
            background-color: #522663;
        }
        .link {
            margin-top: 50px;
            margin-bottom: 20px;
            font-size: 20px;
        }
        .link:hover {
         color: #3498db;
         text-decoration: underline;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #333;
            color: white;
        }

        td {
            background-color: #fafafa;
        }

        td img {
            max-width: 150px;
            height: auto;
            border-radius: 5px;
        }

        a {
            color: #3498db;
            text-decoration: none;
        }

        .form-container {
            width: 50%;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input, .form-group select, .form-group button {
            width: 20%;
            margin-left: 20px;
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .form-group button {
            background-color: #3498db;
            color: white;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #2980b9;
        }


    </style>
</head>
<body>
@yield('content')
</body>
</html>
