<div class='card card-profile text-center'>
    
    <div class='card-block'>
        <a href='profile.php'>
            <img src='uploads/<?php echo $_SESSION["userImg"] ?>' class='card-img-profile'>
        </a>

        <div class='card-admin-badge'>
            <?php  
                  if ($_SESSION['userLevel'] == 1)
                     {
                       echo '<img id="card-admin-badge" src="img/adminbadge.png">';
                      }
                  ?>
            <div>Admin </div>
        </div>

        
        <h4 class='card-title'>
           <div class="card-name"><?php echo ucwords($_SESSION['userUid']); ?></div>  
            <small class="name text-muted">
                <?php echo ucwords($_SESSION['f_name']." ".$_SESSION['l_name']); ?>
            </small>
            <br></h4>
            
          
            <a href="edit-profile.php">
        
        
        <button class="button button4">Edit Profile</button>
        </a>
        
       
        <!-- <h4 class="forum-title"> -->
        <!-- <?php include 'includes/forum-card.php'; ?> -->
        <!-- </h4> -->
    </div>
</div>