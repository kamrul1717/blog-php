<section id="blog" class="container">
        <div class="row">
            <aside class="col-sm-4 col-sm-push-8">
                <div class="widget search">
                    <form action="<?php echo SITE_URL;?>search.php" method="get">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" autocomplete="off" placeholder="Search">
                            <span class="input-group-btn">
                                <input type="submit" name="submit" class="btn btn-danger" type="button" value="Search"/>
                            </span>
                        </div>
                    </form>
                </div><!--/.search-->

                <div class="widget categories">
                    <h3>Post Categories</h3>
                    <div class="row">
                        <div class="col-sm-12">
                            <ul class="arrow">
                            	<?php 
			         $query = "select * from tbl_category";
			         $category = $db->select($query);
			         if ($category) {
			         while ($result = $category->fetch_assoc()) {	
		            ?>
                                <li><a href="<?php echo SITE_URL;?>category/<?php echo $result['cat_slug']; ?>"><?php echo $result['name'] ?></a></li>
                                <?php } } else { ?>					
						<li>No Category Created</li>
					<?php } ?>
                            </ul>
                        </div>
                    </div>                     
                </div><!--/.categories-->
                <div class="widget categories">
                    <h3>Filter Posts by Date</h3>
                    <div class="row">
                        <div class="col-sm-12">
                        		<?php 
	$arr = array();
			$query = "SELECT DISTINCT `date`
FROM tbl_post
GROUP BY `date`";
			$post = $db->select($query);
			if ($post) {
			while ($result = $post->fetch_assoc()) {
				//echo $result['date'].'<br>';
				$j = $result['date'];
				$m = date("F Y", strtotime($j));
				array_push($arr,$m);
			}
}
$f = array_unique($arr);
foreach ($f as $value) { ?>
                            <ul class="arrow">
                                <li><a href="<?php echo SITE_URL;?>postsbydate/<?php echo str_replace(' ', '-', $value)?>"><?php echo $value ?></a></li>
                            </ul>
                            <?php }


?>
                        </div>
                    </div>                     
                </div><!--/.categories-->
                
            </aside> 