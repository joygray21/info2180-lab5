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



<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
  if (isset($_GET['country']) && !empty($_GET['country'])){
    $country = filter_input(INPUT_GET, 'country', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    // $found = false;
    $stmt = $conn->query("SELECT * FROM countries WHERE name like '%$country%'");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($results)){
      ?>
      <!-- <ul> -->
      <table>
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Continent</th>
          <th scope="col">Independence</th>
          <th scope="col">Head of State</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($results as $row): ?>
        <!-- <li></li> -->
        <tr>
          <td><?= $row['name'];?></td>
          <td><?= $row['continent'];?></td>
          <td><?= $row['independence_year'];?></td>
          <td><?= $row['head_of_state'];?></td>
        </tr>
      <?php endforeach;?>
      <!-- </ul> -->
      </tbody>
      </table>

      <?php  
    }
    else {
      ?>
      <!-- <ul> -->
        <!-- <li></li> -->
      <!-- </ul> -->
      <table>
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Continent</th>
            <th scope="col">Independence</th>
            <th scope="col">Head of State</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>None</td>
            <td>None</td>
            <td>None</td>
            <td>None</td>
          </tr>
        </tbody>
      </table>

      <?php
    }
  }
  else {?>
    <!-- <ul> -->
    <table>
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Continent</th>
          <th scope="col">Independence</th>
          <th scope="col">Head of State</th>
        </tr>
      </thead>
    <tbody>
    <?php foreach ($results as $row): ?>
      <!-- <li></li> -->
      <tr>
        <td><?= $row['name'];?></td>
        <td><?= $row['continent'];?></td>
        <td><?= $row['independence_year'];?></td>
        <td><?= $row['head_of_state'];?></td>
      </tr> 
    <?php endforeach; ?>
    <!-- </ul> -->
    </tbody>
    </table>

    <?php
  }
}
