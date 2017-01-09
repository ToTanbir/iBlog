<?php 
session_start();
	include('config.php');
 ?>

<?php
		$id = $_POST['post_id'];

		if(isset($_POST['post'])){
		$comment = $_POST['comment'];

		try{
		$statement = $db->prepare("insert into comment (post_id,author,comm) values (?,?,?)");
		$statement->execute(array($id,$_SESSION['uname'],$comment));
		}
		catch(Exception $e){
		$error_message = $e->getmessage();
		}
		}
		?>
<?php
 	header('location: post?id=' . $id);
?>