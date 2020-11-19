<?php
$host = 'localhost';
$username = 'lab5_user';
// $username = root;
$password = 'password123';
//$password = '';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!-- <ul>
<?php foreach ($results as $row): ?>
  <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
<?php endforeach; ?>
</ul> -->


<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
  if(isset($_GET['country']) && !empty($_GET['country'])){
    $country = filter_input(INPUT_GET, 'country', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $found = false;
    $stmt = $conn->query("SELECT * FROM countries WHERE name like '%$country%'");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <ul>
    <?php foreach ($results as $row): ?>
      <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
    <?php endforeach;?>
    </ul>
    <?php
  }
}