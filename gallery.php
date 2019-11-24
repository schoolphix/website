<?php
require_once("functions.php");
$web_data = getWebsiteData();
$links = getAllLinks();
define("PAGE_LIMIT", 10);
require_once("pagelayout.php");

$title="Photo Album";

openSiteHeader($title,$web_data);
getHeaderScripts($web_data);
getPaginationCss();
closeSiteHeader($web_data);
getSocialMediaLinks($web_data);
getMenulinks(6,1,$web_data,$links);


$crumb[0][0] = './';
$crumb[0][1] = 'home';
$crumb[0][2] = 'Home';
$crumb[1][0] = '';
$crumb[1][1] = 'gallery';
$crumb[1][2] = 'Gallery';

getPageBanner($title,$crumb,$web_data);
?>


<!-- Start Content -->
<div id="content">
    <div class="container">
        <div class="row sidebar-page">
            
            
            <!-- Page Content -->
            <div class="col-md-9 page-content">
                
                <!-- Classic Heading 
                <h4 class="classic-title"><span>Our Photo Albums</span></h4>-->
                

					<ul id="portfolio-list" data-animated="fadeIn">


      <?		
	connectAppDB();

	$statement = "`picfolder`";			
				
	$page = (int) (!isset($_GET["page"]) ? 1 : addslashes($_GET["page"]));
	
	
	$limit = PAGE_LIMIT;
	$startpoint = ($page * $limit) - $limit;
			

	$query = "SELECT a.*, b.usernames as 'createby' FROM picfolder a, adminuser b
				WHERE a.createdby = b.id ORDER BY a.id DESC LIMIT {$startpoint} , {$limit}";

							
	$result = mysql_query($query);
	
	$getFolders = $result;	
		
		if($getFolders != 0){
			
			while(@$row = mysql_fetch_array($getFolders)){

				$piccnt = getPictureCount($row['id']);
                ?>

                <li style="cursor:pointer" title="<?=$row['caption']?>" onClick="parent.location='pictures?fid=<?=$row['id']?>'">
                    <img src="images/albums.png" alt="" />
                    <div class="portfolio-item-content">
                        <span class="header">
                        <?=substr($row['caption'],0,30)?><?=(strlen($row['caption'])>30?"...":"")?> 
                        </span>
                        <p class="body">
                        	<span class='badge'><?=$piccnt?></span> picture<?=$piccnt>1?"s":""?>
                        </p>
                    </div>


                    <a href="pictures?fid=<?=$row['id']?>" title="click to see pictures"><i class="more">+</i></a>

                </li>


<? 
			}
?>	

                </ul>
					<!-- End Portfolio Items -->

            <?
			echo "<br>";
			$url = "?";      
			echo pagination($statement,$limit,$page,$url);
			?>

			<?
				}else{?>
                	<div class="portlet-msg-info">
                    Sorry, no gallery photo album has been added. Please inform school admin personnel
                    </div>
				<? }?>   



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