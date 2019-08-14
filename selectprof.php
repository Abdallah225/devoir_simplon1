<?php
include 'config.php';
$query = mysqli_query($conn, "SELECT * FROM enregistrement");
$rows = mysqli_num_rows($query);

while($prof = mysqli_fetch_assoc($query)) {
  $id = $prof['id'];
  $nom = $prof['name'];
  $prenom = $prof['prenom'];
  $password = $prof ['password'];
echo $id."-".$nom." ".$prenom." ".password."<Br>";

}


mysqli_close($conn);
?>
