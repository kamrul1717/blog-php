<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
            
            <?php
    $date =  mysqli_real_escape_string($db->link,$_GET['date']);
    if (!isset($date) || $date == NULL) {
        header("Location: 404.php");
    }else{
        $date = str_replace('-', ' ', $date);
        $pieces = explode(" ", $date);
    }
 ?>

 <?php
 $month_number = date("n",strtotime($pieces[0]));
 is_numeric ( $pieces[1] )

?>
 <div class="col-sm-8 col-sm-pull-4">
                <div class="blog">
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
 if(is_numeric ( $pieces[1] )){
 $query = "SELECT DISTINCT `date`
FROM tbl_post
GROUP BY `date`";
            $post = $db->select($query);
            if ($post) {
            while ($result = $post->fetch_assoc()) {
                $query = "SELECT * FROM tbl_post Where Month(date)= $month_number && YEAR(date)=$pieces[1] order by id desc limit $start_form,$per_page";
                $post = $db->select($query);
                if ($post) {
                while ($result = $post->fetch_assoc()) { ?>

                        <div class="blog-item">
                    <?php if($result['image']!='') { ?>
                        <a href="<?php echo SITE_URL ?><?php echo $result['slug']; ?>"><img class="img-responsive img-blog" src="<?php echo SITE_URL ?>admin/<?php echo  $result['image'];?>" width="100%" alt="" /></a>
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

                        <?php
                    }

                    $query = "SELECT * FROM tbl_post Where Month(date)= $month_number && YEAR(date)=$pieces[1]";
                    $result= $db->select($query);
                    $total_rows = mysqli_num_rows($result);
                    if($total_rows>$per_page){
                    $total_pages = ceil($total_rows/$per_page);
                    $submit = 'submit';
                    echo "<ul class='pagination pagination-lg'><li><a href='".SITE_URL."filter_by_date.php?date=".$_GET['date']."&page=1'><i class='icon-angle-left'></i>".''."</a></li>" ;
                    for ($i=1; $i <= $total_pages ; $i++) { 
                        $active = $i == $page ? 'class="active"' : '';
                        echo "<li $active><a href='".SITE_URL."filter_by_date.php?date=".$_GET['date']."&page=".$i."'>".$i."</a></li>";
                    }
                    echo "<li><a href='".SITE_URL."filter_by_date.php?date=".$_GET['date']."&page=$total_pages'>".''."<i class='icon-angle-right'></i></a></li></ul>";
                    }

                }
                break;
            }

        }else{

        }
    }


 ?>

     </div>
            </div><!--/.col-md-8-->
        </div><!--/.row-->
    </section><!--/#blog-->
       

 <?php  include "inc/footer.php";?>