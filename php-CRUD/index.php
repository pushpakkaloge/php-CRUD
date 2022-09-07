
<?php
require_once("DB.php");
 if(isset($_POST["submit"])){
   if(!empty($_POST['name'])){
      $Name = $_POST['name'];
      $moNumber = $_POST['number'];
      $Department = $_POST['department'];
      $Salary = $_POST['salary'];
      $Address = $_POST['address'];
      $exp = $_POST['exp'];

      $connectingDB;
      $sql = "INSERT INTO userdata(name,number,department,salary,address,experience) VALUES(:NamE,:moNumbeR,:DepartmenT,:SalarY,:AddresS,:Exp)";
      $stmt = $connectingDB->prepare($sql);
      $stmt->bindValue(':NamE',$Name);
      $stmt->bindValue(':moNumbeR',$moNumber);
      $stmt->bindValue(':DepartmenT',$Department);
      $stmt->bindValue(':SalarY',$Salary);
      $stmt->bindValue(':AddresS',$Address);
      $stmt->bindValue(':Exp',$exp);

      $Execute = $stmt->execute();
      if($Execute){
        echo "<h2>Data added successfully<h2>";
      }else{
        echo "failed to add data";
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
    <title>Insert Into Database</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
<div class="main-div">
<form class="" action="index.php" method="post">
  <label>Name:</label><br>
  <input placeholder="enter your name" type="text" name="name" value=""><br><br>
  <label>Number:</label><br>
  <input placeholder="enter your number" type="text" name="number" value=""><br><br>
  <label for="department">Department:</label><br>
  <input placeholder="enter your Department" type="text" name="department" value=""><br><br>
  <label for="salary">Salary:</label><br>
  <input placeholder="enter your Salary" type="text" name="salary" value=""><br><br>
  <label for="salary">Experience:</label><br>
  <input placeholder="enter your Experience" type="text" name="exp" value=""><br><br>
  <label for="address">Address:</label><br>
  <textarea placeholder="enter your Address" name="address" rows="8" cols="80"></textarea><br><br>

  <input style="background-color:black;color:white;"type="submit" name="submit" value="save data">
<a style="margin-left:20px;" href="viewData.php">View Data</a>
</form>
</div>
  </body>
</html>
