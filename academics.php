<?php
require_once("functions.php");
$web_data = getWebsiteData();
$links = getAllLinks();

$caption="";
foreach($_GET as $key => $value){
	$caption = $key;
	break;
}
if(trim($caption)!=""){		
	$page = getMorePageDetails("url_content",$caption);

}else{
	header("location:index");
	exit;
}

require_once("pagelayout.php");


$title=$page['caption'];

openSiteHeader($title,$web_data);
getHeaderScripts($web_data);
closeSiteHeader($web_data);
getSocialMediaLinks($web_data);
getMenulinks(3,1,$web_data,$links);


$crumb[0][0] = './';
$crumb[0][1] = 'home';
$crumb[0][2] = 'Home';
$crumb[1][0] = '';
$crumb[1][1] = strtolower($page['caption']);
$crumb[1][2] = $page['caption'];

getPageBanner($title,$crumb,$web_data);
?>


<!-- Start Content -->
<div id="content">
    <div class="container">
        <div class="row sidebar-page">
            
            
            <!-- Page Content -->
            <div class="col-md-9 page-content">
                
                <!-- Classic Heading -->
                <h4 class="classic-title"><span><? //=$page['caption']?></span></h4>
				<?	if($page!=0){?>
                    <!-- Some Text -->
                    <?	if($page['picture_url']){?>
                    <img class=" image-text" style="float:left;border-right:20px solid white;" alt="" width="250" src="<?=$page['picture_url']?>" />
                    <?	}?>
                        <?=$page['content']?>
	               	<?	}else{?>
			    		<div class="portlet-msg-info">Sorry no information was found for your search</div>
                <?	}?>

				<!-- End Contact Form -->
                 
                
                <!-- Divider -->
                <div class="hr5" style="margin-top:30px; margin-bottom:45px;"></div>




            </div>
            <!-- End Page Content-->
            

<?	getSideBar($links)?>            
            
        </div>
    </div>
</div>
<!-- End Content -->


<?php
getSiteFooter($web_data);
?>