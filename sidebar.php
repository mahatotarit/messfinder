<?php
//    if(isset($_SESSION['phone'])){
//        if(isset($_SESSION['password'])){
          
//        }else{
//         header("location:loginpage.php");    
//        }
//    }else{
//     header("location:loginpage.php");
//    }
?>
<div id="sidebar" class="col-md-4">
    <!-- search box -->
    <!-- <div class="search-box-container">
        <h4>Search</h4>
        <form class="search-post" action="search.php" method ="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search .....">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-danger">Search</button>
                </span>
            </div>
        </form>
    </div> -->
    <!-- /search box -->
    <!-- recent posts box -->

    <div class="recent-post-container">
        <h4>Recent Posts</h4>
    
    <?php 
    include 'php/config.php';
      $recent_post_sql = "SELECT * FROM showpost ORDER BY ID DESC LIMIT 4";
       $recent_post_result = mysqli_query($conn,$recent_post_sql) or die("query failed");

       if(mysqli_num_rows($recent_post_result)){
        while($recent_row = mysqli_fetch_assoc($recent_post_result)){
     ?>

            <div class="recent-post">
            <a class="post-img" style="height:80px;">
                <img src="mess_image/<?php echo $recent_row['messimage1']; ?>" alt="" style="height:100%; width:100%;"/>
            </a>
            <div class="post-content">
                <h5><a href=""><?PHP echo $recent_row['messname']; ?></a></h5>
                <span>
                    <i class="fa fa-tags" aria-hidden="true"></i>
                    <a href='category.php'><?PHP echo $recent_row['bedavailable']; ?></a>
                </span>
                <span>
                <i class="fa fa-user" aria-hidden="true"></i>
                    <?PHP echo $recent_row['messtype']; ?>
                </span>
                <a class="read-more" href="preview.php?id=<?php echo $recent_row['id']; ?>">read more</a>
            </div>
        </div>

    <?PHP    }
       }
    ?>
    <!-- /recent posts box -->
    </div>
</div>
