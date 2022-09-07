
<?php
require_once("DB.php");

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>View Database</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
<div class="main-div">
<button type="button" onclick="location.href='index.php'" name="button">Add data</button>
<h2><?php
if(isset($_GET['id'])){
echo $_GET['id'];
}
?>
</h2>


<fieldset>
<form class="" action="viewData.php" method="post">
  <input type="text" name="search" value="" placeholder="Search by Id/Name">
  <input style="color:White;background-color:black;font-weight:bold;" type="submit" name="searchButton" value="Search data">
</form>
</fieldset>
<?php
if(isset($_POST['searchButton'])){

$Search = $_POST['search'];

$connectingDB;

$sql = "SELECT * FROM userdata WHERE id=:searcH OR name= :searcH ;";

$stmt = $connectingDB->prepare($sql);
$stmt->bindValue(":searcH",$Search);
$stmt->execute();
while($DataRows = $stmt->fetch()){
  $id = $DataRows["id"];
  $name = $DataRows["name"];
  $moNumber = $DataRows["number"];
  $department = $DataRows["department"];
  $salary = $DataRows["salary"];
  $address = $DataRows["address"];

  $bgcolor='red';
   ?>
   <table width="100%">
   <tr style="background-color: orange;COLOR:White;">
     <th>id</th>
     <th>name</th>
     <th>Number</th>
     <th>department</th>
     <th>Salary</th>
     <th>address</th>
     <th>Search again</th>
   </tr>

      <tr >
        <td><?php echo $id ?></td>
        <td><?php echo $name ?></td>
        <td><?php echo $moNumber ?></td>
        <td><?php echo $department ?></td>
        <td><?php echo $salary ?></td>
        <td><?php echo $address ?></td>
        <td> <a href="viewData.php">Search again</a> </td>
   </tr>
</table>
<?php
} //while loop
} //isset search button
?>






<table width="100%">
  <caption><b><h1>View From database</h1></b></caption>
  <tr style="background-color:orange;color:white;">
    <td>Id</td>
    <td>Name</td>
    <td>Number</td>
    <td>Department</td>
    <td>Salary</td>
    <td>experience</td>
    <td>Address</td>
    <td>Update</td>
    <td>Delete</td>
  </tr>

  <?php
$connectingDB;
$sql = "SELECT * FROM userdata";
$stmt = $connectingDB->query($sql);
while($DataRows=$stmt->fetch()){
  $id = $DataRows["id"];
  $name = $DataRows["name"];
  $moNumber = $DataRows["number"];
  $department = $DataRows["department"];
  $exp = $DataRows['experience'];
  $salary = $DataRows["salary"];
  $address = $DataRows["address"];



   ?>
   <tr style = <?php if($exp>=5){echo "background-color:#9ACD32";}?> >
     <td><?php echo $id ?></td>
     <td><?php echo $name ?></td>
     <td><?php echo $moNumber ?></td>
     <td><?php echo $department ?></td>
     <td><?php echo $salary ?></td>
     <td><?php echo $exp ?> Years</td>
     <td><?php echo $address ?></td>
     <td> <a href="Update.php?id=<?php echo $id ?>">Update</a> </td>
     <td> <a href="Delete.php?id=<?php echo $id ?>">Delete</a> </td>
   </tr>
<?php } ?>
</table>
</div>
  </body>
</html>
