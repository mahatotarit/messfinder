<?php
session_start();
if (isset($_SESSION['phone'])) {
} else {
    header("location:loginpage.php");
}

if (isset($_GET['ji_jij_jdfhdhg_jdfhhsf_jdhfhsgdf'])) {
    $match_id = $_GET['ji_jij_jdfhdhg_jdfhhsf_jdhfhsgdf'];
    $match_id1 = "bdshgfsdgvnkdfjjshdfhgsdhbnsduhygadhbdjnfjhsdgfhsbdjfhkjds78tgsjjfdhshgfv7s7d786ds8ftsd6fts78yfsbdfbsndfsfgdfhfv";
    if ($match_id == $match_id1) {
    } else {
        die();
    }
} else {
    header("location:../addmess.php");
}
?>
<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    <!-- <link rel="stylesheet" href="all-css/register-mess.css"> -->

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!--<title>Responsive Regisration Form </title>-->
    <style>
        /* ===== Google Font Import - Poppins ===== */
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
            width: 25%;
            border-radius: 6px;
            padding: 30px 30px 5px 30px;
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

        @media (min-width:1600px) {
            .container {
                width: 25%;
            }
        }

        @media (max-width:1500px) {
            .container {
                width: 35%;
            }
        }

        @media (max-width:1581px) {
            .container {
                width: 45%;
            }
        }

        @media (max-width:850px) {
            .container {
                width: 60%;
            }
        }

        @media (max-width:600px) {
            .container {
                width: 70%;
            }
        }

        @media (max-width:550px) {
            .container {
                width: 75%;
            }
        }

        @media (max-width:450px) {
            .container {
                width: 100%;
            }
        }
    </style>
    <style>
        .loader {
            position: absolute;
            z-index: +1111;
            top: 35%;
            left: 47%;
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #3498db;
            width: 100px;
            height: 100px;
            -webkit-animation: spin 2s linear infinite;
            /* Safari */
            animation: spin 2s linear infinite;
        }


        .loader_div {
            z-index: +1;
            background-color: rgba(0, 0, 0, 0.34);
            position: absolute;
            top: 00%;
            left: 00%;
            width: 100vw;
            height: 100vh;
        }

        .text {
            position: absolute;
            top: 80px;
        }

        /* Safari */
        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* file input design */
        ::-webkit-file-upload-button {
            background-color: rgb(40, 170, 275);
            font-weight: bold;
            border-radius: 10px;
            padding: 4px;
            color: black;
            outline: none;
            height: 100%;
            width: 50%;
            border: 2px outset rgb(20, 150, 255);
        }

        #file1 {
            padding-left: 00px;
        }

        #file2 {
            padding-left: 00px;
        }

        #file3 {
            padding-left: 00px;
        }

        #file4 {
            padding-left: 00px;
        }

        .loading_hide {
            display: none;
        }
    </style>
</head>

<body>
    <div class="container w-50">
        <header>Upload Mess Image</header>

        <form method="POST" enctype="multipart/form-data" id="add_mess_form">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Mess Image</span>

                    <!-- all file input start -->
                    <!-- all file input  start -->
                    <div class="input-field" style="display:flex;">
                        <input style="border: none; background-color:rgb(225, 225, 225); text-align:center;" class="upload-box_file" name="imagename1" type="file" id="file1" multiple accept="image/jpg, image/jpeg, image/png, image/webp" min="1" max="4" required>
                        <!-- <input style="border:none;" name="imagename2" type="file" id="file2" multiple accept="image/jpg, image/jpeg, image/png, image/webp" min="1" max="4" style="border:1px solid black;" required> -->
                        <!-- <input style="border:none;" name="imagename3" type="file" id="file3" multiple accept="image/jpg, image/jpeg, image/png, image/webp" min="1" max="4" style="border:1px solid black;" required> -->
                        <!-- <input style="border:none;" name="imagename4" type="file" id="file4" multiple accept="image/jpg, image/jpeg, image/png, image/webp" min="1" max="4" style="border:1px solid black;" required> -->
                    </div>
                    <div class="input-field" style="display:flex;">
                        <input style="border:none; background-color:rgb(225, 225, 225); " class="upload-box_file" name="imagename2" type="file" id="file2" multiple accept="image/jpg, image/jpeg, image/png, image/webp" min="1" max="4" required>
                    </div>
                    <div class="input-field" style="display:flex;">
                        <input style="border:none; background-color:rgb(225, 225, 225); " class="upload-box_file" name="imagename3" type="file" id="file3" multiple accept="image/jpg, image/jpeg, image/png, image/webp" min="1" max="4" required>
                    </div>
                    <div class="input-field" style="display:flex;">
                        <input style="border:none;  background-color:rgb(225, 225, 225);" class="upload-box_file" name="imagename4" type="file" id="file4" multiple accept="image/jpg, image/jpeg, image/png, image/webp" min="1" max="4" required>
                    </div>
                    <!-- all file input end -->
                    <!-- all file input  end -->
                </div>
                <div>
                    <br>
                    <span class="nextBtn">
                        <input type="submit" name="add_mess_button" value="Submit" style=" width:100%; height:100%; border-radius:10px;color:white; font-weight:bold;background-color: #4070f4; border: none; font-size: 100%; height:120%; padding:10px;">
                        <input type="text" vlaue='ok' name='ok' id='ok' hidden>
                    </span>
                </div>
            </div>
    </div>
    </form>
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
        ajax.open("POST", "image_upload_file.php", true);
        ajax.onload = () => {
            if (ajax.status === 200) {
                console.log(ajax.responseText);
                if (ajax.responseText == "ok") {
                    form.reset();
                    alert("mess register successfully");
                    loading_animation_div.setAttribute("class", "loading_animation_div");
                    window.location.href = "../index.php";
                } else {
                    loading_animation_div.setAttribute("class", "loading_animation_div loading_hide");
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