
<?php
$updateId = $_GET['id'];

require_once("DB.php");
      $connectingDB;
      $sql = "DELETE FROM userdata WHERE id=".$updateId .";";

      $Execute = $connectingDB->query($sql);
      if($Execute){
        echo "<script>window.open('viewData.php?id=Deleted successfully','_self')</script>";
      }else{
        echo "failed to delete data";
      }

 
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Delete data</title>
   </head>
   <body>

   </body>
 </html>
