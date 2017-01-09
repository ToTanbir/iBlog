<?php
    $i = 0;
    $query = $db->prepare("SELECT * FROM post order by id desc");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach($result as $row){
            $i++;
            $id = $row['id'];
            $title = $row['title'];
            $dis = $row['dis'];
            $author = $row['author'];
            $cat = $row['cat'];
            $count = $row['count'];
            $image = $row['image'];

?>

    <img src='image/<?php echo $image;?>' alt="" height="300" width="500"/>  
    <h2><a href="post?id=<?= $row['id'];?>"><?php echo $title;?></a></h2>
    <p>Category: <?php echo $cat;?> |  Post by: <?php echo $author;?> | View: <?php echo $count;?></p>
    <p><?php $pieces = explode(" ",$row['dis']);
    $post = implode(" ", array_splice($pieces, 0,15));
    $post = $post."...";
    echo $post;?> <a href="post?id=<?= $row['id'];?>">Read More</a></p>


    
    <?php if ($i==6){
    break;
    } 

    } ?>