<?php
session_start();
if (isset($_SESSION['phone'])) {
} else {
    header("location:loginpage.php?a=addmess.php");
}

?>
<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="all-css/addmess.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!--<title>Responsive Regisration Form </title>-->
</head>

<body>
    <div class="container">
        <header>Register a new Mess</header>

        <form method="POST" enctype="multipart/form-data" id="add_mess_form" autocomplete="off">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Mess Details</span>
                    
                    <div class="fields">
                        <div class="input-field">
                            <label>Mess Name</label>
                            <input type="text" name="messname" placeholder="Enter your mess name" id="messname" required>
                        </div>

                        <div class="input-field">
                            <label>Price</label>
                            <input type="number" name="price" placeholder="Price per Bed" id="price" required>
                        </div>

                        <div class="input-field">
                            <label>Mess Location</label>
                            <input type="text" name="messlocation" placeholder="Mess Address" id="messlocation" required>
                        </div>

                        <div class="input-field">
                            <label>Mess Contect No</label>
                            <input type="number" name="messcontactno" placeholder="Enter mobile number" id="messcontactno" required>
                        </div>

                        <div class="input-field">
                            <label>Type</label>
                            <select name="messtype" id="messtype" required>
                                <option disabled selected>Select Type</option>
                                <option>Boys</option>
                                <option>Girls</option>
                                <option>Family Flate</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>About</label>
                            <input type="text" name="messabout" placeholder="Enter Mess Details" id="messabout" required>
                        </div>
                    </div>
                </div>

                    <div class="details ID">


                        <div class="fields">
                            <div class="input-field">
                                <label>Food Facility</label>
                                <select name="foodfacility" id="foodfacility" required>
                                    <option disabled selected>Food Available?</option>
                                    <option>Yes</option>
                                    <option>No</option>
                                    <!-- <option>Family Flate</option> -->
                                </select>
                            </div>

                            <div class="input-field">
                                <label>Bathroom</label>
                                <select name="bathroom" id="bathroom" required>
                                    <option disabled selected>Bathroom Available?</option>
                                    <option>Yes</option>
                                    <option>No</option>
                                    <!-- <option>Family Flate</option> -->
                                </select>
                            </div>

                            <div class="input-field">
                                <label>Mess Owner Name</label>
                                <input type="text" name="ownername" placeholder="Owner Name" id="ownername" required>
                            </div>


                            <div class="input-field">
                                <label>Bed Available?</label>
                                <select name="bedavailable" id="bedavailable" required>
                                    <option disabled selected>Bed Available?</option>
                                    <option>Available</option>
                                    <option>Not Available</option>
                                </select>
                            </div>

                            <div class="input-field">
                                <label>Extra Electricity Cost</label>
                                <select name="electricity" id="electricity" required>
                                    <option disabled selected>Choose</option>
                                    <option>Yes</option>
                                    <option>No</option>
                                </select>
                            </div>
                            <div class="input-field">
                                <label>Extra Facility</label>
                                <input type="text" name="extrafacility" placeholder="Extra Facility" id="extrafacility" required>
                            </div>
                        </div><br>
                        <!-- google map place picker form user -->
                        <div>
                            <br>
                            <span class="nextBtn">
                                <input type="submit" name="add_mess_button" value="Submit" style=" width:100%; height:100%; border-radius:10px;color:white; font-weight:bold;background-color: #4070f4; border: none; font-size: 100%; height:120%; padding:10px;">
                            </span>
                        </div>
                    </div>
                </div>
        </form>
        <div class="error_show_div" style="text-align:center; color:red; overflow-x:auto; font-size:12px; padding:5px;"></div>
    </div>
    <!-- loading animation div -->
    <div class="loading_animation_div loading_hide" style=" position:absolute; justify-content:center; align-items:center; top:00px; left:00px; width:100vw; height:100vh; background-color:rgba(132, 132, 132, 0.642);">
        <div class="loader"></div>
    </div>
    <!-- // loading animatiom div -->
</body>

</html>
<script>
    let form = document.querySelector('#add_mess_form');

    let loading_animation_div = document.querySelector('.loading_animation_div');

    form.addEventListener("submit", image_load_function);

    function image_load_function(e) {
        e.preventDefault();


        loading_animation_div.setAttribute("class", "loading_animation_div");

        let ajax = new XMLHttpRequest();
        ajax.open("POST", "php/mess_details.php", true);
        ajax.onload = () => {
            if (ajax.status === 200) {
                console.log(ajax.responseText);
                if (ajax.responseText == "ok") {
                    form.reset();
                    window.location.href = "php/image_upload.php?add_mess=ok";
                } else {
                    loading_animation_div.setAttribute("class", "loading_animation_div loading_hide");
                    document.querySelector(".error_show_div").innerHTML = ajax.responseText;
                    console.log("falied");
                }
                console.log(ajax.responseText);
            } else {

            }
        }
        let form_data = new FormData(form);
        ajax.send(form_data);
    }
</script>