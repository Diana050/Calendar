<?php
echo "<h1>This is served with docker</h1>";

//$pdo = new PDO('mysql:dbname=internship;host=localhost', 'root', 'P@$$w0rd!', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
$pdo = new PDO('mysql:dbname=tutorial;host=mysql', 'tutorial', 'secret', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
$query = 'SELECT * FROM users';
echo '<table>';
$result = $pdo->query($query);
$result->setFetchMode(PDO::FETCH_ASSOC);
while ($row = $result->fetch()){
    echo '<tr>';
    echo '<td>' . htmlspecialchars($row['_user']) . ' </td>';
    echo '<td>' . htmlspecialchars($row['userName']) . ' </td>';
    echo '<td>' . htmlspecialchars($row['firstNme']) . ' </td>';
    echo '<td>' . htmlspecialchars($row['lastName']) . '</td>';
    echo '</tr>';
}
echo '</table>';