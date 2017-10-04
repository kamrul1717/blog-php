<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php 
    $userid = Session::get('userId');
    $userrole = Session::get('userRole');
 ?>
       

 <div id="page-wrapper">

            <div class="container-fluid">

             <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">

                    <h1 class="page-header">
                            Add New User
                        </h1>
                        
<?php 
if ($_SERVER['REQUEST_METHOD']=='POST') {  
              
            $name =  mysqli_real_escape_string($db->link,$_POST['name']);
            $username =    mysqli_real_escape_string($db->link,$_POST['username']);
            $email =   mysqli_real_escape_string($db->link,$_POST['email']);
            $details =   mysqli_real_escape_string($db->link,$_POST['details']);
            if(empty($name) || empty($username) ||empty($email) ||empty($details)){
            echo "<span class='label label-danger'>Field must not be empty  !!!</span><br><br>";
           }else{
            $mailquery = "SELECT * FROM tbl_user where email = '$email' limit 1";
            $mailcheck = $db->select($mailquery);
           if ($mailcheck != false) {
                echo "<span class='label label-danger'>Email Already exists !!!</span><br><br>";
           }else{
             $usernamequery = "SELECT * FROM tbl_user where username = '$username' limit 1";
           $usernamecheck = $db->select($usernamequery);
           if ($usernamecheck != false) {
            echo "<span class='label label-danger'>Username Already exists !!!</span><br><br>";
           }else{

               $query = "UPDATE tbl_user
            SET
            name = '$name',
            username = '$username',
            email = '$email',
            details = '$details'
            WHERE id = '$userid'";

            $updated_row = $db->update($query);
            if ($updated_row) {
                echo "<span class='label label-success'>User Data Updated Successfully !!!</span><br><br>";
            }else {
                echo "<span class='label label-danger'>User Data Not Updated !!!</span><br><br>";
            }
                   }
                   }

            }
                 
            }

         ?>
                        
                    </div>
                </div>
                <!-- /.row -->

                <!-- Page Heading -->
        <div class="row">
            <div class="col-md-12">
                  
                <?php 
            $query = "select * from tbl_user where id='$userid' AND role='$userrole'";
            $getuser = $db->select($query);
            if ($getuser) {
            
            while ($result = $getuser->fetch_assoc()) {
        ?>
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label class="form-group">Name :</label>
                            </td>
                            <td>
                                <input name="name" class="form-control" type="text" value="<?php echo $result['name']; ?>" class="medium" /><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="form-group">Username :</label>
                            </td>
                            <td>
                                <input name="username" class="form-control" type="text" value="<?php echo $result['username']; ?>" class="medium" /><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="form-group">Email :</label>
                            </td>
                            <td>
                                <input name="email" class="form-control" type="text" value="<?php echo $result['email']; ?>" class="medium" /><br>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label class="form-group">Details :</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="details" >
                                    <?php echo $result['details']; ?>
                                </textarea><br>
                            </td>
                        </tr>
                       
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" class="btn btn-default" name="submit" Value="Update" />
                            </td>
                        </tr>
                        
                    </table>
                    </form>
                    <?php } } ?>
                    </div>
                </div>
            </div>
        </div>
       <?php include 'inc/footer.php'; ?>
   