<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>

    <!-- Script del CDN de Jquery -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/node_modules/bootstrap/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/main.css">


</head>
<body class="bg-primary">
    <div class="container d-flex align-items-center flex-column mt-4">
        <h2 class="text-light">Sorry, can't find what you are looking for...</h2>
        <img src="<?= BASE_URL ?>/assets/images/error_image.png" alt="Error 404 - Not found" class="mt-3">
        <a href="<?= BASE_URL ?>/employee/dashboard" class="btn btn-light btn-lg mt-4">Go back</a>
    </div>
</body>
</html>