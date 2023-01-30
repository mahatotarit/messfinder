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
    <link rel="stylesheet" href="../all-css/notification.css" />
    <title>Frontend Mentor | Notifications page</title>
  </head>
  <body>
    <div class="container">
      <header>
        <div class="notif_box">
          <h2 class="title">Notifications</h2>
          <span id="notifes"></span>
        </div>
        <p id="mark_all">Mark all as read</p>
      </header>
      <main>
        <div class="notif_card unread">
          <img src="../assets\image\avatar-kimberly-smith.webp" alt="avatar" />
          <div class="description">
            <p class="user_activity">
              <strong>Mark Webber</strong> reacted to your recent post
              <b>My first tournament today!</b>
            </p>
            <p class="time">1m ago</p>
          </div>
        </div>
        <div class="notif_card unread">
          <img src="../assets\image\avatar-kimberly-smith.webp" alt="avatar" />
          <div class="description">
            <p class="user_activity">
              <strong>Angela Gray</strong> followed you
            </p>
            <p class="time">5m ago</p>
          </div>
        </div>
        <div class="notif_card unread">
          <img src="../assets\image\avatar-kimberly-smith.webp" alt="avatar" />
          <div class="description">
            <p class="user_activity">
              <strong>Jacob Thompson</strong> has joined your group
              <strong class="link">Chess Club</strong>
            </p>
            <p class="time">1 day ago</p>
          </div>
        </div>
        <div>
          <div class="notif_card">
          <div class="message_card">
            <img
            src="../assets\image\avatar-kimberly-smith.webp"
            alt="avatar"
          />
          <div class="description">
            <p class="user_activity">
              <strong>Rizky Hasanuddin</strong> sent you a private message
            </p>
            <p class="time">5 days ago</p>
          </div>
          </div>
        </div>
        </div>
        
        <div class="notif_card">
          <img src="../assets\image\avatar-kimberly-smith.webp" alt="avatar" />
          <div class="description">
            <p class="user_activity">
              <strong>Kimberly Smith</strong> commented on your picture
            </p>
            <p class="time">1 week ago</p>
          </div>
        </div>
        <div class="notif_card">
          <img src="../assets\image\avatar-kimberly-smith.webp" alt="avatar" />
          <div class="description">
            <p class="user_activity">
              <strong>Nathan Pererson</strong> reacted to your recent post
              <b>5 end-game strategies to increase your win rate</b>
            </p>
            <p class="time">2 weeks ago</p>
          </div>
        </div>
        <div class="notif_card">
          <img src="../assets\image\avatar-kimberly-smith.webp" alt="avatar" />
          <div class="description">
            <p class="user_activity">
              <strong>Anna Kim</strong> left the group
              <strong class="link">Chess Club</strong>
            </p>
            <p class="time">2 weeks ago</p>
          </div>
        </div>
      </main>
    </div>

    <script src="app.js"></script>
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
