<?php

session_start();

$error = "";

if (array_key_exists("logout", $_GET)) {
    unset($_SESSION);
    setcookie("id", "", time() - 60 * 60);
    $_COOKIE['id'] = "";
} else if (array_key_exists("id", $_SESSION) AND $_SESSION['id'] OR
    array_key_exists("id", $_COOKIE) AND $_COOKIE['id']) {
    header("Location: Login.php");
}


if (array_key_exists("submit", $_POST)) {
//    print_r($_POST);
    include("MySQLConnect.php");

    if (mysqli_connect_errno()) {
        die("Database connection ror ror ror");
    }



    if (!$_POST['email']) {
        $error .= "<li style='color: red;'>An email address is required</li>";
    }

    if (!$_POST['password']) {
        $error .= "<li style='color: red;'>An password is required</li>";
    }

    if (!isset($_POST['stayLoggedIn'])) {
        $error .= "<li style='color: red;'>Please check</li>";
    }

    if ($error != "") {
        $error = "<p><strong>There were error(s) in your form</strong></p><ul>" . $error . "</ul>";
    } else {

        if (isset($_POST['signUp']) == '1') {

            $query = "SELECT id FROM diary WHERE email = '" . mysqli_real_escape_string($conn, $_POST['email']) . "' LIMIT 1";

            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                $error .= "<h1 style='color: red;'>Email address is taken</h1>";
            } else {
                $query = "INSERT INTO diary (email, password) VALUES('" .
                    mysqli_real_escape_string($conn, $_POST['email']) . "', '" .
                    mysqli_real_escape_string($conn, $_POST['password']) . "')";

                if (!mysqli_query($conn, $query)) {
                    $error .= "<li><h1 style='color: red;'>Could not sign you up - please try again</h1></li>";
                } else {
                    $query = "UPDATE diary SET password = '" . md5(md5(mysqli_insert_id($conn)) . $_POST['password']) . "'
                        WHERE id = " . mysqli_insert_id($conn) . " LIMIT 1";
                    mysqli_query($conn, $query);

                    $_SESSION['id'] = mysqli_insert_id($conn);

                    if($_POST['stayLoggedIn'] == '1') {
                        setcookie("id", mysqli_insert_id($conn), time() + 60 * 60 * 24 * 365);
                    }

    //                echo "<h1 style='color: green;'>Sign up success</h1>";
                    header("Location: Login.php");
                }
            }
        } else {
//            echo "Logging....";
//            print_r($_POST);
            $query = "SELECT * FROM diary WHERE email= '" . mysqli_real_escape_string($conn, $_POST['email']) . "'";

            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($result);

            if (isset($row)) {
                $hashedPassword = md5(md5($row['id']) . $_POST['password']);

                if ($hashedPassword == $row['password']) {
                    $_SESSION['id'] = $row['id'];

                    if($_POST['stayLoggedIn'] == '1') {
                        setcookie("id", mysqli_insert_id($conn), time() + 60 * 60 * 24 * 365);
                    }

                   header("Location: Login.php");
                } else {
                    $error = "<h1 style='color: red;'>That email/password combination could not be found.</h1>";
                }

            } else {
                $error = "<h1 style='color: red;'>That email/password combination could not be found.</h1>";
            }
        }
    }
}
?>

<div id="error">
    <?php echo $error; ?>
</div>

<form method="post">
    <input type="email" name="email" placeholder="Your Email">
    <input type="password" name="password" placeholder="Your Password">
    <input type="checkbox" name="stayLoggedIn" value="1">
    <input type="hidden" name="signUp" value="1">
    <input type="submit" name="submit" value="Sign Up">
</form>

<form method="post">
    <input type="email" name="email" placeholder="Your Email">
    <input type="password" name="password" placeholder="Your Password">
    <input type="checkbox" name="stayLoggedIn" value="1">
    <input type="hidden" name="logIn" value="0">
    <input type="submit" name="submit" value="Log In">
</form>
