<?php 

	session_start();
	
	if(isset($_SESSION['userlogin'])){
		header("Location: index.php");
	}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>animated login form</title>
	<link rel="icon" href="../image/newlogo.png">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="center">
        <h1>Login</h1>
        <form method="post">
            <div class="txt_field">
                <input type="text" id="username" required>
                <span></span>
                <label>Username</label>
            </div>
            <div class="txt_field">
                <input type="password" id="password" required>
                <span></span>
                <label>Password</label>
            </div>
            <div class="pass">Forgot password?</div>
            <input type="submit" id="login" value="Login">
            <div class="signup_link">
                Don't have account? <a href="http://localhost/act2/useraccounts/signup.php">Sign up</a>
            </div>
        </form>
    </div>
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
	$(function(){
		$('#login').click(function(e){

			var valid = this.form.checkValidity();

			if(valid){
				var username = $('#username').val();
				var password = $('#password').val();
			}

			e.preventDefault();

			$.ajax({
				type: 'POST',
				url: 'jslogin.php',
				data:  {username: username, password: password},
				success: function(data){
					alert(data);
					if($.trim(data) === "Login Successfully"){
						setTimeout(' window.location.href =  "http://localhost/act2/dashboard/index.php"', 1000);
					}
				},
				error: function(data){
					alert('there were erros while doing the operation.');
				}
			});

		});
	});
</script>
</body>
</html>