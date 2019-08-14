
<html>
<head>
<title>REGISTRATION</title>
</head>
<body>
  <p>Registration form</p>
  <form method = "POST" action = "">
  nom : <input type = "text" name = "name"><BR>
  prenom : <input type = "text" name = "prenom"><BR>
  password : <input type = "password" name = "password"><BR>
  <input type = "submit" name = "REGISTRATION" value = "REGISTRATION">
   </form>

  <?php
  if(isset($_POST['REGISTRATION'])){
    include 'config.php';
      $name = addslashes($_POST ['name']);
      $prenom = addslashes($_POST ['prenom']);
      $password = md5($_POST ['password']);
      $query = mysqli_query($conn, "SELECT * FROM enregistrement WHERE name ='$name'");
      $rows = mysqli_num_rows($query);
      if($rows!=1){
      $array = $query->fetch_assoc();
      mysqli_query($conn, "INSERT INTO enregistrement (id,name,prenom,password,date) VALUES ('','$name','$prenom','$password','$datepost')");

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

</body>
</html>
