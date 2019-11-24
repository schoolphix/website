<?php
require_once("functions.php");
$web_data = getWebsiteData();
$links = getAllLinks();
define("PAGE_LIMIT",15);
require_once("pagelayout.php");

$title="Search";

openSiteHeader($title,$web_data);
getHeaderScripts($web_data);
getPaginationCss();
?>
<style type="text/css">
	.highlight_word{
			background-color: pink;
	}
</style>
<?
closeSiteHeader($web_data);
getSocialMediaLinks($web_data);
getMenulinks(0,0,$web_data,$links);


$crumb[0][0] = 'cpanel-home';
$crumb[0][1] = 'cpanel';
$crumb[0][2] = 'cPanel';
$crumb[1][0] = '';
$crumb[1][1] = 'search';
$crumb[1][2] = 'Search';

getPageBanner($title,$crumb,$web_data);
?>


<!-- Start Content -->
<div id="content">
    <div class="container">
        <div class="row sidebar-page">
            
            
            <!-- Page Content -->
            <div class="col-md-9 page-content">
                 
				<!-- Start Contact Form -->

<?		
if(isset($_GET['q'])&&trim($_GET['q'])!=""){

	connectAppDB();
	
	$mysearch = getCleanString($_GET['q']);
	
	$statement = "`morepages` WHERE 
	(caption LIKE '%".$mysearch."%' OR 
	content LIKE '%".$mysearch."%') ";			
				
	$page = (int) (!isset($_GET["page"]) ? 1 : 	
	addslashes($_GET["page"]));
	
	
	$limit = PAGE_LIMIT;
	$startpoint = ($page * $limit) - $limit;
			

	$query = "SELECT a.caption, a.category,
	a.url_content, a.content
	FROM morepages a
	WHERE (a.caption LIKE '%".$mysearch."%' OR 
	a.content LIKE '%".$mysearch."%')  
	ORDER BY a.id 
	DESC LIMIT {$startpoint} , {$limit}";

	$records = mysql_query($query);
	
	$countlist = @mysql_num_rows($records);
	
	$qrycnt = "SELECT COUNT(*) as `num` FROM 
	{$statement}";
	$row = mysql_fetch_array(mysql_query($qrycnt));
	$total = $row['num'];
	
	
?>
                <!-- Classic Heading -->
                <h4 class="classic-title"><span><?=$title?> <?=isset($_GET['q'])?"Result For: <i>".$_GET['q']."</i>":""?></span> <?=$total>0?" [{$total} Record".($total>1?"s":"")."]":""?></h4>

<?
	if($countlist > 0){
		$i=0;
		while(@$result = mysql_fetch_array($records)){
			$html = preg_replace('/(<\/[^>]+?>)(<[^>\/][^>]*?>)/', '$1 $2', $result['content']);

			$content = strip_tags($html, '<br><br/>');
			$usearch = explode(" ",$mysearch);
			//$content = $result['content'];
?>
        <!-- Search Result -->
        <div class="classic-testimonials" style="cursor:pointer" onclick="parent.location='<?=$result['category']."?".$result['url_content']?>'" title="go to page">

           <div class="testimonial-author">
            	<span><?=$result['caption']?></span>
                 - <a href="<?=$result['category']."?".$result['url_content']?>" title="goto page">
                 	Go to Page
                 </a>
           </div>
            
            <div class="testimonial-content">
                <?=highlightWords(substr($content,0,550), $usearch)?>
                <?=strlen($result['content'])>550?"...":""?>
            </div>
            
        </div>
        <!-- Search Result -->
        
                       		
        
<?
			$i++;
		}

	echo "<br>";
	$url = "?q=".$mysearch."&";      
	echo pagination($statement,$limit,$page,$url);

	}
}
?> 
     
     
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