<?php
   if(isset($_SESSION['phone'])){
       if(isset($_SESSION['password'])){
          
       }else{
        header("location:loginpage.php");    
       }
   }else{
    // header("location:loginpage.php");
   }
?>
<div id ="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <span>© Copyright 2022 | Powered by <a href="https://webense.in/">Webense</a></span>
            </div>
        </div>
    </div>
</div>
</body>
</html>
