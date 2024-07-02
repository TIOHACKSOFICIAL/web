<?php

include './library/include.php';

if (isset($_SESSION['user_data'])) {
	header("Location: index.php");
	exit();
}

$KeyAuthApp = new KeyAuth\api($name, $ownerid);

if (!isset($_SESSION['sessionid'])) {
	$KeyAuthApp->init();
}

$numKeys = $_SESSION["numUsers"];
$numUsers = $_SESSION["numKeys"];
$numOnlineUsers = $_SESSION["numOnlineUsers"];
$customerPanelLink = $_SESSION["customerPanelLink"];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - TIO HACKS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-7fzTHsFSJvjURgpg4nl3BrW7HEIjGhOczqz2nFF2gYmqSzIa3Zp1PBdHyMCGGFRZ" crossorigin="anonymous">
    <link rel="stylesheet" href="register.css">
    
	  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <script src="https://cdn.keyauth.win/dashboard/unixtolocal.js"></script>

</head>
<body>
    <div class="center-content">
        <div class="hangar-form">
            <img draggable="false" src="resours/mascara.png" alt="Login" class="hangar-logo">
            <h1 class="hangar-auth_title">
                <span>╰┈➤Register</span>
            </h1>
            <form class="hangar-fieldset2" method="post">
                <div class="hangarFormControl-root hangarTextField-root jss1" data-validate="Username is required">
                    <label class="hangarFormLabel-root hangarInputLabel-root hangarInputLabel-formControl hangarInputLabel-animated hangarInputLabel-shrink hangarInputLabel-outlined" data-shrink="true"></label>
                    <div class="hangarInputBase-root hangarOutlinedInput-root hangarInputBase-formControl hangarInputBase-adornedStart hangarOutlinedInput-adornedStart">
                        <input autocomplete="off" aria-invalid="false" type="text" name="username" class="hangarInputBase-input hangarOutlinedInput-input hangarInputBase-inputAdornedStart hangarOutlinedInput-inputAdornedStart" placeholder="❅────────Username────────❅">
                        <fieldset aria-hidden="true" class="jss2 hangarOutlinedInput-notchedOutline">
                            <legend class="jss4 jss5"><span>◦•Username•◦</span></legend>
                        </fieldset>
                    </div>
                </div>
                <div class="hangarFormControl-root hangarTextField-root jss1" data-validate="Password is required">
                    <label class="hangarFormLabel-root hangarInputLabel-root hangarInputLabel-formControl hangarInputLabel-animated hangarInputLabel-shrink hangarInputLabel-outlined" data-shrink="true"></label>
                    <div class="hangarInputBase-root hangarOutlinedInput-root hangarInputBase-formControl hangarInputBase-adornedStart hangarOutlinedInput-adornedStart">
                        <input autocomplete="off" aria-invalid="false" type="password" name="password" class="hangarInputBase-input hangarOutlinedInput-input hangarInputBase-inputAdornedStart hangarOutlinedInput-inputAdornedStart" placeholder="❅────────Password────────❅">
                        <fieldset aria-hidden="true" class="jss2 hangarOutlinedInput-notchedOutline">
                            <legend class="jss4 jss5"><span>◦•Passaword•◦</span></legend>
                        </fieldset>
                    </div>
                </div>
                <div class="hangarFormControl-root hangarTextField-root jss1" data-validate="License is required">
                    <label class="hangarFormLabel-root hangarInputLabel-root hangarInputLabel-formControl hangarInputLabel-animated hangarInputLabel-shrink hangarInputLabel-outlined" data-shrink="true"></label>
                    <div class="hangarInputBase-root hangarOutlinedInput-root hangarInputBase-formControl hangarInputBase-adornedStart hangarOutlinedInput-adornedStart">
                        <input autocomplete="off" aria-invalid="false" type="text" name="key" class="hangarInputBase-input hangarOutlinedInput-input hangarInputBase-inputAdornedStart hangarOutlinedInput-inputAdornedStart" placeholder="❅────────License────────❅">
                        <fieldset aria-hidden="true" class="jss2 hangarOutlinedInput-notchedOutline">
                            <legend class="jss4 jss5"><span>◦•License•◦</span></legend>
                        </fieldset>
                    </div>
                </div>
                <div class="hangar-form_submitButton hangarButtonBase-root hangarButton-root hangarButton-contained hangarButton-containedPrimary" name="register">
                    <input type="submit" class="hangarButton-label" value="Register" name="register">
                </div>
            </form>
            <div class="hangarButtonBase-root hangarButton-root hangarButton-text hangarButton-textPrimary" id="loginButton">
                <button class="hangarButton-label" onclick="window.location.href='login.php'">Login</button>
            </div>
        </div>
    </div>

    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>

  <!-- Template Javascript -->
  <script src="js/main.js"></script>

<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

<?php
    if (isset($_POST['register'])) {
        // register with username,password,key
        if ($KeyAuthApp->register($_POST['username'], $_POST['password'], $_POST['key'])) {
            echo "<meta http-equiv='Refresh' Content='2; url=index.php'>";
            echo '
                            <script type=\'text/javascript\'>
                            
                            const notyf = new Notyf();
                            notyf
                            .success({
                                message: \'You have successfully registered!\',
                                duration: 3500,
                                dismissible: true
                            });                
                            
                            </script>
                            ';
        }
    }
?>

</body>
</html>
