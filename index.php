<?php 
  include('config/db_connect.php');
  // query for messages
  $sql = 'SELECT sname, messages, id, created_at, email FROM writter ORDER BY created_at';
  
  //make query and get result
  $result = mysqli_query($conn, $sql);

  //fetch result
  $writtings = mysqli_fetch_all($result, MYSQLI_ASSOC);

  //free result
  mysqli_free_result($result);

  //close
  mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<?php include('templates/header.php') ?>
<h4 class="center ">Messages</h4>
  <div class="container" >
    <div class="row" >
      <?php foreach($writtings as $wri){ ?>
        <div class="col s6 md3" >
          <div class="card z-depth-0" >
            <div class="card-content center" style="border: 4px black solid; box-shadow: 7px 7px grey">  
             <h6 style="text-align: left; color: #cbb09c;">Name: <?php echo htmlspecialchars($wri['sname']); ?></h6>
             <div >
                
                <h6 style="text-align: left; color: #cbb09c;">Email: <?php echo htmlspecialchars($wri['email']); ?></h6>
                <h6 style="border: 2px orange solid; padding: 7px; text-align: left; box-shadow: 4px 4px grey; color: grey;">Message: <?php echo htmlspecialchars($wri['messages']); ?></h6>
                <p style="color: #cbb09c;">Created at: <?php echo htmlspecialchars($wri['created_at']); ?></p>
             </div>
           </div>
          </div>
        
        </div>


      <?php } ?>
    
    </div>


  </div>



<?php include('templates/footer.php') ?>
</html>