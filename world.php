<?php

header('Access-Control-Allow-Origin: http://127.0.0.1:5500/index.html');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type, X-Auth-Token, Origin, Authorization');

$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);



if ($_SERVER['REQUEST_METHOD']==='GET'){
  if((!empty($_GET['country'])){
    $ctry=filter_var($_GET['country'], FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES);
    $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '$ctry';");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}

?>
<ul>
<?php foreach ($results as $row): ?>
  <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
<?php endforeach; ?>
</ul>
