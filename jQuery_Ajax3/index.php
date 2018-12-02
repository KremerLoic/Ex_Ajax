<!DOCTYPE html>
<html>
<head>
    <title>TODO supply a title</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
<main>
<form id="inscription" action="index.php">
<label id ="label_login"> LOGIN
  <input type="text" id="login" name="login">
  <p class="statusLogin"></p>
</label>

<label id ="label_password"> PASSWORD
  <input type="password" id="password" name="password">
  <p class="statusPassword"></p>
</label>

<label id ="label_password_confirm"> CONF PASSWORD
  <input type="password" id="passwordConfirm" name="passwordConfirm">
  <p class="statusPasswordConfirm"></p>
</label>


<input type=button id="submit" name="submit" value="Submit">

</form>
</main>
<script src="js/jquery-3.3.1.js" type="text/javascript"></script>
<script src="js/main.js" type="text/javascript"></script>
</body>
</html>
