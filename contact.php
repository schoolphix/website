<?php
require_once("functions.php");
$web_data = getWebsiteData();
$links = getAllLinks();
require_once("pagelayout.php");

$title="Our Contacts";

openSiteHeader($title,$web_data);
getHeaderScripts($web_data);
closeSiteHeader($web_data);
getSocialMediaLinks($web_data);
getMenulinks(5,1,$web_data,$links);


getPageBanner($title,$crumb,$web_data);

getGoogleMapAPI($web_data);
?>

<!-- Start Content -->
<div id="content">
	<div class="container">
		
		<div class="row">
			
			<div class="col-md-8">
				
				<!-- Classic Heading -->
				<h4 class="classic-title"><span>Contact Us</span></h4>
				             
				<!-- Start Contact Form -->
                <? callErrorMessage();?>
    <form role="form" class="contact-form" id="contact-form" method="post" action="controller">
    <div class="form-group">
    <div class="controls">
    <input type="text" placeholder="Name" name="clientname" required="required">
    </div>
    </div>
    <div class="form-group">
    <div class="controls">
    <input type="text" placeholder="Phone" name="clientphone">
    </div>
    </div>
    <div class="form-group">
    <div class="controls">
    <input type="email" class="email" placeholder="Email" name="email">
    </div>
    </div>
    <div class="form-group">
    <div class="controls">
    <input type="text" class="requiredField" placeholder="Subject" name="subject">
    </div>
    </div>

    <div class="form-group">

    <div class="controls">
    <textarea rows="7"  placeholder="Message" name="message" required="required"></textarea>
    </div>
    </div>
    <input type="hidden" name="action" value="contact-us" />
    <button type="submit" id="submit" class="btn btn-base">Send</button><div id="success" style="color:#34495e;"></div>
    </form>
				<!-- End Contact Form -->
				
			</div>
			
			<div class="col-md-4">
				
				<!-- Classic Heading -->
				<h4 class="classic-title"><span>Contact Information</span></h4>
				
				<!-- Some Info -->
				<p><?=$web_data['School_Name']?> is located at:</p>
				
				<!-- Divider -->
				<div class="hr1" style="margin-bottom:10px;"></div>
				
				<!-- Info - Icons List -->
				<ul class="icons-list">
					<li><i class="fa fa-globe">  </i> <strong>Address:</strong> <?=strip_tags($web_data['School_Address'])?></li>
					<li><i class="fa fa-envelope-o"></i> <strong>Email:</strong> <?=strip_tags($web_data['School_Email'])?></li>
					<li><i class="fa fa-mobile"></i> <strong>Phone:</strong> <?=strip_tags($web_data['School_Phone'])?></li>
				</ul>
				
				<!-- Divider -->
				<div class="hr1" style="margin-bottom:15px;"></div>
				
				<!-- Classic Heading -->
				<h4 class="classic-title"><span>Visiting Hours</span></h4>
				
				<!-- Info - List -->
				<?=$web_data['School_Visit']?>
				
			</div>
			
		</div>
		
	</div>
</div>
<!-- End content -->


<?php
getSiteFooter($web_data);
?>