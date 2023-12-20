<div class="sidebar close shadow-lg  rounded rounded-4" >
    <div class="logo-details">
      <span class="logo_name t-4 " style="width: 90px; height: 90px; overflow: hidden;">
      <img src="/SWE-PROJECT/Images/MyWebsite/logo only.png"  style="width: 100%; height: 100%; object-fit: cover;">  
      </span>
      <i class="ms-auto fa-solid  fs-5 logo_name btn-close" ></i>
    </div>
    <ul class="nav-links">
      <li>
        <a href="View-Profile.php?user_id=<?=$id?>">
          <i class='bx bx-user' ></i>
          <span class="link_name">Account</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="View-Profile.php?user_id=<?=$id?>">Account</a></li>
        </ul>
      </li>
      <?php
      if (isset($_SESSION['user_data'])) {
        foreach ($_SESSION['user_data'] as $key => $value) {
            $type = $value['type'];  
        }
            if($type == "Admin")
            {
      ?>
            <li>
        <a href="/SWE-PROJECT/admin/index.php">
          <i class='bx bx-chart' ></i>
          <span class="link_name">admin</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="/SWE-PROJECT/admin/index.php">chatt</a></li>
        </ul>
      </li>
      <?php
        }
      }
      ?>
      <li>
        <a href="/SWE-PROJECT/php/chat/privatechat.php">
          <i class='bx bx-chat' ></i>
          <span class="link_name">chat</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="/SWE-PROJECT/php/chat/privatechat.php">chatt</a></li>
        </ul>
      </li>
      <li>
        <a href="/SWE-PROJECT/public/wishlist.php">
          <i class='bx bx-heart' ></i>
          <span class="link_name">Wishlist</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="/SWE-PROJECT/public/wishlist.php">Explore</a></li>
        </ul>
      </li>
      <li>
        <a href="/SWE-PROJECT/Public/checkout.php">
          <i class='bx bx-cart'></i>
          <span class="link_name">Cart</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="/SWE-PROJECT/Public/checkout.php">History</a></li>
        </ul>
      </li>
      <li>
        <a  href="Edit-Profile.php">
          <i class='bx bx-cog' ></i>
          <span class="link_name" >Settings</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="Edit-Profile.php">Settings</a></li>
        </ul>
      </li>

</ul>
  </div>

  
  <script>
  let arrow = document.querySelectorAll(".arrow");
  for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e)=>{
   let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
   arrowParent.classList.toggle("showMenu");
    });
  }
  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".btn-open");
  let sidebarbtn_close = document.querySelector(".btn-close");
  console.log(sidebarBtn);
  sidebarBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("close");
  });
  sidebarbtn_close.addEventListener("click", ()=>{
    sidebar.classList.toggle("close");
  });
  
  </script>

