<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php if(!Session::get('userRole')=='0') { 
    echo "<script>window.location='index.php';</script>";
}
?>
       <div id="page-wrapper">

            <div class="container-fluid">

             <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Add New User
                        </h1>
                        <div class="panel panel-default">
                      <div class="panel-heading">Notice</div>
                        <div class="panel-body"><pre>Admins can do anything in the admin panel. Authors can only add posts, They cannot delete/edit/update posts.
                    They can only add categories, They cannot delete/edit/update categories.
                    Be careful while selecting User's Role.</pre></div>
                      </div>
                      
                    </div>
                </div>
                <!-- /.row -->

                <!-- Page Heading -->
                <div class="row">
                <div class="col-md-12">

               <?php 
            if ($_SERVER['REQUEST_METHOD']=='POST') {  
            $username =  $fm->validation($_POST['username']);    
            $password =  $fm->validation($_POST['password']);    
            $email =  $fm->validation($_POST['email']);  
            $role =  $fm->validation($_POST['role']);  
            $password = password_hash($password, PASSWORD_BCRYPT);
            $username =  mysqli_real_escape_string($db->link,$username);
            $password =  mysqli_real_escape_string($db->link,$password);
            $email =  mysqli_real_escape_string($db->link,$email);
            $role =  mysqli_real_escape_string($db->link,$role);
         
           if(empty($username) || empty($password) ||empty($role) ||empty($email)){
            echo "<span class='label label-danger'>Field must not be empty  !!!</span><br><br>";
           }else{
            if($role=='admin'){
           $role = 0;
         }
           $mailquery = "SELECT * FROM tbl_user where email = '$email' limit 1";
           $mailcheck = $db->select($mailquery);
           if ($mailcheck != false) {
            echo "<span class='label label-danger'>Email Already exists  !!!</span><br><br>";
           }else{

                $usernamequery = "SELECT * FROM tbl_user where username = '$username' limit 1";
           $usernamecheck = $db->select($usernamequery);
           if ($usernamecheck != false) {
             echo "<span class='label label-danger'>Username Already exists  !!!</span><br><br>";
           }else{

                $query = "INSERT INTO tbl_user(username,password,email,role) VALUES ('$username','$password','$email','$role')";
                $userinsert = $db->insert($query);
                if($userinsert){
                  echo "<span class='label label-success'>User Created Successfully  !!!</span><br><br>";
                }   else {
                  echo "<span class='label label-danger'>User Created Successfully  !!!</span><br><br>";
                    }
               }
            }
        }}
            ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <label class="form-group">Username : </label>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="username" placeholder="Enter Your Username..." class="medium" /><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="form-group">Password : </label>
                            </td>
                            <td>
                                <input type="password" class="form-control" name="password" placeholder="Enter Your Password..." class="medium" /><br>
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label class="form-group">Email : </label>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="email" placeholder="Enter Valid Email..." class="medium" /><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="form-group">User Role : </label>

      
   
                            </td>
                            <td>
                               <select id="select" name="role" class="form-control">
                                   <option>Select User Role</option>
                                   <option value="admin">Admin</option>
                                   <option value="1">Author</option>
                               </select><br>
                            </td>

                        </tr>

						          <tr> 
                             <td></td>
                            <td>
                                <input type="submit" class="btn btn-default" name="submit" Value="Create" />
                            </td>
                        </tr>
                    </table>
                    </form>
                  </div>
                </div>
              </div>
            </div>
                
<?php include 'inc/footer.php'; ?>