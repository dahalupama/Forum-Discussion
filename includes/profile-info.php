<div class='card-info'>
    
    <div class='card-infoblock'>
        

<div class="pinfo">   Info    </div>
        
        
           
            <br>
            
            <div class="usertype">
                <?php 
                $name=$user['Faculty'];
                $name1=$user['major'];
                $name2=$user['Authority'];
                if ( $name!=NULL){
                    echo 'Student';
                    
                
                } 
                if ( $name1!=NULL){
                    echo 'Teacher';
                } 
                if ( $name2!=NULL){
                    echo 'Authorities';
                }
                
                 ?>
            </div>





            <div class="userdatas">
                
           <div class="faculty">
            

            <?php
            if ( $name!=NULL){

               
                
                echo'<div class="fdata">';
                echo $user['Faculty'];
                echo'</div>';
                echo '<h6 class="h6c">Faculty';
             echo'</h6>';
            
             
             }?>
             


             

             <?php
            if ( $name!=NULL){
               
                

                echo'<div class="sdata">';
                echo $user['Semester'];
                echo'</div>';
                echo'<h6 class="h6c">Semester';
             echo'</h6>';
             
             }?>
             

             
           </div>

           <div class="major">
           
            <?php
            if ( $name1!=NULL){

                
                echo'<div class="mdata">';
                echo $user['major'];
                echo'</div>';
                echo'<h6 class="h6c">Major';
             echo'</h6>';
            }
             
             ?>
             <?php
            if ( $name1!=NULL){
                
                

                echo'<div class="ddata">';
                echo $user['Degree'];
                echo'</div>';
                echo'<h6 class="h6c">>Degree';
             echo'</h6>';
             
             }?>




             </div>
                
             
             
             <div class="auth">
             
            <?php
            if ( $name2!=NULL){
               
 
                echo'<div class="adata">';
             echo $user['Authority'];
             echo'</div>';
             echo'<h6 class="h6c">Authorities ';
            echo'</h6>';}?>
            


            <?php
            if ( $name2!=NULL){
                

                echo'<div class="ddata">';
             echo $user['Degree'];
             echo'</div>';
             echo'<h6 class="h6c">Degree';
             echo'</h6>';
             
             }?>

             </div>
            </div>
          
        
        
        
       
        <!-- <h4 class="forum-title"> -->
        <!-- <?php include 'includes/forum-card.php'; ?> -->
        <!-- </h4> -->
    </div>
</div>