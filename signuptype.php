<?php

    session_start();
    define('TITLE',"Signup | FED");
    
    if(isset($_SESSION['userId']))
    {
        header("Location: index.php");
        exit();
    }
   

?>  


<html>
    <head>        
        <link href="css/signuptype.css" rel="stylesheet">
</head>
    <body class="bg">

    

    <div class="c-col-content mt-5"> 
  


        <div class="c-signup-content classification-new-design"> 
            <div class="row text-center mt-5">
       
        
         <form class="formm" method="POST" action="signup.SignUpResearcherClassification.html?dbw=true"> 
         <h1 class="title ">What type of researcher are you?</h1>
        <input type="hidden" name="request_token" value=""> 
        <div class="col-lg-8 col-md-8 col-8">
        <a href="signup.php" data-classification="institution" class="js-submit option institution"> 
            <div class="academic"> 
                <div class="indent-container"> 
                    <div class="indent-left"> 
                        <div class="icon academic-researcher-icon">

                        </div> </div> 
                        <div class="indent-right"> 
                            <div class="arrow-icon"></div> </div>
                             <div class="type"> Academic or student </div> 
                             <div class="examples"> University students and independent researchers </div> 
                            </div> </div> </a></div>
                             
        <div class="col-lg-8 col-md-8 col-8">
                            
                            <a href="signupteacher.php" data-classification="company" class="js-submit option company"> 
                                <div class="corporate"> 
                                    <div class="indent-container"> 
                                        <div class="indent-left">
                                             <div class="icon corporate-researcher-icon"></div> </div> 
                                             <div class="indent-right"> <div class="arrow-icon"></div> </div>
                                              <div class="type"> Teachers and Professor  </div> 
                                              <div class="examples"> Teachers , Professor studying or teaching in the college </div> 
                                            </div> </div>
                                             </a> </div>
                                             
                                             
        <div class="col-lg-8 col-md-8 col-8">
                                             
                                             <a href="signupauth.php" data-classification="medical" class="js-submit option medical"> 
                                                 <div class="other"> <div class="indent-container"> <div class="indent-left">
                                                      <div class="icon ico-medical-researcher-color"></div> </div> 
                                                      <div class="indent-right"> <div class="arrow-icon"></div> </div> 
                                                      <div class="type"> Authorities </div> <div class="examples"> Principal, Department Heads and other Staffs </div> 
                                                    </div> </div> </a> </div>
                                                   
                                                            </form> 
                                                            </div>
                                                            </div>
    </div>
                                                        </body>
                                                        </html>