<?php
	require_once 'includes/header.inc';
?>

<?php

	if(isset($_POST['post_edit'])){
		$title = $_POST['title'];
		$dis = $_POST['description'];
		$cat = $_POST['cat'];
		$id = $_GET['edit_post'];

		try{
			$statement = $db->prepare("UPDATE post SET title=?, dis=?, cat=?  WHERE id=?");
			$statement->execute(array($title,$dis,$cat,$id));

			header('location: profile');
		}
		catch(Exception $e){
			$error_message =$e->getmessage();
		}
	}
?>


<?php
	$id = $_GET['edit_post'];
	$query = $db->prepare ("SELECT * FROM post where id=?");
	$query->execute(array($id));
	$result = $query->fetchAll (PDO::FETCH_ASSOC);

	foreach ($result as $row){
		$old_title = $row['title'];
		$old_dis = $row['dis'];
		$old_cat = $row['cat'];

	}
?>

	<form action="" method="post" enctype="multipart/form-data">
		<table>	
		<tr>
		<td><label>Title :</label></td>
		<td><input value="<?php echo "$old_title";?>" required="" class="" placeholder="Title" name="title" id=""></td>
		</tr>
		<tr>

		<td><label>post :</label></td>
		<td><textarea required="" class="form-control" placeholder="Description..." name="description" id="" rows="3"><?php echo "$old_dis";?></textarea>	
		</td>			

		</tr>
		<td><label>Select Tags</label></td>
		<td><select required class="cat" name="cat">
		<option value=""><?php echo "$old_cat";?></option>
		<?php
		$query = $db->prepare("SELECT * FROM cat");
		$query->execute();
		$result = $query->fetchAll(PDO::FETCH_ASSOC);

		foreach ($result as $row){
		$cat_name = $row['cate'];

		?>
		<option value="<?php echo "$cat_name";?>"><?php echo "$cat_name";?></option>

		<?php } ?>
		</select></td>

		<tr>
		<td><input type="submit" name="post_edit" class="btn btn-primary pull-left"></td>

<?
	require_once 'includes/footer.inc';
?>