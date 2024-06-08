<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <title>Login Card</title>
  <style>
   @import url('https://fonts.googleapis.com/css?family=Raleway:400,700');

body {
  background: #c0c0c0; 
  font-family: Raleway, sans-serif;
  color: #666;
}

.login {
  margin: 20px auto;
  padding: 40px 50px;
  max-width: 300px;
  border-radius: 5px;
  background: #fff;
  box-shadow: 1px 1px 1px #666;
}
  .login input {
    width: 100%;
    display: block;
    box-sizing: border-box;
    margin: 10px 0;
    padding: 14px 12px;
    font-size: 16px;
    border-radius: 2px; 
    font-family: Raleway, sans-serif;
  }

.login input[type=email],
.login input[type=password] {
  border: 1px solid #c0c0c0;
  transition: .2s;
}

.login input[type=email]:hover {
  border-color: #F44336;
  outline: none;
  transition: all .2s ease-in-out;
} 
.login input[type=password]:hover {
  border-color: #F44336;
  outline: none;
  transition: all .2s ease-in-out;
} 
.login input[type=submit] {
  border: none;
  background: #EF5350;
  color: white;
  font-weight: bold;  
  transition: 0.2s;
  margin: 20px 0px;
}

.login input[type=submit]:hover {
  background: #F44336;  
}

  .login h2 {
    margin: 20px 0 0; 
    color: #EF5350;
    font-size: 28px;
  }

.login p {
  margin-bottom: 40px;
}

/* .links {
  display: table;
  width: 100%;  
  box-sizing: border-box;
  border-top: 1px solid #c0c0c0;
  margin-bottom: 10px;
}

.links a {
  display: table-cell;
  padding-top: 10px;
}

.links a:first-child {
  text-align: left;
} */

  .login h2,
  .login p,
  .login a {
    text-align: center;    
  }

.login a {
  text-decoration: none;  
  
}

/* .login a:visited {
  color: inherit;
} */

.login a:hover {
  text-decoration: underline;
}
label {
    color: black;
    font-weight: 400;
}
a.logo {
    color: chocolate;
}
.links {
    color: black;
}
.email_error,.password_error{
    color:red;
    white-space: nowrap;
}
.fail{
  color: red;
  white-space: nowrap;
}
  </style>
</head>
<body>
<form class="login" action="/forgetpassword" method="post">
  @csrf
  <h2>Welcome, User!</h2>
  <p>Please log in</p>
  @if(Session::has('success'))
                <div class="alert-success">{{Session::get('success')}}</div>
                @endif
              
  <label>Enter Email/Mobile number</label>
  <input type="text" id="email" name="email" placeholder="" />
  @if(Session::has('failforg'))
                <div class="fail">{{Session::get('failforg')}}</div>
                @endif
  <span class="email_error"></span><br>
  <input type="submit" value="Forget Password" id="loginbtn" />
 
  <div class="links">
  Not Have Account?<a href="/login" class="logo">Login</a>
  </div>
</form>
<script>
    $(document).ready(function(){
	$("#loginbtn").click(function () {
  var email=$('#email').val();
  var password=$('#password').val();
  if(email == ''){
	$('.email_error').html('Please enter valid Email ID/Mobile number');
	return false ;
  }else {
	$('.email_error').html('');
  }
  if(password == ''){
	$('.password_error').html('Password is required');
	return false ;
  }else {
	$('.password_error').html('');
  }
    });
});
</script>
</body>
</html>