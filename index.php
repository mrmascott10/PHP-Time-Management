<!-- Connect to database -->
<?php include 'db_connection.php' ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="styles.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <title>Index</title>
    </head>

    <body>
        <!-- Navigation bar -->
        <script>
            function myFunction() {
                var x = document.getElementById("myTopnav");
                if (x.className === "topnav") {
                    x.className += " responsive";
                }
                else {
                    x.className = "topnav";
                }
            }
        </script>
        <!-- Navigation bar end -->
        <div class="header-logo-banner">
            <div class="logo-banner-left">
                <h3>Header &amp; Logo</h3></div>
            <div class="logo-banner-right">
                <h4>Login  |  Signup</h4></div>
            <div style="clear:both;"></div>
        </div>
        <div class="nav-bar-background" id="top">
            <div class="alignmentTwo">
                <ul class="topnav" id="myTopnav">
                    <li><a href="http://www.tresna.co.uk/index.htm">HOME</a></li>
                    <li><a href="http://www.tresna.co.uk/products.htm">SHOP</a></li>
                    <li><a href="http://www.tresna.co.uk/blog/mikesblog.htm">BLOG</a></li>
                    <li><a href="http://www.tresna.co.uk/aboutus.htm">ABOUT US</a></li>
                    <li><a href="http://www.tresna.co.uk/getintouch.htm">CONTACT</a></li>
                    <li class="icon"> <a href="javascript:void(0);" class="dropdown" onclick="myFunction()">Main Menu&nbsp;&nbsp;<em class="fa fa-bars"></em></a> </li>
                </ul>
            </div>
        </div>
        <div class="advert-banner">
            <div class="content-outline">
                <h2>Making Time Keeping Simple &amp; Easy</h2>
                <br>
                <h3>Perfect for Lawyers &amp; Accountants</h3>
                <br>
                <button class="free-signup-button">FREE SIGN UP</button>
            </div>
        </div>
        <br>
        <div class="content-outline main-area-align">
            <h2>Manage Multiple Projects Simultaneously</h2>
            <hr class="title-hr">
            <br>
            <div class="main-info-outer">
                <div class="info-img"> <img src="square-image.jpg" alt=""> </div>
                <div class="info-text">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In mattis ultricies nibh, nec egestas diam pharetra sit amet. Sed metus purus, molestie nec tincidunt nec, faucibus ornare est. Nunc vitae consectetur mauris, vitae aliquam quam. Nulla fermentum felis dolor, nec consectetur justo egestas at. Nulla in nisl et odio dapibus mattis a at ante. Mauris elementum, turpis dignissim facilisis posuere, mi diam tempus turpis, fringilla lacinia enim ipsum eu erat. Nulla sed orci eu urna placerat egestas. Nullam dictum eros tortor, gravida vestibulum justo pharetra non. Nullam sapien urna, efficitur non accumsan in, aliquam sit amet lacus. Nam aliquet magna et mauris mollis tincidunt.</p>
                </div>
            </div>
            <div style="clear:both"></div>
            <br>
            
            <h2 class="signup-h2">SIGN UP</h2>
            <hr class="title-hr">
            <br>
            <form action="signup.php" method="post" class="signup-form">
                <input type="text" name="name" id="name" placeholder="NAME" required />
                <input type="text" name="email" id="email" placeholder="E-MAIL" required />
                <input type="text" id="username" name="username" placeholder="USERNAME" required />
                <input type="password" id="password" name="password" placeholder="PASSWORD" required />
                <input type="submit" value="SUBMIT" class="submit-form" name="submit" /> </form>
        <br>
        <br>
        <h2 class="signup-h2">LOG IN</h2>
            <hr class="title-hr">
            <br>
        <form class="signup-form" action="login.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required/>
            <input type="submit" name="submit" value="Submit" class="submit-form" /> </form>
        </div>
        
    </body>

    </html>
