<?php include 'inc/header.php'; ?>

<?php include 'inc/sidebar.php'; ?>

<div id="page-wrapper">

            <div class="container-fluid">

             <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Add New Post
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

                <!-- Page Heading -->
                <div class="row">
                <div class="col-md-12">
       

            <?php 
            if ($_SERVER['REQUEST_METHOD']=='POST') {  
              
            $title =  mysqli_real_escape_string($db->link,$_POST['title']);
            $cat =  mysqli_real_escape_string($db->link,$_POST['cat']);
            $body =  mysqli_real_escape_string($db->link,$_POST['body']);
            $slug =  mysqli_real_escape_string($db->link,$_POST['slug']);
            $author =  mysqli_real_escape_string($db->link,$_POST['author']);
            $userid =  mysqli_real_escape_string($db->link,$_POST['userid']);

             $slugquery = "SELECT * FROM tbl_post where slug = '$slug' limit 1";
           $slugcheck = $db->select($slugquery);
           if ($slugcheck != false) {
                echo "<span class='error'>Slug Already exists !!.</span>";
           }else{

             $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            if($file_name!=''){
            $uploaded_image = "upload/".$unique_image;
            }else{
                $uploaded_image = '';
            }

            if ($title == "" || $cat == "" || $body == "" || $slug == "" || $author == "" ) {
                       echo "<span class='label label-danger'>Field must not be empty !!!</span><br><br>";
            }
                elseif ($file_size >1048567) {
                     echo "<span class='label label-danger'>Image Size should be less then 1MB !!!</span><br><br>";
           
              echo "<span class='label label-danger'>Field must not be empty !!!</span><br><br>";
            } elseif (in_array($file_ext, $permited) === false && $file_name!='') {
             echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
            } else{
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "INSERT INTO tbl_post(cat,title,body,image,author,slug,userid) VALUES('$cat','$title','$body','$uploaded_image','$author','$slug','$userid')";
            $inserted_rows = $db->insert($query);

            if ($inserted_rows) {
                Session::set("message","Post Inserted Successfully !!!");
                            Session::set("color","success");
                            echo "<script>window.location='postlist.php'</script>";
             
            }else {
                echo "<span class='label label-success'>Image Not Inserted !!!</span><br><br>";
                }
              }
            }
         }
     ?>


                             
                 <form action="addpost.php" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label class="form-group">Title :</label>
                            </td>
                            <td>
                                <input name="title" class="form-control" type="text" placeholder="Enter Post Title..." class="medium" /><br>
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label class="form-group">Category :</label>
                            </td>
                            <td>
                                <select class="form-control" id="select" name="cat">
                                    <option >Select Category</option>

                                    <?php 
                                        $query = "SELECT * FROM tbl_category";
                                        $category = $db->select($query);
                                        if($category){
                                            while($result = $category->fetch_assoc()){
                                        ?>


                                    <option value="<?php echo $result['id']; ?>"><?php echo $result['name']; ?></option>

                                    <?php } } ?>
                                </select><br>
                            </td>
                        </tr>
                   
                                  
                        <tr>
                            <td>
                                <label class="form-group">Upload Image :</label>
                            </td>
                            <td>
                                <input  class="form-control" name="image" type="file" /><br>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label class="form-group">Content :</label>
                            </td>
                            <td>
                                <textarea name="body" class="tinymce"></textarea><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="form-group">Slug :</label>
                            </td>
                            <td>
                                <input name="slug"  class="form-control" type="text" placeholder="Enter slug..." class="medium" /><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="form-group">Author :</label>
                            </td>
                            <td>
                            
                                <input name="author"  class="form-control" type="text" value="<?php echo Session::get('username') ?>" class="medium" /><br>
                                <input name="userid"  class="form-control" type="hidden" value="<?php echo Session::get('userId') ?>" class="medium" /><br>
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" class="btn btn-default" name="submit" Value="Save" />
                            </td>
                        </tr>
                        
                    </table>
                    </form>
                    </div>
                <!-- /.row -->

              

            </div>
            </div>
            <!-- /.container-fluid -->

        </div>
               

       <?php include 'inc/footer.php'; ?>
  