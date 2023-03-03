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
<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php
    include "dynimic_title.php";
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #4070f4;
        }

        .container {
            position: relative;
            max-width: 900px;
            width: 100%;
            border-radius: 6px;
            padding: 30px;
            margin: 0 15px;
            background-color: #fff;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }

        .container header {
            position: relative;
            font-size: 20px;
            font-weight: 600;
            color: #333;
        }

        .container header::before {
            content: "";
            position: absolute;
            left: 0;
            bottom: -2px;
            height: 3px;
            width: 27px;
            border-radius: 8px;
            background-color: #4070f4;
        }

        .container form {
            position: relative;
            margin-top: 16px;
            min-height: 490px;
            background-color: #fff;
            overflow: auto;
        }

        .container form .form {
            position: absolute;
            background-color: #fff;
            transition: 0.3s ease;
        }

        .container form .form.second {
            opacity: 0;
            pointer-events: none;
            transform: translateX(100%);
        }

        form.secActive .form.second {
            opacity: 1;
            pointer-events: auto;
            transform: translateX(0);
        }

        form.secActive .form.first {
            opacity: 0;
            pointer-events: none;
            transform: translateX(-100%);
        }

        .container form .title {
            display: block;
            margin-bottom: 8px;
            font-size: 16px;
            font-weight: 500;
            margin: 6px 0;
            color: #333;
        }

        .container form .fields {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        form .fields .input-field {
            display: flex;
            width: calc(100% / 3 - 15px);
            flex-direction: column;
            margin: 4px 0;
        }

        .input-field label {
            font-size: 12px;
            font-weight: 500;
            color: #2e2e2e;
        }

        .input-field input,
        select {
            outline: none;
            font-size: 14px;
            font-weight: 400;
            color: #333;
            border-radius: 5px;
            border: 1px solid #aaa;
            padding: 0 15px;
            height: 42px;
            margin: 8px 0;
        }

        .input-field input :focus,
        .input-field select:focus {
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.13);
        }

        .input-field select,
        .input-field input[type="date"] {
            color: #707070;
        }

        .input-field input[type="date"]:valid {
            color: #333;
        }

        .container form button,
        .backBtn {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 45px;
            max-width: 200px;
            width: 100%;
            border: none;
            outline: none;
            color: #fff;
            border-radius: 5px;
            margin: 25px 0;
            background-color: #4070f4;
            transition: all 0.3s linear;
            cursor: pointer;
        }

        .container form .btnText {
            font-size: 14px;
            font-weight: 400;
        }

        form button:hover {
            background-color: #265df2;
        }

        form button i,
        form .backBtn i {
            margin: 0 6px;
        }

        form .backBtn i {
            transform: rotate(180deg);
        }

        form .buttons {
            display: flex;
            align-items: center;
        }

        form .buttons button,
        .backBtn {
            margin-right: 14px;
        }

        @media (max-width: 750px) {
            .container form {
                overflow-y: scroll;
            }

            .container form::-webkit-scrollbar {
                display: none;
            }

            form .fields .input-field {
                width: calc(100% / 2 - 15px);
            }
        }

        @media (max-width: 550px) {
            form .fields .input-field {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <header>Register a new Mess</header>

        <?php
        include 'config.php';

        if (isset($_GET['allmesseditid'])) {
            $sql6 = "SELECT * FROM allmess WHERE id={$_GET['allmesseditid']}";
            $r_table = "allmesseditid";
        }
        if (isset($_GET['showposteditid'])) {
            $sql6 = "SELECT * FROM showpost WHERE id={$_GET['showposteditid']}";
            $r_table = "showposteditid";
        }

        $result6 = mysqli_query($conn, $sql6);
        $row6 = mysqli_fetch_assoc($result6);
        ?>

        <form action="edit_mess_save.php" method="POST" enctype="multipart/form-data">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Mess Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Mess Name</label>
                            <input type="text" name="edit_messname" placeholder="Enter your name" value="<?php echo $row6['messname']; ?>" required>
                            <input type="hidden" name="edit_id" placeholder="Enter your name" value="<?php echo $row6['id']; ?>">
                            <input type="hidden" name="edit_r_table" placeholder="Enter your name" value="<?php echo  $r_table ?>">
                        </div>

                        <div class="input-field">
                            <label>Price</label>
                            <input type="number" name="edit_price" placeholder="Price per Bed" value="<?php echo $row6['price']; ?>" required>
                        </div>

                        <div class="input-field">
                            <label>Mess Location</label>
                            <input type="text" name="edit_messlocation" placeholder="Mess Address" value="<?php echo $row6['messlocation']; ?>" required>
                        </div>

                        <div class="input-field">
                            <label>Mess Contect No</label>
                            <input type="number" name="edit_messcontactno" placeholder="Enter mobile number" value="<?php echo $row6['messcontactno']; ?>" required>
                        </div>

                        <div class="input-field">
                            <label>Type</label>
                            <select name="edit_messtype" required>
                                <option disabled>Select Type</option>
                                <?php
                                if ($row6['messtype'] == "Boys") {
                                    echo "<option selected>Boys</option>";
                                } else {
                                    echo "<option>Boys</option>";
                                }
                                if ($row6['messtype'] == "Girls") {
                                    echo "<option selected>Girls</option>";
                                } else {
                                    echo "<option>Girls</option>";
                                }
                                if ($row6['messtype'] == "Family Flate") {
                                    echo "<option selected>Family Flate</option>";
                                } else {
                                    echo "<option>Family Flate</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>About</label>
                            <input type="text" name="edit_messabout" placeholder="Enter Mess Details" value="<?php echo $row6['messabout']; ?>" required>
                        </div>
                    </div>
                </div>

                <div class="details ID">


                    <div class="fields">
                        <div class="input-field">
                            <label>Food Facility</label>
                            <select name="edit_foodfacility" required>
                                <option disabled>Food Available?</option>
                                <?php
                                if ($row6['foodfacility'] == "Yes") {
                                    echo "<option selected>Yes</option>";
                                } else {
                                    echo "<option>Yes</option>";
                                }
                                if ($row6['foodfacility'] == "No") {
                                    echo "<option selected>No</option>";
                                } else {
                                    echo "<option>No</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Bathroom</label>
                            <select name="edit_bathroom" required>
                                <option disabled>Bathroom Available?</option>
                                <?php
                                if ($row6['bathroom'] == "Yes") {
                                    echo "<option selected>Yes</option>";
                                } else {
                                    echo "<option>Yes</option>";
                                }
                                if ($row6['bathroom'] == "No") {
                                    echo "<option selected>No</option>";
                                } else {
                                    echo "<option>No</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Mess Owner Name</label>
                            <input type="text" name="edit_ownername" placeholder="Owner Name" value="<?php echo $row6['ownername']; ?>" required>
                        </div>


                        <div class="input-field">
                            <label>Bed Available?</label>
                            <select name="edit_bedavailable" required>
                                <option disabled>Bed Available?</option>
                                <?php
                                if ($row6['bedavailable'] == "Available") {
                                    echo "<option selected>Available</option>";
                                } else {
                                    echo "<option>Available</option>";
                                }
                                if ($row6['bedavailable'] == "Not Available") {
                                    echo "<option selected>Not Available</option>";
                                } else {
                                    echo "<option>Not Available</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Extra Electricity Cost</label>
                            <select name="edit_electricity" required>
                                <option disabled selected>Choose</option>
                                <?php
                                if ($row6['electricity'] == "Yes") {
                                    echo "<option selected>Yes</option>";
                                } else {
                                    echo "<option>Yes</option>";
                                }
                                if ($row6['electricity'] == "No") {
                                    echo "<option selected>No</option>";
                                } else {
                                    echo "<option>No</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>Extra Facility</label>
                            <input type="text" name="edit_extrafacility" placeholder="Extra Facility" value="<?php echo $row6['extrafacility']; ?>" required>
                        </div>

                        <div class="input-field" style="margin-left:50px; text-align:center;">
                            <!-- <img style="width:150px; height:150px; border-radius:5px;" src="../mess_image/" alt="Old image"> -->
                            <!-- <input style="border:none;" name="edit_imagename" type="file"> -->
                            <input style="border:none;" name="edit_old_image" type="hidden" value="<?php echo $row6['imagename']; ?>">
                        </div>
                    </div>
                    <div>
                        <button class="nextBtn">
                            <input type="submit" name="edit_mess_button" value="Submit" style=" width:100%; height:100%; border-radius:10px;color:white; font-weight:bold;background-color: #4070f4; border: none; font-size: 100%;">
                        </button>
                    </div>
                </div>
            </div>
        </form>

        <?php
        if (isset($_GET['c_s'])) {
            echo '<div style="color:red; text-align:center;">
            Please click Submit button</div>';
        } else {
            echo "";
        }
        ?>
    </div>

    <!--<script src="script.js"></script>-->
</body>

</html>
<script>
</script>