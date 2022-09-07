
<?php
$updateId = $_GET['id'];

require_once("DB.php");
 if(isset($_POST["submit"])){
   if(!empty($_POST['name'])){
      $Name = $_POST['name'];
      $moNumber = $_POST['number'];
      $Department = $_POST['department'];
      $Salary = $_POST['salary'];
      $Address = $_POST['address'];

      $connectingDB;
      $sql = "UPDATE userdata set name='$Name',number='$moNumber',department='$Department',salary='$Salary',address='$Address' WHERE id=".$updateId;

      $Execute = $connectingDB->query($sql);
      if($Execute){
        echo "<script>window.open('viewData.php?id=updated successfully','_self')</script>";
      }else{
        echo "failed to Update data";
      }
   }else {
     echo "Please add at least Name";
   }
 }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Update Database</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <?php
$connectingDB;
$sql = "SELECT * FROM userdata WHERE id=".$updateId;
$stmt = $connectingDB->query($sql);
while($dataRows=$stmt->fetch()){
  $name = $dataRows["name"];
  $number = $dataRows["number"];
  $department = $dataRows["department"];
  $salary = $dataRows["salary"];
  $address = $dataRows["address"];
}
?>
<div class="main-div">
  
<form class="" action="Update.php?id=<?php echo $updateId ?>" method="post">
  <label>Name:</label><br>
  <input placeholder="enter your name" type="text" name="name" value=<?php echo $name ?>><br><br>
  <label>Number:</label><br>
  <input placeholder="enter your number" type="text" name="number" value= <?php echo $number ?>><br><br>
  <label for="department">Department:</label><br>
  <input placeholder="enter your Department" type="text" name="department" value= <?php echo $department ?>><br><br>
  <label for="salary">Salary:</label><br>
  <input placeholder="enter your Salary" type="text" name="salary" value= <?php echo $salary ?>><br><br>
  <label for="address">Address:</label><br>
  <textarea placeholder="enter your Address" name="address" rows="8" cols="80" ><?php echo $address ?></textarea><br><br>

  <input style="background-color:black;color:white;"type="submit" name="submit" value="update data">
<a style="margin-left:20px;" href="viewData.php">View Data</a>
</form>
</div>

  </body>
</html>
