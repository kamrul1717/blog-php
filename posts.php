<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
            <?php 
      $category =  mysqli_real_escape_string($db->link,$_GET['category']);
    if (!isset($category) || $category == NULL) {
        header("Location: 404.php");
    }else{
        $id = $category;
    }

 ?>
            <!--Pagination-->
        <?php
        $per_page = 3;
        if(isset($_GET["page"])){
            $page = $_GET["page"];
        }else{
            $page = 1;
        }
        $start_form = ($page-1)*$per_page;
        ?>
        <!--Pagination-->

        <?php
                $query = "select id from tbl_category where cat_slug = '$id'";
            $post = $db->select($query);
            if ($post) {
            while ($result = $post->fetch_assoc()) {
                    $id = $result['id'];
                }
            }
            ?>
           
            <div class="col-sm-8 col-sm-pull-4">
                <div class="blog">
                    <?php 
                        $query = "select * from tbl_post where cat = $id order by id desc limit $start_form,$per_page";
                        $post = $db->select($query);
                        if ($post) {
                        while ($result = $post->fetch_assoc()) {
                    
                     ?>
                    <div class="blog-item">
                    <?php if($result['image']!='') { ?>
                        <a href="<?php echo SITE_URL ?><?php echo $result['slug']; ?>"><img class="img-responsive img-blog" src="<?php echo SITE_URL;?>admin/<?php echo  $result['image'];?>" width="100%" alt="" /></a>
                     <?php } ?>
                        <div class="blog-content">
                            <a href="<?php echo SITE_URL ?><?php echo $result['slug']; ?>"><h3><?php echo $result['title']; ?></h3></a>
                            <div class="entry-meta">
                                <span><i class="icon-user"></i> <a href="#"><?php echo $result['author']; ?></a></span>
                                <span><i class="icon-calendar"></i> <?php echo $fm->formatDate($result['date']); ?></span>
                            </div>
                            <?php echo $fm->textShorten($result['body'],425); ?>
                            <a class="btn btn-default" href="<?php echo SITE_URL ?><?php echo $result['slug']; ?>">Read More <i class="icon-angle-right"></i></a>
                        </div>
                    </div><!--/.blog-item-->
                <?php }

                         
                $query = "select * from tbl_post where cat = $id";
                $result= $db->select($query);
                $total_rows = mysqli_num_rows($result);
                if($total_rows>$per_page){
                $total_pages = ceil($total_rows/$per_page);
                echo "<ul class='pagination pagination-lg'><li><a href='".SITE_URL."posts.php?category=".$id."&page=1'><i class='icon-angle-left'></i>".''."</a></li>" ;
                for ($i=1; $i <= $total_pages ; $i++) { 
                    $active = $i == $page ? 'class="active"' : '';
                    echo "<li $active><a href='".SITE_URL."posts.php?category=".$id."&page=".$i."'>".$i."</a></li>";
                }
                echo "<li><a href='".SITE_URL."posts.php?category=".$id."&page=$total_pages'>".''."<i class='icon-angle-right'></i></a></li></ul>"; } ?>

                <!--Pagination-->

                <?php }  else{echo "<h2>No Posts Found...</h2>";} ?>
                            </div>
                        </div><!--/.col-md-8-->
                    </div><!--/.row-->
                </section><!--/#blog-->

<?php include "inc/footer.php";?>