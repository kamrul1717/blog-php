<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php 
    if (!isset($_GET['editpostid']) || $_GET['editpostid'] == NULL) {
        echo "<script>window.location='postlist.php';</script>";
        //header("Location:catlist.php");
    }else{
        $postid = $_GET['editpostid'];
    }

 ?>
        <div id="page-wrapper">

            <div class="container-fluid">

             <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Update Post
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

            $permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_temp = $_FILES['image']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "upload/".$unique_image;
    if ($title == "" || $cat == "" || $body == "" || $slug == "" || $author == "") {
               echo "<span class='label label-danger'>Field must not be empty !!!</span><br><br>";
    }else{
    if (!empty($file_name)) {
        
    
        if ($file_size >1048567) {
     echo "<span class='error'>Image Size should be less then 1MB!
     </span>";
    } elseif (in_array($file_ext, $permited) === false) {
     echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
    } else{

    
    move_uploaded_file($file_temp, $uploaded_image);

    $query = "UPDATE tbl_post
            SET
            cat = '$cat',
            title = '$title',
            body = '$body',
            image = '$uploaded_image',
            author = '$author',
            slug = '$slug',
            userid = '$userid'
            WHERE id = '$postid';
    ";

    $updated_row = $db->update($query);
    if ($updated_row) {
        Session::set("message","Post Updated Successfully !!!");
                    Session::set("color","success");
                    echo "<script>window.location='postlist.php'</script>";
     
    }else {
        echo "<span class='label label-danger'>Post Not Updated !!!</span><br><br>";
    }
}
}else{
     $query = "UPDATE tbl_post
            SET
            cat = '$cat',
            title = '$title',
            body = '$body',
            author = '$author',
            slug = '$slug',
            userid = '$userid'
            WHERE id = '$postid';
    ";

    $updated_row = $db->update($query);
    if ($updated_row) {
     Session::set("message","Post Updated Successfully !!!");
                    Session::set("color","success");
                    echo "<script>window.location='postlist.php'</script>";
    }else {
     echo "<span class='label label-danger'>Post Not Updated !!!</span><br><br>";
    }
}
}
}
 ?>


                <div class="block">    
                <?php 
            $query = "select * from tbl_post where id='$postid'";
            $getpost = $db->select($query);
            while ($postresult = $getpost->fetch_assoc()) {
        ?>
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label class="form-group">Title :</label>
                            </td>
                            <td>
                                <input name="title" class="form-control" type="text" value="<?php echo $postresult['title']; ?>" class="medium" /><br>
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label class="form-group">Category :</label>
                            </td>
                            <td>
                                <select class="form-control" id="select" name="cat">
                                    <option>Select Category</option>

                                    <?php 
                                        $query = "SELECT * FROM tbl_category";
                                        $category = $db->select($query);
                                        if($category){
                                            while($result = $category->fetch_assoc()){
                                        ?>


                                    <option
                                    <?php 
                                    if ($postresult['cat'] == $result['id']) { ?>
                                       
                                    selected = "selected"

                                     <?php } ?> value="<?php echo $result['id']; ?>"><?php echo $result['name']; ?></option>

                                    <?php } } ?>
                                </select><br>
                            </td>
                        </tr>
                   
                                  
                        <tr>
                            <td>
                                <label class="form-group">Upload Image :  </label>
                            </td>
                            <td>
                                <img src="<?php echo  $postresult['image']; ?>" height="50px" width="100px"/><br/>
                                <input class="form-control" name="image" type="file" /><br>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label class="form-group">Content :</label>
                            </td>
                            <td>
                                <textarea name="body" class="tinymce">
                                    <?php echo $postresult['body']; ?>
                                </textarea><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="form-group">Slug :</label>
                            </td>
                            <td>
                                <input name="slug" class="form-control" type="text" value="<?php echo $postresult['slug']; ?>" class="medium" /><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="form-group">Author :</label>
                            </td>
                            <td>
                                <input name="author" class="form-control" type="text" value="<?php echo $postresult['author']; ?>" class="medium" /><br>
                                 <input name="userid" class="form-control" type="hidden" value="<?php echo Session::get('userId') ?>" class="medium" /><br>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input class="btn btn-default" type="submit" name="submit" Value="Save" /><br>
                            </td>
                        </tr>
                        
                    </table>
                    </form>
                    <?php }  ?>
                   </div>
                <!-- /.row -->

              

            </div>
            </div>
            <!-- /.container-fluid -->

        </div>
       <?php include 'inc/footer.php'; ?>
  