<html>
<head>
    <script src="js/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="css/login.css">
<title>Admin Login</title>
    
</head>
<body>

<div class="login-page">
  <div class="form">
      <form class="register-form" action="action/CheckUser.php">
      <input type="text" placeholder="name"/>
      <input type="password" placeholder="password"/>
      <input type="text" placeholder="email address"/>
      <button>create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>
      <form class="login-form" action="action/action.php" method='post'>
      <input type="text" name="username" placeholder="username"/>
      <input type="password" name='pwd' placeholder="password"/>
      <input type="hidden" name="action" value='login'>
      <button>login</button>
    </form>
  </div>
</div>

<script>

    $('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
    
</script>
    
</body>
</html>