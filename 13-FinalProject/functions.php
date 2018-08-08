<?php

session_start();

const HOST = 'localhost';
const USERNAME = 'root';
const PASSWORD = 'password';
const DATABASE = 'finalprojectccrp';

$link = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);


if (mysqli_connect_errno()) {
    print_r(mysqli_connect_errno());
    exit();
}

if (isset($_GET['function']) == 'logout') {
    session_unset();
}


function time_since($since) {
    $chunks = array(
        array(60 * 60 * 24 * 365 , 'year'),
        array(60 * 60 * 24 * 30 , 'month'),
        array(60 * 60 * 24 * 7, 'week'),
        array(60 * 60 * 24 , 'day'),
        array(60 * 60 , 'hour'),
        array(60 , 'min'),
        array(1 , 's')
    );

    for ($i = 0, $j = count($chunks); $i < $j; $i++) {
        $seconds = $chunks[$i][0];
        $name = $chunks[$i][1];
        if (($count = floor($since / $seconds)) != 0) {
            break;
        }
    }

    $print = ($count == 1) ? '1 '.$name : "$count {$name}s";
    return $print;
}


function displayTweets($type){
    global $link;

    if ($type == 'public') {
        $whereClause = "";
    }

    $query = "SELECT * FROM tweets" . $whereClause . " ORDER BY datetime DESC LIMIT 1";
    $result = mysqli_query($link, $query);

//    if ($result || mysqli_num_rows($result) == 0) {
    if (mysqli_num_rows($result) == 0) {
        echo "There are no tweets to display";

    } else {
        while ($row = mysqli_fetch_assoc($result)) {
            $userQuery = "SELECT * FROM users WHERE id = " . mysqli_real_escape_string($link, $row['userid']) .  " LIMIT 1";
            $userQueryResult = mysqli_query($link, $userQuery);
            $user = mysqli_fetch_assoc($userQueryResult);

//            print_r($user);

//            echo "<p>" . isset($user['email']) . "</p>";
//            echo "<p>" . $user['email'] . time_since(time() - strtotime($row['datetime'])) . "</p>";
//            echo "<p>" . $user['email'] . " <span class='time'> " . time_since(time() + strtotime($row['datetime'])) . " ago</span></p>";
//            echo "<p>" . $user['email'] . " <span class='time'> " . time_since(strtotime($row['datetime'])) . " ago</span></p>";
            echo "<div class='tweet'><p>" . $user['email'] . " <span class='time'> " . time_since(time() - strtotime($row['datetime'])) . " ago</span></p>";
            echo "<p>" . $row['tweet'] . "</p>";
//            echo "<p><a class='toggleFollow' data-userId='" . $row['userid'] . "'>Follow</a></p></div>";
            echo "<p>Follow</p></div>";
        }
    }
}


function displaySearch() {
    echo '<form class="form-inline">
        <div class="form-group">
          <input type="text" class="form-control mb-2 mr-sm-2" id="search" placeholder="Search">
        </div>
          <button type="submit" class="btn btn-primary mb-2">Cari Twit</button>
        </form>';
}


function displayTweetBox() {
    if (isset($_SESSION['id']) > 0) {
        echo '<form class="form">
            <div class="form-group">
              <textarea class="form-control mb-2 mr-sm-2" id="tweetContent"></textarea>
            </div>
              <button type="submit" class="btn btn-primary mb-2">Post Twit</button>
            </form>';
    }
}