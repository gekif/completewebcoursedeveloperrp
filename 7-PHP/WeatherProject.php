<?php
include('script.php');
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style type="text/css">
        html {
            background: url(image.jpg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        body {
            background: none;
            color: white;
        }

        .container {
            text-align: center;
            margin-top: 200px;
            width: 450px;
        }

        input {
            margin: 20px 0;
        }

        #weather {
            margin-top: 15px;
        }

    </style>

    <title>Weather Project</title>

</head>
<body>
<!--<h1>Hello, world!</h1>-->
<!---->
<!--<img src="image.jpg">-->

<div class="container">

    <h1>Cuacanya gimana nih?</h1>
    <form>
        <fieldset class="form-group">
            <label for="city">Masukin Kota</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="contoh: tokio" value="<?php
            if (array_key_exists('city', $_GET['city'])) {
                echo $_GET['city'];
            }
            ?>">
        </fieldset>
        <button type="submit" class="btn btn-primary">Submit</button>

        <div id="weather"><?php
            if ($weather) {
                echo '<div class="alert alert-success" role="alert">' . $weather . '</div>';
            } else if ($error) {
                echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
            }



            ?></div>
    </form>

</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>