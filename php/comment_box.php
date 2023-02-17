<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            /* display: flex;
            justify-content: center;
            align-items: center; */
            height: 100vh;
            background-color: #f5f6f6;
            font-family: 'Roboto', sans-serif;
        }

        .co_container {
            width: auto;
            border: 2px solid #333;
            padding: 15px 10px;
        }

        .co_container h2 {
            text-align: center;
            margin-bottom: 15px
        }

        textarea {
            height: 20px;
            width: 100%;
            border: none;
            border-bottom: 2px solid #aaa;
            background-color: transparent;
            margin-bottom: 10px;
            resize: none;
            outline: none;
            transition: .5s
        }

        input[type="submit"],
        button {
            padding: 10px 15px;
            border: none;
            outline: none;
            border-radius: 5px;
            text-transform: uppercase;
            font-weight: bold;
            cursor: pointer;
        }

        input[type="submit"] {
            color: #fff;
            background-color: #273c75
        }

        button {
            color: #333;
            background-color: transparent
        }

        .comment_btn {
            display: none
        }
    </style>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: sans-serif;
        }

        .main {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100%;
            margin-top: 25px;
        }

        .full-boxer {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        .box-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .comment-box:hover {
            margin-top: 12px;
        }

        .comment-box {
            width: 500px;
            background: white;
            padding: 20px;
            margin: 15px;
            border-radius: 8px;
            cursor: pointer;
            box-shadow: 3px 3px 25px rgba(0, 0, 0, 0.3);
        }

        .Profile {
            display: flex;
            align-items: center;
        }

        .profile-image {
            width: 60px;
            height: 60px;
            box-shadow: 2px 2px 30px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            border-radius: 50%;
            margin-right: 10px;
        }

        .profile-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        .Name {
            display: flex;
            flex-direction: column;
            margin-left: 10px;
        }

        .Name strong {
            color: black;
            font-size: 18px;
        }

        .Name span {
            color: gray;
            margin-top: 2px;
        }

        .comment p {
            color: black;
        }
    </style>
</head>

<body>

    <body>
        <div class="co_container">
            <h2>Leave Us a Comment</h2>
            <form>
                <textarea placeholder='Add Your Comment'></textarea>
                <div class="comment_btn">
                    <input type="submit" value='Comment'>
                    <button id='clear'>Cancel</button>
                </div>
            </form>
        </div>
    </body>
    <!-- right side mess details div start -->
    <!-- right side mess details div start -->
    <section class="main">
        <div class="full-boxer">
            <div class="comment-box" style="height:150px; overflow:hidden;">
                <div class="box-top">
                    <div class="Profile">
                        <div class="profile-image">
                            <img src="image/1.png">
                        </div>
                        <div class="Name">
                            <strong>Ranidi Lochana</strong>
                            <span>@Ranidi Lochana</span>
                        </div>
                    </div>
                </div>
                <div class="comment">
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </p>
                </div>
            </div>
            <div class="comment-box" style="height:150px; overflow:hidden;">
                <div class="box-top">
                    <div class="Profile">
                        <div class="profile-image">
                            <img src="image/1.png">
                        </div>
                        <div class="Name">
                            <strong>Ranidi Lochana</strong>
                            <span>@Ranidi Lochana</span>
                        </div>
                    </div>
                </div>
                <div class="comment">
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </p>
                </div>
            </div>

        </div>
    </section>
    <!-- right side mess details div start -->
    <!-- right side mess details div start -->
</html>
<script>
    var feild = document.querySelector('textarea');
    var backUp = feild.getAttribute('placeholder');
    var btn = document.querySelector('.comment_btn');
    var clear = document.getElementById('clear')

    feild.onfocus = function() {
        this.setAttribute('placeholder', '');
        this.style.borderColor = '#333';
        btn.style.display = 'block';
    }

    feild.onblur = function() {
        this.setAttribute('placeholder', backUp);
        this.style.borderColor = '#aaa'
    }

    clear.onclick = function() {
        btn.style.display = 'none';
        feild.value = '';
    }
</script>