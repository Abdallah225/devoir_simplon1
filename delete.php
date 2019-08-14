<!DOCTYPE html>
<html>
<head>
<title>DELETE</title>
</head>
<body>
<h1>DELETE</h1>
<BR>
  <form method = "POST" action = "">
  ID : <input type = "text" name = "id"><BR>
  <input type = "submit" name = "display" value = "display">
   </form>

  <?php
  include 'config.php';
    //---------- DISPLAY UPDATE FORM----------------------
  if(isset($_POST['display'])){
    $id = $_POST['id'];
    $query = mysqli_query($conn, "SELECT * FROM enregistrement WHERE id = '$id'");
    $rows = mysqli_num_rows($query);
    if($rows!=0){
      while($user = mysqli_fetch_assoc($query)) {
      $name = $user['name'];
  ?>
  <p>DEETE USER WITH THE ID : <?php echo $id; ?></br></p>
  <form method = "POST" action = "">
  <input type = "hidden" name = "id" value = "<?php echo $id; ?>">
  NAME : <input type = "text" name = "name" value = "<?php echo $name; ?>"><BR>
  <input type = "submit" name = "delete" value = "DELETE">
   </form>

  <?php
  }
}
  }
//-----------DELETE ACTION ----------------------------
  if(isset($_POST['delete'])){
    $id = $_POST['id'];
    $deleteQuery = "UPDATE enregistrement SET name ='$name', password = '$password' WHERE id='$id'";
    $conn->query($deleteQuery);
    echo '<script language="Javascript">';
    echo 'document.location.replace("./register.php")'; // -->
    echo ' </script>';
    mysqli_close($conn);
  }
  ?>

</body>
</html>
