<link rel="stylesheet" href="<?php echo SITE_URL;?>font-awesome-4.5.0/css/font-awesome.css">	
	<link rel="stylesheet" href="<?php echo SITE_URL;?>css/nivo-slider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo SITE_URL;?>style.css">
 <?php 
            $query = "select * from tbl_theme where id='1'";
            $themes = $db->select($query);     
            while ($result = $themes->fetch_assoc()) { 
            	if($result['theme']=='default') { ?>
            	<link rel="stylesheet" href="<?php echo SITE_URL;?>theme/default.css">
            	<?php } elseif($result['theme']=='green') { ?>
            	<link rel="stylesheet" href="<?php echo SITE_URL;?>theme/green.css">
            	<?php } elseif($result['theme']=='red') { ?>
            	<link rel="stylesheet" href="<?php echo SITE_URL;?>theme/red.css">
            	<?php } } ?>
        