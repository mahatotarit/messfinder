<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Notification</title>
    <link rel="stylesheet" href="all-css/send_notification.css">
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
