<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>Final Project</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="http://localhost/13-FinalProject/">Twit Twit</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="?page=timeline">Your Timeline</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?page=yourtwit">Your TwitTwit</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?page=public">Propil</a>
            </li>
        </ul>
        <div class="form-inline my-2 my-lg-0">
            <?php if (isset($_SESSION['id'])) { ?>
                <a class="btn btn-outline-success my-2 my-sm-0" href="?function=logout">Keluar Lo</a>
            <?php } else { ?>
                <button class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#exampleModal">Masuk/Daptar</button>
            <?php } ?>
        </div>
    </div>
</nav>


