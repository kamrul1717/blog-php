<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

            <?php 
      $postslug =  mysqli_real_escape_string($db->link,$_GET['slug']);
    if (!isset($postslug) || $postslug == NULL) {
        header("Location: 404.php");
    }else{
        $slug = str_replace('/', ' ', $postslug);
        
    }

 ?>
            <div class="col-sm-8 col-sm-pull-4">
                <div class="blog">
                    <div class="blog-item">
                        <?php 
            $query = "select * from tbl_post where slug='$slug'";
            $post = $db->select($query);
            if ($post) {
            while ($result = $post->fetch_assoc()) {
        
         ?>
                        <?php if($result['image']!='') { ?>
                        <img class="img-responsive img-blog" src="<?php echo SITE_URL;?>admin/<?php echo  $result['image'];?>" width="100%" alt="" />
                        <?php } ?>
                        <div class="blog-content">
                            <h3><?php echo $result['title']; ?></h3>
                            <div class="entry-meta">
                                <span><i class="icon-user"></i> <a href="#"><?php echo $result['author']; ?></a></span>
                                <span><i class="icon-calendar"></i> <?php echo $fm->formatDate($result['date']); ?></span>
                            </div>
                            <?php echo $result['body']; ?>
                            <hr>
                        </div>
                        <?php } } ?>
                    </div><!--/.blog-item-->
                </div>
            </div><!--/.col-md-8-->
        </div><!--/.row-->
    </section><!--/#blog-->

   <?php include "inc/footer.php";?>