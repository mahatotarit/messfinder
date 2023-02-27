<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment</title>
    <link rel="stylesheet" href="all-css/comment_box.css">
</head>

<body>
    <div class="co_container" style="border-radius:5px;">
        <h2>Leave Us a Comment</h2>
        <form method="POST" id="comment_form">
            <textarea placeholder="Add Your Comment" cols="15" rows="1" name="comment" id="comment_inpt" required></textarea>
            <div class="comment_btn">
                <input type="submit" name="btn">
                <input type="text" value="<?php echo $_GET['id']; ?>" name="id" hidden>
                <div id='clear' style="display:inline-block; margin-left:20px; cursor:pointer;">Cancel</div>
                <span class="c_error"></span>
            </div>
        </form>
    </div>
    <!-- right side mess details div start -->
    <section class="main">
        <div class="full-boxer">
        </div>
    </section>

    <!-- right side mess details div start -->

</html>
<!-- login form animation script -->
<script>
    var feild = document.querySelector('textarea');
    // var backUp = feild.getAttribute('placeholder');
    var btn = document.querySelector('.comment_btn');
    var clear = document.getElementById('clear');

    feild.onfocus = function() {
        this.setAttribute('placeholder', '');
        this.style.borderColor = '#333';
        btn.style.display = 'block';
    }
    clear.onclick = function() {
        btn.style.display = 'none';
        feild.value = '';
    }
</script>
<!-- comment script -->
<script>
    let comment_form = document.querySelector("#comment_form");

    comment_form.addEventListener("submit", comment);

    function comment(e) {
        e.preventDefault();

        let ok = '<?php
                    if (isset($_SESSION['phone'])) {
                        echo "1";
                    } else {
                        echo "0";
                    }
                    ?>';

        if (ok == "1") {
            // comment ajax
            let req = new XMLHttpRequest();
            req.open("POST", "php/send_comment.php", true);
            req.onload = () => {
                if (req.status === 200) {

                    let text = req.responseText;
                    let pattern = /[0-9]/g;
                    let result = text.match(pattern);

                    console.log(req.responseText);
                    if (result) {
                        console.log("comment ok ");

                    } else {
                        document.querySelector(".c_error").innerHTML = req.responseText;
                    }
                } else {
                    alert("comment failed");
                }
            }

            let comment_data = new FormData(comment_form);
            req.send(comment_data);

            window.location.href = "";
        } else {
            let ab = document.querySelector("#comment_inpt").value;
            // loginpage redirect code
            window.location.href = "loginpage.php?c=<?php echo $_GET['id']; ?>&ct=" + ab + "";
        }
    }
</script>
<script>
    // let mess_i = '';
    let comment_parrent_div = document.querySelector(".full-boxer");

    function default_load() {
        let gc = new XMLHttpRequest();
        gc.open("POST", "php/fetch_mess_comment.php?id=<?php echo $_GET['id']; ?>", true);
        gc.responseType = "json";
        gc.onload = () => {
            if (gc.status === 200) {
                let data = gc.response;

                if (gc.response) {
                    for (let i = 0; i < data.length; i++) {
                        let image_name = data[i].ownerimage;
                        let profile_iamge = "";
                        if (image_name == "profile_image.png") {
                            profile_iamge = "profile_image/profile_image.png";
                        } else {
                            profile_iamge = "user_profile_image/" + image_name;
                        }
                        comment_parrent_div.innerHTML += `
                        <div class="comment-box" style="height:100px; overflow:hidden;">
                         <div class="box-top">
                             <div class="Profile">
                                   <div class="profile-image">
                                       <img src="assets/${profile_iamge}">
                                    </div>
                                    <div class="Name">
                                        <strong>${data[i].ownername}</strong>
                                         <span>@${data[i].ownername}</span>
                                    </div>
                                    </div>
                                </div>
                             <div class="comment">
                             <p style="margin-left:20px;">
                              ${data[i].commenttext}
                             </p>
                          </div>
                        </div>
                        `;
                    }
                } else {

                }

            } else {
                console.log("problem");
            }
        }
        gc.send();
    }
    default_load();
</script>