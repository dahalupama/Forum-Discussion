<?php
use LDAP\Result;

    session_start();
    include_once 'includes/dbh.inc.php';
    define('TITLE',"Dashboard| FED");

    $companyName = "Franklin's Fine Dining";
    
    function strip_bad_chars( $input ){
        $output = preg_replace( "/[^a-zA-Z0-9_-]/", "", $input);
        return $output;
    }
    
    if(!isset($_SESSION['userId']))
    {
        header("Location: login.php");
        exit();
    }
    
    include 'includes/HTML-head.php';
?>
<link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap"
    rel="stylesheet">

<link href="css/list-page.css" rel="stylesheet">
<link href="css/lod.css" rel="stylesheet">
<link href="css/main.css" rel="stylesheet">



<!-- ..............................recommendor system............................................ -->
<?php


$sql = "SELECT user_interest from  users Where idUsers=
{$_SESSION['userId']}";
$stmt = mysqli_stmt_init($conn);    

if (!mysqli_stmt_prepare($stmt, $sql))
{
    die('SQL error');
}
    else
    {
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);


    $row = mysqli_fetch_assoc($result);
    }


    $myObj = $row['user_interest'];
    $arra=explode (",", $row['user_interest']);

    $resStr2 = str_ireplace(' ', '_', $myObj);
    $arr = explode (",", $resStr2);
    
     $result = shell_exec('python C:/xampp/htdocs/NepsWebsite-master-latest/rm.py '.($resStr2));
    
    
     $resultData = ($result);
    
//    print( $resultData );
    // print $myObj




?>


<!-- ..............................recommendor system............................................ -->




<style>
    .text-dark {
    color: #343a40!important;
    font-size: 24px;
}
body {
    background-color: rgb(239 241 242) !important;
}

.mt-5 .container .row {
    background-image: url("img/a.png");
}

.loader-wrapper {
    background-image: url("img/t.png");
}

.mt-5 {
    position: relative;
    top: 0%;
}

.carda {
    height: 320px !important;
    width: 300px;
    border-radius: 3rem;
    margin-left: 20px;
}

.blogindex-cover {
    width: 347px;
    height: 287px;
    object-fit: cover;
}

.fa-pencil:before {
    content: "\f040";
    margin-left: -150px;
}

.card {
    border-radius: 0.9rem;
}

.col-md-6 {
    -ms-flex: 0 0 50%;
    flex: 0 0 31% !important;
    max-width: 50%;
    min-height: 20.66% !important;
    max-height: 50% !important;
    box-shadow: 0 0 20px 3px rgba(0, 0, 0, 0.119);
    padding-left: 0px !important;
    padding-right: 0px !important;
    padding-bottom: inherit !important;
    margin: 15px;
}

.col-sm-8{
   
    flex: 0 0 74.666667% !important;
    max-width: 74.666667% !important;
    
}

.mb-4{
    margin-bottom: 0rem !important;
}

.my-4 {
    margin-bottom: 0rem !important;
}

.col-sm-3 {
    -ms-flex: 0 0 25% !important;
    flex: 0 0 25% !important;
    max-width: 20% !important;
}

.card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1.25rem;
    font-size: 20px;
}

.col-sm-2{
    position: relative;
    top: -43cm;
    left: 119px;
}
.btn-block+.btn-block {
    margin-top: .5rem;
    position: relative;
    left: 7cm;
    top: -60px;
}

.btn-group-lg>.btn, .btn-lg {
    padding: .5rem 1rem;
    font-size: 1.25rem;
    line-height: 1.7 !important;
    width: 253px !important;
    border-radius: .3rem;
}


/* .tab-content{
opacity: 0.93;
} */
</style>



</head>


<body onload="pageLoad()">




    <div id="loader-wrapper">
        <span class="loader"></span>
        <img src='img/loader.png' class='loader-logo'>
    </div>
    

    <div id="content" style="display: none" class=animate-bottom>

        <?php include 'includes/navbar.php'; ?>
        <img src="img/background.jpg" alt="background" style="max-height: 520px;width: 100vw;">
        

        <div class="container-fluid" style="margin-top:100px;">
                <div class="row">
                    <div class="col-sm-3">

                    <?php include 'includes/forum-card.php'; ?>
                        

                    </div>


                    <div class="col-sm-8">

                    <div class="text-center p-3">
                        <!-- <img src="img/200.png"> -->
                        <a href="index.php">
                            <h2 class='text-success'>DASHBOARD</h2>
                        </a>
                        <br>
                    </div>


                    <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="forum-tab" data-toggle="tab" href="#forum" role="tab"
                                aria-controls="forum" aria-selected="true">Recent Forums</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="blog-tab" data-toggle="tab" href="#blog" role="tab"
                                aria-controls="blog" aria-selected="false">Recent Blogs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="poll-tab" data-toggle="tab" href="#poll" role="tab"
                                aria-controls="poll" aria-selected="false">Recent Polls</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="event-tab" data-toggle="tab" href="#event" role="tab"
                                aria-controls="event" aria-selected="false">Recent Events</a>
                        </li>
                    </ul>

                    <br>

                    <div class="tab-content" id="myTabContent">

                        <div class="tab-pane fade show active" id="forum" role="tabpanel" aria-labelledby="forum-tab">

                            <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded shadow-sm">
                                <img class="mr-3" src="img/200.png" alt="" width="48" height="48">
                                <div class="lh-100">
                                    <h1 class="mb-0 text-white lh-100">Latest Forums</h1>
                                </div>
                            </div>

                            <div class="row mb-2">

                                <?php
                                
                                $results=($resultData);
                                
                            //    print($results);

                               $resultArray = explode(" ", $results);
                               $resultLength = count($resultArray);
                               $topis = "";
                              for($i = 0; $i < $resultLength; $i++){
                                if($i == $resultLength - 1) {
                                    $topis = $topis.$resultArray[$i];
                                } else {
                                    $topis = $topis . $resultArray[$i]. ",";
                                }
                              }

                            //   print($topis);
                            //   print($resultLength);
                                
                            
                            
                               
                                        $sql = "SELECT topic_id, forum_img, topic_subject, topic_date, topic_cat, topic_by, userImg, idUsers, uidUsers, cat_name, (
                                                    select sum(post_votes)
                                                    from posts
                                                    where post_topic = topic_id
                                                    ) as upvotes
                                                from topics, users, categories 
                                                where topics.topic_by = users.idUsers
                                                and topics.topic_cat = categories.cat_id
                                                
                                               
                                                and( categories.cat_id in ($results 16)
                                                or categories.cat_name IN ( '" . implode( "', '", $arra ) . "' ) )
                                                
                                                
                                                
                                                order by topic_id desc, upvotes asc 
                                                LIMIT 9";
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




            //............................................................Filter words section...................................................................................................................................

            {
 	        $filterWords = array('gosh', 'darn', 'poo', 'arse' , 'ass' , 'asshole', 'bastard' , 'bitch' , 'bollocks' , 'brotherfucker' , 'bugger' , 'bullshit' , 'cocksucker' , 'crap' , 'cunt' , 'damn' , 'frigger' , 'fuck' , 'hell' , 'holy shit' , 'motherfucker' , 'nigga' , 'piss' , 'prick' , 'shit' , 'slut' , 'son of a bitch' , 'twat');

 	            $filterCount = sizeof($filterWords);
            for ($i = 0; $i < $filterCount; $i++) {
	            $row['topic_subject']= preg_replace_callback('/\b' . $filterWords[$i] . '\b/i', function($matches){return str_repeat('*', strlen($matches[0]));}, $row['topic_subject']);
            }
	            $row['topic_subject'];
                }



                //.............................................................................................................................................................................................................................................



                                                echo '<div class="col-md-6">
                                                        <div class="card flex-md-row shadow-sm h-md-250">
                                                        <a href="posts.php?topic='.$row['topic_id'].'">
                                                        <img class="card-img-left flex-auto d-none d-lg-block blogindex-cover" 
                                                        src="uploads/'.$row['forum_img'].'" alt="Card image cap">
                                                                
                                                        
                                                        
                                                        </a>
                                                          <div class="card-body d-flex flex-column align-items-start">
                                                            <strong class="d-inline-block mb-2 text-primary text-center  ml-auto">
                                                                <i class="fa fa-chevron-up" aria-hidden="true"></i><br>'.$row['upvotes'].'
                                                            </strong>
                                                            <h6 class="mb-0">
                                                              <a class="text-dark" href="posts.php?topic='.$row['topic_id'].'">'
                                                                .substr(ucwords($row['topic_subject']),0,15).'...</a>
                                                            </h6>
                                                            <small class="mb-1 text-muted">'.date("F jS, Y", strtotime($row['topic_date'])).'</small>
                                                            <small class="card-text mb-auto">Created By: '.ucwords($row['uidUsers']).'</small>
                                                            <a href="posts.php?topic='.$row['topic_id'].'">Go To Forum</a>
                                                          </div>

                                                        </div>
                                                        
                                                      </div>';
                                            }
                                        }
                                       
                                    ?>


                            </div>

                        </div>

                        <div class="tab-pane fade" id="blog" role="blog" aria-labelledby="blog-tab">

                            <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded shadow-sm">
                                <img class="mr-3" src="img/200.png" alt="" width="48" height="48">
                                <div class="lh-100">
                                    <h1 class="mb-0 text-white lh-100">Latest Blogs</h1>
                                </div>
                            </div>

                            <div class="row mb-2">

                                <?php
                               
                                        $sql = "select * from Blogs, users 
                                                where blogs.blog_by = users.idUsers
                                                order by blog_id desc, blog_votes asc
                                                LIMIT 6";
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
                        //filter curse words...................................................................................................................
                {
 	        $filterWords = array('gosh', 'darn', 'poo', 'arse' , 'ass' , 'asshole', 'bastard' , 'bitch' , 'bollocks' , 'brotherfucker' , 'bugger' , 'bullshit' , 'cocksucker' , 'crap' , 'cunt' , 'damn' , 'frigger' , 'fuck' , 'hell' , 'holy shit' , 'motherfucker' , 'nigga' , 'piss' , 'prick' , 'shit' , 'slut' , 'son of a bitch' , 'twat');
 	        $filterCount = sizeof($filterWords);
 	        for ($i = 0; $i < $filterCount; $i++) {
	        $row['blog_content'] = preg_replace_callback('/\b' . $filterWords[$i] . '\b/i', function($matches){return str_repeat('*', strlen($matches[0]));}, $row['blog_content']);
 	        }
	        $row['blog_content'];
            }

                {
 	            $filterWords = array('gosh', 'darn', 'poo', 'arse' , 'ass' , 'asshole', 'bastard' , 'bitch' , 'bollocks' , 'brotherfucker' , 'bugger' , 'bullshit' , 'cocksucker' , 'crap' , 'cunt' , 'damn' , 'frigger' , 'fuck' , 'hell' , 'holy shit' , 'motherfucker' , 'nigga' , 'piss' , 'prick' , 'shit' , 'slut' , 'son of a bitch' , 'twat');
	             $filterCount = sizeof($filterWords);
 	            for ($i = 0; $i < $filterCount; $i++) {
	            $row['blog_title'] = preg_replace_callback('/\b' . $filterWords[$i] . '\b/i', function($matches){return str_repeat('*', strlen($matches[0]));}, $row['blog_title']);
	             }
	            $row['blog_title'];
                }


                    //............................................................................................................................





                echo '<div class="col-md-6">
                        <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                          <div class="card-body d-flex flex-column align-items-start">
                            <strong class="d-inline-block mb-2 text-primary">
                                <i class="fa fa-thumbs-up" aria-hidden="true"></i> '.$row['blog_votes'].'
                            </strong>
                            <h6 class="mb-0">
                              <a class="text-dark" href="blog-page.php?id='.$row['blog_id'].'">'.substr($row['blog_title'],0,10).'...</a>
                            </h6>
                            <small class="mb-1 text-muted">'.date("F jS, Y", strtotime($row['blog_date'])).'</small>
                            <small class="card-text mb-auto">'.substr($row['blog_content'],0,40).'...</small>
                            <a href="blog-page.php?id='.$row['blog_id'].'">Continue reading</a>
                          </div>
                          <a href="blog-page.php?id='.$row['blog_id'].'">
                          <img class="card-img-right flex-auto d-none d-lg-block blogindex-cover" 
                                src="uploads/'.$row['blog_img'].'" alt="Card image cap">
                                    </a>
                        </div>
                      </div>';
            }
        }
    ?>


                            </div>

                        </div>

                        <div class="tab-pane fade" id="poll" role="poll" aria-labelledby="poll-tab">

                            <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded shadow-sm">
                                <img class="mr-3" src="img/200.png" alt="" width="48" height="48">
                                <div class="lh-100">
                                    <h1 class="mb-0 text-white lh-100">Latest Polls</h1>
                                </div>
                            </div>

                            <div class="my-3 p-3 bg-white rounded shadow-sm">

                                <?php

                                    $sql = "select p.id, p.subject, p.created, p.poll_desc, p.locked, (
                                                select count(*) 
                                                from poll_votes v
                                                where v.poll_id = p.id
                                                ) as votes
                                            from polls p 
                                            order by votes desc
                                            LIMIT 5";

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


//...............................................................filter words......................................................................................

{
 	$filterWords = array('gosh', 'darn', 'poo', 'arse' , 'ass' , 'asshole', 'bastard' , 'bitch' , 'bollocks' , 'brotherfucker' , 'bugger' , 'bullshit' , 'cocksucker' , 'crap' , 'cunt' , 'damn' , 'frigger' , 'fuck' , 'hell' , 'holy shit' , 'motherfucker' , 'nigga' , 'piss' , 'prick' , 'shit' , 'slut' , 'son of a bitch' , 'twat');
	 $filterCount = sizeof($filterWords);
 	for ($i = 0; $i < $filterCount; $i++) {
	$row['subject'] = preg_replace_callback('/\b' . $filterWords[$i] . '\b/i', function($matches){return str_repeat('*', strlen($matches[0]));}, $row['subject']);
	 }
	$row['subject'];
}



//........................................................................................................................................................................................


                                            echo '<a href="poll.php?poll='.$row['id'].'">
                                                <div class="media text-muted pt-3">
                                                    <img src="img/poll-cover.png" alt="" class="mr-2 rounded div-img poll-img">
                                                    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray ">
                                                      <strong class="d-block text-gray-dark">'.ucwords($row['subject']).'</strong></a>
                                                          '.date("F jS, Y", strtotime($row['created'])).'
                                                           <br><br>
                                                           <span class="text-primary" >
                                                                '.$row['votes'].' User(s) have voted
                                                           </span>
                                                    </p>
                                                    <span class="text-right">';

                                            if($row['locked'] === 1)
                                            {
                                                echo '<br><b class="small text-muted">[Locked Poll]</b>';
                                            }
                                            else
                                            {
                                                echo '<br><b class="small text-success">[Open Poll]</b>';
                                            }

                                            echo '</span>
                                                    </div>';
                                        }
                                   }
                                ?>

                            </div>

                        </div>

                        <div class="tab-pane fade" id="event" role="event" aria-labelledby="event-tab">

                            <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded shadow-sm">
                                <img class="mr-3" src="img/200.png" alt="" width="48" height="48">
                                <div class="lh-100">
                                    <h1 class="mb-0 text-white lh-100">Upcoming Events</h1>
                                </div>
                            </div>

                            <div class="my-3 p-3 bg-white rounded shadow-sm">

                                <?php

                                    $sql = "select event_id, event_by, title, event_date, event_image
                                            from events
                                            where event_date > now()
                                            order by event_date asc
                                            LIMIT 5";
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






//...............................................................filter words......................................................................................




{
 	$filterWords = array('gosh', 'darn', 'poo', 'arse' , 'ass' , 'asshole', 'bastard' , 'bitch' , 'bollocks' , 'brotherfucker' , 'bugger' , 'bullshit' , 'cocksucker' , 'crap' , 'cunt' , 'damn' , 'frigger' , 'fuck' , 'hell' , 'holy shit' , 'motherfucker' , 'nigga' , 'piss' , 'prick' , 'shit' , 'slut' , 'son of a bitch' , 'twat');
	 $filterCount = sizeof($filterWords);
 	for ($i = 0; $i < $filterCount; $i++) {
	$row['title']= preg_replace_callback('/\b' . $filterWords[$i] . '\b/i', function($matches){return str_repeat('*', strlen($matches[0]));}, $row['title']);
	 }
	$row['title'];
}

//........................................................................................................................................................................................
                                            $earlier = new DateTime(date("Y-m-d"));
                                            $later = new DateTime($row['event_date']);
                                            $diff = $later->diff($earlier)->format("%a");

                                            echo '<a href="event-page.php?id='.$row['event_id'].'">
                                                <div class="media text-muted pt-3">
                                                    <img src="uploads/'.$row['event_image'].'" alt="" class="mr-2 rounded div-img poll-img">
                                                    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                                                      <strong class="d-block text-gray-dark">'.ucwords($row['title']).'</strong></a>
                                                      '.date("F jS, Y", strtotime($row['event_date'])).'<br><br>
                                                      <span class="text-primary" >'.$diff.' days remaining </span>
                                                    </p>
                                                    <span class="text-primary text-right">';

                                            if ($_SESSION['userLevel'] == 1 || $_SESSION['userId'] == $row['event_by'])
                                            {
                                                echo '<a href="includes/delete-event.php?id='.$row['event_id'].'&page=forum" >
                                                        <i class="fa fa-trash" aria-hidden="true" style="color: red;"></i>
                                                      </a>
                                                    </span>';
                                            }
                                            else
                                            {
                                                echo '</span>';
                                            }
                                            echo '</span>
                                                    </div>';
                                        }
                                   }
                                ?>

                            </div>

                        </div>
                        </div>

                    </div>

                    <div class="col-sm-2">

                    <!-- <div class="text-center p-3 mt-5">
                        <a href="team.php" target="_blank">
                            <i class="creater-icon fa fa-users fa-5x" aria-hidden="true"></i>
                        </a>
                        <p><br>THE CREATORS</p>
                    </div> -->

                    <!-- <a href="forum.php" class="btn btn-warning btn-lg btn-block">FED Forum</a>
                    <a href="hub.php" class="btn btn-secondary btn-lg btn-block">FED Hub</a>
                    <br><br><br> -->
                    <a href="create-topic.php" class="btn btn-warning btn-lg btn-block">Create a Forum</a>
                    <a href="create-blog.php" class="btn btn-secondary btn-lg btn-block">Create a Blog</a>

                </div>
                </div>
            </div>
            <?php include 'includes/fot.php'; ?>
    </div>
    </section>
    



    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

    <script>
    var myVar;

    function pageLoad() {
        myVar = setTimeout(showPage, 1850);
    }

    function showPage() {
        document.getElementById("loader-wrapper").style.display = "none";
        document.getElementById("content").style.display = "block";
    }
    </script>

</body>

</html>