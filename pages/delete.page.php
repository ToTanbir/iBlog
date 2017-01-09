<?php
	include("config.php");
?>

<?php
	$id = $_GET['post_del'];

	$query = $db->prepare("DELETE FROM post WHERE id=?");
	$query->execute(array($id));
	header('location: profile');


?>