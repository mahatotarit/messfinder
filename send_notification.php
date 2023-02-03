<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Notification</title>
    <style>
        *{
            margin: 00px;
            padding: 00px;
            box-sizing: border-box;
        }
        .container{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin-top: 20px;
        }
        .form{
            box-shadow: 0px 0px 1px black;
            width: 25%;
            padding: 5px;
            margin-top: 10px;

        }
        .input_div{
            padding: 10px;
            margin: 10px;
            text-align: center;
        }
        .input_div textarea{
            outline: none;
            font-weight: bold;
            padding: 5px;
            border-radius:5px;
        }
        .input_div input{
            padding: 5px;
            font-weight: bold;
            width: 90%;
            outline:none;
        }
        .input_div #send_notification_btn{
            position: relative;
            background-color: rgb(0, 136, 255);
            color: white;
            font-weight: bold;
            border: 2px outset rgb(1, 137, 171);
            border-radius: 5px;
            padding: 7px;
            box-shadow: 3px 3px 1px rgb(68, 68, 68);
        }
        .input_div #send_notification_btn:hover{
            top: 2px;
            box-shadow: 1px 1px 1px rgb(68, 68, 68);
            border: 3px inset rgb(1, 137, 171);
        }
        .first_three_input{
            border: 1px solid black;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container" style="text-align:center;padding: 20px;">
        <h2>Send Notification</h2>
        <form class="form" action="php/notification_data.php" method="POST" enctype="multipart/form-data">
            <div class="input_div">
               <input type="text" class="first_three_input" name="heading" placeholder="Heading" required>                
            </div>
            <div class="input_div">
                 <textarea name="about" id="about" cols="35" rows="10" placeholder="About"></textarea required>
            </div>
             <div class="input_div">
               <input type="file" class="first_three_input" name="image" required>
            </div> 
            <div class="input_div">
               <input type="submit" id="send_notification_btn" name="send_notification_btn">
            </div>
        </form>
    </div>
</body>
