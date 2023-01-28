<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Modern Admin Dashboard</title>
    <link rel="stylesheet" href="all-css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>

<body>
    <?php include "header.php";?>
    <div class="main-content">
        <main>
            <!-- <div class="admin-header" style="border:1px solid red;text-align:center; height:5vh; display:block; width:98%; position: absolute;">
            <a href="admin.php?page=1" style="height:100%; width:5%;display:inline-block;"><i class="fa-sharp fa-solid fa-eye" style="padding:01%; font-size:30px; margin:00px 1% 00px 1%;"></i></a>
            <a href="admin.php?page=2" style="height:100%; width:5%;display:inline-block;"><i class="fa-sharp fa-solid fa-eye-slash" style="padding:01%; font-size:30px; margin:00px 1% 00px 1%;"></i></a>
            </div> -->
            <div id="show-templete">
            <div class="page-header">
                <h1>MessFinder</h1>
                <small>Admin / Page</small>
            </div>

            <div class="page-content">

                <div class="analytics">

                    <div class="card">
                        <div class="card-head">
                            <h2>107,200</h2>
                            <span class="las la-user-friends"></span>
                        </div>
                        <div class="card-progress">
                            <small>Total User</small>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-head">
                            <h2>340,230</h2>
                            <span class="las la-eye"></span>
                        </div>
                        <div class="card-progress">
                            <small>User Show</small>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-head">
                            <h2>$653,200</h2>
                            <span class="fa-sharp fa-solid fa-eye-slash" style="font-size:150%;"></span>
                        </div>
                        <div class="card-progress">
                            <small>Proccessing</small>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-head">
                            <h2>47,500</h2>
                            <span class="las la-envelope"></span>
                        </div>
                        <div class="card-progress">
                            <small>Lorem ipsum dolor sit </small>
                        </div>
                    </div>

                </div>


                <div class="records table-responsive">

                    <div class="record-header">
                        <div class="add">
                            <span>Entries</span>
                            <select name="" id="">
                                <option value="">ID</option>
                            </select>
                        </div>

                        <div class="browse">
                            <input type="search" placeholder="Search" class="record-search">
                        </div>
                    </div>

                    <div>
                        <table width="100%">
                            <!-- table head start -->
                            <thead>
                                <tr>
                                    <th >Id No</th>
                                    <th ><span class="las la-sort"></span>Mess Name</th>
                                    <th ><span class="las la-sort"></span>User Name</th>
                                    <th ><span class="las la-sort"></span>Mobile</th>
                                    <th ><span class="las la-sort"></span>Mess Add</th>
                                    <th ><span class="las la-sort"></span>Email</th>
                                    <th ><span class="las la-sort"></span>Password</th>
                                    <th ><span class="las la-sort"></span>Actions</th>
                                </tr>
                            </thead>
                            <!-- // table body start -->
                            <tbody>
                                <tr>
                                    <td  class="id-td" style="padding-left: 0.7rem;">1</td>
                                    <td class="mess-td">
                                        <div class="client">
                                            <div class="client-img bg-img" style="background-image: url(images/1.jpeg)">
                                            </div>
                                            <div class="client-info">
                                                <h4>Mess Name</h4>
                                                <small>Description</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="user-td"> User Name</td>
                                    <td class="phone-td">7076344980</td>
                                    <td class="address-td">Mess Address Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim,laboriosam!</td>
                                    <td class="email-td">taritmahato1404@gmail.com</td>
                                    <td class="password-td">Password</td>
                                    <td class="action">
                                        <!-- Delete Update and Read -->
                                        <div class="actions">
                                            <a href="mess-delete.php"> <i class="fa-solid fa-trash"
                                                    style="color:red;margin: 10%  10%; cursor: pointer;"></i></a>
                                            <a href="edit-delete.php"> <i class="fa-solid fa-pen-to-square"
                                                    style="color:rgb(0, 147, 205); margin:10% 10%;cursor: pointer;"></i></a>
                                            <a href="check-delete.php"> <i class="fa-solid fa-square-check"
                                                    style="color:rgb(0, 202, 0); margin:10% 10%;cursor: pointer;"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                 <!-- two row in table -->

                                <tr>
                                    <td  class="id-td" style="padding-left: 0.7rem;">1</td>
                                    <td class="mess-td">
                                        <div class="client">
                                            <div class="client-img bg-img" style="background-image: url(images/3.jpeg)">
                                            </div>
                                            <div class="client-info">
                                                <h4>Mess Name</h4>
                                                <small>Description</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="user-td"> User Name</td>
                                    <td class="phone-td">7076344980</td>
                                    <td class="address-td">Mess Address Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim,laboriosam!</td>
                                    <td class="email-td">taritmahato1404@gmail.com</td>
                                    <td class="password-td">Password</td>
                                    <td class="action">
                                        <!-- Delete Update and Read -->
                                        <div class="actions">
                                            <a href="mess-delete.php"> <i class="fa-solid fa-trash"
                                                    style="color:red;margin: 10%  10%; cursor: pointer;"></i></a>
                                            <a href="edit-delete.php"> <i class="fa-solid fa-pen-to-square"
                                                    style="color:rgb(0, 147, 205); margin:10% 10%;cursor: pointer;"></i></a>
                                            <a href="check-delete.php"> <i class="fa-solid fa-square-check"
                                                    style="color:rgb(0, 202, 0); margin:10% 10%;cursor: pointer;"></i></a>
                                        </div>
                                    </td>
                                </tr>

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
