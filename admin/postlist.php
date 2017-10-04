<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                 <div class="col-md-12">

                <h2>Post List</h2>

                <?php   if(Session::get("message")){ ?>
                 
                <center><span class="label label-<?php 
                if(Session::get("color")){
                echo Session::get("color");
                Session::unset_it("color");
              }else{
                  echo "danger";
              }
                 ?>"><?php echo Session::get("message"); ?></span></center><br>
               <?php Session::unset_it("message");
              }
                    ?>
                 
                    <table class="table table-bordered" id="example">
					<thead>
						<tr>
							<th width="5%">No.</th>
							<th width="15%">Post Title</th>
							<th width="20%">Descriptions</th>
							<th width="10%">Category</th>
							<th width="10%">Image</th>
							<th width="10%">Author</th>
							<th width="10%">Slugs</th>
							<th width="10%">Date</th>
							
							<th width="10%">Action</th>
							
						</tr>
					</thead>
					<tbody>
					<?php 
						$query = "SELECT tbl_post.*,tbl_category.name FROM tbl_post
						INNER JOIN tbl_category
						ON tbl_post.cat = tbl_category.id
						ORDER By tbl_post.title DESC";
						$post = $db->select($query);
						if ($post) {
							$i=0;
							while ($result = $post->fetch_assoc()) {
								$i++;
					 ?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['title']; ?></td>
							<td><?php echo $fm->textShorten($result['body'],35); ?></td>
							<td><?php echo $result['name']; ?></td>
							<td><img src="<?php echo $result['image']; ?>" height="40px" width="60px"/></td>
							<td><?php echo $result['author']; ?></td>
							<td><?php echo $result['slug']; ?></td>
							<td><?php echo $fm->formatDate($result['date']); ?></td>
							
							<td>
							<a href="<?php echo SITE_URL ?><?php echo $result['slug']; ?>">View</a>

							<?php if(Session::get('userId')==$result['userid'] || Session::get('userRole')=='0') { ?>
								 || <a href="editpost.php?editpostid=<?php echo $result['id']; ?>">Edit</a> || 							
								<a onclick="return confirm('Are you sure to delete');" href="deletepost.php?delpostid=<?php echo $result['id']; ?>">Delete</a>
								<?php } ?>
								 </td>
						</tr>
						<?php } } ?>
					</tbody>
				</table>
				<script type="text/javascript">
			        $(document).ready(function () {
			            setupLeftMenu();
			            $('.datatable').dataTable();
						setSidebarHeight();
			        });
			    </script>
			     </div>
                <!-- /.row -->

              

            </div>
            </div>
            <!-- /.container-fluid -->

        </div>
    <?php include 'inc/footer.php'; ?>
