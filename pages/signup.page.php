<?php
  if(isset($_POST['post_form'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $pass = $_POST['password'];

  try{
  $md5pass = md5($pass);
  $statement = $db->prepare("insert into reg (name,email,password) values (?,?,?)");
  $statement->execute(array($name,$email,$md5pass));
  $sucess = "Register Susscefully";
  }
  catch(Exception $e){
  $error_message = $e->getmessage();
  }
  }
?>
      <form action="" method="post">
      <table>
      <tr>
      <td>Name : </td>
      <td><input type="text" required="" name="name" id=""></td>
      </tr>
      <tr>
      <td>email : </td>
      <td><input type="email" required="" name="email" id=""></td>
      </tr>
      <td>password :</td>
      <td><input type="password" required="" name="password" id=""></td>
      </tr>
      <tr>

      <td><input type="submit" value="signup" name="post_form" style="cursor: pointer;"></td>
        
