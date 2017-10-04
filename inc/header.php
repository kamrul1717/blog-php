<?php include 'config/config.php';?>
<?php include 'lib/Database.php';?>
<?php include 'helpers/Format.php';?>
<?php 
		$db = new Database();
		$fm = new Format();		
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Blog Site</title>
    <link href="<?php echo SITE_URL;?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo SITE_URL;?>css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo SITE_URL;?>css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo SITE_URL;?>css/animate.css" rel="stylesheet">
    <link href="<?php echo SITE_URL;?>css/main.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="<?php echo SITE_URL;?>images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo SITE_URL;?>images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo SITE_URL;?>images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo SITE_URL;?>images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo SITE_URL;?>images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
<body>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=144716315690681";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <header class="navbar navbar-inverse navbar-fixed-top wet-asphalt" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                
                <a class="navbar-brand" href="<?php echo  SITE_URL;?>"><img src="<?php echo SITE_URL;?>admin/upload/logo.png" alt="logo"></a>
                	
            </div>
            <?php 
                $path = $_SERVER['SCRIPT_FILENAME'];
                $currentpage = basename($path,'.php');
            ?>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li  <?php if($currentpage=='index'){echo 'class="active"';} ?>><a href="<?php echo  SITE_URL;?>">Home</a></li>
                    <li><a href="<?php echo  SITE_URL;?>#">About Us</a></li>
                    <li><a href="<?php echo  SITE_URL;?>#">Contact</a></li>
                </ul>
            </div>
        </div>
    </header><!--/header-->
   