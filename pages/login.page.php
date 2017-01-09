<?php
    
    if (isset($_POST['login'])){
      $useremail = $_POST['email'];
      $Password = $_POST['password'];
    try{
      $md5_pass= md5($Password);
      $query = $db->prepare("SELECT * FROM reg WHERE email=? AND password=?");
      $query->execute(array($useremail,$md5_pass));
      $result = $query->fetchAll (PDO::FETCH_ASSOC);
    foreach ($result as $row) {
          $member_id = $row['id'];
        }
        $number = $query->rowcount();
        if ($number > 0){
          session_start();
          $_SESSION['name']="xyz";
          $_SESSION['uid'] = $row['id'];
          $_SESSION['uname'] = $row['name'];
          header('location: profile?page_view='.$member_id);
        }
        else{
         throw new Exception("user name and password not valid");
        }
      }
        catch(Exception $e){
          $error_message = $e->getmessage();
        }
      }
 ?>

    <form action="" method="post"> 
  <?php
  if (isset($error_message)){
  echo "$error_message";
  }
  ?>     
  <table>
  <tr>
  <td>Email : </td>
  <td><input type="email" required name="email" id=""></td>
  </tr>
  <tr>
  <td>Password : </td>
  <td><input type="password" required name="password" id=""></td>
  </tr>
  <td><input type="submit" value="login" name="login" style="cursor: pointer;"></td>