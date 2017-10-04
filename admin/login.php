<?php 
include '../lib/Session.php';
Session::checkLogin();
?>
<?php include '../config/config.php';?>
<?php include '../lib/Database.php';?>
<?php include '../helpers/Format.php';?>
<?php 
    $db = new Database();
    $fm = new Format();   
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
  body > div > div > div > div.center-the-div{
    margin-top:180px;
  }
  body.login {
        background: url(https://www.bootply.com/assets/example/bg_suburb.jpg) no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}


  </style>
</head>
<body class="login">

<div class="container mx-auto">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
        <?php 
     if ($_SERVER['REQUEST_METHOD']=='POST') {
      $username =  $fm->validation($_POST['username']);
      $password =  $fm->validation($_POST['password']);
      $username =  mysqli_real_escape_string($db->link,$username);
      $password =  mysqli_real_escape_string($db->link,$password);

      $query = "SELECT * FROM tbl_user WHERE username = '$username'";
      $result = $db->select($query);
      if($result!= false){
        //$value = mysqli_fetch_array($result);

        $value = $result->fetch_assoc();
          $dbpassword = $value['password'];
          if(password_verify($password, $dbpassword)){
          Session::set("login",true);
          Session::set("username",$value['username']);
          Session::set("userId",$value['id']);
          Session::set("userRole",$value['role']);
          echo "<script>window.location='index.php';</script>";
        }
        
      }else{
        Session::set("message","Username and Password do not matched !!!");
      }

     }
   ?>
            <div class="panel panel-default center-the-div">
                <div class="panel-heading ">
                  <strong>Login</strong>
                </div>
                <div class="panel-body">
                    <form action="" class="form-horizontal" method="POST" role="form">
                <?php   if(Session::get("message")){ ?>
                  <center><span class="label label-danger"><?php echo Session::get("message"); ?></span></center><br>
                  <?php Session::unset_it("message");
                  }
                ?>
                    <div class="form-group">
                        <label for="username" class="col-sm-3 control-label">
                            Username</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" id="username" placeholder="Username" required="" name="username"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-3 control-label">
                            Password</label>
                        <div class="col-sm-9">
                            <input type="password" id="password" class="form-control" placeholder="Password" required="" name="password"/>
                        </div>
                    </div>
                    <div class="form-group last">
                        <div class="col-sm-offset-3 col-sm-9">
                            <input type="submit" class="btn btn-success" value="Log in" />
                        </div>
                    </div>
                    </form>
                </div>
             
        </div>
    </div>
</div>

</body>
</html>
