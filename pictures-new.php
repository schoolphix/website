<?php
require_once("functions.php");
mustLogin();
$web_data = getWebsiteData();
$links = getAllLinks();
require_once("pagelayout.php");

$title="New Album Picture";

openSiteHeader($title,$web_data);
getHeaderScriptss($web_data);
closeSiteHeader($web_data);
getSocialMediaLinks($web_data);
getMenulinks(0,0,$web_data,$links);


$crumb[0][0] = 'cpanel-home';
$crumb[0][1] = 'cpanel';
$crumb[0][2] = 'cPanel';
$crumb[1][0] = 'folder-list';
$crumb[1][1] = 'album list';
$crumb[1][2] = 'Album List';
$crumb[2][0] = '';
$crumb[2][1] = 'new album picture';
$crumb[2][2] = 'New Album Picture';

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
                <h4 class="classic-title"><span>New Album Picture</span></h4>
                
				<!-- Start Contact Form -->



<form name ="forumnewpost" id="forumnewpost" method="POST" action="controller" enctype="multipart/form-data">
<table width="100%" border="0" class="mytable" align="center" style="border-top:none" id="table_item">
  <tr>
    <td align="left" width="25%"><span style="font-weight:bold">Select Upload Type:</span></td>
    <td align="left">
<select name="albumid" class="email" title="select an album">
    <option value="">Select Photo Album</option>
	  <?
      $getCategory = getAllPictureFolders();
      if(mysql_num_rows($getCategory)>0) {
          while(@$row = mysql_fetch_array($getCategory)){
          ?>
          <option value="<?=$row["id"]?>" <?=$row['id']==@$_GET['aid']?"selected":""?>><?=$row['caption']?></option>
      <? 
          }
      }
      ?>
</select>
          </td>
          <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="left"></td>
    <td align="left">
<input type="file" name="photo[]" title="show upload dialog" class="email" />
<input type='hidden' name='counter[]' value='1' />
	</td>
    <td>&nbsp;</td>
  </tr>
  <tr>                
    <td align="left" colspan="3">&nbsp;
    </td>
  </tr>
</table>

<table width="100%" border="0" class="mytable" align="center" style="border-top:none">  

  <tr>
  	<td>&nbsp;</td>
    <td align="left">
    	<a class="btn-add-new" style="text-decoration:none;cursor:pointer;font-size:14px;line-height:14px;font-weight:bold" title="register new records"> + Add More Pictures <i>[Please upload in sets of fours to avoid exceeding max value]</i></a>
    </td>
  </tr>
  <tr>
  	<td width="25%">&nbsp;</td>
    <td align="left">
    <input type="hidden" name="action" value="upload-picture" />
    <input type="submit" name="Post" id="submit" value="Upload" class="mybutton" title="send message"/>&nbsp;&nbsp;
    <input type="button" name="cancelpost" id="submit" value="Cancel" class="mybutton" title="Click to Cancel" onclick="parent.location = 'folder-list'"/>&nbsp;&nbsp;&nbsp;&nbsp;
    <span style="color:#00f;font-weight:bold">Jpeg, Gif or Png (4MB Max)</span>    

    </td>
  </tr>
</table>            
</form>  


				<!-- End Contact Form -->
                 
                
                <!-- Divider -->
                <div class="hr5" style="margin-top:30px; margin-bottom:45px;"></div>






<script type="text/javascript">
$(document).ready(function() {
	$(".btn-add-new").click(function(){
						
		var exp = new Date();
		var unique = exp.getTime() ;

		html = "<tr id='trrow"+unique+"'><td align='center'>&nbsp;</td><td align='left'><input type='file' name='photo[]' class='email' /><input type='hidden' name='counter[]' value='1' /></td><td align='center'><a style='float:right;cursor:pointer' id='delete"+unique+"' title='delete this record' class='noprint'><img src='images/fail.png'></a></td></tr>";

		$("#table_item").append(html);

		$("#delete"+unique).click(function(){
			$('#trrow'+unique).remove();
		});

	});//end of onclick function
	
});	//end of document ready function

</script>



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