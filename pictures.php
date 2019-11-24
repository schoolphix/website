<?php
require_once("functions.php");
$web_data = getWebsiteData();
$links = getAllLinks();
define("PAGE_LIMIT", 12);
require_once("pagelayout.php");

$title="Album Pictures";

openSiteHeader($title,$web_data);
getHeaderScriptss($web_data);


getPaginationCss();
getYearBookGalleryScript();
getFaceBookSDKPlugin();
setFaceBookCommentAdmin();


closeSiteHeader($web_data);
getSocialMediaLinks($web_data);
getMenulinks(6,1,$web_data,$links);


$crumb[0][0] = './';
$crumb[0][1] = 'home';
$crumb[0][2] = 'Home';
$crumb[1][0] = 'gallery';
$crumb[1][1] = 'gallery';
$crumb[1][2] = 'Gallery';
$crumb[2][0] = '';
$crumb[2][1] = 'album pictures';
$crumb[2][2] = 'Album Pictures';

getPageBanner($title,$crumb,$web_data);
?>


<!-- Start Content -->
<div id="content">
    <div class="container">
        <div class="row sidebar-page">
            
<?
if(isset($_GET['fid']) && is_numeric($_GET['fid']) && $_GET['fid']>0){
	$fid = addslashes(trim($_GET['fid']));
	$folder = getFolderById($fid);
}
?>
            
        <!-- Page Content -->
        <div class="col-md-9 page-content">
         <form name="search" method="post">
            <!-- Classic Heading -->
            <h4 class="classic-title"><span><?=$folder['caption']?></span>
   
		<select name="gonext" class="email" style="width:30%;float:right;cursor:pointer" title="select an album" onChange="parent.location=this.form.gonext.value" >
    <option value="">Select Another Album</option>
	  <?
      $getCategory = getAllPictureFolders();
      if(mysql_num_rows($getCategory)>0) {
          while(@$row = mysql_fetch_array($getCategory)){
          ?>
          <option value="pictures?fid=<?=$row['id']?>"><?=$row['caption']?></option>
      <? 
          }
      }
      ?>
	</select>    

        </h4>            
	</form>



      <?
	  	if(isset($_GET['fid']) && is_numeric($_GET['fid']) && $_GET['fid']>0){
		$fid = addslashes(trim($_GET['fid']));
		
		$statement = "`gallerypicures` WHERE folderid = '".$fid."'";			
					
		$page = (int) (!isset($_GET["page"]) ? 1 : addslashes($_GET["page"]));
		
		
		$limit = PAGE_LIMIT;
		$startpoint = ($page * $limit) - $limit;
		
		
		$sessiondetails = getPictures($fid,$startpoint,$limit);
        $i = 1;
		if($sessiondetails != 0){
?>
             
	<br />
    
        <div style="width:100%;float:left" id="comments">
        	<ul id="portfolio-list" data-animated="fadeIn">
<?			
			while(@$row = mysql_fetch_array($sessiondetails)){
				?>
			<? $imgdir = $row['imagedirectory']; ?>								
                <li class="comment_even">
                    <a href="<?=$imgdir?>" class="lightbox-image" rel="prettyPhoto[group1]" >
                        <img src="<?=$imgdir?>" width="150" height="150"  title="<?=$row["title"]?>" class="chrisimg"/>
                    </a>
                </li>

                               
					<? $i++;}	?>
         	</ul>
		</div>
	

            <?
			echo "<br>";
			$url = "?fid=".$fid."&";      
			echo pagination($statement,$limit,$page,$url);
			?>
                    


<?
	echo '<div style="width:80%">';
		//facebook like and comments
		displayFaceBookLike();
		echo "<br />";
		displayFaceBookComment();     
	echo "</div>";				
				
		}else{?>
        <br />
		<div class="portlet-msg-info">Sorry, no picture has been uploaded to this album. Please inform school admin personnel</div>

		<? }
	}else{?>
    	<br />
		<div class="portlet-msg-alert">You must specify a valid album id to view this page</div>
	<? }?>

<script type="text/javascript"> Cufon.now(); </script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#myRoundabout').roundabout({
			 shape: 'square',
			 minScale: 0.93, // tiny!
			 maxScale: 1, // tiny!
			 easing:'easeOutExpo',
			 clickToFocus:'true',
			 focusBearing:'0',
			 duration:800,
			 reflect:true
		});
		tabs.init();
		// for lightbox
		if ($("a[rel^='prettyPhoto']").length) {
			$(document).ready(function() {
				// prettyPhoto
				$("a[rel^='prettyPhoto']").prettyPhoto({theme:'light_square'});
			});
		} 
	});
</script>




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
getSiteFooter($web_data,0,0);
?>