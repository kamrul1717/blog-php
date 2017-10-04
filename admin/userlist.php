<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
 <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                 <div class="col-md-12">

                
        <h2>Post List</h2>
        <?php 
        if (isset($_GET['deluser'])) {
        	$deluser = $_GET['deluser'];
        	$delquery = "delete from tbl_user where id ='$deluser'";
        	$deldata = $db->delete($delquery);
        	if($deldata){
                    echo "<span class='label label-success'>User Deleted Successfully  !!!</span><br><br>";
                }   else {
                    echo "<span class='label label-danger'>User Not Deleted   !!!</span><br><br>";
                }
        }

         ?>


              
            <table class="table table-bordered" id="example">
			<thead>
				<tr>
					<th>Serial No.</th>
					<th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Details</th>
                    <th>Role</th>
                    <?php if(Session::get('userRole')=='0'){ ?>
					<th>Action</th>
                    <?php } ?>
				</tr>
			</thead>
			<tbody>

			<?php 
				$query = "SELECT * FROM tbl_user ORDER BY id desc";
				$alluser = $db->select($query);
				if ($alluser) {
				$i=0;
				while ($result = $alluser->fetch_assoc()) {
				$i++;
			 ?>

				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
                    <td><?php echo $result['name']; ?></td>
                    <td><?php echo $result['username']; ?></td>
                    <td><?php echo $result['email']; ?></td>
                    <td><?php echo $fm->textShorten($result['details']); ?></td>
					<td><?php 
                    if($result['role'] == '0'){
                        echo "Admin";
                    }elseif($result['role'] == '1'){
                        echo "Author";
                    }elseif($result['role'] == '2'){
                        echo "Editor";
                    }

                     ?>
                    </td>
                    <?php if(Session::get('userRole')=='0'){ ?>
					<td>
                        <?php if(Session::get('userRole')=='0') { ?>
                      <a onclick="return confirm('Are you sure to delete');" href="?deluser=<?php echo $result['id']; ?>">Delete</a></td>
                     <?php } ?>
                     <?php } ?>
				</tr>
				
			<?php } }  ?> 

			</tbody>
		</table>
       </div>
            </div>
        </div>
        </div>
        <script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
            setSidebarHeight();


        });
    </script>
       <?php include 'inc/footer.php'; ?>



 