<!DOCTYPE html>
<html>
<head>
<title>UPDATE</title>
</head>
<body>
<h1>UPDATE</h1>
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
  <p>Modifier l'utilisateur</br>
 Laissez le mot de passe vide si vous ne voulez pas changer votre mot de passe</p>
  <form method = "POST" action = "">
  <input type = "hidden" name = "id" value = "<?php echo $id; ?>">
  NAME : <input type = "text" name = "name" value = "<?php echo $name; ?>"><BR>
  PASSWORD : <input type = "password" name = "password"><BR>
  <input type = "submit" name = "update" value = "modifier">
   </form>

  <?php
  }
}
  }
//-----------UPDATE ACTION ----------------------------
  if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    // Check if field doesn't contain only white spaces
    $passwordCheck = str_replace(' ', '', $password);
    if($passwordCheck!=""){
    $password = md5($password);
    $UpdateQuery = "UPDATE enregistrement SET name ='$name', password = '$password' WHERE id='$id'";
    $conn->query($UpdateQuery);
    echo '<script language="Javascript">';
    echo 'document.location.replace("./update.php")'; // -->
    echo ' </script>';
    }else{
    $UpdateQuery = "UPDATE enregistremnt SET name ='$name' WHERE id='$id'";
    $conn->query($UpdateQuery);
    echo '<script language="Javascript">';
    echo 'document.location.replace("./update.php")'; // -->
    echo ' </script>';
    }
    mysqli_close($conn);
  }
  ?>

</body>
</html>
