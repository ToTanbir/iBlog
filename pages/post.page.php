
        <?php
        session_start();
        $id = $_GET['id'];    
        
        $query = $db->prepare("SELECT * FROM post WHERE id=?");
        $query->execute(array($id));
        $result = $query->fetchAll (PDO::FETCH_ASSOC);

        foreach($result as $row){
        $id = $row['id'];
        $title = $row['title'];
        $dis = $row['dis'];
        $author = $row['author'];
        $cat = $row['cat'];
        $count = $row['count'];
        $image = $row['image'];
        ?>

        <img src='image/<?php echo $image;?>' alt="" height="300" width="500"/>
        <h2><?php echo $title;?></h2>
        <p>Category: <?php echo $cat;?> | Post by: <?php echo $author;?> | View: <?php echo $count;?></p>
        <p><?php echo $dis;?></p>
        <h2>All Comment: </h2>
        <?php } ?>



        <?php
        //page_view_count_syestem//
        $statement = $db->prepare("UPDATE post SET count = count+1  WHERE id=?");
        $statement->execute(array($id));
        ?>



        <?php
        $query2 = $db->prepare("SELECT * FROM comment order by id asc");
        $query2->execute();
        $result = $query2->fetchAll(PDO::FETCH_ASSOC);

        foreach($result as $row){
        $post_id = $row['post_id'];
        $auth = $row['author'];
        $comment = $row['comm'];

        ?>
        <h3><?php if($id==$post_id) echo $auth;?></h3>
        <p><?php if($id==$post_id) echo $comment;?></p>
        <?php } ?>

        





        <?php if(@$_SESSION['uid'] > 0) echo'
        <form action="comment" method="post">


        <textarea name="comment" required=" " placeholder="Write a comment..." id="" cols="35" rows="3"></textarea>
        <tr><td><button type="submit" name="post">Comment</button></td></tr>
        <input type="hidden" name="post_id" value="' . $id . '">
            
        </form>';
        ?>
