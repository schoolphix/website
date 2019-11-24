<?php
require_once("functions.php");
$web_data = getWebsiteData();
$links = getAllLinks($mode="get_home_content");
require_once("pagelayout.php");

openSiteHeader("Welcome",$web_data);
getHeaderScripts($web_data);
closeSiteHeader($web_data);
getSocialMediaLinks($web_data);
getMenulinks(1,1,$web_data,$links);
getCarousel();

$page = getMorePageDetails("url_content","index");
?>


 <!-- MAIN CONTENT -->
        <section class="slice p-15 base">
        <div class="cta-wr">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h1 class="text-normal">
                            Gain Admission Into <strong><?=$web_data["School_Name"]?></strong> In Easy Steps 
                        </h1>
                    </div>
                    <div class="col-md-4">
                        <a href="admission?admission" class="btn btn-lg btn-b-white btn-icon btn-icon-right btn-check pull-right">
                            <span>Click here</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

	<?
		connectAppDB();
		$myquery = "SELECT * FROM adminupdate WHERE updatetype = 'boxes'";
		$bresult = mysql_query($myquery);
		while(@$brecord = mysql_fetch_array($bresult)){
			if($brecord['updatemode']=="1"){
				$boxonecap=$brecord['caption'];
				$boxonecol=$brecord['upload'];
				$boxonecon=$brecord['content'];
			}elseif($brecord['updatemode']=="2"){
				$boxtwocap=$brecord['caption'];
				$boxtwocol=$brecord['upload'];
				$boxtwocon=$brecord['content'];
			}elseif($brecord['updatemode']=="3"){
				$boxtrecap=$brecord['caption'];
				$boxtrecol=$brecord['upload'];
				$boxtrecon=$brecord['content'];
			}elseif($brecord['updatemode']=="4"){
				$boxforcap=$brecord['caption'];
				$boxforcol=$brecord['upload'];
				$boxforcon=$brecord['content'];
			}
		}
	?>
<section class="slice light-gray bb">
        <div class="wp-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="wp-block hero base no-margin" style="background-color:<?=@$boxonecol?>">
                            <div class="thmb-img">
                                <i class="fa fa-keyboard-o"></i>
                            </div>			
                            <h2><?=@$boxonecap?></h2>
                            <p class="text-center"><?=@$boxonecon?></p>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="wp-block hero base no-margin" style="background-color:<?=@$boxtwocol?>">
                            <div class="thmb-img">
                                <i class="fa fa-keyboard-o"></i>
                            </div>
                            
                            <h2><?=@$boxtwocap?></h2>
                            <p class="text-center"><?=@$boxtwocon?></p>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="wp-block hero base no-margin" style="background-color:<?=@$boxtrecol?>">
                            <div class="thmb-img">
                                <i class="fa fa-keyboard-o"></i>
                            </div>
                            
                            <h2><?=@$boxtrecap?></h2>
                            <p class="text-center"><?=@$boxtrecon?></p>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="wp-block hero base no-margin" style="background-color:<?=@$boxforcol?>">
                            <div class="thmb-img">
                                <i class="fa fa-keyboard-o"></i>
                            </div>
                            
                            <h2><?=@$boxforcap?></h2>
                            <p class="text-center"><?=@$boxforcon?></p>
                        </div>
                    </div>
                        
                </div>

            </div>
        </div>
    </section>

<section class="slice light-gray bb">
        <div class="wp-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="section-title-wr">
                            <h3 class="section-title left">
                                <span>Welcome to <?=$web_data["School_Name"]?></span>
                            </h3>
                        </div>
                        <div class="row">
                            <div class="col-md-8" style="width:100%">
                            	<div class="col-md-4" style="width:60%">
                                	<img src="<?=$page['picture_url']?>" alt="" class="img-responsive img-thumbnail" height="400" width="400">
                            	</div>
                                <p>
                                <?=$page['content']?>
                                </p>
                            </div>
                        </div>
                       <!-- <blockquote class="blockquote-1">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid</p>
                            <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
                        </blockquote>-->
                    </div>
                    <div class="col-md-5">
                        <div class="section-title-wr">
                            <h3 class="section-title left">
                                <span>Why Choose Us</span>
                            </h3>
                        </div>
                        <div class="widget">
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                  <div class="panel-heading">
                                    <h4 class="panel-title">
                                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">
                                        Our Vision
                                      </a>
                                        </h4>
                                  </div>
                                  <div id="collapseOne" class="panel-collapse collapse" style="height: 0px;">
                                    <div class="panel-body">
                                        <p>
                                          <?=$web_data['School_Vision']?>
                                        </p>
                                    </div>
                                  </div>
                                </div>
                                <div class="panel panel-default">
                                  <div class="panel-heading">
                                    <h4 class="panel-title">
                                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed">
                                        Our Mission
                                      </a>
                                    </h4>
                                  </div>
                                  <div id="collapseTwo" class="panel-collapse collapse" style="height: 0px;">
                                    <div class="panel-body">
                                      <p>
										  <?=$web_data['School_Mission']?>
                                      </p>
                                    </div>
                                  </div>
                                </div>
                                <div class="panel panel-default">
                                  <div class="panel-heading">
                                    <h4 class="panel-title">
                                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed">
                                        School Song
                                      </a>
                                    </h4>
                                  </div>
                                  <div id="collapseThree" class="panel-collapse collapse" style="height: 0px;">
                                    <div class="panel-body">
                                      <p>
                                      <?=$web_data['School_Song']?>
                                    </p>
                                    </div>
                                  </div>
                                </div>
                                <div class="panel panel-default">
                                  <div class="panel-heading">
                                    <h4 class="panel-title">
                                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour" class="collapsed">
                                        Our Core Values
                                      </a>
                                    </h4>
                                  </div>
                                  <div id="collapseFour" class="panel-collapse collapse" style="height: 0px;">
                                    <div class="panel-body">
                                      <p>
                                         <?=$web_data['School_Core_Values']?>
                                      </p>
                                    </div>
                                  </div>
                                </div>
                                <div class="panel panel-default">
                                  <div class="panel-heading">
                                    <h4 class="panel-title">
                                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive" class="">
                                        Downloads
                                      </a>
                                    </h4>
                                  </div>
                                  <div id="collapseFive" class="panel-collapse in" style="height: auto;">
                                    <div class="panel-body">
                                      <p>
                                          <ul class="icons-list">
                                            <?
                                                //connectAppDB();
                                                $school_files = mysql_query("SELECT * FROM uploads 
                                                ORDER BY uploadtype");
                                                
                                                while(@$record = mysql_fetch_array($school_files)){
                                                    $captnn = "";
													if($record["uploadtype"]=="newsletter"){
														$captnn = "Secondary Newsletter";
													}elseif($record["uploadtype"]=="newsletter_2"){
														$captnn = "Primary Newsletter";
													}elseif($record["uploadtype"]=="admission_form"){
														$captnn = "Secondary Admission Form";
													}elseif($record["uploadtype"]=="admission_form_2"){
														$captnn = "Primary Admission Form";
													}
                                            ?>
                                                    <li> <a href="download?id=<?=$record["filedir"]?>&type=calendar"><i class="fa fa-file-pdf-o"></i> <?=$captnn?></a></li>
                                            <?
                                                }
                                            ?>  
                                          </ul>
                                      </p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </div>
                        
                        
                        <?	if($web_data["School_Video"]!=""){?>
								<iframe width="450" height="315" src="<?=$web_data["School_Video"]?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
						<?	}?>
                        
                    </div>
                </div>
            </div>
        </div>    
    </section>
    
     <section class="prlx-bg inset-shadow-1" data-stellar-ratio="2" style="min-height: 450px; padding: 50px 0; background-image: url(<?=$web_data['Banner_BG']?>); background-position: 0 -100px;">
        <div class="mask mask-2"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
<!--                            <h4 class="c-white"><i class="fa fa-birthday-cake fa-4x"></i></h4>
-->                            <h2 class="c-white">Our Achievement Rating</h2>
                            
                            <div class="row">
                                <div class="col-sm-6 col-md-3">
                                    <div class="pie-chart" data-percent="91" data-color="#FFF">
                                        <span class="percent"></span>
                                        <div class="chart-text">
                                            <h3 class="c-white">Examinations</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="pie-chart" data-percent="23" data-color="#FFF">
                                        <span class="percent"></span>
                                        <div class="chart-text">
                                            <h3 class="c-white">Awards</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="pie-chart" data-percent="68" data-color="#FFF">
                                        <span class="percent"></span>
                                        <div class="chart-text">
                                            <h3 class="c-white">Graduation</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="pie-chart" data-percent="90" data-color="#FFF">
                                        <span class="percent"></span>
                                        <div class="chart-text">
                                            <h3 class="c-white">Admission</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    
    <section class="slice light-gray">
        <div class="wp-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        
                        <div id="carouselTestimonial" class="carousel carousel-testimonials slide" data-ride="carousel">
                            <!-- Indicators -->
                            <?
							connectAppDB();
							$query = mysql_query("SELECT COUNT(*) as count FROM 
							testimonies WHERE status = 'ACTIVE'");
							$result = mysql_fetch_assoc($query);
							$num=$result['count'];
							//echo $num;
							//die('here');
							?>
                            <ol class="carousel-indicators">
                            <?
							if($num>5) $num=4; 
							for(@$i==0;@$i<=$num-1;@$i++){
							?>
                                <li data-target="#carouselTestimonial" data-slide-to="<?=$i?>" class="<?=$i==0?"active":""?>"></li>
                             <? }?>
                            </ol>
							
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                            <? 
							connectAppDB();
							$query2 = mysql_query("SELECT * FROM 
							testimonies WHERE status = 'ACTIVE' 
							ORDER BY sn DESC LIMIT 7");
							$results2 = $query2;
							
							$j=1;
							while($results2 = mysql_fetch_assoc($query2)){
							?>
                                <div class="item <?=$j==1?"active":""?>">
                                    <div class="text-center">
                                        <h4><i class="fa fa-quote-left fa-3x"></i></h4>
                                        <p class="testimonial-text">
                                        <?=$results2['testimony']?>
                                        </p>
                                        <p>
                                            <?=$results2['name']?>
                                        </p>
                                        <span class="clearfix"></span>
                                    </div>
                                </div>
                            <? $j++; } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	
    <section class="slice light-gray bb">
        <div class="wp-section">
            <div class="container">
                <!--<div class="section-title-wr">
                    <h3 class="section-title left"><span>News Feed</span></h3>
                </div>-->
                <div class="no-margin owl-carousel owl-carousel-4" data-owl-pagination="smth">
   					<? 
					connectAppDB();
					$query3 = mysql_query("SELECT * FROM 
					newsletters WHERE id != '' 
					ORDER BY id DESC LIMIT 7"); //adminupdate
					$results3 = $query3;
					while($results3 = mysql_fetch_assoc($query3)){
					?>
                    <div class="item">
                        <div class="wp-block product">
                            <figure>
                                <strong style="font-size:16px">
                                <?=$results3['caption']?>
                                </strong>
                            </figure>
                            <p>
                            <?=$results3['content']?>
                            </p>
                        </div>
                    </div>
                    <? }?>
                </div>
            </div>
        </div>
    </section>

<div class="modal fade bs-newaccount-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="myModal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">X</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">News & Announcement
				</h4>
			</div>
			<div class="modal-body">
				<?	//for($s=0;$s<count($newsholder);$s++){?>	
                				
						<div class="form-group" style="float:left">
                        <? 
						//connectAppDB();
						$queryAU = mysql_query("SELECT * FROM 
						adminupdate WHERE updatetype = 'news' AND updatemode = 'home' 
						ORDER BY id DESC LIMIT 1"); //adminupdate
						$resultsAU = $queryAU;
						$count_news = mysql_num_rows($resultsAU);
						while($resultsAU = mysql_fetch_assoc($queryAU)){
						?>	
                         <? if($resultsAU['upload'] != '')?>
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="caption">
							    <!--<img alt="" src="<?=$resultsAU['upload']?>" width="480" height="332" />-->
							    </label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<b><?=$resultsAU['caption']?></b>
								<?=$resultsAU['content']?>
							</div>
                         <?	}?>	
						</div>					
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>

		</div>
	</div>
</div>
<style>
.modal2 {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 10000; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: scroll; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

.modal-content2 {
    background-color: #ffffff;
    margin: 2% auto; /* 15% from the top and centered */
    padding: 5px;
    border: 1px solid #888;
    width: 70%; /* Could be more or less, depending on screen size */
    min-height: 100%;
}

.close2 {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close2:hover,
.close2:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

</style>
<div id="myModal2" class="modal2">

        <!-- Modal content -->
        <div class="modal-content2">
            <span class="close2" onClick="javascript:return closeModal();">&times;</span><!---->            
            <p>Deola Ajayi</p>
        </div>

    </div>
<?php
//getTestimonials();
getSiteFooter($web_data);
?>

<script type="text/javascript">
	$(document).ready(function() {
		<?  if($count_news>0){?>
		        callModalNow()
		<? }?>
	});	//end of document ready function	
	function callModalNow(){
		<?	if(count($newsholder)>=0){?>
				$("#myModal").modal("show");	
		<?	}?>
	}
</script>	