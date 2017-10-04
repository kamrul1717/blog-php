<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<?php 
                $path = $_SERVER['SCRIPT_FILENAME'];
                $currentpage = basename($path,'.php');
            ?>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li <?php if($currentpage=='index'){echo 'class="active"';} ?>>
                        <a href="<?php echo SITE_URL; ?>admin"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>

                    <li <?php if($currentpage=='addcat' || $currentpage=='catlist' || $currentpage=='editcat'){echo 'class="active"';} ?>>
                        <a href="javascript:;" data-toggle="collapse" data-target="#cat"><i class="fa fa-fw fa-arrows-v"></i> Category Option <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="cat" class="collapse">
                            <li>
                                <li><a href="addcat.php">Add Category</a>
                            </li>
                            <li>
                                <li><a href="catlist.php">Category List</a>
                            </li>
                        </ul>
                    </li>

                    <li <?php if($currentpage=='addpost' || $currentpage=='postlist' || $currentpage=='editpost'){echo 'class="active"';} ?>>s
                        <a href="javascript:;" data-toggle="collapse" data-target="#post"><i class="fa fa-fw fa-arrows-v"></i> Post Option <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="post" class="collapse">
                            <li>
                                <li><a href="addpost.php">Add Post</a>
                            </li>
                            <li>
                                <li><a href="postlist.php">Post List</a>
                            </li>
                        </ul>
                    </li>
                    <li <?php if($currentpage=='profile'){echo 'class="active"';} ?>>
                        <a href="profile.php"> User Profile</a>
                    </li>
                    <li <?php if($currentpage=='changepassword'){echo 'class="active"';} ?>>
                        <a href="changepassword.php"> Change Password</a>
                    </li>
                    <li <?php if($currentpage=='adduser'){echo 'class="active"';} ?>>
                        <?php if(Session::get('userRole')=='0') { ?>
                        <a href="adduser.php"> Add User</a>
                        <?php } ?>
                    </li>
                    <li <?php if($currentpage=='userlist'){echo 'class="active"';} ?>>
                        <a href="userlist.php"> User List</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>