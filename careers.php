<?php
require_once("functions.php");
$web_data = getWebsiteData();
$links = getAllLinks();
require_once("pagelayout.php");

$title="Careers";

openSiteHeader($title,$web_data);
getHeaderScripts($web_data);
closeSiteHeader($web_data);
getSocialMediaLinks($web_data);
getMenulinks(7,1,$web_data,$links);

getPageBanner($title,$crumb,$web_data);
?>


<!-- Start Content -->
<div id="content">
    <div class="container">
        <div class="row sidebar-page">
           
            <!-- Page Content -->
            <div class="col-md-9 page-content">
            
				<?
                    connectAppDB(); 
                    $myquery = "SELECT * FROM careers WHERE status = 'ACTIVE' ORDER BY id ASC LIMIT 20";
                    $list = mysql_query($myquery);	
                    
                    //$list = mysql_query($myquery);
                    $countlist = @mysql_num_rows($list);

                    if($countlist > 0){
                    
                    $i=1;
                ?>
                
                    <section class="slice bg-white"> 
                        <div class="wp-section">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8">
                                        <ul class="list-listings-2">
                                            <? while(@$record = mysql_fetch_assoc($list)){?>
                                            <li class="">
                                                <div class="cell">
                                                    <div class="listing-body clearfix">
                                                        <h3><a href="#"><B><?=$record["title"]?></B></a></h3>
<!--                                                            <h4>Computer Generated Solutions Romania SRL</h4>
-->                                                            <p>
                                                                <B>Description</B>
                                                            </p>
                                                            <p>
                                                                <?=$record["description"]?>
                                                            </p>
                                                            <p>
                                                                <B>Requirements</B>
                                                            </p>
                                                            <p>
                                                                <?=$record["requirements"]?>
                                                            </p>
                                                    </div>
                                                    <div class="listing-footer">
                                                        <ul class="aux-info">
                                                            <li><i class="fa fa-calendar"></i><strong>Posted On:</strong> <?=$record["createdon"]?></li>
                                                            <li></li>
                                                            <li><a href="job-application?id=<?=$record["id"]?>" class="btn btn-light">Apply now</a></li>
                                                        </ul>
                                                    </div>
                                                </div> 
                                            </li>
                                          <? $i++; }?>
                                        </ul>
                                    </div>
                
                                    
                                </div>
                            </div>
                        </div>
                    </section>
                                        
             <? }else{?>
                <div class="portlet-msg-info">There are no available jobs</div>
             <? }?> 
    
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