<?php
if (isset($_GET['next'])) {
} else {
    header("location:../addmess.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpQPx0LXaDqtWm9rPnrpJ_f11lbApm5fI&callback=initMap" defer></script>
    <title>Location Picker</title>
    <style>
        * {
            margin: 00px;
            padding: 00px;
            box-sizing: border-box;
        }

        .container {
            padding: 5px;
            width: 98%;
            margin: 00px auto;
            height: 90vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            box-shadow: 0px 0px 2px black;
            padding-bottom: 05px;
        }

        #map {
            width: 100%;
            height: 90%;
            overflow: hidden;
            border-radius: 5px;
            box-shadow: 0px 0px 1px black;
        }

        .place_button_hide {
            display: none;
        }

        .place_save_btn {
            background-color: rgb(3, 158, 229);
            color: white;
            padding: 10px 50px 10px 50px;
            border-radius: 5px;
            border: none;
            margin: 10px;
        }

        .form {
            width: 100%;
            text-align: center;
        }

        .locaton_btn {
            width: 50%;
            padding: 10px;
            border-radius: 3px;
            background-color: rgb(0, 115, 255);
            border: none;
        }

        .error {
            padding: 2px;
            color: red;
        }

        /* animation css */

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

        .loading_hide {
            display: none;
        }
    </style>
</head>

<body>
    <div class="container">


        <div id="map">

        </div>
        <button class="place_save_btn place_button_hide">Save</button>
        <div class="error"></div>
        <!-- place_button_hide -->

    </div><br>
    <div class="form">
        <input type="submit" Value="Submit" name="locaton_btn" class="locaton_btn">
    </div>

    <!-- loading animation -->
    <div class="loading_animation_div loading_hide" style=" position:absolute; justify-content:center; align-items:center; top:00px; left:00px; width:100vw; height:100vh; background-color:rgba(132, 132, 132, 0.642);">
        <div class="loader"></div>
    </div>
    <!-- loading animation ednd-->

    <script>
        let loading_animation_div = document.querySelector(".loading_animation_div");
        loading_animation_div.setAttribute("class", "loading_animation_div loading_hide");
        let place_save_btn = document.querySelector('.place_save_btn');

        let place_lat = document.querySelector('.place_lat');
        let place_lng = document.querySelector('.place_lng');
        let map;
        let lat = 0;
        let lng = 0;

        let ok = true;

        let change = false;

        function initMap() {
            map = new google.maps.Map(document.querySelector("#map"), {
                center: {
                    lat: 22.5726,
                    lng: 88.3639
                },
                zoom: 3.5,
            });
            // The marker, position
            const marker = new google.maps.Marker({
                draggable: true,
                position: {
                    lat: 22.5726,
                    lng: 88.3639
                },
                map: map,
            });
            google.maps.event.addListener(marker, 'dragend', function() {
                change = true;
                map.setCenter(marker.getPosition());

                lat = marker.getPosition().lat();
                lng = marker.getPosition().lng();
                place_save_btn.setAttribute("class", "place_save_btn");
            });
        }
        place_save_btn.addEventListener("click", function() {
            console.log("location Picked")
            place_save_btn.setAttribute("class", "place_save_btn place_button_hide");
            document.querySelector(".error").textContent = "";
            ok = false;
        });

        let btn = document.querySelector(".locaton_btn");
        btn.addEventListener("click", function() {
            console.log(ok);
            if (ok) {
                document.querySelector(".error").textContent = "Please select a location";
            } else {
                loading_animation_div.setAttribute("class", "loading_animation_div");
                document.querySelector(".error").textContent = "";

                let xhr = new XMLHttpRequest();
                xhr.open("GET", "upload_location.php?lat=" + lat + "&lng=" + lng, true);

                xhr.onload = () => {
                    if (xhr.status === 200) {
                        if (xhr.responseText == "1") {
                            alert("mess register successfully");
                            window.location.href = "../index.php";
                            loading_animation_div.setAttribute("class", "loading_animation_div loading_hide");
                        } else {
                            console.log("not ok");
                        }
                    } else {

                    }
                }
                xhr.send();
            }

        });
        ok = true;
    </script>
</body>

</html>