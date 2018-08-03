<?php
    session_start();

    $error = "";  

    if (array_key_exists("logout", $_GET)) {
        unset($_SESSION);
        setcookie("id", "", time() - 60*60);
        $_COOKIE["id"] = "";  
        
        session_destroy();
        
    } else if ((array_key_exists("id", $_SESSION) AND
            $_SESSION['id']) OR (array_key_exists("id", $_COOKIE) AND
            $_COOKIE['id'])) {
        header("Location: loggedinpage.php");
    }

    if (array_key_exists("submit", $_POST)) {
        include("MySQLConnect.php");
        
        if (!$_POST['email']) {
            $error .= "<li>Kudu Pake Email</li>";
        } 
        
        if (!$_POST['password']) {
            $error .= "<li>Kudu Pake Password</li>";
        }

        if (!isset($_POST['stayLoggedIn'])) {
            $error .= "<li>Ceklist Elu Lupa Njirr</li>";
        }

        if ($error != "") {
            $error = "<p>Ada ror ror nih, Coba Cek:</p><ul>" . $error .  "</ul>";

        } else {
            if ($_POST['signUp'] == '1') {
                $query = "SELECT id FROM diary WHERE email = '".mysqli_real_escape_string($conn, $_POST['email'])."' LIMIT 1";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    $error = "Udah Diambil Bangg";
                } else {
                    $query = "INSERT INTO diary (email, password) VALUES ('".mysqli_real_escape_string($conn, $_POST['email'])."', '".mysqli_real_escape_string($conn, $_POST['password'])."')";

                    if (!mysqli_query($conn, $query)) {
                        $error = "<p>Gak bisa daptar, coba lagi gihhh</p>";
                    } else {
                        $query = "UPDATE diary SET password = '".md5(md5(mysqli_insert_id($conn)).$_POST['password'])."' WHERE id = ".mysqli_insert_id($conn)." LIMIT 1";
                        $id = mysqli_insert_id($conn);
                        mysqli_query($conn, $query);

                        $_SESSION['id'] = $id;

                        if ($_POST['stayLoggedIn'] == '1') {
                            setcookie("id", $id, time() + 60*60*24*365);
                        } 
                            
                        header("Location: loggedinpage.php");
                    }
                }

            } else {
                $query = "SELECT * FROM diary WHERE email = '" . mysqli_real_escape_string($conn, $_POST['email']) . "'";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_array($result);

                if (isset($row)) {
                    $hashedPassword = md5(md5($row['id']) . $_POST['password']);

                    if ($hashedPassword == $row['password']) {
                        $_SESSION['id'] = $row['id'];

                        if (isset($_POST['stayLoggedIn']) AND $_POST['stayLoggedIn'] == '1') {
                            setcookie("id", $row['id'], time() + 60 * 60 * 24 * 365);
                        }

                        header("Location: loggedinpage.php");

                    } else {
                        $error = "Email/Password Kaga Ketemu Hahahahaha";
                    }

                } else {
                    $error = "Email/Password Kaga Ketemu Hahahahaha";
                }
            }
        }
    }
?>

<?php include("header.php"); ?>
      <div class="container" id="homePageContainer">
    <h1>Buku Harian Rahasia</h1>
          <p><strong>Masukan unek-unekmu dimari</strong></p>
          <div id="error"><?php if ($error!="") {
    echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
} ?></div>

<form method="post" id = "signUpForm">
    <p>Tertarik? Daftar Sekarang.</p>

    <fieldset class="form-group">
        <input class="form-control" type="email" name="email" placeholder="Email Eloh">
    </fieldset>
    
    <fieldset class="form-group">
        <input class="form-control" type="password" name="password" placeholder="Password Eloh">
    </fieldset>
    
    <div class="checkbox">
        <label>
            <input type="checkbox" name="stayLoggedIn" value=1> Tetep Masupp
        </label>
    </div>
    
    <fieldset class="form-group">
        <input type="hidden" name="signUp" value="1">
        <input class="btn btn-success" type="submit" name="submit" value="Daptarr!">
    </fieldset>
    
    <p><a class="toggleForms">Masuppp</a></p>
</form>

<form method="post" id = "logInForm">
    <p>Masuk pake username dan password.</p>
    
    <fieldset class="form-group">
        <input class="form-control" type="email" name="email" placeholder="Email Eloh">
    </fieldset>
    
    <fieldset class="form-group">
        <input class="form-control"type="password" name="password" placeholder="Password Eloh">
    </fieldset>
    
    <div class="checkbox">
        <label>
            <input type="checkbox" name="stayLoggedIn" value=1> Tetep Log In
        </label>
    </div>

        <input type="hidden" name="signUp" value="0">

    <fieldset class="form-group">
        <input class="btn btn-success" type="submit" name="submit" value="Masupp Dah">
    </fieldset>
    
    <p><a class="toggleForms">Daftar</a></p>
</form>
      </div>

<?php include("footer.php"); ?>