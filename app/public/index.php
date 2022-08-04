<?php
session_start();
ob_start();

$pdo = new PDO('mysql:dbname=tutorial;host=mysql', 'tutorial', 'secret', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

if (isset($_POST['mail']) && isset($_POST['psw'])) {
    $mail = $_POST['mail'];
    $psw = $_POST['psw'];

    $sql = "select id, userName from users where mailAddress='" . $mail . "'AND password='" . $psw . "'";


    $result1 = $pdo->query($sql);
    $result1->setFetchMode(PDO::FETCH_ASSOC);
    $row = $result1->fetch();
    if ($row != null) {
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['userName'];
    } else {
        echo " You Have Entered Incorrect Password";
    }

}

?>
<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="calendar.css">
    <script src="app.js" defer></script>
    <script src="moment.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body onload="thisMonth()">
<div class="container">
    <ul>
        <li>
            <div class="box month-box">
                <div class="arrows">
                    <p id="arrowL" class="arrowL">&#8617;</p>
                    <p id="arrowR" class="arrowR">&#8618;</p>
                </div>
                <h1 id="month" class="month"></h1>
            </div>
        </li>

        <li>
            <div class="box calendar-box">
                <table class="center">

                    <th><p>SUN</p></th>
                    <th><p>MON</p></th>
                    <th><p>TUE</p></th>
                    <th><p>WED</p></th>
                    <th><p>THU</p></th>
                    <th><p>FRI</p></th>
                    <th><p>SAT</p></th>


                    <tr>

                        <td class="purple day"></td>
                        <td class="purple day"></td>
                        <td class="purple day"></td>
                        <td class="purple day"></td>
                        <td class="purple day"></td>
                        <td class="purple day"></td>
                        <td class="purple day"></td>
                    </tr>
                    <tr>
                        <td class="empty day"></td>
                        <td class="empty day"></td>
                        <td class="empty day"></td>
                        <td class="empty day"></td>
                        <td class="empty day"></td>
                        <td class="empty day"></td>
                        <td class="empty day"></td>

                    </tr>
                    <tr>
                        <td class="purple day"></td>
                        <td class="purple day"></td>
                        <td class="purple day"></td>
                        <td class="purple day"></td>
                        <td class="purple day"></td>
                        <td class="purple day"></td>
                        <td class="purple day"></td>
                    </tr>
                    <tr>
                        <td class="empty day"></td>
                        <td class="empty day"></td>
                        <td class="empty day"></td>
                        <td class="empty day"></td>
                        <td class="empty day"></td>
                        <td class="empty day"></td>
                        <td class="empty day"></td>
                    </tr>
                    <tr>
                        <td class="purple day"></td>
                        <td class="purple day"></td>
                        <td class="purple day"></td>
                        <td class="purple day"></td>
                        <td class="purple day"></td>
                        <td class="purple day"></td>
                        <td class="purple day"></td>
                    </tr>
                    <tr>
                        <td class="empty day"></td>
                        <td class="empty day"></td>
                        <td class="empty day"></td>
                        <td class="empty day"></td>
                        <td class="empty day"></td>
                        <td class="empty day"></td>
                        <td class="empty day"></td>
                    </tr>
                </table>
            </div>
        </li>
    </ul>
    <div class="box  people-box vl">

        <!--        <div class="containerLog"><p class="log">Log in</p><p class="log">/</p><p class="log">Sign in</p></div>-->


        <button class="open-button" onclick="openForm()">Log in</button>

        <div class="form-popup" id="loginForm">
            <form action="#" class="form-container" method="post">
                <h2>Login</h2>

                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="mail" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>

                <button type="submit" class="btn">Login</button>
                <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
            </form>
        </div>


        <button class="open-button" onclick="openFormS()" style="left:77vw ">Sign in</button>

        <div class="form-popup" id="signinForm">
            <form action="#" class="form-container" method="post">
                <h2>Signin</h2>

                <label for="firstName"><b>FirstName</b></label>
                <input type="text" placeholder="Enter Firstname" name="firstName" required>

                <label for="firstName"><b>LastName</b></label>
                <input type="text" placeholder="Enter Lastname" name="lastName" required>

                <label for="userName"><b>UserName</b></label>
                <input type="text" placeholder="Enter Username" name="userName" required>

                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="mailAddress" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>

                <button type="submit" name="submit" class="btn" value="submit">Signin</button>
                <button type="button" class="btn cancel" onclick="closeFormS()">Close</button>
            </form>
        </div>

        <button id="submitapt" class="open-button" onclick="openFormA()">Create Appointment</button>

        <div class="form-popup" id="appointForm">
            <form action="#" class="form-container" method="post">
                <h2>Pick up you date</h2>

                <label for="date"><b>Date</b></label>
                <input id="dateApt" type="date" placeholder="Enter Date" name="date" min="2020-08-03" value="2021-08-03"
                       required>

                <button type="submit" name="submitapt" class="btn" value="submit">Create appointment</button>
                <button type="button" class="btn cancel" onclick="closeFormA()">Close</button>
            </form>
        </div>

        <!--        //$date = $_GET['ala din url'];-->
        <p class="people-text" id="people-text">
            <?php
            $test = $_SESSION['name'] ?? false;
            if ($test !== false) {
                echo '<p class="userText">Hi! ' . $test . '</p>';
            } else {
                echo "<p id='userText' class='userText'>Hi! Stranger</p>";
            }
            ?>
        </p>

        <button id="logout" name="logout" value="logout"><a href="logout.php"> LogOut</a></button>
        <p id="dissappear" class="dissappear">there is no schedule fo today</p>

        <?php
        if (isset($_GET['date'])) {
            $date = $_GET['date'];
            $pdo = new PDO('mysql:dbname=tutorial;host=mysql', 'tutorial', 'secret', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
            // $queryExecuteUserList="SELECT user_id FROM appointment WHERE date='" . $date . "'";
            $queryExecuteUserList = "SELECT users.userName FROM users RIGHT JOIN appointment ON users.id = appointment.user_id WHERE date='" . $date . "'";

            $resultUserList = $pdo->query($queryExecuteUserList);
            $resultUserList->setFetchMode(PDO::FETCH_ASSOC);
            while ($row = $resultUserList->fetch()) {

                echo `<p>` . $row['userName'] . `</p>`;
            }
        }
        ?>
        <form class="invisible" method="GET">
            <input type="text" id="getDateForm" name="date" ">
            <button type="submit" id="getBtnForm" value="submit"
            "></button>
        </form>


        <!--        <ul class="ul-people dissappear">-->
        <!---->
        <!--            <li class="li-people"><img src="img/office1.png" class="img-profile">-->
        <!--                <p class="people-names">Diana B.</p></li>-->
        <!--            <li class="li-people"><img src="img/office2.png" class="img-profile">-->
        <!--                <p class="people-names">Diana B.</p></li>-->
        <!--        </ul>-->
    </div>
</div>

</body>
</html>


<?php


//session_start();
//$query = 'SELECT * FROM users';
//echo '<table>';
//$result = $pdo->query($query);
//$result->setFetchMode(PDO::FETCH_ASSOC);
//while ($row = $result->fetch()){
//    echo '<tr>';
//    echo '<td>' . htmlspecialchars($row['id']) . ' </td>';
//    echo '<td>' . htmlspecialchars($row['userName']) . ' </td>';
//    echo '<td>' . htmlspecialchars($row['firstName']) . ' </td>';
//    echo '<td>' . htmlspecialchars($row['lastName']) . '</td>';
//    echo '<td>' . htmlspecialchars($row['mailAddress']) . '</td>';
//    echo '</tr>';
//}
//echo '</table>';


if (isset($_POST['submit'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $userName = $_POST['userName'];
    $mailAddress = $_POST['mailAddress'];
    $password = $_POST['password'];

    $inst = "INSERT INTO users(firstName, lastName, userName,mailAddress,password)
VALUES (:firstName,:lastName,:userName,:mailAddress,:password)";

    $queryRun = $pdo->prepare($inst);

    $data = [
        ':firstName' => $firstName,
        'lastName' => $lastName,
        ':userName' => $userName,
        ':mailAddress' => $mailAddress,
        ':password' => $password,

    ];

    $queryExecute = $queryRun->execute($data);


    if ($queryExecute) {
        {
            echo "Inserted Successfully";
        }
    } else {
        echo "Not Inserted";
    }
}


if (isset($_POST['submitapt'])) {
    $user_id = $_POST['user_id'];
    $date = $_POST['date'];


    $instapt = "INSERT INTO appointment(user_id, date)
VALUES (:user_id,:date)";

    $queryRunapt = $pdo->prepare($instapt);

    $dataapt = [
        ':user_id' => $_SESSION['id'],
        ':date' => $date,

    ];

    $queryExecuteapt = $queryRunapt->execute($dataapt);


    if ($queryExecuteapt) {
        {
            echo "Inserted Successfully";
            //header('Location: index.php');
            exit(0);
        }
    } else {
        echo "Not Inserted";
        //header('Location: php.php');
        exit(0);
    }
}
?>


