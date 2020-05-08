
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

     <div class="GrapRegist">
         <div class="RegisterSection">
              <div id="headerR"><h1>Log In</h1></div>
              <div class="formSectionReg">
                    <form id="register" method="post" action="registrationConfirm.php" enctype="multipart/form-data">
                       
                       <!-- section 1 -->
                       <div id="section1">

                           <div id="contSection1">
                                <div>
                                        <input type="text" placeholder="Username" name="name">
                                        <label>*</label>
                                </div>

                                <div>
                                        <input type="email" placeholder="Email address" name="email">
                                        <label>*</label>
                                </div>

                                <div>
                                        <input type="password" placeholder="Password" name="password">
                                        <label>*</label>
                                </div>

                                <div>
                                        <input type="password" placeholder="Confirm password" name="confirmpass">
                                        <label>*</label>
                                </div>

                                <div>
                                        <input type="number" placeholder="Phone number" name="phone">
                                        <label>*</label>
                                </div>

                                <div>
                                        <input type="text" placeholder="Country name" name="country">
                                        <label>*</label>
                                </div>

                                <div>
                                        <input type="text" placeholder="City" name="city">
                                        <label>*</label>
                                </div>

                                <div>
                                        <input type="text" placeholder="About your profession" name="details">
                                        <label>*</label>
                                </div>

                                <div>
                                        <input type="text" placeholder="Address" name="address">
                                        <label>*</label>
                                </div>

                                <div>
                                        <input type="text" placeholder="Profession" name="profession">
                                        <label>*</label>
                                </div>



                                <input style="width:150px; border:0px; height:30px; margin-top:10px; background-color:orange" name="section1" type="button" value="Next">
                            </div>        
                       </div>

                       <!-- section 2 -->
                       <div style="display:none" id="section2">

                            <input type="file" name="cover" placeholder="upload cover">
                            <label>Upload your cover</label>
                            
                            <div id="tasks">
                                <div> <p>Content writter</p><input type="checkbox"> </div>
                                <div> <p>Engineer</p><input type="checkbox"> </div>
                                <div> <p>Interior desgin</p><input type="checkbox"> </div>
                                <div> <p>Content writter</p><input type="checkbox"> </div>
                                <div> <p>Engineer</p><input type="checkbox"> </div>
                                <div> <p>Interior desgin</p><input type="checkbox"> </div>
                                <div> <p>Engineer</p><input type="checkbox"> </div>
                                <div> <p>Interior desgin</p><input type="checkbox"> </div>
                            </div>
                            
                            <!-- assign the prefered value below -->
                            <input style="display:none" type="text" name="prefered" >

                            <input style="width:150px; border:0px; height:30px; margin-top:100px; border-radius:5px; background-color:orange" 
                            type="button" name="backSection1" value="Back">

                            <input style="width:150px; border:0px; height:30px; margin-top:100px; border-radius:5px; background-color:orange" 
                            type="button" name="section2" value="Next">
                       </div> 

                       <!-- section 3 -->
                       <div style="display:none" id="section3">
                           <label>Upload your Cv below</label><br>
                            <input type="file" name="uploadCV">
                            <div>
                                 <input type="checkbox" name="checked">
                                 <label>Accept the term of condition of our platform data usage?</label>
                            </div>

                            <input style="width:150px; border:0px; height:30px; margin-top:100px; border-radius:5px; background-color:orange" 
                            type="button" name="backSection2" value="Back">

                            <input style="width:150px; border:0px; height:30px; border-radius:5px; margin-top:100px; background-color:orange"
                              id="submit" name="submit" type="submit" value="Confirm">

                       </div>
                        
                        
                    </form>
              </div>
             
         </div>
     </div>
     </div>
     


<script>
     
     var regForm = document.getElementById("register");
    // var projectName= form.elements['user'];
    // var userId= logForm.elements['userId'];
    if (window.addEventListener){
        regForm.addEventListener('submit', checkregSubmit, true);
        regForm.elements['section1'].addEventListener('click', openSection2, true);
        regForm.elements['section2'].addEventListener('click', openSection3, true);
        regForm.elements['backSection1'].addEventListener('click', BSection1, true);
        regForm.elements['backSection2'].addEventListener('click', BSection2, true);
    } 
    function BSection1(e){
        document.getElementById("section1").style.display = "block";
        document.getElementById("section2").style.display = "none";
        document.getElementById("section3").style.display = "none";
       
    }
    function BSection2(e){
        document.getElementById("section1").style.display = "none";
        document.getElementById("section2").style.display = "block";
        document.getElementById("section3").style.display = "none";
    }

    function openSection2(e){
        var checkPub0 = false;
         var checkPub1 = false;

        if(regForm.elements['email'].value == ''){
            regForm.elements['email'].style.border="1px solid red";
            checkPub0 = true;
            e.preventDefault();
        }else{
            regForm.elements['email'].style.border="1px solid rgb(214, 214, 214)";
        }
        if(regForm.elements['password'].value == ''){
            regForm.elements['password'].style.border="1px solid red";
            checkPub1 = true;
            e.preventDefault();
        }else{
            regForm.elements['password'].style.border="1px solid rgb(250, 245, 245)";
        }

        if(regForm.elements['address'].value == ''){
            regForm.elements['address'].style.border="1px solid red";
            checkPub1 = true;
            e.preventDefault();
        }else{
            regForm.elements['address'].style.border="1px solid rgb(250, 245, 245)";
        }

        if(regForm.elements['profession'].value == ''){
            regForm.elements['profession'].style.border="1px solid red";
            checkPub1 = true;
            e.preventDefault();
        }else{
            regForm.elements['profession'].style.border="1px solid rgb(250, 245, 245)";
        }

        if(regForm.elements['city'].value == ''){
            regForm.elements['city'].style.border="1px solid red";
            checkPub1 = true;
            e.preventDefault();
        }else{
            regForm.elements['city'].style.border="1px solid rgb(250, 245, 245)";
        }
        
        if(regForm.elements['name'].value == ''){
            regForm.elements['name'].style.border="1px solid red";
            checkPub0 = true;
            e.preventDefault();
        }else{
            regForm.elements['name'].style.border="1px solid rgb(214, 214, 214)";
        }
        if(regForm.elements['phone'].value == ''){
            regForm.elements['phone'].style.border="1px solid red";
            checkPub1 = true;
            e.preventDefault();
        }else{
            regForm.elements['phone'].style.border="1px solid rgb(250, 245, 245)";
        }
        if(regForm.elements['country'].value == ''){
            regForm.elements['country'].style.border="1px solid red";
            checkPub0 = true;
            e.preventDefault();
        }else{
            regForm.elements['country'].style.border="1px solid rgb(214, 214, 214)";
        }
        if(regForm.elements['confirmpass'].value == '' || 
        regForm.elements['password'].value != regForm.elements['confirmpass'].value){
            regForm.elements['confirmpass'].style.border="1px solid red";
            checkPub1 = true;
            e.preventDefault();
        }else{
            regForm.elements['confirmpass'].style.border="1px solid rgb(250, 245, 245)";
        }
        if(regForm.elements['details'].value <= 0 || regForm.elements['details'].value > 45){
            regForm.elements['details'].style.border="1px solid red";
            checkPub0 = true;
            e.preventDefault();
        }else{
            regForm.elements['details'].style.border="1px solid rgb(214, 214, 214)";
        }

        if (checkPub0 == false && checkPub1== false) {
            document.getElementById("section1").style.display = "none";
            document.getElementById("section2").style.display = "block";
            document.getElementById("section3").style.display = "none";
        }


    }
    function openSection3(e){
        var checkPub3 = false;
        var check4= false;
        if (regForm.elements['cover'].value == '') {
            regForm.elements['cover'].style.border="1px solid red";
            checkPub3 = true;
            e.preventDefault();
        }else{
            regForm.elements['cover'].style.border="0px";
        }

        preferedTask = document.querySelectorAll("#section2 #tasks input");
        var countFld = 0;
        var tasksli = '';
        for (let index = 0; index < preferedTask.length; index++) {
            if (preferedTask[index].checked) {
                    if (index == 0) {
                        tasksli = preferedTask[index].parentElement.children[0].innerText;
                    }else{
                        tasksli = tasksli + '/' + preferedTask[index].parentElement.children[0].innerText;
                    }
                    
                    countFld = countFld + 1;
            }
        }

        if (countFld <= 0) {
            alert("Please select a task");
            check4= true;
            e.preventDefault();
        }


        
        if (checkPub3 == false && check4 == false) {
            regForm.elements['prefered'].value = tasksli;
            document.getElementById("section1").style.display = "none";
            document.getElementById("section2").style.display = "none";
            document.getElementById("section3").style.display = "block";
        }

    }

    function checkregSubmit(e){

        if (regForm.elements['uploadCV'].value == '') {
            regForm.elements['uploadCV'].style.border="1px solid red";
            checkPub3 = true;
            e.preventDefault();
        }else{
            regForm.elements['uploadCV'].style.border="0px";
        }
      
      
        if(!this.elements['checked'].checked){
            alert("confirm before you submit");
            checkPub0 = true;
            e.preventDefault();
        }





    }

</script>

</body>