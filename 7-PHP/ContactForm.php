<?php

$error = "";
$successMessage = "";

if ($_POST) {

    if(!$_POST['email']) {
        $error .= "<li>An email address is required.</li>";
    }

    if(!$_POST['subject']) {
        $error .= "<li>An subject is required.</li>";
    }

    if(!$_POST['content']) {
        $error .= "<li>An content is required.</li>";
    }

    if ($_POST['email'] && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
        $error .= "<li>The email address is invalid.</li>";
    }

    if ($error != '') {
        $error = '<div class="alert alert-danger" role="alert"><strong>There were error(s) in your form</strong><br><ul>' . $error . '</ul></div>';
    } else {
        $emailTo = 'dzulfikar.maulana@gmail.com';
        $subject = $_POST['subject'];
        $content = $_POST['content'];
        $headers = 'From: ' . $_POST['email'];

        if (mail($emailTo, $subject, $content, $headers)) {
            $successMessage = '<div class="alert alert-success" role="alert">Your message was sent </div>';
        } else {
            $error = '<div class="alert alert-danger" role="alert">Message could not be sent</div>';
        }
    }

}



?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
    <!--    <script type="text/javascript" src="jquery-3.2.1.min.js"></script>-->

    <title>Contact Form</title>
</head>
<body>
<!--<h1>Hello, world!</h1>-->
<div id="container">
    <h1>Get In Touch</h1>

    <div id="error"><?php echo $error . $successMessage; ?></div>

    <form method="post">
        <fieldset class="form-group">
            <label for="email">Email address</label>
            <input name="email" type="email" class="form-control" id="email" placeholder="Enter Your Email Address">
            <small class="text-muted"> We'll never share your email with anyone else</small>
        </fieldset>

        <fieldset class="form-group">
            <label for="subject">Subject</label>
            <input name="subject" type="text" class="form-control" id="subject">
        </fieldset>

        <fieldset class="form-group">
            <label for="exampleTextArea">What would you like to ask us?</label>
            <textarea name="content" class="form-control" id="content" rows="3"></textarea>
        </fieldset>

        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
    </form>

</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script type="text/javascript">

    //    $("form").submit(function (e) {
    //        e.preventDefault();
    //
    //        var error = "";
    //
    //        if ($("#email").val() == "") {
    //            error += "The email field is required.";
    //        }
    //
    //        if ($("#subject").val() == "") {
    //            error += "The subject field is required.";
    //        }
    //
    //        if ($("#content").val() == "") {
    //            error += "The content field is required.";
    //        }
    //
    //        if (error != "") {
    //            $("#error").html('<div class="alert alert-danger" role="alert"><strong>There were error(s) in your form</strong>' + '<br>' + error + '<br>' + </div>');
    //        } else {
    //            $("form").unbind("submit").submit();
    //        }
    //
    //    });

</script>

</body>
</html>