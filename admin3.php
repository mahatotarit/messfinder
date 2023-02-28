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

<?php
include "php/config.php";
if (isset($_SESSION['name'])) {
    $admin_name = $_SESSION['name'];
    $admin_phone = $_SESSION['phone'];
    $admin_password = $_SESSION['password'];
    $admin_hash_password = md5($admin_password);

    $admin_button_show_sql = "SELECT * FROM admin WHERE phone= '{$admin_phone}' and password = '{$admin_hash_password}'";
    $admin_button_show_result = mysqli_query($conn, $admin_button_show_sql);
    if (mysqli_num_rows($admin_button_show_result)) {
    } else {
        header("location:index.php");
    }
}

?>

<?php include "mainheader.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Modern Admin Dashboard</title>
    <link rel="stylesheet" href="all-css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <style>
        @media (max-width: 1054px) {
            nav {
                top: 00px;
                width: 100vw;
                z-index: +99;
            }
        }

        .display_hide {
            display: none;
        }

        .clicked_btn {
            box-shadow: 0px 12px 4px rgb(56, 56, 56);
            transform: rotateX(20deg);
            width: 50px;
        }

        #comment_btn {
            box-shadow: 2px 2px 5px black;
            border: 4px inset black;
        }

        .th_top {
            padding: 00px 10px;
            width: 8%;
        }

        .th_1 {
            padding: 00px 2px;
            width: 10%;
        }

        .th_2 {
            padding: 00px 5px;
            width: 15%;
        }

        .th_3 {
            padding: 00px 5px;
            width: 10%;
        }

        .th_4 {
            padding: 00px 5px;
            width: 45%;
        }

        .all_td {
            padding-left: 2%;
        }
    </style>
</head>

<body>
    <div class="main-content">
        <main>
            <!-- <div class="admin-header" style="border:1px solid red;text-align:center; height:5vh; display:block; width:98%; position: absolute;">
            <a href="admin.php?page=1" style="height:100%; width:5%;display:inline-block;"><i class="fa-sharp fa-solid fa-eye" style="padding:01%; font-size:30px; margin:00px 1% 00px 1%;"></i></a>
            <a href="admin.php?page=2" style="height:100%; width:5%;display:inline-block;"><i class="fa-sharp fa-solid fa-eye-slash" style="padding:01%; font-size:30px; margin:00px 1% 00px 1%;"></i></a>
            </div> -->
            <div id="show-templete" style="padding-top:00px; margin-top:00px;">
                <div class="page-header" style="padding-top:00px; margin-top:00px;">
                    <h1>MessFinder</h1>
                    <small>Admin / Page</small>
                </div>

                <div class="page-content">

                    <div class="analytics" style="user-select:none;">

                        <div class="card">
                            <div class="card-head">
                                <!-- total user register -->
                                <!-- total user register -->
                                <h2>
                                    <?php
                                    include "php/config.php";
                                    $total_user_sql = "SELECT * FROM user";
                                    $total_user_result = mysqli_query($conn, $total_user_sql);
                                    if (mysqli_num_rows($total_user_result)) {
                                        echo $total_uuser = mysqli_num_rows($total_user_result);
                                    }
                                    ?>
                                </h2>
                                <span class="las la-user-friends"></span>
                            </div>
                            <div class="card-progress">
                                <small>Total User</small>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-head">
                                <h2>
                                    <?php
                                    $total_mess_show_sql5 = "SELECT * FROM showpost";
                                    $total_mess_show_sql5_result = mysqli_query($conn, $total_mess_show_sql5);
                                    if (mysqli_num_rows($total_mess_show_sql5_result)) {
                                        echo $total_uuser = mysqli_num_rows($total_mess_show_sql5_result);
                                    } else {
                                        echo "0";
                                    }
                                    ?>
                                </h2>
                                <span class="las la-eye"></span>
                            </div>
                            <div class="card-progress">
                                <small>Show</small>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-head">
                                <h2>
                                    <?php
                                    $total_mess_show_sql5 = "SELECT * FROM allmess";
                                    $total_mess_show_sql5_result = mysqli_query($conn, $total_mess_show_sql5);
                                    if (mysqli_num_rows($total_mess_show_sql5_result)) {
                                        echo $total_uuser = mysqli_num_rows($total_mess_show_sql5_result);
                                    } else {
                                        echo "0";
                                    }
                                    ?>
                                </h2>
                                <span class="fa-sharp fa-solid fa-eye-slash" style="font-size:150%;"></span>
                            </div>
                            <div class="card-progress">
                                <small>Hide</small>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-head">
                                <h2>
                                    <?php
                                    $total_mess_show_sql8 = "SELECT * FROM mess_comment";
                                    $total_mess_show_sql5_result8 = mysqli_query($conn, $total_mess_show_sql8);
                                    if (mysqli_num_rows($total_mess_show_sql5_result8)) {
                                        echo $total_uuser = mysqli_num_rows($total_mess_show_sql5_result8);
                                    } else {
                                        echo "0";
                                    }
                                    ?>
                                </h2>
                                <span class="fa-solid fa-house-chimney" style="font-size:150%;"></span>
                            </div>
                            <div class="card-progress">
                                <small>Total Comment</small>
                            </div>
                        </div>

                    </div>
                    <div style="display:flex; justify-content:center; align-items:center;margin:5px 00px 10px 00px;">
                        <button id="show_btn" style="padding:5px; margin:2px 15px 2px 15px;background-color:green; border-color:green; border-radius:5px; color:white; font-weight:bold;"><a href="admin.php" style="color:white;"><span class="las la-eye" style="font-size:160%;"></span></a></button>
                        <button id="hide_btn" style="padding:5px; margin:2px 15px 2px 15px; background-color:rgb(209, 0, 0); border-color:rgb(209, 0, 0); border-radius:5px; color:white; font-weight:bold;"><a href="admin1.php" style="color:white;"><span class="fa-sharp fa-solid fa-eye-slash" style="font-size:150%;"></span></a></button>
                        <button id="comment_btn" style="padding:5px; margin:2px 15px 2px 15px; background-color:rgb(209, 0, 0); border-color:rgb(209, 0, 0); border-radius:5px; color:white; font-weight:bold;"><a href="admin3.php" style="color:white;"><span style="font-size:130%;">Co</span></a></button>
                    </div>

                    <div class="records table-responsive" id="first-hide-div">

                        <div class="record-header">
                            <div class="add">
                                <!-- <span>Entries</span>
                                <select name="" id="">
                                    <option value="">ID</option>
                                </select> -->
                            </div>


                            <div class="browse">
                                <!-- search mess name and id -->
                                <!-- search mess name and id -->

                                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" style="display:flex; padding:00px; margin:00px; box-sizing:border-box;">
                                    <input type="number" placeholder="Search" class="record-search" name="admin_search_input" required>
                                    <input type="submit" style="width:60%; background-color:rgb(10,200,200); font-weight:bold; color:white;" name="admin_search_btn">
                                </form>
                            </div>
                        </div>

                        <div>
                            <table width="100%">
                                <!-- table head start -->
                                <thead>
                                    <tr>
                                        <th class="th_top">Comment Id</th>
                                        <th class="th_1"><span class="las la-sort"></span>Mess Id</th>
                                        <th class="th_2"><span class="las la-sort"></span>User Name</th>
                                        <th class="th_3"><span class="las la-sort"></span>OwnerPhone</th>
                                        <th class="th_4"><span class="las la-sort"></span>Comment</th>
                                        <!-- <th><span class="las la-sort"></span>Email</th> -->
                                        <!-- <th><span class="las la-sort"></span>Password</th> -->
                                        <th class="th_5"><span class="las la-sort"></span>Actions</th>
                                    </tr>
                                </thead>
                                <!-- // table body start -->
                                <tbody">
                                    <!-- first row start in table -->
                                    <!-- start php loop -->
                                    <?php

                                    $admin_page_show_sql = "";
                                    $admin_page_show_sql = "SELECT * FROM mess_comment";
                                    if (isset($_POST['admin_search_btn'])) {
                                        $search_id = $_POST['admin_search_input'];
                                        if (preg_match("/^[A-z]*$/", $search_id)) {
                                            $admin_page_show_sql = "SELECT * FROM mess_comment";
                                        } else {
                                            $admin_page_show_sql = "SELECT * FROM mess_comment
                                                    WHERE id LIKE '%$search_id%'";
                                        }
                                    } else {
                                    }
                                    $admin_page_show_result = mysqli_query($conn, $admin_page_show_sql);
                                    if (mysqli_num_rows($admin_page_show_result) > 0) {
                                        while ($result_row4 = mysqli_fetch_assoc($admin_page_show_result)) {
                                    ?>
                                            <tr>
                                                <td class="id-td" style="padding-left: 0.7rem;">
                                                    <?php echo $result_row4['id']; ?>
                                                </td>
                                                <td class="mess-td all_td">
                                                    <div class="client">
                                                        <div class="client-info">
                                                            <h4 style="font-size:15px;">
                                                                <?php echo $result_row4['mess_id']; ?>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="user-td all_td">
                                                    <?php echo $result_row4['ownername']; ?>
                                                </td>
                                                <td class="phone-td all_td">
                                                    <?php echo $result_row4['owner_phone']; ?>
                                                </td>
                                                <td class="address-td all_td">
                                                    <?php echo $result_row4['commenttext']; ?>
                                                </td>
                                                <!-- <td class="email-td">
                                                    <?php
                                                    // echo $result_row4['authoremail']; 
                                                    ?>
                                                </td> -->
                                                <!-- <td class="password-td"> -->
                                                <?php
                                                // echo $result_row4['authorpassword']; 
                                                ?>
                                                <!-- </td> -->
                                                <td class="action">
                                                    <!-- Delete Update and Read -->
                                                    <div class="actions">
                                                        <a href="php/check_mess.php?d_c=<?php echo $result_row4['id']; ?>"> <i class="fa-solid fa-trash" style="color:red;margin: 10%  10%; cursor: pointer;"></i></a>
                                                        <!-- <a href=""> <i class="fa-solid fa-pen-to-square" style="color:rgb(0, 147, 205); margin:10% 10%;cursor: pointer;"></i></a> -->
                                                        <!-- <a href="php/check_mess.php?hide_from_showpost=<?php echo $result_row4['id']; ?>"> <i class="fa-sharp fa-solid fa-eye-slash" style="color:rgb(50, 50, 0); margin:5% 5%;cursor: pointer;"></i></a> -->
                                                    </div>
                                                </td>
                                            </tr>

                                    <?php     }
                                    }
                                    ?>


                                    <!-- first row end in table -->
                                    </tbody>
                                    <!-- table body close -->

                            </table>
                        </div>

                    </div>
                </div>
            </div>

    </div>
    </div>

    </main>
    </div>
</body>

</html>