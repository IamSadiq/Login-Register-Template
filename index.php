<?php session_start(); ?>
<HTML>
	<title>Login | Register Template</title>
	
	<style type="text/css">
		#head {color: white; background-color: black;height:8%;padding-top:0.07%}
		.msg2users{color: red;}
		#login_div {width: 30%; height: 10%;border:1px solid;}
		#signup_div {width: 30%; height: 40%;border:1px solid;}
		#close_signup {float: right; padding: 2%; color: red; border:1px solid;cursor:pointer}
	</style>

	<center><head><div id  = "head"><h2>Login | Register Template</h2></div></head>
	<body>
		<br>

		<?php 
		if (!isset($_SESSION['user'])){ ?>

			<div id = 'log_reg_background'>

			<span class = "msg2users">
				<?php if (isset($_POST['login_btn'])){require("BackEnd/login.php");}else{echo "Login here";}?>
			</span>
			<!--Login Form-->
			<div id = "login_div">
				<br>
				<form name = "login_form" method = "post" action = 'index.php'>
					<input type = text name = "uname" placeholder = "Username" required = "required" />
					<input type = password name = "pword" placeholder = "Password" required = "required" />
					<input type = submit name = "login_btn" value = "LOGIN" style = "cursor: pointer"/>
				</form>

				<br>
				<!--<span style = "cursor:pointer; color: green" onclick ="show_register()">Click here to REGISTER</span>-->
			</div>
			<br><br><br>

			<!--Register Form-->
			<span class = "msg2users">
				<?php if (isset($_POST['signup_btn'])){ require("BackEnd/register.php"); }else{echo "Register here";}?>
			</span>
			<div id ="signup_div">
				<form name = "signUp_form" method = "post">
					<span id = "close_signup">x</span>
					<br>
					<h3>Sign up Form</h3>
					<input style="width: 80%;" type = text name = "uname" placeholder = "Username" required = "required" />
					<br><span></span><br>
					<input style="width: 80%;" type = password name = "pword" placeholder = "Password" required = "required" />
					<br><span></span><br>
					<input style="width: 80%;" type = password name = "cpword" placeholder = "Confirm Password" required = "required" />
					<br><span></span><br>
					<input style="width: 80%;cursor: pointer" type = submit name = "signup_btn" value = "REGISTER"/>

				</form>
			</div>

			</div>
			<?php }

				//Welcome User, hide login & signup and show LOGOUT Button
				if (isset($_SESSION['user'])){ 
						echo "<style> #log_reg_background{visibility:hidden;display:none;}</style>
							<div id = welcome><h2>Welcome " . $_SESSION['user'] . "</h2><br><br>
							<form method = 'post' action = 'index.php'><input type = submit name = 'logout_btn' 
							value = 'LOGOUT' style = 'cursor: pointer'/></form></div>";

					// Logging User Out
					if (isset($_POST['logout_btn'])){ 
						session_unset(); session_destroy();
						echo "<style> #log_reg_background{visibility: visible;
							display: inline;} #welcome {visibility:hidden;display:none;}</style>";
					}
				} 
			?>
			<br><br>

			<span><span style="color: blue;">Abu-Bakr Siddique&copy; 2015. </span>All Rights Reserved</span>
	</body>
	</center>
</HTML>