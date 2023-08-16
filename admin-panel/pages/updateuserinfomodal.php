<?php
    include('cira_connect_db_server.php');
    $userid = $_POST['userid'];
     $ret_data_query="SELECT * FROM `station` WHERE `stat_id`=$userid";
     $up_stat_result=mysqli_query($conn_cira, $ret_data_query);
     while($up_stat_row=mysqli_fetch_array($up_stat_result)){
        ?>
        <form method="POST">
        <div class="modal-body modal-updstat">
         <div class="form-floating">
               <input type="text" class="form-control" id="floatingstationname" name="up_station_name" placeholder=".." value="<?php echo $up_stat_row['stat_name']?>" required>
               <label for="floatingstationname">station name</label>
           </div></br>
           <div class="form-floating mb-3">
             <input type="email" class="form-control" id="station_mail" name="up_station_mail" placeholder=".." value="<?php echo $up_stat_row['stat_mail']?>" required>
             <label for="station_mail">mail</label>
           </div>
           <div class="form-floating">
             <input type="password" class="form-control" id="floatingPassword" name="up_station_pass" value="<?php echo $up_stat_row['stat_mail']?>" placeholder="..">
             <label for="floatingPassword">Change Password</label>
           </div></br>
           <div><input type="hidden" name="up_stat_id"value="<?php echo $up_stat_row['stat_id']?>"></div>
           <div class="form-floating mb-3">
             <select class="form-select" aria-label="Default select example" name="up_station_status">
               <option selected>status</option>
               <option value="1" class="badge text-bg-success">Active</option>
               <option value="2" class="badge text-bg-warning">Suspend</option>
               <option value="3" class="badge text-bg-danger">Remove</option>
             </select>
           </div>
        </div>
     <div>
        </form>
        <?php
    }
?>
