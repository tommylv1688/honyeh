<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $layout['admin_title'];?></title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/login.css">
</head>
<style>
	
</style>
<body>
	<div class="login">
		<h1>Login</h1>
	    <form role="form" method="post" action="<?php echo base_url('login/loginPost'); ?>">
	    	<input type="text" name="username" placeholder="Username" required="required" />
	        <input type="password" name="password" placeholder="Password" required="required" />
	        <button type="submit" class="btn btn-primary btn-block btn-large">Enter</button>
	        <input type="hidden" id="token" name="<?php echo $token;?>" value="<?php echo $hash;?>" />
	    </form>
	</div>
</body>
</html>