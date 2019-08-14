<!doctype html>
<html>
    <head>
        <title>enregistrement</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <bady>
       <form method = "POST" action = "">
  <div class="container">
    <h1>ENREGISTREMENT</h1>
    <hr>
    <label for="email"><b>Nom</b></label>
    <input type="text" placeholder="Entrer votre nom" name="name" required>
    <label for="email"><b>Prenom</b></label>
    <input type="text" placeholder="Entrer votre prenom" name="prenom" required>  
    <label for="psw"><b>Mot de passe</b></label>
    <input type="password" placeholder="Entrer votre votre mot de passe" name="password" required>
    <hr>
   <input type = "submit" name = "REGISTRATION" value = "REGISTRATION">
  </div>
</form>
        <?php
          if(isset($_POST['REGISTRATION'])){
            include 'config.php';
              $password = md5($_POST ['password']);
              $name = addslashes($_POST ['name']);
              $prenom = addslashes($_POST ['prenom']);
              $query = mysqli_query($conn, "SELECT * FROM enregistrement");
              $rows = mysqli_num_rows($query);
              if($rows!=1){
              $array = $query->fetch_assoc();
              mysqli_query($conn, "INSERT INTO enregistrement (id,name,prenom,password,date) VALUES ('','$name','$prenom','$password','$datepost')");


              echo "Félicitation votre compte a été crée";
              echo "<br>";
              echo "Vous pouvez utiliser votre compte dès à present";

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

    </bady>
</html>
