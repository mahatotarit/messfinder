<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Test</title>
</head>

<body>


    <style>
        * {
            padding: 00px;
            margin: 00px;
        }

        .alert_box {
            width: 30%;
            position: absolute;
            left: 35%;
            height: 150px;
            border: 1px solid black;
            background-color: rgb(241, 241, 241);
            border-radius: 5px;
        }

        .alert_btn {
            padding: 3px;
            width: 60px;
        }

        .alert_box_btn {
            display: flex;
        }

        .cancle_btn_div {
            margin-left: auto;
        }

        .ok_btn_div {
            margin-left: 60%;
        }

        .all_alert_div {
            margin: 15px;
        }

        .alert_box_header {
            font-weight: bold;
            font-size: 20px;
        }

        .alert_box_message {
            height: 27%;
        }

        @media(max-width:1100px) {
            .alert_box {
                width: 60%;
                position: absolute;
                left: 20%;
                height: 150px;
                border: 1px solid black;
                background-color: rgb(241, 241, 241);
                border-radius: 5px;
            }
        }

        @media(max-width:800px) {
            .alert_box {
                width: 60%;
                position: absolute;
                left: 20%;
                height: 150px;
                border: 1px solid black;
                background-color: rgb(241, 241, 241);
                border-radius: 5px;
            }
        }

        @media(max-width:500px) {
            .alert_box {
                width: 80%;
                position: absolute;
                left: 10%;
                height: 150px;
                border: 1px solid black;
                background-color: rgb(241, 241, 241);
                border-radius: 5px;
            }

            .cancle_btn_div {
                margin-left: 5%;
            }

            .ok_btn_div {
                margin-left: 50%;
            }

        }

        @media(max-width:387px) {
            .alert_box {
                width: 100%;
                position: absolute;
                left: 00%;
                height: 150px;
                border: 1px solid black;
                background-color: rgb(241, 241, 241);
                border-radius: 5px;
            }

            .cancle_btn_div {
                margin-left: 5%;
            }

            .ok_btn_div {
                margin-left: 50%;
            }

        }

        /* alert box animation */
        /* alert box animation */
        /* alert box animation */
        .show {
            animation: showanimation 600s ease;
        }
        @keyframes showanimation {
            0% {
                transform: translateY(-180px);
            }

            0.05% {
                transform: translateY(00px);
            }

            99% {
                transform: translateY(00px);
            }

            100% {
                transform: translatey(-180px);
            }
        }
        .hide {
            animation: hideanimation 600s ease;
        }
        @keyframes hideanimation {
            0% {
                transform: translateY(00px);
            }

            0.05% {
                transform: translateY(-180px);
            }

            100% {
                transform: translatey(-180px);
            }
        }
    </style>
    <div class='alert_box'>
        <div class='alert_box_header all_alert_div'>
            Messfinder
        </div>
        <div class='alert_box_message all_alert_div'>
            Are You Want to delete?
        </div>
        <div class='alert_box_btn all_alert_div'>
            <div class='ok_btn_div'>
                <button class="alert_btn ok">Ok</button>
            </div>
            <div class='cancle_btn_div'>
                <button class="alert_btn cancle">Cancle</button>
            </div>
        </div>
    </div>
    <script>
        let okbtn = document.querySelector('.ok');
        let canclebtn = document.querySelector('.cancle');

        let alert_box = document.querySelector('.alert_box');

        let response = false;

        okbtn.addEventListener("click", function () {
            response = true;
            if(response){
               window.location.href = "index.php";
             }else{
                
            }
            alert_box.setAttribute("class", "alert_box hide");

        })

        canclebtn.addEventListener("click", function () {
            response = false;
            if(response){

            }else{

            }
            alert_box.setAttribute("class", "alert_box hide");
        })

        function autocall() {
            alert_box.setAttribute("class", "alert_box show");
        }
        autocall();
    </script>


</body>

</html>
<script>

</script>