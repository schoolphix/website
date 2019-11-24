<?php
require_once("functions.php");
mustLogin();
$web_data = getWebsiteData();
$links = getAllLinks();

if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'reply-contact-message') {
	try{
		if(trim($_REQUEST['subject']) == "" || trim($_REQUEST['email']) == "" || trim($_REQUEST['body']) == ""){
			$_SESSION['error'][] = "Please enter all required fields";
			$_SESSION['alertstyle'] = "alert";
		}else{
			connectAppDB();
			$id = getCleanString($_GET['id']);
			$to = getCleanString($_REQUEST['email']);//reciever's email
			$subject = getCleanString($_REQUEST['subject']);
			$message = 
			mysql_real_escape_string(
			$_REQUEST['body']);
			
			@sendEmailNotice($to,$subject,$message,"");
		$exec = @mysql_query("INSERT INTO messagereplies
				(caption, body, repliedon, messageid)
				 VALUES 
				 ('".$subject."','".$message."','".getDateTime()."','".$id."')");
			if($exec!=""){
				$_SESSION['divborder'] = "success";//set div border to yes, to style messageborder differently
				$_SESSION['error'][] = 'Reply was sent successfully.';
			}else{
				$_SESSION['error'][] = 'Sorry an error occurred. Please try again later.';
			}
		}
	}catch(Exception $ex){
		$_SESSION['error'][] = $ex->getMessage();
	}
}
require_once("pagelayout.php");

$title="Messages Details";

openSiteHeader($title,$web_data);
getHeaderScripts($web_data);
closeSiteHeader($web_data);
getSocialMediaLinks($web_data);
getMenulinks(0,0,$web_data,$links);


$crumb[0][0] = 'cpanel-home';
$crumb[0][1] = 'cpanel';
$crumb[0][2] = 'cPanel';
$crumb[1][0] = 'contact-messages';
$crumb[1][1] = 'contact messages';
$crumb[1][2] = 'Contact Messages';
$crumb[2][0] = '';
$crumb[2][1] = 'message details';
$crumb[2][2] = 'Message Details';

getPageBanner($title,$crumb,$web_data);
?>


<!-- Start Content -->
<div id="content">
    <div class="container">
        <div class="row sidebar-page">
            
            
            <!-- Page Content -->
            <div class="col-md-9 page-content">

               <? callErrorMessage();?>
 
                <!-- Classic Heading -->
                <h4 class="classic-title"><span><?=$title?></span></h4>
                
				<!-- Start Contact Form -->
 
<?
if(isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0){//If user id is set and its numeric
	connectAppDB();
	$cid = getCleanString($_GET['id']);
	$message = getContactMessageById($cid);
	if($message != 0){#check if such a message exist	
		if($message['readmessage'] == 0){#if reciever has not read the message before, update the readid to 1
			$query = "UPDATE contactus SET readmessage = '1' WHERE id = '".$cid."'";
			$update = mysql_query($query);
		}
?>
    	<table width="100%" border="0" cellspacing="10" cellpadding="0" class="mytable">
          <tr>
            <td class="leftTd" width="15%"><strong>Subject</strong></td>
            <td class="rightTd"><?=$message['contactsubject']?></td>
          </tr>
          <tr>
            <td class="leftTd"><strong>Name</strong></td>
            <td class="rightTd"><?=$message['names']?></td>
          </tr>
          <tr>
            <td class="leftTd"><strong>Phone No.</strong></td>
            <td class="rightTd"><?=$message['phoneno']?></td>
          </tr>
          <tr>
            <td class="leftTd"><strong>Email</strong></td>
            <td class="rightTd"><?=$message['email']?></td>
          </tr>
          <tr>
            <td class="leftTd"><strong>Message</strong></td>
            <td><?=html_entity_decode($message['message'])?></td>
          </tr>
          <tr>
            <td class="leftTd"><strong>Date Sent</strong></td>
            <td><?=$message['datesent']?> - [<?=christime($message['datesent'])?>]</td>
          </tr>
        </table>
        <table width="100%" border="0" class="mytable" align="center">
          <tr>
            <td align="left" colspan="2"><span style="font-weight:bold;color:#00F">All Your Replies</span></td>
        </tr>	
        <?
        $result = mysql_query("SELECT * FROM messagereplies WHERE
		messageid = '".$cid."'");
		if(mysql_num_rows($result)>0){
			while($rows = mysql_fetch_array($result)){
				?>
          	<tr>
            	<td align="left"><span style="font-size:16px;font-weight:bold;color:#A00">*</span> Replied On</td>
            	<td align="left"><?=$rows['repliedon']?> - [<?=christime($rows['repliedon'])?>]</td>
        	</tr>	
          	<tr>
            	<td align="left">Subject</td>
            	<td align="left"><?=$rows['caption']?></td>
        	</tr>	
          	<tr>
            	<td align="left">Message</td>
            	<td align="left"><?=stripslashes(nl2br(htmlspecialchars_decode($rows['body'])))?></td>
        	</tr>	
          <tr>
            <td align="left" colspan="2"><br /></td>
        </tr>	            
			
				<?
			}
		}else{
			?>
          <tr>
            <td align="left" colspan="2">
<div class='portlet-msg-info'>You Have Not Replied This Message Yet.</div>            
            </td>
        </tr>	            
			<?
		}
		?>
        </table>        
            <form name ="forumnewpost" id="forumnewpost" method="POST" action="contact-message-view?id=<?=$cid?>">
            <table width="100%" border="0" class="mytable" align="center" style="border-top:none">
              <tr>
                <td align="left" colspan="2"><span style="font-weight:bold;color:#00F">Reply Message?</span></td>
			</tr>	
              <tr>
                <td align="left" width="15%"><span style="font-weight:bold">Send To:</span></td>
                <td align="left">
                  <input type="text" name="email" class="smalltxt" style="width:270px" title="sender's email" value="<?=$message['email']?>"/>
                  </td>
              </tr>
              <tr>
                <td align="left" width="10%"><span style="font-weight:bold">Subject:</span></td>
                <td align="left">
                  <input type="text" name="subject" id="subject" readonly="readonly" class="smalltxt" style="width:270px" title="enter subject" value="Re: <?=$message['contactsubject']?>"/>
			</td>
              </tr>
              <tr>                
                <td align="left" colspan="2">&nbsp;
                </td>
              </tr>
              <tr>                
                <td align="left" colspan="2">
                  
                  <textarea name="body" class="smallTxtArea" title="enter message body" style="width:350px;height:150px"></textarea>
				
                </td>
              </tr>
              <tr>                
                <td align="left" colspan="2">&nbsp;
                  
                </td>
              </tr>
              <tr>
                <td align="left" colspan="2">
                <input type="hidden" name="action" value="reply-contact-message" />
                <input type="submit" name="Post" id="submit" value="Send" class="mybutton" title="send message"/>&nbsp;&nbsp;
                <input type="button" name="cancelpost" id="submit" value="Cancel" class="mybutton" title="Click to Cancel" onclick="parent.location = 'contact-messages'"/>
                </td>
              </tr>
            </table>            
            </form>  

<? }else{?>
		<div class="portlet-msg-info">Sorry, no contact message was found with the specified id.</div>
 <? }?>
 <? }else{?>
 			<div class="portlet-msg-alert">You must specify a valid id</div>
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