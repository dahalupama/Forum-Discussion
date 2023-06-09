<?php

    session_start();
    require 'includes/dbh.inc.php';
    
    define('TITLE',"Forum | FEDs");
    
    if(!isset($_SESSION['userId']))
    {
        header("Location: login.php");
        exit();
    }
    
    if (isset($_GET['topic']))
    {
        $topic = $_GET['topic'];
    }
    else
    {
        header("Location: index.php");
        exit();
    }
    
    include 'includes/HTML-head.php';
?>

<link href="css/forum-styles.css" rel="stylesheet">

<style>
body {
    background-image: linear-gradient(-225deg, #FFFEFF 0%, #D7FFFE 100%);
}

.loader-wrapper {
    background-image: url("img/t.png");
}

.mt-5 .container .row {
    background-image: url("img/t.png");
}

.tab-content {
    opacity: 0.9;
}

.form-control {
    opacity: 0.9;
}

.form-group {
    height: 50px;
}

textarea.form-control {
    height: 60px;
}
</style>

</head>

<body>

    <?php

   include 'includes/navbar.php';

    if (isset($_POST['submit-reply']))
    {
        $content = $_POST['reply-content'];
        
        if (!empty($content))
        {
            $sql = "insert into posts(post_content, post_date, post_topic, post_by) "
                    . "values (?,now(),?,?)";
            $stmt = mysqli_stmt_init($conn);
            
            if (!mysqli_stmt_prepare($stmt, $sql))
            {
                die('sql error');
            }
            else
            {
                mysqli_stmt_bind_param($stmt, "sss", $content, $topic, $_SESSION['userId']);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
            }
        }
    }
    
    
    $sql = "select * from topics, categories where topic_id=? "
            . "and topic_cat = cat_id";
    $stmt = mysqli_stmt_init($conn);
    
    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        die('sql error');
    }
    else
    {
        mysqli_stmt_bind_param($stmt, "s", $topic);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        if (!($forum = mysqli_fetch_assoc($result)))
        {
            die('sql error');
        }
    }





//............................................................Filter words section...................................................................................................................................




{
 	$filterWords = array('gosh', 'darn', 'poo', 'arse' , 'ass' , 'asshole', 'bastard' , 'bitch' , 'bollocks' , 'brotherfucker' , 'bugger' , 'bullshit' , 'cocksucker' , 'crap' , 'cunt' , 'damn' , 'frigger' , 'fuck' , 'hell' , 'holy shit' , 'motherfucker' , 'nigga' , 'piss' , 'prick' , 'shit' , 'slut' , 'son of a bitch' , 'twat');

 	$filterCount = sizeof($filterWords);
 for ($i = 0; $i < $filterCount; $i++) {
	$forum['cat_name']= preg_replace_callback('/\b' . $filterWords[$i] . '\b/i', function($matches){return str_repeat('*', strlen($matches[0]));}, $forum['cat_name']);
}
	$forum['cat_name'];
}



{
 	$filterWords = array('gosh', 'darn', 'poo', 'arse' , 'ass' , 'asshole', 'bastard' , 'bitch' , 'bollocks' , 'brotherfucker' , 'bugger' , 'bullshit' , 'cocksucker' , 'crap' , 'cunt' , 'damn' , 'frigger' , 'fuck' , 'hell' , 'holy shit' , 'motherfucker' , 'nigga' , 'piss' , 'prick' , 'shit' , 'slut' , 'son of a bitch' , 'twat');

 	$filterCount = sizeof($filterWords);
 for ($i = 0; $i < $filterCount; $i++) {
	$forum['topic_subject']= preg_replace_callback('/\b' . $filterWords[$i] . '\b/i', function($matches){return str_repeat('*', strlen($matches[0]));}, $forum['topic_subject']);
}
	$forum['topic_subject'];
}


//.............................................................................................................................................................................................................................................

?>


    <br><Br>
    <div class="container" style="margin-top:50px;margin-bottom:100px;">
        <div class="row">

            <div class="col-lg-2 col-md-2 "></div>
            <div class="col-lg-8 col-md-8 col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-dark">
                        <li class="breadcrumb-item"><a href="#">Forums</a></li>
                        <li class="breadcrumb-item"><a href="#"><?php echo ucwords($forum['cat_name']); ?></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#"><?php echo ucwords($forum['topic_subject']); ?></a>
                        </li>
                    </ol>
                </nav>
                <!-- <h4><?php echo ucwords($forum['topic_subject']); ?></h4>
            <hr> -->
                <!-- <div class="card post-header text-center">
            </div> -->
                <!-- </div>
        <div class="col-sm-12"> -->



                <?php
            
                $sql = "select * from posts p, users u "
                        . "where p.post_topic=? "
                        . "and p.post_by=u.idUsers "
                        . "order by p.post_id;";
                $stmt = mysqli_stmt_init($conn);    

                if (!mysqli_stmt_prepare($stmt, $sql))
                {
                    die('sql error');
                }
                else
                {
                    mysqli_stmt_bind_param($stmt, "s", $topic);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);

                    $i = 1;
                    while ($row = mysqli_fetch_assoc($result))
                    {

                        $voted_u = false;
                        $voted_d = false;

                        $sql = "select votePost, voteBy, vote from postvotes "
                            . "where votePost=? "
                            . "and voteBy=? "
                            . "and vote=1";

                        $stmt = mysqli_stmt_init($conn);

                        if (!mysqli_stmt_prepare($stmt, $sql))
                        {
                            die('sql error');
                        }
                        else
                        {
                            mysqli_stmt_bind_param($stmt, "ss", $row['post_id'], $_SESSION['userId']);
                            mysqli_stmt_execute($stmt);
                            mysqli_stmt_store_result($stmt);

                            $resultCheck = mysqli_stmt_num_rows($stmt);

                            if ($resultCheck == 0)
                            {
                                $voted_u = true;
                            }
                        }

                        $sql = "select votePost, voteBy, vote from postvotes "
                            . "where votePost=? "
                            . "and voteBy=? "
                            . "and vote=-1";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql))
                        {
                            die('sql error');
                        }
                        else
                        {
                            mysqli_stmt_bind_param($stmt, "ss", $row['post_id'], $_SESSION['userId']);
                            mysqli_stmt_execute($stmt);
                            mysqli_stmt_store_result($stmt);

                            $resultCheck = mysqli_stmt_num_rows($stmt);

                            if ($resultCheck == 0)
                            {
                                $voted_d = true;
                            }
                        }
                        




//............................................................Filter words section...................................................................................................................................








{
 	$filterWords = array('gosh', 'darn', 'poo', 'arse' , 'ass' , 'asshole', 'bastard' , 'bitch' , 'bollocks' , 'brotherfucker' , 'bugger' , 'bullshit' , 'cocksucker' , 'crap' , 'cunt' , 'damn' , 'frigger' , 'fuck' , 'hell' , 'holy shit' , 'motherfucker' , 'nigga' , 'piss' , 'prick' , 'shit' , 'slut' , 'son of a bitch' , 'twat');

 	$filterCount = sizeof($filterWords);
 for ($i = 0; $i < $filterCount; $i++) {
	$row['post_content']= preg_replace_callback('/\b' . $filterWords[$i] . '\b/i', function($matches){return str_repeat('*', strlen($matches[0]));}, $row['post_content']);
}
	$row['post_content'];
}


//.............................................................................................................................................................................................................................................
                        
                        echo '<div class="card post mt-2">  
                                
                                <div class="row">

                                    <div class="col-sm-3 user">
                                        <div class="text-center about-user">
                                            <img src="uploads/'.$row['userImg'].'" class=" user-img">
                                            <h5>'.$row['uidUsers'].'</h5>
                                            <div>
                        <span class="date">'.date("F jS, Y", strtotime($row['post_date']))
                                .'<span class="span-post-no"></span> </span></div>
                                            <br><br>
                                            
                                        </div>
                                    </div>

                                    <div class="col-sm-9 post-content">
                                        <p>'.$row['post_content'].'</p>
                                            <div class="vote text-center">';
                        
                        if ( ($row['post_by']==$_SESSION['userId']) || ($_SESSION['userLevel'] == 1))
                        {
                            echo '<a title="delete" href="includes/delete-post.php?topic='.$topic.'&post='.$row['post_id'].'&by='.$row['post_by'].'" >'
                                . '<i class="fa fa-trash fa-x" aria-hidden="true"></i></a><br>';
                        }
                        
                        if ($voted_u)
                        {
                            echo "<a title='Upvote' href='includes/post-vote.inc.php?topic=".$topic."&post=".$row['post_id']."&vote=1' >";
                        }
                        echo '<i class="fa fa-chevron-up fa-x" aria-hidden="true"></i></a>';

                        
                        echo '<br><span class="vote-count">'.$row['post_votes'].'</span><br>';
                        
                        
                        if ($voted_d)
                        {
                            echo "<a title='Downvote' href='includes/post-vote.inc.php?topic=".$topic."&post=".$row['post_id']."&vote=-1' >";
                        }
                        echo '<i class="fa fa-chevron-down fa-x" aria-hidden="true"></i></a>
                        ';
                        
                        
                        echo            '</div>
                                    </div>
                                </div>
                                
                            </div>';
                                            
                        $i++;
                    }
                }
            
            ?>


            </div>
        </div>
        
    
        <div class="row">
            <div class="col-lg-2 col-md-2 "></div>

            <div class="col-lg-8 col-md-8 col-12">
        <form method="post" action="posts_inc.php?data=<?php echo $topic ?>">
            <fieldset>
            <?php
                if(isset($_GET['error']))
                    {
                    
                        // else if ($_GET['error'] == 'spamerror' and isset($_GET['message']))
                         if ($_GET['error'] == 'spam')
                        {
                            echo '<h5 class="text-danger">*You like talking about Spam, right? Go away!</h5>';
                        }
                    }
                    else if (isset($_GET['operation']) == 'success')
                    {
                        echo '<h5 class="text-success">*Forum successfully created</h5>';
                    }

                    ?>
                <div class="form-group mt-2">
                    <textarea name="reply-content" class="form-control" id="reply-form" rows="2" placeholder="Write Your Reply"></textarea>
                </div>
               
                <input type="submit" value="Submit reply" class="btn btn-lg submit-reply" name="submit-reply">
            </fieldset>
        </form>
    </div>
</div>
                </div>
    
    <?php include 'includes/fot.php'; ?>
    
    
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js" ></script>
    </body>
</html>