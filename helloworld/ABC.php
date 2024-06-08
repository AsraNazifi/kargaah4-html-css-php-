<?php
session_start();
require_once 'login.php';
$db = new mysqli($db_hostname,$db_username,$db_password, $db_database);
if ($db->connect_error)
{
  echo "<script>alert('Failed to connect to MySQL: " . $db->connect_error."')</script>";
}
$userid=$_SESSION['userid'];

$query= "SELECT * FROM likelist WHERE user = '$userid'";
$result = $db->query($query);
?>


  <?php include 'menu.php'; ?>

            <?php            
              if ($result->num_rows==0) {
                echo '<tr><td colspan="3">no record</td></tr>';
              }else{
                while ($row=$result->fetch_assoc()) {
                  $itemid=$row['item'];
                  $ritem=$db->query("SELECT * FROM itemlist WHERE id = '$itemid'");
                  $r=$ritem->fetch_assoc();
                  $ss1='<tr><td><time datetime="'.$r['date'].'">'.$r['date'].'<time></td><td><a href="'.$r['url'].'" target="_blank">'.$r['name'].'</a></td><td>'.$r['price'].'</td></tr>';
                  echo $ss1;
                }
              }

              echo "<tr><th colspan='3'>My Post List</th></tr>";
              $rp=$db->query("SELECT * FROM itemlist WHERE owner = '$userid'");
              if ($rp->num_rows==0) {
                echo '<tr><td colspan="3">no record</td></tr>';
              }else{
                while ($r=$rp->fetch_assoc()) {
                  $ss1='<tr><td><time datetime="'.$r['date'].'">'.$r['date'].'<time></td><td><a href="'.$r['url'].'" target="_blank">'.$r['name'].'</a></td><td>'.$r['price'].'</td></tr>';
                  echo $ss1;
                }
              }

              echo "<tr><th colspan='3'>My TMP List</th></tr>";
              $rp=$db->query("SELECT * FROM tmplist WHERE user = '$userid'");
              if ($rp->num_rows==0) {
                echo '<tr><td colspan="3">no record</td></tr>';
              }else{
                while ($r=$rp->fetch_assoc()) {
                  $itemid=$r['item'];
                  $src="sample.php?item=$itemid";
                  $ss1='<tr><td><time datetime="'.$r['day'].'">'.$r['day'].'<time></td><td><a href="'.$src.'" target="_blank">'.$r['title'].'</a></td><td>'.$r['price'].'</td></tr>';
                  echo $ss1;
                }
              }
            ?>

        
