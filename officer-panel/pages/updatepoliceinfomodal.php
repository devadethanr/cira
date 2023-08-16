<?php
    include('cira_connect_db_server.php');
    $upol_id = $_POST['pol_id'];
     $retpol_data_query="SELECT * FROM `police` WHERE `pol_id`='$upol_id'";
     $up_pol_result=mysqli_query($conn_cira,$retpol_data_query);
     while($up_pol_row=mysqli_fetch_array($up_pol_result)){
        ?>
        <form method="POST">
        <div class="modal-body modal-updpol">
         <div class="form-floating">
               <input type="text" class="form-control" id="floatingofficername" name="up_officer_name" placeholder=".." value="<?php echo $up_pol_row['pol_name']?>" >
               <label for="floatingofficername">officer name</label>
           </div></br>
           <div class="form-floating mb-3">
             <input type="email" class="form-control" id="officer_mail" name="up_officer_mail" placeholder=".." value="<?php echo $up_pol_row['pol_mail']?>" >
             <label for="officer_mail">mail</label>
           </div>
           <div class="form-floating">
             <input type="password" class="form-control" id="floatingPassword" name="up_officer_pass" value="<?php echo $up_pol_row['pol_mail']?>" placeholder="..">
             <label for="floatingPassword">Change Password</label>
           </div></br>
           <div><input type="hidden" name="up_pol_id" value="<?php echo $up_pol_row['pol_id']?>"></div>
           <div class="form-floating mb-3">
             <select class="form-select" aria-label="Default select example" name="up_officer_status">
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
