<html>

<head>

    <link href="css/interest.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet"> 
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet"> 
        
        <link href="css/styles.css" rel="stylesheet">

        <style></style>
</head>
<?php 
require 'includes/dbh.inc.php';
session_start();



?>

<body class="bg">
    <div class="bodyline">
    
    <script>
    function myFunction() {
        document.getElementById("demo").style.background - color: #3e828e;
}
    </script>
    <section class="container">
        <div class="c-col-content">
            <div class="c-signup-content classification-new-design">
            <form id="signup-form" action="includes/update_interest.php" method='post'
                            enctype="multipart/form-data">
                    <div class="title"><h1 class="title">    What is your interest?</h1></div>
                    <p class="subtitle">Select an interest to help us personalize your experience.</p>
                    

                   

                    
            
                    <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="technology-tab" data-toggle="tab" href="#technology" role="tab"
                                aria-controls="technology" aria-selected="true">Technology</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="Activity-tab" data-toggle="tab" href="#Activity" role="tab"
                                aria-controls="Activity" aria-selected="false">Activity</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="plang-tab" data-toggle="tab" href="#plang" role="tab"
                                aria-controls="plang" aria-selected="false">Programming language</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="others-tab" data-toggle="tab" href="#others" role="tab"
                                aria-controls="others" aria-selected="false">Others</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" id="all-tab" data-toggle="tab" href="#all" role="tab"
                                aria-controls="all" aria-selected="false">All</a>
                        </li> -->
                    </ul>


<div class="tab-content" id="myTabContent">

    <div class="tab-pane fade show active" id="technology" role="tabpanel" aria-labelledby="technology-tab">

            

                <div class="row mb-2">

       
            


                </div>

                <h1 >Technology</h1>


<?php
                
                    $sql =  "select cat_id, cat_name, (
                        select count(*) from topics
                        where topics.topic_cat = cat_id
                        ) as forums
                    from categories where cat_type='tech'  ";                       
                    $stmt = mysqli_stmt_init($conn);    

                    if (!mysqli_stmt_prepare($stmt, $sql))
                    {
                        die('SQL error');
                    }
                    else
                    {
                       
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);


                        while ($row = mysqli_fetch_assoc($result))
                        {

                           
                            ?>
                    <label id="demo" onclick="" href="" data-classification="types" class="js-submit option">
                    <!-- <input id="demo"  type="button" type="hidden" name="intid" value="<?= $row['cat_name']; ?>"/> -->
                    <input id="demo" class="chk-btn" type="checkbox" name="interest[]"
                            value="<?= $row['cat_name']; ?>">
                            
                           
                        <div class="academic">
                    

                            <div class="type"><?= $row['cat_name']; ?></div>
                            
                         

                        </div>

                    </label>



                    <?php ;
                        }
                    }
                    ?>

        </div>
    


    <div class="tab-pane fade " id="Activity" role="Activity" aria-labelledby="Activity-tab">

         <div class="row mb-2">
                           

                            </div>

                            <h1 >Activity</h1>


<?php
                
                    $sql =  "select cat_id, cat_name, (
                        select count(*) from topics
                        where topics.topic_cat = cat_id
                        ) as forums
                    from categories where cat_type='activity' ";                       
                    $stmt = mysqli_stmt_init($conn);    

                    if (!mysqli_stmt_prepare($stmt, $sql))
                    {
                        die('SQL error');
                    }
                    else
                    {
                       
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);


                        while ($row = mysqli_fetch_assoc($result))
                        {

                           
                            ?>
                    <label id="demo" onclick="" href="" data-classification="types" class="js-submit option">
                    <!-- <input id="demo"  type="button" type="hidden" name="intid" value="<?= $row['cat_name']; ?>"/> -->
                    <input id="demo" class="chk-btn" type="checkbox" name="interest[]"
                            value="<?= $row['cat_name']; ?>">
                            
                           
                        <div class="academic">
                    

                            <div class="type"><?= $row['cat_name']; ?></div>
                            
                         

                        </div>

                    </label>



                    <?php ;
                        }
                    }
                    ?>

         </div>



    <div class="tab-pane fade " id="plang" role="plang" aria-labelledby="plang-tab">

                         

                <div class="row mb-2">
                
            </div>

            <h1 >Programming Language</h1>


<?php
                
                    $sql =  "select cat_id, cat_name, (
                        select count(*) from topics
                        where topics.topic_cat = cat_id
                        ) as forums
                    from categories where cat_type='programming_language' or cat_type='programming' ";                       
                    $stmt = mysqli_stmt_init($conn);    

                    if (!mysqli_stmt_prepare($stmt, $sql))
                    {
                        die('SQL error');
                    }
                    else
                    {
                       
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);


                        while ($row = mysqli_fetch_assoc($result))
                        {

                           
                            ?>
                    <label id="demo" onclick="" href="" data-classification="types" class="js-submit option">
                    <!-- <input id="demo"  type="button" type="hidden" name="intid" value="<?= $row['cat_name']; ?>"/> -->
                    <input id="demo" class="chk-btn" type="checkbox" name="interest[]"
                            value="<?= $row['cat_name']; ?>">
                            
                           
                        <div class="academic">
                    

                            <div class="type"><?= $row['cat_name']; ?></div>
                            
                         

                        </div>

                    </label>



                    <?php ;
                        }
                    }
                    ?>

    </div>


    

    <div class="tab-pane fade " id="others" role="others" aria-labelledby="others-tab">

                         

            <div class="row mb-2">
           
                </div>

                <h1 >Others</h1>


<?php
                
                    $sql =  "select cat_id, cat_name, (
                        select count(*) from topics
                        where topics.topic_cat = cat_id
                        ) as forums
                    from categories where cat_type='other' ";                       
                    $stmt = mysqli_stmt_init($conn);    

                    if (!mysqli_stmt_prepare($stmt, $sql))
                    {
                        die('SQL error');
                    }
                    else
                    {
                       
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);


                        while ($row = mysqli_fetch_assoc($result))
                        {

                           
                            ?>
                    <label id="demo" onclick="" href="" data-classification="types" class="js-submit option">
                    <!-- <input id="demo"  type="button" type="hidden" name="intid" value="<?= $row['cat_name']; ?>"/> -->
                    <input id="demo" class="chk-btn" type="checkbox" name="interest[]"
                            value="<?= $row['cat_name']; ?>">
                            
                           
                        <div class="academic">
                    

                            <div class="type"><?= $row['cat_name']; ?></div>
                            
                         

                        </div>

                    </label>



                    <?php ;
                        }
                    }
                    ?>

    </div>  


    <div class="tab-pane fade " id="all" role="all" aria-labelledby="all-tab">

                         

            <div class="row mb-2">
            
                </div>
                




                <h1 >Framework</h1>





                <?php
                
                    $sql =  "select cat_id, cat_name, (
                        select count(*) from topics
                        where topics.topic_cat = cat_id
                        ) as forums
                    from categories where cat_type='framework' ";                       
                    $stmt = mysqli_stmt_init($conn);    

                    if (!mysqli_stmt_prepare($stmt, $sql))
                    {
                        die('SQL error');
                    }
                    else
                    {
                       
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);


                        while ($row = mysqli_fetch_assoc($result))
                        {

                           
                            ?>
                    <label id="demo" onclick="" href="" data-classification="types" class="js-submit option">
                    <!-- <input id="demo"  type="button" type="hidden" name="intid" value="<?= $row['cat_name']; ?>"/> -->
                    <input id="demo" class="chk-btn" type="checkbox" name="interest[]"
                            value="<?= $row['cat_name']; ?>">
                            
                           
                        <div class="academic">
                    

                            <div class="type"><?= $row['cat_name']; ?></div>
                            
                         

                        </div>

                    </label>



                    <?php ;
                        }
                    }
                    ?>



<h1 >Technology</h1>


<?php
                
                    $sql =  "select cat_id, cat_name, (
                        select count(*) from topics
                        where topics.topic_cat = cat_id
                        ) as forums
                    from categories where cat_type='tech' ";                       
                    $stmt = mysqli_stmt_init($conn);    

                    if (!mysqli_stmt_prepare($stmt, $sql))
                    {
                        die('SQL error');
                    }
                    else
                    {
                       
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);


                        while ($row = mysqli_fetch_assoc($result))
                        {

                           
                            ?>
                    <label id="demo" onclick="" href="" data-classification="types" class="js-submit option">
                    <!-- <input id="demo"  type="button" type="hidden" name="intid" value="<?= $row['cat_name']; ?>"/> -->
                    <input id="demo" class="chk-btn" type="checkbox" name="interest[]"
                            value="<?= $row['cat_name']; ?>">
                            
                           
                        <div class="academic">
                    

                            <div class="type"><?= $row['cat_name']; ?></div>
                            
                         

                        </div>

                    </label>



                    <?php ;
                        }
                    }
                    ?>
<h1 >Activity</h1>


<?php
                
                    $sql =  "select cat_id, cat_name, (
                        select count(*) from topics
                        where topics.topic_cat = cat_id
                        ) as forums
                    from categories where cat_type='activity' ";                       
                    $stmt = mysqli_stmt_init($conn);    

                    if (!mysqli_stmt_prepare($stmt, $sql))
                    {
                        die('SQL error');
                    }
                    else
                    {
                       
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);


                        while ($row = mysqli_fetch_assoc($result))
                        {

                           
                            ?>
                    <label id="demo" onclick="" href="" data-classification="types" class="js-submit option">
                    <!-- <input id="demo"  type="button" type="hidden" name="intid" value="<?= $row['cat_name']; ?>"/> -->
                    <input id="demo" class="chk-btn" type="checkbox" name="interest[]"
                            value="<?= $row['cat_name']; ?>">
                            
                           
                        <div class="academic">
                    

                            <div class="type"><?= $row['cat_name']; ?></div>
                            
                         

                        </div>

                    </label>



                    <?php ;
                        }
                    }
                    ?>
<h1 >Programming Language</h1>


<?php
                
                    $sql =  "select cat_id, cat_name, (
                        select count(*) from topics
                        where topics.topic_cat = cat_id
                        ) as forums
                    from categories where cat_type='programming_language' ";                       
                    $stmt = mysqli_stmt_init($conn);    

                    if (!mysqli_stmt_prepare($stmt, $sql))
                    {
                        die('SQL error');
                    }
                    else
                    {
                       
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);


                        while ($row = mysqli_fetch_assoc($result))
                        {

                           
                            ?>
                    <label id="demo" onclick="" href="" data-classification="types" class="js-submit option">
                    <!-- <input id="demo"  type="button" type="hidden" name="intid" value="<?= $row['cat_name']; ?>"/> -->
                    <input id="demo" class="chk-btn" type="checkbox" name="interest[]"
                            value="<?= $row['cat_name']; ?>">
                            
                           
                        <div class="academic">
                    

                            <div class="type"><?= $row['cat_name']; ?></div>
                            
                         

                        </div>

                    </label>



                    <?php ;
                        }
                    }
                    ?>
<h1 >Programming</h1>


<?php
                
                    $sql =  "select cat_id, cat_name, (
                        select count(*) from topics
                        where topics.topic_cat = cat_id
                        ) as forums
                    from categories where cat_type='programming' ";                       
                    $stmt = mysqli_stmt_init($conn);    

                    if (!mysqli_stmt_prepare($stmt, $sql))
                    {
                        die('SQL error');
                    }
                    else
                    {
                       
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);


                        while ($row = mysqli_fetch_assoc($result))
                        {

                           
                            ?>
                    <label id="demo" onclick="" href="" data-classification="types" class="js-submit option">
                    <!-- <input id="demo"  type="button" type="hidden" name="intid" value="<?= $row['cat_name']; ?>"/> -->
                    <input id="demo" class="chk-btn" type="checkbox" name="interest[]"
                            value="<?= $row['cat_name']; ?>">
                            
                           
                        <div class="academic">
                    

                            <div class="type"><?= $row['cat_name']; ?></div>
                            
                         

                        </div>

                    </label>



                    <?php ;
                        }
                    }
                    ?>
<h1 >Others</h1>


<?php
                
                    $sql =  "select cat_id, cat_name, (
                        select count(*) from topics
                        where topics.topic_cat = cat_id
                        ) as forums
                    from categories where cat_type='other' ";                       
                    $stmt = mysqli_stmt_init($conn);    

                    if (!mysqli_stmt_prepare($stmt, $sql))
                    {
                        die('SQL error');
                    }
                    else
                    {
                       
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);


                        while ($row = mysqli_fetch_assoc($result))
                        {

                           
                            ?>
                    <label id="demo" onclick="" href="" data-classification="types" class="js-submit option">
                    <!-- <input id="demo"  type="button" type="hidden" name="intid" value="<?= $row['cat_name']; ?>"/> -->
                    <input id="demo" class="chk-btn" type="checkbox" name="interest[]"
                            value="<?= $row['cat_name']; ?>">
                            
                           
                        <div class="academic">
                    

                            <div class="type"><?= $row['cat_name']; ?></div>
                            
                         

                        </div>

                    </label>



                    <?php ;
                        }
                    }
                    ?>
















    </div> 



















</div>



    
                    <br> <input type="submit" class="type-btn btn btn-light btn-lg mt-2" name="signup-submit"
                        value="Login">

                </form>
            </div>
        </div>
    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    </div>
</body>

</html>