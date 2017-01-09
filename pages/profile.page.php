<?php
ob_start();
	session_start();

	if ($_SESSION['name'] != "xyz") {
			header('location: login');
		}else{
			include('config.php');
	    }	
?>

<?php 
	if (isset($_POST['post_form'])) {
			$title = $_POST['title'];
			$dis = $_POST['Description'];
			$cat = $_POST['cat'];

			try{
				//file_size
				$file_size = (filesize($_FILES['image']['tmp_name']) * .0009765625) * .0009765625; //mb
				//file_size_check
				if($file_size >=2){
					throw new Exception("error! file size upto 2mb");
				}

				//auto increment
				$statement = $db->prepare("show table status like 'post'");
				$statement->execute();

				$result = $statement->fetchAll();
				foreach($result as $row)
				$new_id_auto = $row[10];

			//image name change
			$upload_file_name = $_FILES["image"]["name"];
			$file_upload = substr($upload_file_name,0, strripos($upload_file_name, "."));
			$file_exe = substr($upload_file_name, strripos($upload_file_name, "."));
			$file_new_name = $new_id_auto.$file_exe;

			//file extensions chaking
			if(($file_exe != ".png") && ($file_exe != ".jpg") && ($file_exe != "jpeg") && ($file_exe != ".gif") && ($file_exe != ".JPG")){
				throw new Exception("Error! must be choose 'png' , 'jpg' , 'jpeg' or 'gif' file");
			}


			$count = "0";

			$statement = $db->prepare("insert into post (user_id,title,dis,author,cat,count,image) values (?,?,?,?,?,?,?)");
            $statement->execute(array($_SESSION['uid'],$title,$dis,$_SESSION['uname'],$cat,$count,$file_new_name));
			
            //file upload root
            move_uploaded_file($_FILES["image"]["tmp_name"] , "image/".$file_new_name);
			}
			catch(Exception $e){
				$error_message = $e->getmessage();
			}
		}
?>

<h3>Post Manage</h3>
 		<table width="55%" border="1px">
 			<tr>
 				<th>Title</th>
 				<th>Descripton</th>
 				<th>Tag</th>
 				<th>image</th>
 				<th width="17%">Action</th>
 			</tr>
 				<?php
 					$query = $db->prepare("SELECT * FROM post where user_id=? order by id desc");
 					$query->execute(array($_SESSION['uid']));
 					$result = $query->fetchAll(PDO::FETCH_ASSOC);

 					foreach($result as $row){
 						$id = $row['id'];
 						$title = $row['title'];
 						$des = $row['dis'];
 						$cat = $row['cat'];
 						$image = $row['image'];
 				
 				?>
 			<tr>
 			    <td><?php echo $title;?></td>
 			    <td><?php echo $des;?></td>
 			    <td><?php echo $cat;?></td>
 			    <td><img src='image/<?php echo $image;?>' alt="" height="100" width="100"/></td>
 			    <td><a href="edit?edit_post=<?= $row['id'];?>">Edit</a> || <a onclick="return confirm('Are You Sure Delete This Post ?')" href="delete?post_del=<?= $row['id'];?>">Delete</a></td>	
 			</tr>
 			<?php } ?>
 		</table>
		

		<h3>Post Right</h3>
		<?php
		if(isset($sucess)){
		echo "$sucess";
		}
		?>

		<form action="" method="post" enctype="multipart/form-data">
		<table>	
		<tr>
		<td><label>Title :</label></td>
		<td><input required="" class="" placeholder="Title" name="title" id=""></td>
		</tr>
		<tr>

		<td><label>post :</label></td>
		<td><textarea required="" class="form-control" placeholder="Description..." name="Description" id="" rows="3"></textarea>	
		</td>			

		</tr>
		<td><label>Select Tags</label></td>
		<td><select required class="cat" name="cat">
		<option value="">select cat..</option>
		<?php
		$query = $db->prepare("SELECT * FROM cat");
		$query->execute();
		$result = $query->fetchAll(PDO::FETCH_ASSOC);

		foreach ($result as $row){
		$cat_name = $row['cate'];

		?>
		<option value="<?php echo $cat_name;?>"><?php echo $cat_name;?></option>

		<?php } ?>
		</select></td>
		<tr>
		<td><label>Select Image</label></td>
		<td><input required="" type="file" name="image"></td>
		</tr>
		<td><input type="submit" name="post_form" class="btn btn-primary pull-left"></td>
		
		</form>
