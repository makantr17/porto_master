<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- <link rel="stylesheet" type="text/css" href="HomeStyle.css"> -->
	<link rel="stylesheet" type="text/css" href="stylelog.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Barlow&display=swap" rel="stylesheet">
    
</head>



<body>
     <div id="cover">

     <div class="GrablogIn">
         <div class="loginSection">
              <div id="headerL"><h1>Log In</h1></div>
              
              <div class="formSection">
                    <form id="loginForm" method="post" action="confirmation.php" enctype="multipart/form-data">
                        <input type="email" placeholder="Email address" name="email">
                        <input type="password" placeholder="Password" name="password">
                        <div>
                            <input type="checkbox" name="checked"><label>Remember me for the next login</label>
                        </div>

                        <input id="submit" name="submit" type="submit" value="logIn">
                    </form>
              </div>
              <div>
                  <p>If you don't have an account, <a href="registration.php">create new account!</a></p>
              </div>
         </div>
     </div>
     </div>
     


<script>
     
     var logForm = document.getElementById("loginForm");
    // var projectName= form.elements['user'];
    // var userId= logForm.elements['userId'];
    if (window.addEventListener){
        logForm.addEventListener('submit', checkLogSubmit, true);
    } 

    function checkLogSubmit(e){
         var checkPub0 = false;
         var checkPub1 = false;
      
        if(logForm.elements['email'].value == ''){
            logForm.elements['email'].style.border="1px solid red";
            checkPub0 = true;
            e.preventDefault();
        }else{
            logForm.elements['email'].style.border="1px solid rgb(214, 214, 214)";
        }
        if(logForm.elements['password'].value == ''){
        logForm.elements['password'].style.border="1px solid red";
            checkPub1 = true;
            e.preventDefault();
        }else{
            logForm.elements['password'].style.border="1px solid rgb(250, 245, 245)";
        }
    }

</script>



</body>