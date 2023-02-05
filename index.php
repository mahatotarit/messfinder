<?php
session_start();
if (isset($_SESSION['phone'])) {
    if (isset($_SESSION['password'])) {
    } else {
        header("location:loginpage.php");
    }
} else {
    header("location:loginpage.php");
}
?>
<style>
    #main-content .post-content img {
        height: 100%;
    }
</style>
<?php
include 'mainheader.php';
$pagenation_limit = 2;
if (isset($_GET['page'])) {
    $current_page = $_GET['page'];
} else {
    $current_page = 1;
}
$page_offset = ($current_page - 1) * $pagenation_limit;

?>
<div id="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <div class="post-container">

                    <?php
                    include 'php/config.php';
                    $get_data_sql = "";

                    //   home page search button 
                    //   home page search button 
                    if (isset($_GET['s_b'])) {
                        $home_page_search_input = $_GET['home_search'];
                        $get_data_sql = "SELECT * FROM showpost WHERE CONCAT (messname,messlocation) LIkE '%$home_page_search_input%'";
                    } else {
                        $get_data_sql = "SELECT * FROM showpost LIMIT {$page_offset} , {$pagenation_limit}"; // default sql query.
                    }

                    $get_data_result = mysqli_query($conn, $get_data_sql) or die("query failed 39");
                    if (mysqli_num_rows($get_data_result)) {
                        while ($row1 = mysqli_fetch_assoc($get_data_result)) {

                    ?>
                            <div class="post-content">
                                <div class="row">
                                    <div class="col-md-4">
                                        <?php
                                        $image_name = $row1['imagename'];
                                        $image_array = explode(",", $image_name);
                                        ?>
                                        <a class="post-img" href=""><img src="mess_image/<?php echo $image_array[0]; ?>" alt="messimage" /></a>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="inner-content clearfix">
                                            <h3><a href=''><?PHP echo $row1['messname']; ?></a></h3>
                                            <div class="post-information">
                                                <span>
                                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                                    <a href='category.php'><?PHP echo $row1['bedavailable']; ?></a>
                                                </span>
                                                <span>
                                                    <i class="fa fa-user" aria-hidden="true"></i>
                                                    <a href='author.php'><?PHP echo $row1['messtype']; ?></a>
                                                </span>
                                                <span>
                                                    <p style="color:#337ab7; display:inline-block; font-weight:bold;">&#x20B9;</p>
                                                    <?PHP echo $row1['price']; ?>
                                                </span>
                                            </div>
                                            <p class="description">
                                                <?PHP echo $row1['messlocation']; ?>
                                            </p>
                                            <a class='read-more pull-right' href='preview.php?id=<?php echo $row1['id']; ?>'>read more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    <?php }
                    } else {
                        echo "<h3 style='text-align:center; padding:5px;'>No Record Found</h3>";
                    }


                    // pagenation code 
                    // pagenation code 
                    // pagenation code 

                    $pagenation_sql1 = "SELECT * FROM showpost";
                    $pagenation_result = mysqli_query($conn, $pagenation_sql1);
                    if (mysqli_num_rows($pagenation_result)) {
                        $pagenation_total_records = mysqli_num_rows($pagenation_result);

                        $pagenation_total_pages = ceil($pagenation_total_records / $pagenation_limit);
                        // page numberr start
                        echo "<ul class='pagination'>";
                        if ($current_page > 1) {
                            echo "<li><a href='index.php?page=" . ($current_page - 1) . "'>Pre</a></li>";
                        }
                        for ($i = 1; $i <= $pagenation_total_pages; $i++) {
                            if ($i == $current_page) {
                                $pagenation_active = "active";
                            } else {
                                $pagenation_active = "";
                            }
                            echo '<li class="' . $pagenation_active . '"><a href="index.php?page=' . $i . '">' . $i . '</a></li>';
                        }
                        if ($pagenation_total_pages > $current_page) {
                            echo "<li><a href='index.php?page=" . ($current_page + 1) . "'>Next</a></li>";
                        } else {
                        }
                        echo "</ul>";
                    }

                    ?>
                </div><!-- /post-container -->
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
<?php mysqli_close($conn); ?>