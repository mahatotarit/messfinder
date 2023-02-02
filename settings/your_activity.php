<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- displays site properly based on user's device -->
    <link
      rel="icon"
      type="image/png"
      sizes="32x32"
      href="./images/favicon-32x32.png"
    />
    <link rel="stylesheet" href="../all-css/your_activity.css" />
    <title>Frontend Mentor | Notifications page</title>
    <style>
    </style>
  </head>
  <body>
    <div class="container">
      <header>
        <div class="notif_box">
          <h2 class="title">My Post</h2>
        </div>
      </header>
      <main>
        <div class="notif_card unread">
          <img src="../assets\image\avatar-kimberly-smith.webp" alt="avatar" />
          <div class="description">
            <p class="user_activity">
              <strong>Mark Webber</strong><br> reacted to your recent post
            </p>
            <p class="time">1m ago</p>
          </div>
          <button id="edit_btn" style="margin-left:auto; padding:3px;"><a href="" style="text-decoration: none; font-weight: bold; color: black;">Edit</a></button>
        </div>
        
        </div>

      </main>
    </div>

    <!-- <script src="app.js"></script> -->
  </body>
</html>
<script>
  const unreadMessages = document.querySelectorAll(".unread");
const unread = document.getElementById("notifes");
const markAll = document.getElementById("mark_all");
unread.innerText=unreadMessages.length

unreadMessages.forEach((message) => {
    message.addEventListener("click", () => {
        message.classList.remove("unread");
        const newUnreadMessages = document.querySelectorAll(".unread");
        unread.innerText = newUnreadMessages.length;
    })
})
markAll.addEventListener("click", () => {
    unreadMessages.forEach(message => message.classList.remove("unread"))
    const newUnreadMessages = document.querySelectorAll(".unread");
    unread.innerText = newUnreadMessages.length;
})


</script>
