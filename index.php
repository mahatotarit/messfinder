<?php
   session_start();
   if(isset($_SESSION['phone'])){
       if(isset($_SESSION['password'])){
          
       }else{
        header("location:loginpage.php");    
       }
   }else{
    header("location:loginpage.php");
   }
?>
<style>
    #main-content .post-content img{
  height: 100%;
}
</style>
<?php include 'mainheader.php'; ?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- post-container -->
                    <div class="post-container">

                    <?php
                      include 'php/config.php';
                      $get_data_sql = "SELECT * FROM allmess";
                      $get_data_result = mysqli_query($conn,$get_data_sql);
                      if(mysqli_num_rows($get_data_result)){
                        while($row1 = mysqli_fetch_assoc($get_data_result)){

                    ?>
                        <div class="post-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <a class="post-img" href=""><img src="mess_image/<?php echo $row1['imagename']; ?>" alt="messimage"/></a>
                                </div>
                                <div class="col-md-8">
                                    <div class="inner-content clearfix">
                                        <h3><a href=''><?PHP echo $row1['messname'];?></a></h3>
                                        <div class="post-information">
                                            <span>
                                                <i class="fa fa-tags" aria-hidden="true"></i>
                                                <a href='category.php'><?PHP echo $row1['bedavailable'];?></a>
                                            </span>
                                            <span>
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                <a href='author.php'><?PHP echo $row1['messtype'];?></a>
                                            </span>
                                            <span>
                                            <p style="color:#337ab7; display:inline-block; font-weight:bold;">&#x20B9;</p>
                                                <?PHP echo $row1['price'];?>
                                            </span>
                                        </div>
                                        <p class="description">
                                        <?PHP  echo $row1['messlocation']; ?>
                                         </p>
                                        <a class='read-more pull-right' href=''>read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php }
                      }
                        ?>


                        <ul class='pagination'>
                            <li class="active"><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                        </ul>
                    </div><!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
