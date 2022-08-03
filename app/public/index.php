

<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="calendar.css">
    <script src="app.js" defer></script>
    <script src="moment.min.js" ></script>
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


                    <tr >

                        <td class="purple day"></td>
                        <td class="purple day"></td>
                        <td class="purple day"></td>
                        <td class="purple day"></td>
                        <td class="purple day"></td>
                        <td class="purple day"></td>
                        <td class="purple day"></td>
                    </tr>
                    <tr >
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
                    <tr >
                        <td class="empty day"></td>
                        <td class="empty day"></td>
                        <td class="empty day"></td>
                        <td class="empty day"></td>
                        <td class="empty day"></td>
                        <td class="empty day"></td>
                        <td class="empty day"></td>
                    </tr>
                    <tr >
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

        <div class="form-popup" id="signinForm" >
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

        <p class="people-text" id="people-text">Hi! Stranger</p>
        <p  id="dissappear"  class="dissappear">there is no schedule fo today</p>

        <ul class="ul-people dissappear"    >

            <li class="li-people"><img src="img/office1.png" class="img-profile"><p class="people-names">Diana B.</p></li>
            <li class="li-people"><img src="img/office2.png" class="img-profile"><p class="people-names">Diana B.</p></li>
        </ul>
    </div>
</div>

</body>
</html>




<?php

$pdo = new PDO('mysql:dbname=tutorial;host=mysql', 'tutorial', 'secret', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);


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



if(isset($_POST['mail']) && isset($_POST['psw'])){
    $mail=$_POST['mail'];
    $psw=$_POST['psw'];
    $userName=$_POST['userName'];

    $sql="select * from users where mailAddress='".$mail."'AND password='".$psw."'";


    $result1=$pdo->query($sql);
    $result1->setFetchMode(PDO::FETCH_ASSOC);
    $row = $result1->fetch();
    if($row!=null){
        echo " You Have Successfully Logged in " . $userName;
        exit();
    }
    else{
        echo " You Have Entered Incorrect Password";
        exit();
    }

}

if(isset($_POST['submit'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $userName = $_POST['userName'];
    $mailAddress = $_POST['mailAddress'];
    $password = $_POST['password'];

    $inst = "INSERT INTO users(firstName, lastName, userName,mailAddress,password)
VALUES (:firstName,:lastName,:userName,:mailAddress,:password)";

    $queryRun = $pdo->prepare($inst);

    $data=[
    ':firstName' => $firstName,
    'lastName' => $lastName,
    ':userName' => $userName,
    ':mailAddress'=> $mailAddress,
    ':password' => $password,

    ];

    $queryExecute = $queryRun->execute($data);


    if ($queryExecute) {
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


