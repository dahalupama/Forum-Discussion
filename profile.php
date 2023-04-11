<?php

    session_start();
    require 'includes/dbh.inc.php';
    
    define('TITLE',"Profile | FED");
    
    if(!isset($_SESSION['userId']))
    {
        header("Location: login.php");
        exit();
    }
    
    if(isset($_GET['id']))
    {
        $userid = $_GET['id'];
    }
    else
    {
        $userid = $_SESSION['userId'];
    }
    
    $sql = "select * from users where idUsers = ".$userid;
    $stmt = mysqli_stmt_init($conn);    
    
    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        die('SQL error');
    }
    else
    {
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);
    }
    
    include 'includes/HTML-head.php';   
?>
<style>
/* body {
    background-image: url("img/trees.png");
    
} */

body{
    background-color: rgb(239 241 242) !important;
}

.container {

    opacity: 0.92;
    max-width: 1640px !important;

}

.row {
    padding-top: 15px;
}

.user-blogs{
    background-color: rgb(239 241 242) !important;
    width: 337px !important;
}



.row_border {
    border-top: 0;
}

hr {
  
    border-top: 0px solid black !important;

}

.carda {
    height: 320px !important;
    width: 300px;
    border-radius: 3rem;
    margin-left: -70px;
}

.fa-pencil:before {
    content: "\f040";
    margin-left: -100px;
}

.button4{
    
    background-color:rgb(239 241 242);
    width: 250px;
    height: 53px;
    border-radius: 2rem;
    border: 0px;
    color:#1bbdc5;
    font-weight: bold;
    position: relative;
    top:-15px;
    }



.button4:hover {
  background-color: white;
  color: black;
  border: 2px solid #e7e7e7;
  border-radius: 2rem;
 
}

.card{
    height: 369px !important;
    width: 349px !important;
    border-radius:0.5rem !important ;
    padding: 1px !important;
    opacity: 1rem !important;
   box-shadow: 0 0 0px 0px !important;
   border: 0px !important;
}

.card-block{
    position: relative;
    top: 60px;
}
.card-name{
    font-size: 35px;
    font-weight:bold;
}
.name{
    font-size: 15px !important;
    
}
.forumCard{
    padding: 1.5rem !important;
    
}
#user-section{
    background: #ffffff00;
    
}
.mainprofile{
    background-color: #fff;
    /* box-shadow: 0 0 5px 0px rgba(0, 0, 0, 0.119); */
    border-radius: 0.5rem;
}

.blog{ 
    background-color: #fff;
    position: relative;
    top: 20px;
    /* box-shadow: 0 0 5px 0px rgba(0, 0, 0, 0.119); */
    border-radius: 0.5rem;


}

.forum{
    background-color: #fff;
    position: relative;
    top: 40px;
    /* box-shadow: 0 0 5px 0px rgba(0, 0, 0, 0.119); */
    border-radius: 0.5rem;
}
.polls{
     background-color: #fff;
    position: relative;
    top: 70px;
    /* box-shadow: 0 0 5px 0px rgba(0, 0, 0, 0.119); */
    border-radius: 0.5rem;
}

.cover-img{
    border-top-right-radius:0.5rem ;
    border-top-left-radius:0.5rem ;
}

.card-profile{
   
    margin-right: 20px !important;

}

.card-info{
    height: 369px;
    width: 349px;
    border-radius:0.5rem !important ;
    padding: 1px !important;
    opacity: 1rem !important;
   
   border: 0px !important;

   position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    margin:10px;
    margin-top: -12px;
    margin-bottom: 50px;
    
}

.card-infoblock{
    position: relative;
    top: 60px;
    padding: 40px;
}
.gender{
    position: relative;
    left: 148px;
    top: 41px;
}
.text-muted{
   color:  #8c949b!important;
}

.bio{
    background-color: #fff;
  
    /* box-shadow: 0 0 5px 0px rgba(0, 0, 0, 0.119); */
    border-radius: 0.5rem;
    margin-top: 39px;
   

}

.pinfo{
    font-size: 30px;
    color: #979797;
    position: relative;
    top: -70px;
    border-bottom: 1px solid;
    border-color: #e1e1e1;
    
}


.usertype{
    font-size: 25px;
    color: #575757;
    position: relative;
    top: -70px;
    left: 80px;
    font-weight: bold;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    
    

}

.userdatas{
    position: relative;
    top: -40px;
}
.sdata{
    position: relative;
    left: 95px;
    font-size: 25px;
    margin-top: 20px;
    color:#1bbdc5;

}


.fdata{
    position: relative;
    left: 100px;
    font-size: 25px;
    color:#1bbdc5;


}
.ddata{
    position: relative;
    left: 100px;
    font-size: 25px;
    color:#1bbdc5;

}
.mdata{
    position: relative;
    left: 100px;
    font-size: 25px;
    color:#1bbdc5;

}
.adata{
    position: relative;
    left: 100px;
    font-size: 25px;
    color:#1bbdc5;

}
.h6c{
    color: lightgray;
    position: relative;
    left: 100px;
    font-size: 15px;
}









</style>

</head>

<body>

    <?php include 'includes/navbar.php'; ?>
    <div class="container" style="margin-top:80px;">
        <div class="row row_border">
            <div class="col-sm-3">

                <?php include 'includes/profile-card.php'; ?>
                <?php include 'includes/profile-info.php'; ?>
                
                <?php include 'includes/profile_interest.php'; ?>

            </div>


            <div class="col-sm-8 text-center" id="user-section">
                <div class="mainprofile">
                    
                <img class="cover-img" src="img/user-cover.png">
<div class="gender">
                <?php 
                if ($user['gender'] == 'm')
                {
                    echo '<i class="fa fa-male fa-2x" aria-hidden="true" style="color: #709fea;"></i>';
                }
                else if ($user['gender'] == 'f')
                {
                    echo '<i class="fa fa-female fa-2x" aria-hidden="true" style="color: #FFA6F5;"></i>';
                }
                ?>
                </div>
                
                <h1><?php echo ucwords($user['f_name']) . " " . ucwords($user['l_name']); ?></h1>
               
                <h4><?php echo '<small class="text-muted">'.$user['emailUsers'].'</small>'; ?></h4>

                

               

                <br><div class="headline"><?php echo $user['headline']; ?></div>
                <br><br>
            </div>
                <div class="bio">

                <div class="about">About</div>
                <div class="borderi"></div>
                <div class="profile-bio">
                    <?php echo $user['bio'];?>
                </div>
            </div>

               

<div class="blog">

                <hr>
                <h3 class="h3c">Created Blogs</h3>
                <div class="borderi"></div>
                <br><br>

                <?php
                    $sql = "select * from blogs "
                            . "where blog_by = ?";
                    $stmt = mysqli_stmt_init($conn);    

                    if (!mysqli_stmt_prepare($stmt, $sql))
                    {
                        die('SQL error');
                    }
                    else
                    {
                        mysqli_stmt_bind_param($stmt, "s", $userid);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        
                        echo '<div class="container">'
                                    .'<div class="row">';
                        
                        $row = mysqli_fetch_assoc($result);
                        if(empty($row))
                        {
                            echo '<div class="col-sm-4" style="padding-bottom: 30px;"></div>
                                <div class="col-sm-4">
                                    <img class="profile-empty-img" src="img/empty.png">
                                  </div>
                                  <div class="col-sm-4" style="padding-bottom: 30px;"></div>
                                    </div>
                                  </div>';
                        }
                        else
                        {
                            do
                            {       
                                    echo '<div class="col-sm-4" style="padding-bottom: 30px;">
                                        <div class="card user-blogs">
                                            <a href="blog-page.php?id='.$row['blog_id'].'">
                                            <img class="card-img-top" src="uploads/'.$row['blog_img'].'" alt="Card image cap">
                                            <div class="card-block p-2">
                                              <p class="card-title">'.ucwords($row['blog_title']).'</p>
                                             <p class="card-text"><small class="text-muted">'
                                             .date("F jS, Y", strtotime($row['blog_date'])).'</small></p>
                                            </div>
                                            </a>
                                          </div>
                                          </div>';
                            }while ($row = mysqli_fetch_assoc($result));
                            echo '</div>'
                                    .'</div>';
                        }
                    }
              ?>

                <br><br>

                </div>
                <div class="forum">
                <hr>
                <h3 class="h3c">Created Forums</h3>
                <div class="borderi"></div>
                <br><br>

                <?php
                    $sql = "select * from topics where topic_by = ?";
                    $stmt = mysqli_stmt_init($conn);    

                    if (!mysqli_stmt_prepare($stmt, $sql))
                    {
                        die('SQL error');
                    }
                    else
                    {
                        mysqli_stmt_bind_param($stmt, "s", $userid);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        
                        echo '<div class="container">'
                                    .'<div class="row">';
                        
                        $row = mysqli_fetch_assoc($result);
                        if(empty($row))
                        {
                            echo '<div class="col-sm-4" style="padding-bottom: 30px;"></div>
                                <div class="col-sm-4">
                                    <img class="profile-empty-img" src="img/empty.png">
                                  </div>
                                  <div class="col-sm-4" style="padding-bottom: 30px;"></div>
                                    </div>
                                  </div>';
                        }
                        else
                        {
                            do
                            {
                                echo '<div class="col-sm-4" style="padding-bottom: 30px;">
                                        <div class="card user-blogs">
                                            <a href="posts.php?topic='.$row['topic_id'].'">
                                            <img class="card-img-top" src="img/forum-cover.png" alt="Card image cap">
                                            <div class="card-block p-2">
                                              <p class="card-title">'.ucwords($row['topic_subject']).'</p>
                                             <p class="card-text"><small class="text-muted">'
                                             .date("F jS, Y", strtotime($row['topic_date'])).'</small></p>
                                            </div>
                                            </a>
                                          </div>
                                          </div>';
                            }while ($row = mysqli_fetch_assoc($result));
                            echo '</div>'
                                    .'</div>';
                        }
                    }
              ?>
              </div>

                <div class="polls">

                    <br><br>
                    <hr>
                    <h3 class="h3c">Participated Polls</h3>
                    <div class="borderi"></div>
                    <br><br>


                    <?php
                    $sql = "select * from poll_votes v "
                            . "join polls p on v.poll_id = p.id "
                            . "join users u on p.created_by = u.idUsers "
                            . "where v.vote_by = ?";
                    $stmt = mysqli_stmt_init($conn);    

                    if (!mysqli_stmt_prepare($stmt, $sql))
                    {
                        die('SQL error');
                    }
                    else
                    {
                        mysqli_stmt_bind_param($stmt, "s", $userid);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        
                        echo '<div class="container">'
                                    .'<div class="row">';
                        
                        $row = mysqli_fetch_assoc($result);
                        if(empty($row))
                        {
                            echo '<div class="col-sm-4" style="padding-bottom: 30px;"></div>
                                <div class="col-sm-4">
                                    <img class="profile-empty-img" src="img/empty.png">
                                  </div>
                                  <div class="col-sm-4" style="padding-bottom: 30px;"></div>
                                    </div>
                                  </div>';
                        }
                        else
                        {
                            do
                            {   
                                echo '<div class="col-sm-4" style="padding-bottom: 30px;">
                                        <div class="card user-blogs">
                                            <a href="poll.php?poll='.$row['poll_id'].'">
                                            <img class="card-img-top" src="img/poll-cover.png" alt="Card image cap">
                                            <div class="card-block p-2">
                                              <p class="card-title">'.ucwords($row['subject']).'</p>
                                             <p class="card-text"><small class="text-muted">'
                                             .date("F jS, Y", strtotime($row['created'])).'</small></p>
                                            </div>
                                            </a>
                                          </div>
                                          </div>';
                            }while ($row = mysqli_fetch_assoc($result));
                            echo '</div>'
                                    .'</div>';
                        }
                    }
                    ?>


                        <br><br>

                </div>



            </div>
            <div class="col-sm-1">

            </div>
        </div>


    </div> 

     <?php include 'includes/fot.php'; ?>


    <?php include 'includes/HTML-footer.php'; ?>
    <script src="js/main.js"></script>