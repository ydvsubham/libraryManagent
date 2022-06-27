
    <div class="nav1">
      <div class="logo">
        <img src="../img/admin_logo.png">
        <h1>LIBRARIA</h1>
        <p>Explore Your World Through Books</p>
      </div>
      <div class="reg_button">
        <form action="logout.php" method="post">
          <input type="submit" name="submit" value="Logout">
        </form>
      </div>
      <div class="mobile_btn"><a href="#" class="fa fa-bars" onclick='menu_open();'></a></div>
    </div>

        
    <div class="nav2">
      <div class="mobile_1200 close_btn"><a href="#" onclick='menu_close();'>&times;</a></div>
      <div class="main_cont2">
        <ul>
          <li><a href="admin.php">DashBoard</a></li>
          <li><a href="member.php">Member</a></li>
          <li id="book_m">
            <a href="#" >Books <span><i class="fa fa-angle-down"></i></span></a>
            <div id="book">
              <a href="add_book_type.php"> Add Books</a>
              <a href="add_book.php"> Add New Books </a>
              <a href="manage_books.php"> Books Details</a>
            </div>
          </li>
          <li id="m_book_m">
            <a href="#" >Manage Book <span><i class="fa fa-angle-down"></i></span></a>
            <div id="m_book">
              <a href="issue_book.php"> Issue Books</a>
              <a href="return_book.php"> Return Books</a>
            </div>
          </li>
          <li><a href="change_password.php">Change Password</a></li>
        </ul>
      </div>
      <div class="mobile_reg_button">
        <form action="logout.php" method="post">
          <input type="submit" name="submit" value="Logout">
        </form>
      </div>
    </div>