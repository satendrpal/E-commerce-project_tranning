<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register</title>
    <link href="https://fonts.googleapis.com/css?family=Rubik&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'></link>  
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
<style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');

*{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	list-style: none;
	font-family: 'Montserrat', sans-serif;
}

body{
	background: #84889c;
}
 
.wrapper{
	min-height: 100vh;
	display: flex;
	justify-content: center;
	align-items: center;
}

.registration_form{
	background: #545871;
	padding: 25px;
	border-radius: 5px;
	width: 400px;
    box-shadow: 5px 20px 20px 10px black;
}


.registration_form .title{
	text-align: center;
	font-size: 20px;
	text-transform: uppercase;
	color: #ebd0ce;
	letter-spacing: 5px;
	font-weight: 700;
}

.form_wrap{
	margin-top: 35px;
}

.form_wrap .input_wrap{
	margin-bottom: 15px;
}

/* .form_wrap .input_wrap:last-child{
	margin-bottom: 0;
} */

.form_wrap .input_wrap label{
	display: block;
	margin-bottom: 3px;
	color: white;
}

/* .form_wrap .input_grp{
	display: flex;
	justify-content: space-between;
} */

/* .form_wrap .input_grp  input[type="text"]{
	width: 165px;
} */

.form_wrap  input[type="text"]{
	width: 100%;
	border-radius: 3px;
	border: 1px solid #9597a6;
	padding: 10px;
	outline: none;
}
.form_wrap  input[type="tel"]{
	width: 100%;
	border-radius: 3px;
	border: 1px solid #9597a6;
	padding: 10px;
	outline: none;
}
.form_wrap input[type="email"] {
    width: 100%;
    border-radius: 3px;
    border: 1px solid #9597a6;
    padding: 10px;
    outline: none;
}
.form_wrap input[type="file"] {
    width: 100%;
    border-radius: 3px;
    border: 1px solid #9597a6;
    padding: 10px;
    outline: none;
	background-color: white;
}
.form_wrap input[type="password"] {
    width: 100%;
    border-radius: 3px;
    border: 1px solid #9597a6;
    padding: 10px;
    outline: none;
}
.form_wrap input[type="number"] {
    width: 100%;
    border-radius: 3px;
    border: 1px solid #9597a6;
    padding: 10px;
    outline: none;
}
select{
    width: 100%;
    border-radius: 3px;
    border: 1px solid #9597a6;
    padding: 10px;
    outline: none;
}
.form_wrap  input[type="text"]:focus{
	border-color: #ebd0ce;
}

.form_wrap ul{
	background: #fff;
	padding: 8px 10px;
	border-radius: 3px;
	display: flex;
	justify-content: center;
}

.form_wrap ul li:first-child{
	margin-right: 15px;
}

.form_wrap .input_radio:checked ~ span{
	background: #ebd0ce;
}

.form_wrap .submit_btn{
	width: 100%;
	background: #ebd0ce;
	padding: 10px;
	border: 0;
	border-radius: 3px;
	text-transform: uppercase;
	letter-spacing: 3px;
	cursor: pointer;
}

.form_wrap .submit_btn:hover{
	background: #ffd5d2;
}
p {
    color: cyan;
}
a.log {
    color: aliceblue;
    text-decoration: none;
}
.name_error,.email_error,.password_error,.address_error,.gender_error,.file_error{
	color:red;
}
.number_error{
	color: red;
}
#emailerrorsdfs{
	color: red;
}
    </style>
</head>
<body>
<div class="wrapper">
	<div class="registration_form">
		<div class="title">
			Create Account
		</div>

		<form id="frm">
		<div class="form_wrap">
		<div class="input_wrap">
					<label>Type</label>
					<Select name="type">
						<option>Select Option</option>
						<option value="U">User</option>
						<option value="D">Delivery</option>
					</Select>
					<span class="password_error"></span>
		           </div>
			       
					<div class="input_wrap">
						<label for="fname">Name</label>
						<input type="text" id="name" name="name">
						<span class="name_error"></span>
					</div>
				<div class="input_wrap">
					<label for="email">Email Address</label>
					<input type="email" id="email" name="email">
					<span class="email_error"></span>
					<span class="erorr " id="emailerrorsdfs"></span>
					<p class="text-danger">
          @error('email')
          {{$message}}
          @enderror
         </p>
				</div>
				<div class="input_wrap">
					<label>Password</label>
					<input type="password" id="password" name="password">
					<span class="password_error"></span>
				</div>
				<div class="input_wrap">
					<label for="city">Phone</label>
					<input type="number" id="address" name="address" maxlength="10">
					<span class="address_error"></span>
					<span class="number_error"></span>
				</div>
				<div class="input_wrap">
					<label for="gender">Gender</label>
					<select  id="gender" name="gender">
                          <option value="">Select Gender</option>
                           <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                    </select>
					<span class="gender_error"></span>
				</div>
				<div class="input_wrap">
					<label for="city">Profile</label>
					<input type="file" id="file" name="profile">
					<span class="file_error"></span>
				</div>
				<div class="input_wrap">
					<input type="submit" value="Register Now" class="submit_btn">
				</div>
				<p>Already Have an account? <a class="log" href="/login" data-toggle="modal" data-target="#login-modal">Login</a> </p>
			</div>
		</form>
	</div>
</div>
<script>
$(document).ready(function(){
	$("#frm").submit(function (e) {
		var tendigitnum = /^\d{10}$/; 

        e.preventDefault();
  var formData = new FormData(this);
  var name=$('#name').val();
  var email=$('#email').val();
  var password=$('#password').val();
  var address=$('#address').val();
  var gender=$('#gender').val();
  var profile=$('#file').val();
  if(name == ''){
	$('.name_error').html('name is required');
	return false ;
  }else {
	$('.name_error').html('');
  }
  if(email == ''){
	$('.email_error').html('Email is required');
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
  if(address == ''){
	$('.address_error').html('Address is required');
	return false ;
  }else {
	$('.address_error').html('');
  }
  if(gender == ''){
	$('.gender_error').html('gender is required');
	return false ;
  }else {
	$('.gender_error').html('');
  }
  if(profile == ''){
	$('.file_error').html('Profile is required');
	return false ;
  }else {
	$('.file_error').html('');
	$('.number_error').html('');
  }
  if (!address.match(tendigitnum)) {
	$('.number_error').html('Please enter a valid 10 digit number!');
    } else {
  $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
            $.ajax({
                type:'POST',
                url:"/postregister", 
                data: formData,
                processData: false,
                 contentType: false,
                success: function (data) {
					if (data.status == 200) {
                      $('#emailerrorsdfs').hide()
                      swal("Registration", "successfull", "success",);
                      $('form').trigger('reset');
                      $('.email_error').hide();
					  setTimeout(myURL, 1500);
                        function myURL() {
                            document.location.href = 'http://127.0.0.1:8000/login';
                        }
                      console.log(data);
                    } else {

                      $('#emailerrorsdfs').html(data.error)
                      console.log(data.error);
                    }
              
				
					},
                
            });
			
    }
  });
});
</script>
</body>
</html>