<!DOCTYPE html>
<html>
<head>
<title>DISPLAY HTML</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>DISPLAY HTML</h1>
<BR>
<form method = "POST" action = "">
<select name ="form">
<option value = "">Selectionner</option>
<option value = "login">supprimer</option>
<option value = "reg">modifier</option>
</select>
<input type = "submit" name = "DISPLAY" value = "Valider">
 </form>

  <?php
    //---------- DISPLAY LOGIN FORM----------------------
  if(isset($_POST['DISPLAY'])){
    $form = $_POST['form'];
    if($form=="login"){
  ?>
  <p>modifier</p>
  <form method = "POST" action = "">
  <div class="container">
    <hr>
    <label for="email"><b>Nom</b></label>
    <input type="text" placeholder="Entrer votre nom" name="name" required>
    <label for="email"><b>Prenom</b></label>
    <input type="text" placeholder="Entrer votre prenom" name="prenom" required>  
    <label for="psw"><b>Mot de passe</b></label>
    <input type="password" placeholder="Entrer votre votre mot de passe" name="password" required>
    <hr>
      <input type = "submit" name = "LOGIN" value = "modifier">
  </div>
   </form>

  <?php
    }
  }
  ?>

  <?php
  //---------- DISPLAY REGISTRATION FORM----------------------
  if(isset($_POST['DISPLAY'])){
    $form = $_POST['form'];
    if($form=="reg"){
  ?>
  <p>Registration form</p>
  <form method = "POST" action = "">
  NAME : <input type = "text" name = "name"><BR>
  PASSWORD : <input type = "password" name = "password"><BR>
  <input type = "submit" name = "REGISTRATION" value = "REGISTRATION">
   </form>

  <?php
    }
  }
  ?>

  <?php
  include 'config.php';
  if(isset($_POST['LOGIN'])){
//- GET DATA
    $name = addslashes($_POST ['name']);
    $password = md5($_POST ['password']);

    $query = mysqli_query($conn, "SELECT * FROM enregistrement WHERE password='$password' AND name ='$name' OR 1 = 1'");
    $rows = mysqli_num_rows($query);
          if($rows==1){
          $array = $query->fetch_assoc();
          session_start();
          $_SESSION['logged_in']= true;
          $_SESSION['id'] = $array['id'];
          $_SESSION['name'] = $array['name'];
          echo '<script language="Javascript">';
          echo 'document.location.replace("./page.php")'; // -->
          echo ' </script>';
          }else{
          echo "</center>";
          echo "<font color = 'red'>";
  	      echo "Unknown user";
          echo "</font>";
          echo "<br>";
          echo "</center>";
          }

  }
  if(isset($_POST['REGISTRATION'])){
    include 'config.php';
      $password = md5($_POST ['password']);
      $name = addslashes($_POST ['name']);

      $query = mysqli_query($conn, "SELECT * FROM enregistrement WHERE name ='$name'");
      $rows = mysqli_num_rows($query);

      if($rows!=1){
      mysqli_query($conn, "INSERT INTO enregistrement (id,name,password,date) VALUES ('','$name','$prenom','$password','$datepost')");

      echo "Congratulation now you have an account";
      echo "<br>";
      echo "Now you can log into your account";
      }else{
      echo "User already exists click";
      echo "<br><b>";
      echo "<font color = 'green'>";
      echo "<a href = 'login.php'>";
      echo "Here";
      echo "</b></a>";
      echo "</font>";
      echo " to log into your account.";
      }
      mysqli_close($conn);
    }
  ?>

  <?php
  //---------- DISPLAY USER TABLE----------------------
  include 'config.php';
  if(isset($_POST['DISPLAY'])){
    $form = $_POST['form'];
    if($form=="user"){
    $query = mysqli_query($conn, "SELECT * FROM enregistrement");
    $rows = mysqli_num_rows($query);
    if($rows!=0){
  ?>
  <p>USERS :<?php echo $rows;?> </p>
  <table>
  <tr><td><B>ID</B></td><td><B>NOM</B></td><td><B>PASSWORD</B></td></tr>
  <?php
  while($user = mysqli_fetch_assoc($query)) {
    $id = $user['id'];
    $name = $user['name'];
    $password = $user['password'];
  ?>
  <tr><td><?php echo $id ;?></td><td><?php echo $name ;?></td><td><?php echo $password;?></td></tr>
  <?php
  }
  ?>
<table>
  <?php
}else{
  echo "<center>";
  echo "No data";
  echo "</center>";
}
  }
  mysqli_close($conn);
}

  ?>



</body>
</html>
