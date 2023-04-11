<?php
session_start();
include "includes/dbh.inc.php";

if (isset($_GET['data']))
    {
        $topic = $_GET['data'];
    }
    else
    {
        header("Location: index.php");
        exit();
    }

 

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


                // .............................................spam filter..............................

//  require_once '../spam/spamfilter.php';
//     $text = $postContent;

    $myObj =$content;
    $resStr2 = str_ireplace(' ', '_', $myObj);
    // print_r($resStr2);
    $result = shell_exec('python C:/xampp/htdocs/NepsWebsite-master-latest/spamFilter.py '.($resStr2));


    // Search in a specific blacklist (absolute paths can be used instead)
    
    
    if ($result==1) {
          header("Location: posts.php?topic=$topic&error=spam");
        echo "You like talking about spam, right? Go away!";
        
        exit();
    }
 
    else {

        echo "Your comment is clean from all known spam!";



//...........................................spam filter end............................................











                mysqli_stmt_bind_param($stmt, "sss", $content, $topic, $_SESSION['userId']);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
            }
        }
    }
}
?>