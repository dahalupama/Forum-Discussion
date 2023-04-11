<div>
    <link href="css/forum-card.css" rel="stylesheet">


    <div class="forum-class">
        <div class="forumCard">
            <h4 class="stitle">Selected Topics</h4>
            
            
                <div>
                <?php  
                    if ($user['userLevel'] === 1)
                    {
                        echo '<img id="admin-badge" src="img/admin-badge.png">';
                    }

                    $userIntrests = explode(",", $user['user_interest']);
                  
              ?>
                
<div class="showForum">
                
                
                    
                    
                    
                    <?php 
                    
                
                for($i=0; $i < count($userIntrests)-1; $i++){
                    // this is name of interest

                    ?>
                    <div class="ftopics">
                        <?php

                    echo $userIntrests[$i];
                    // ---------------------------------------------------------
                    $newString  = "";
                    
                    for($j=0; $j < count($userIntrests)-1; $j++){
                        if($userIntrests[$i] != $userIntrests[$j]){
                            $newString = $newString . $userIntrests[$j].",";
                        }
                    }


                    // this is delete button
                    echo '<a  href="Delete_interest.php?user_interest='.$newString.'"> <button class="deletet">Remove</button></a>';
?>
                    </div>
                    <?php
                }
            
                
                ?>
                
            

                </div>

        </div>
        </div>
    </div>
</div>