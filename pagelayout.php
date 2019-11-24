<? function openSiteHeader($title,$web_data=""){?>
<!doctype html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <title><?=$title?></title>

    <!-- Essential styles -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css"> 
    <link rel="stylesheet" href="assets/fancybox/jquery.fancybox.css?v=2.1.5" media="screen"> 
     
    <!-- Boomerang styles -->
        <link id="wpStylesheet" type="text/css" href="css/global-style.css" rel="stylesheet" media="screen">
        

    <!-- Favicon -->
    <link href="<?=$web_data['School_Favicon']?>" rel="icon" type="image/png">

    <!-- Assets -->
    <link rel="stylesheet" href="assets/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="assets/owl-carousel/owl.theme.css">
    <link rel="stylesheet" href="assets/sky-forms/css/sky-forms.css">    
    <!--[if lt IE 9]>
        <link rel="stylesheet" href="assets/sky-forms/css/sky-forms-ie8.css">
    <![endif]-->

    <!-- Required JS -->
    <script src="js/jquery.js"></script>
    <script src="js/jquery-ui.min.js"></script>

    <!-- Page scripts -->
    <link rel="stylesheet" href="assets/layerslider/css/layerslider.css" type="text/css">
    
    <link rel="stylesheet" href="css/styles.css" type="text/css">
    <!--<link rel="stylesheet" href="css/responsive.css" type="text/css">
    <link rel="stylesheet" href="css/animate.css" type="text/css">-->

  <!-- Color CSS Styles  -->
  <link rel="stylesheet" type="text/css" href="css/global-style-blue.css" title="global-style-blue" media="screen" />
  <link rel="stylesheet" type="text/css" href="css/global-style-green.css" title="global-style-green" media="screen" />
  <link rel="stylesheet" type="text/css" href="css/global-style-red.css" title="global-style-red" media="screen" />
  <link rel="stylesheet" type="text/css" href="css/global-style-violet.css" title="global-style-violet" media="screen" />
  <link rel="stylesheet" type="text/css" href="css/global-style-yellow.css" title="global-style-yellow" media="screen" />
  
<script type="text/javascript">
	window.onload = function(e) {
	  setActiveStyleSheet("<?=$web_data['Website_Color']?>");
	}
</script>

<?	}?>
<?	function getHeaderScripts(){?>
<?	}?>
<?	function getHeaderScriptss(){?>
  <!-- Essentials -->
<script src="js/modernizr.custom.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="js/jquery.mousewheel-3.0.6.pack.js"></script>
<script src="js/jquery.easing.js"></script>
<script src="js/jquery.metadata.js"></script>
<script src="js/jquery.hoverup.js"></script>
<script src="js/jquery.hoverdir.js"></script>
<script src="js/jquery.stellar.js"></script>

<!-- Boomerang mobile nav - Optional  -->
<script src="assets/responsive-mobile-nav/js/jquery.dlmenu.js"></script>
<script src="assets/responsive-mobile-nav/js/jquery.dlmenu.autofill.js"></script>

<!-- Forms -->
<script src="assets/ui-kit/js/jquery.powerful-placeholder.min.js"></script> 
<script src="assets/ui-kit/js/cusel.min.js"></script>
<script src="assets/sky-forms/js/jquery.form.min.js"></script>
<script src="assets/sky-forms/js/jquery.validate.min.js"></script>
<script src="assets/sky-forms/js/jquery.maskedinput.min.js"></script>
<script src="assets/sky-forms/js/jquery.modal.js"></script>

<!-- Assets -->
<script src="assets/hover-dropdown/bootstrap-hover-dropdown.min.js"></script>
<script src="assets/page-scroller/jquery.ui.totop.min.js"></script>
<script src="assets/mixitup/jquery.mixitup.js"></script>
<script src="assets/mixitup/jquery.mixitup.init.js"></script>
<script src="assets/fancybox/jquery.fancybox.pack.js?v=2.1.5"></script>
<script src="assets/waypoints/waypoints.min.js"></script>
<script src="assets/milestone-counter/jquery.countTo.js"></script>
<script src="assets/easy-pie-chart/js/jquery.easypiechart.js"></script>
<script src="assets/social-buttons/js/rrssb.min.js"></script>
<script src="assets/nouislider/js/jquery.nouislider.min.js"></script>
<script src="assets/owl-carousel/owl.carousel.js"></script>
<script src="assets/bootstrap/js/tooltip.js"></script>
<script src="assets/bootstrap/js/popover.js"></script>

<!-- Sripts for individual pages, depending on what plug-ins are used -->
<script src="assets/layerslider/js/greensock.js" type="text/javascript"></script>
<script src="assets/layerslider/js/layerslider.transitions.js" type="text/javascript"></script>
<script src="assets/layerslider/js/layerslider.kreaturamedia.jquery.js" type="text/javascript"></script>
<!--<script type="text/javascript" src="js/script.js"></script>
 Initializing the slider -->
<script>
// Styles Switcher JS
function setActiveStyleSheet(title) {
  var i, a, main;
  for(i=0; (a = document.getElementsByTagName("link")[i]); i++) {
    if(a.getAttribute("rel").indexOf("style") != -1 && a.getAttribute("title")) {
      a.disabled = true;
      if(a.getAttribute("title") == title) a.disabled = false;
    }
  }
}

function getActiveStyleSheet() {
  var i, a;
  for(i=0; (a = document.getElementsByTagName("link")[i]); i++) {
    if(a.getAttribute("rel").indexOf("style") != -1 && a.getAttribute("title") && !a.disabled) return a.getAttribute("title");
  }
  return null;
}

function getPreferredStyleSheet() {
  var i, a;
  for(i=0; (a = document.getElementsByTagName("link")[i]); i++) {
    if(a.getAttribute("rel").indexOf("style") != -1
       && a.getAttribute("rel").indexOf("alt") == -1
       && a.getAttribute("title")
       ) return a.getAttribute("title");
  }
  return null;
}

</script>
<script>
    jQuery("#layerslider").layerSlider({
        pauseOnHover: true,
        autoPlayVideos: false,
        skinsPath: 'assets/layerslider/skins/',
        responsive: false,
        responsiveUnder: 1280,
        layersContainer: 1280,
        skin: 'borderlessdark3d',
        hoverPrevNext: true,
    });
	

	
	$(document).ready(function(){
	
	// Styles Switcher
	$(document).ready(function(){
		$('.open-switcher').click(function(){
			if($(this).hasClass('show-switcher')) {
				$('.switcher-box').css({'left': 0});
				$('.open-switcher').removeClass('show-switcher');
				$('.open-switcher').addClass('hide-switcher');
			}else if(jQuery(this).hasClass('hide-switcher')) {
				$('.switcher-box').css({'left': '-212px'});
				$('.open-switcher').removeClass('hide-switcher');
				$('.open-switcher').addClass('show-switcher');
			}
		});
	});
	
	//Top Bar Switcher
	$(".topbar-style").change(function(){
		if( $(this).val() == 1){
			$(".top-bar").removeClass("dark-bar"),
			$(".top-bar").removeClass("color-bar"),
			$(window).resize();
		} else if( $(this).val() == 2){
			$(".top-bar").removeClass("color-bar"),
			$(".top-bar").addClass("dark-bar"),
			$(window).resize();
		} else if( $(this).val() == 3){
			$(".top-bar").removeClass("dark-bar"),
			$(".top-bar").addClass("color-bar"),
			$(window).resize();
		}
	});
	
	//Layout Switcher
	$(".layout-style").change(function(){
		if( $(this).val() == 1){
			$("#container").removeClass("boxed-page"),
			$(window).resize();
		} else{
			$("#container").addClass("boxed-page"),
			$(window).resize();
		}
	});
	
	//Background Switcher
	$('.switcher-box .bg-list li a').click(function() {
		var current = $('.switcher-box select[id=layout-style]').find('option:selected').val();
		if(current == '2') {
			var bg = $(this).css("backgroundImage");
			$("body").css("backgroundImage",bg);
		} else {
			alert('Please select boxed layout');
		}
	});

});
</script>

<!-- Boomerang App JS -->
<script src="js/wp.app.js"></script>
<!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
<![endif]-->
  
<?	}?>
<? function getDeleteConfirmation($i,$message) { ?>
<script type = "text/javascript">
	function whichButton() {
		var buttonValue = "";
		for (i = 0; i < document.forms[<?=$i?>].elements.length; i++) {//scan all the form elements
			if(document.forms[<?=$i?>].elements[i].type == "checkbox"){// if form element is a checkbox
				if(document.forms[<?=$i?>].elements[i].checked){
					buttonValue = document.forms[<?=$i?>].elements[i].value;
				}
			}	
		}
		return buttonValue;
	}

	/*function deletepost(thisform){
		with (thisform){
			if(whichButton()){
				if(confirm('<?=$message?>')){return true;}
				else{return false;}
			}else{
				window.alert('Please make a selection to proceed');
				return false;
			}	
		}
	}*/
	function checkAll() {
		if(document.forms[<?=$i?>].deleteallpost.checked){//if user clicks on the check all button
			for (i = 0; i < document.forms[<?=$i?>].elements.length; i++) {//scan all the form elements
				if(document.forms[<?=$i?>].elements[i].type == "checkbox"){// if form element is a checkbox
					document.forms[<?=$i?>].elements[i].checked = "checked";// check it
				}	
			}
		}else{
			for (i = 0; i < document.forms[<?=$i?>].elements.length; i++) {
				if(document.forms[<?=$i?>].elements[i].type == "checkbox"){
					document.forms[<?=$i?>].elements[i].checked = null;//uncheck it
				}	
			}
		
		}
	}
	
	
/*	$("#checkAll").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
	});
*/
</script>
<script type="text/javascript">
$(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });
    
    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#select_all').prop('checked',true);
        }else{
            $('#select_all').prop('checked',false);
        }
    });
});
</script>
<? }?>
<? function getTinyMCEScript($theme="advanced"){?>
<!-- TinyMCE -->
<script type="text/javascript" src="tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "<?=$theme?>",
		skin : "o2k7",
		<? if($theme=="advanced"){?>
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
		<? }?>
	});
</script>
<!-- /TinyMCE -->
<? }?>
<? function getYearBookGalleryScript(){?>
    <link rel="stylesheet" href="yearbook-gallery/css/prettyPhoto.css" type="text/css" media="all">
    <script type="text/javascript" src="yearbook-gallery/js/jquery-1.5.2.js" ></script>
    <script type="text/javascript" src="yearbook-gallery/js/cufon-yui.js"></script>
    <script type="text/javascript" src="yearbook-gallery/js/cufon-replace.js"></script> 
    <script type="text/javascript" src="yearbook-gallery/js/Terminal_Dosis_300.font.js"></script>
    <script type="text/javascript" src="yearbook-gallery/js/atooltip.jquery.js"></script>
    <script src="yearbook-gallery/js/roundabout.js" type="text/javascript"></script>
    <script src="yearbook-gallery/js/roundabout_shapes.js" type="text/javascript"></script>
    <script src="yearbook-gallery/js/jquery.easing.1.2.js" type="text/javascript"></script>
    <script type="text/javascript" src="yearbook-gallery/js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="yearbook-gallery/js/hover-image.js"></script>
    <script type="text/javascript" src="yearbook-gallery/js/tabs.js"></script>
    <script type="text/javascript" src="yearbook-gallery/js/script.js"></script>
    
<? }?>
<? function getFaceBookSDKPlugin(){?>
<!--APPLYING FACEBOOK SDK FOR LIKE PLUGIN-->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<!--SDK FOR LIKE PLUGIN ENDS-->
<? }?>
<? function setFaceBookCommentAdmin(){//for now default admin to my facebook id?>
	<meta property="fb:admins" content="100000034511810"/>
<? }?>
<? function displayFaceBookComment(){?>
	<div class="fb-comments" data-href="<?php echo "http://" . $_SERVER['HTTP_HOST']  . $_SERVER['REQUEST_URI'];?>" data-num-posts="5" data-width="470"></div>
<? }?>
<? function displayFaceBookLike(){?>
<fb:like href="<?php echo "http://" . $_SERVER['HTTP_HOST']  . $_SERVER['REQUEST_URI'];?>" send="true" layout="button_count" width="450" 
show_faces="true" font="lucida grande"></fb:like>
<? }?>
<?	function closeSiteHeader($web_data){?>
</head>
<body <?=$web_data['Wesbite_BG']!=""?"style='background-image: url(".$web_data['Wesbite_BG'].");'":""?>>
	<!-- Container -->
	<div id="container" <?=$web_data['Website_Layout']=="2"?"class='boxed-page'":""?>>
    
        <!-- Start Header -->
        <div class="hidden-header"></div>
        <header class="clearfix">

<?	}?>
<? function getPaginationCss(){?>
	<link href="css/pagination.css" rel="stylesheet" type="text/css" />
	<link href="css/B_blue.css" rel="stylesheet" type="text/css" />
<? }?>
<?	function getSocialMediaLinks($web_data){
		$top_bar="";
		if($web_data['Top_Bar_Color']==2){
			$top_bar="top-header-dark";
		}elseif($web_data['Top_Bar_Color']==3){
			$top_bar=""; //color-bar
		}
	?>
          
              <!-- HEADER -->
        <div id="divHeaderWrapper">
            <header class="header-standard-2">     
    <!-- MAIN NAV top-header-dark-->
    <?
		@$top_bar_color=="";
    	if($web_data['Website_Color']=="global-style-blue") $top_bar_color = "#3498db";
		else if($web_data['Website_Color']=="global-style-green") $top_bar_color = "#8ec449";
		else if($web_data['Website_Color']=="global-style-red") $top_bar_color = "#e91b23";
		else if($web_data['Website_Color']=="global-style-violet") $top_bar_color = "#563d7c";
		else $top_bar_color = "#f1c40f";
	?>
    <div class="top-header <?=$top_bar?>" <?=$top_bar==""?'style="background-color:'.$top_bar_color.'"':""?>>
        
<div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <span class="aux-text hidden-xs">
                        <?=$web_data['School_Address']?>
                    </span>
                    <nav class="top-header-menu">
                        <ul class="top-menu">
                            <li><a href="#"><?=$web_data['School_Email']?></a></li>
                            <li data-animate-in="animated bounceIn" class="aux-languages animate-hover">
                                <a href="#"><?=$web_data['School_Phone']?></a>
                                <!--<ul class="sub-menu animate-wr" id="auxLanguages">
                                    <li><a href="#"><span class="language">German</span></a></li>
                                    <li><span class="language language-active">English</span></li>
                                    <li><a href="#"><span class="language">Greek</span></a></li>
                                    <li><a href="#"><span class="language">Spanish</span></a></li>
                                </ul>-->
                            </li>
            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
              
                       
<?	}?>
<?	function getMenulinks($base,$current,$web_data,$links){?>
<div class="navbar navbar-wp navbar-arrow mega-nav" role="navigation">
        <div class="container">
            <div class="navbar-header">
            <!-- Stat Toggle Nav Link For Mobiles -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
               <i class="fa fa-bars"></i>
           </button>
           <!-- End Toggle Nav Link For Mobiles -->
                <a class="navbar-brand" href="./">
                    <img alt="<?=$web_data['School_Name']?>" src="<?=$web_data['School_Logo']?>" style="margin-top: 15px;">
                </a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown <?=$base==1?'active':""?>">
                        <a href="./">Home</a>
                    </li>
                    <li class="dropdown <?=$base==2?'active':""?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">About</a>
                        <ul class="dropdown-menu">
                            <?	for($a=0;$a<count($links->about);$a++){?>
                             <li><a <?=array_key_exists($links->about[$a][2],$_GET)?"class='active'":""?> href="<?=$links->about[$a][1]."?".$links->about[$a][2]?>"><?=$links->about[$a][0]?></a></li>
                        <?	}?>
                        </ul>
                    </li>
                    <li class="<?=$base==3?'active':""?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Academics</a>
                        <ul class="dropdown-menu">
                        <?	for($a=0;$a<count($links->academics);$a++){?>
                             <li><a <?=array_key_exists($links->academics[$a][2],$_GET)?"class='active'":""?> href="<?=$links->academics[$a][1]."?".$links->academics[$a][2]?>"><?=$links->academics[$a][0]?></a></li>
                        <?	}?>
                      </ul>
                    </li>
                    <li class="<?=$base==4?'active':""?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admissions</a>
                        <ul class="dropdown-menu">
                        <?	for($a=0;$a<count($links->admission);$a++){?>
                             <li><a <?=array_key_exists($links->admission[$a][2],$_GET)?"class='active'":""?> href="<?=$links->admission[$a][1]."?".$links->admission[$a][2]?>"><?=$links->admission[$a][0]?></a></li>
                        <?	}?>
                      </ul>
                    </li>
                    <li <?=$base==5?"class='active'":""?>>
                        <a href="contact">Contact Us</a>
                    </li>
                    <li <?=$base==6?"class='active'":""?>>
                      <a href="gallery">Photo Album</a>
                    </li>
                    <li <?=$base==7?"class='active'":""?>>
                        <a href="careers">Careers</a>
                    </li>
                <li>
                        <a href="<?=$web_data['School_Portal']?>" target="_blank">School Portal</a>
                    </li>
                    <!--<li>
                        <a href="<?=$web_data['School_Website']?>/webmail" target="_blank">Web Mail</a>
                    </li>
-->                    
                    <?	if(count($links->more)>0){?>
                        <li>
                            <a <?=$base==7?"class='active'":""?> href="#"> More</a>
                        
                            <ul class="dropdown">
                        <?	for($a=0;$a<count($links->more);$a++){?>
                             <li><a <?=array_key_exists($links->more[$a][2],$_GET)?"class='active'":""?> href="<?=$links->more[$a][1]."?".$links->more[$a][2]?>"><?=$links->more[$a][0]?></a></li>
                        <?	}?>
                            </ul>
                        </li>
                    <?	}?>
                </ul>
               
            </div><!--/.nav-collapse -->
        </div>
    </div>
 </header>        
 </div>

<?	}?>
<?	function getCarousel(){?>
<section id="home">	
  <!-- Carousel -->
  <div id="main-slide" class="carousel slide" data-ride="carousel">

<?	$carousel = getCarouselPictures($status=1);?>

     <!-- Indicators -->
     <ol class="carousel-indicators">
     	<?	for($e=0;$e<$carousel->num;$e++){?>
            <li data-target="#main-slide" data-slide-to="<?=$e?>" <?=$e==0?"class='active'":""?>></li>
        <?	}?>
    </ol><!--/ Indicators end-->

    <!-- Carousel inner -->
<div class="carousel-inner">

	<!--#ITEM 1-->
    <?	
		$i=0;
		while($results = mysql_fetch_assoc($carousel->data)){
		?>
        <div class="item <?=$i==0?"active":""?>">
            <img class="img-responsive" src="<?=$results['picture_url']?>" alt="slider">
            <div class="slider-content">
              <div class="col-md-12 text-center">
                <!--<h2 class="animated2">
                  <span>Welcome to <strong>Margo</strong></span>
              </h2>-->
              <h3 class="ls-l title text-normal" style="width:600px; top:35%; left:80px;" data-ls="offsetxin:0;offsetyin:250;durationin:1000;delayin:500;offsetxout:0;offsetyout:-8;easingout:easeInOutQuart;scalexout:1.2;scaleyout:1.2;">
               <span><?=$results['caption']?></span>
            </h3>
            <!--<p class="animated4"><a href="#" class="slider btn btn-system btn-large">Check Now</a></p>-->
            </div>
        </div>
    </div><!--/ Carousel item end -->
	<?	
			$i++;
		}
	?>

</div><!-- Carousel inner end-->

<!-- Controls -->
<a class="left carousel-control" href="#main-slide" data-slide="prev">
   <span><i class="fa fa-angle-left"></i></span>
</a>
<a class="right carousel-control" href="#main-slide" data-slide="next">
   <span><i class="fa fa-angle-right"></i></span>
</a>
</div><!-- /carousel -->    	
</section>
<?	}?>
<?	function getPageBanner($title,$crumb,$web_data){?>
<!-- Start Page Banner -->
<div class="pg-opt">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2><?=$title?></h2>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb">
                        <?
							for($i=0;$i<sizeof($crumb);$i++){?>
							  <li <?=(sizeof($crumb)-$i>1?"":"class='current'")?>>
								<?	if(sizeof($crumb)-$i>1){?>
										<a href="<?=$crumb[$i][0]?>" title="<?=$crumb[$i][1]?>"><?=$crumb[$i][2]?></a>
								<?	}else{?>
										<?=$crumb[$i][2]?>
								<?	}?>
							  </li>   
						<? }?>  
                    </ol>
                </div>
            </div>
        </div>
    </div>
    
<!-- End Page Banner -->
<?	}?>
<?	function getSideBar($links){?>

<!--Sidebar-->
<div class="col-md-3 sidebar right-sidebar">
    
    <!-- Search Widget -->
    <!--<div class="widget widget-search">
        <form action="#">
            <input type="search" placeholder="Enter Keywords..." />
            <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>-->
	<div class="panel panel-default panel-sidebar-1">
        <div class="panel-heading"><h2>Quick Links</h2></div>
        <ul class="categories no-border">
        <?	for($a=0;$a<count($links->right);$a++){?>
	     <li><a href="<?=$links->right[$a][1]."?".$links->right[$a][2]?>" hidefocus="true" style="outline: none;"><?=$links->right[$a][0]?></a></li>
    	<?	}?>
        </ul>
    </div>

    <!-- Popular Posts widget -->
    <div class="widget widget-popular-posts">
        <h4>News / Announcements <span class="head-line"></span></h4>

	<?
		connectAppDB();
        $query = mysql_query("SELECT * FROM adminupdate 
		WHERE updatetype = 'news' AND updatemode = 'other' 
		ORDER BY id DESC LIMIT 1");
    	$results = $query;
	?>
        <ul>

      	<? 
			while($results = mysql_fetch_assoc($query)){
				$news_pic="images/default_news.jpg";
				if($results["upload"]!=""){
					$news_pic=$results["upload"];
				}
			?>
            <li>
				<?	if($results["upload"]!=""){?>
						<div class="widget-thumb">
							<a href="#"><img src="<?=$news_pic?>" alt="" /></a>
						</div>
				<?	}?>
                
                <div class="widget-content">
  		            <h5><b><?=$results['caption']?></b></h5>
                    <p style="font-size:16px !important"><?=$results['content']?></p>
                    <span>uploaded <?=christime($results['uploadedon'])?></span>
                </div>
                <div class="clearfix"></div>
            </li>

        <? }?>

        </ul>
    </div>
    
    <!-- Video Widget -->
    <!--<div class="widget">
        <h4>Video <span class="head-line"></span></h4>
        <div>
            <iframe src="http://player.vimeo.com/video/63322694?byline=0&amp;portrait=0&amp;badge=0" width="800" height="450" ></iframe>
        </div>
    </div>-->
    
    <!-- Tags Widget -->
    <!--<div class="widget widget-tags">
        <h4>Tags <span class="head-line"></span></h4>
        <div class="tagcloud">
            <a href="#">Portfolio</a>
            <a href="#">Theme</a>
            <a href="#">Mobile</a>
            <a href="#">Design</a>
            <a href="#">Wordpress</a>
            <a href="#">Jquery</a>
            <a href="#">CSS</a>
            <a href="#">Modern</a>
            <a href="#">Theme</a>
            <a href="#">Icons</a>
            <a href="#">Google</a>
        </div>
    </div>-->

</div>
<!--End sidebar-->
<?	}?>
<?	function getGoogleMapAPI($web_data){
		if(trim($web_data['Google_API'])!=""){
	?>
<iframe src="<?=$web_data['Google_API']?>" width="100%" height="290" frameborder="0" style="border:0"></iframe>
<?	
		}
	}
?>
<?	function getGoogleMapAPI2(){?>
		<!-- Start Map -->
		<div id="map" data-position-latitude="23.858092" data-position-longitude="90.262181"></div>
		<script>
			(function ( $ ) {
				$.fn.CustomMap = function( options ) {
					
					var posLatitude = $('#map').data('position-latitude'),
					posLongitude = $('#map').data('position-longitude');
					
					var settings = $.extend({
						home: { latitude: posLatitude, longitude: posLongitude },
						text: '<div class="map-popup"><h4>Web Development | ZoOm-Arts</h4><p>A web development blog for all your HTML5 and WordPress needs.</p></div>',
						icon_url: $('#map').data('marker-img'),	
						zoom: 15
					}, options );
					
					var coords = new google.maps.LatLng(settings.home.latitude, settings.home.longitude);
					
					return this.each(function() {	
						var element = $(this);
						
						var options = {
							zoom: settings.zoom,
							center: coords,
							mapTypeId: google.maps.MapTypeId.ROADMAP,
							mapTypeControl: false,
							scaleControl: false,
							streetViewControl: false,
							panControl: true,
							disableDefaultUI: true,
							zoomControlOptions: {
								style: google.maps.ZoomControlStyle.DEFAULT
							},
							overviewMapControl: true,	
						};
						
						var map = new google.maps.Map(element[0], options);
						
						var icon = { 
							url: settings.icon_url, 
							origin: new google.maps.Point(0, 0)
						};
						
						var marker = new google.maps.Marker({
							position: coords,
							map: map,
							icon: icon,
							draggable: false
						});
						
						var info = new google.maps.InfoWindow({
							content: settings.text
						});
						
						google.maps.event.addListener(marker, 'click', function() { 
							info.open(map, marker);
						});
						
						var styles = [{"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","stylers":[{"saturation":-100},{"lightness":51},{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"road.arterial","stylers":[{"saturation":-100},{"lightness":30},{"visibility":"on"}]},{"featureType":"road.local","stylers":[{"saturation":-100},{"lightness":40},{"visibility":"on"}]},{"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"administrative.province","stylers":[{"visibility":"on"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":-25},{"saturation":-100}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]}];
						
						map.setOptions({styles: styles});
					});

};
}( jQuery ));

jQuery(document).ready(function() {
	jQuery('#map').CustomMap();
});
</script>
<!-- End Map -->
<?	}?>
<? function callErrorMessage(){?>
	<? if(isset($_SESSION['error']) && !empty($_SESSION['error']) && is_array($_SESSION['error'])){
		//echo "isset";
			if(isset($_SESSION['divborder'])){//on success of query
				$class = "portlet-msg-success";				
			}elseif(isset($_SESSION['alertstyle'])){// warning caution style
				$class = "portlet-msg-alert";				
			}elseif(isset($_SESSION['infostyle'])){// warning caution style
				$class = "portlet-msg-info";				
			}else{// regular error
				$class = "portlet-msg-error";				
			}
		?>
    <br />
	        <div class="<?=$class?>">
				<?php foreach ($_SESSION['error'] as $errors)  { ?>
                        <?php echo ($errors) ?>
                        <?php echo "<br>";?>
                <?php } ?>
            
	            <? 
					unset($_SESSION['error']);
					if(isset($_SESSION['divborder'])){unset($_SESSION['divborder']);}
					if(isset($_SESSION['alertstyle'])){unset($_SESSION['alertstyle']);}
					if(isset($_SESSION['infostyle'])){unset($_SESSION['infostyle']);}
				?>
   		    </div>
    <br />
    <? }?>
<? }?>
<?php function getTestimonials(){?>
<section class="slice light-gray bb">
        <div class="wp-section">
            <div class="container">
                <div class="section-title-wr">
                    <h3 class="section-title left"><span>Testimonies</span></h3>
                </div>
                <?
					connectAppDB();
					$query2 = mysql_query("SELECT * FROM 
					testimonies WHERE status = 'ACTIVE' 
					ORDER BY sn DESC LIMIT 7");
					$results2 = $query;
				?>
                <div class="no-margin owl-carousel owl-carousel-4" data-owl-pagination="smth">
                <? 
				while($results2 = mysql_fetch_assoc($query2)){
				?>
                    <div class="item">
                        <div class="wp-block product">
                            <figure>
                                <img alt="" src="<?=$results2['picture_url']?>" class="img-responsive img-center">
                                
                            </figure>
                            <h2 class="product-title"><a href=""><?=$results2['name']?></a></h2>
                            <p>
                            <?=$results2['testimony']?>
                            </p>
                            
                        </div>
                    </div>
                <? } ?>
                </div>
            </div>
        </div>
    </section>
<?php }?>
<?	function getSiteFooter($web_data,$show_contact=1,$show_scripts=1){?>
<!-- FOOTER -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="col">
                       <h4>Contact us</h4>
                       <ul>
                            <li> <?=$web_data['School_Address']?></li>
                            <li>Phone: <?=$web_data['School_Phone']?> </li>
                            <li>Email: <?=$web_data['School_Email']?></li>
                            <li>Website: <a href="./" title=""><?=$web_data['School_Website']?></a></li>
                            <!--<li><?//=$web_data['School_Motto']?></li>-->
                        </ul>
                     </div>
                </div>
                
                <div class="col-md-3">
                    <div class="col">
                        <h4>Mailing list</h4>
                        <?	
							@$flag=$_GET['flag'];
							if($flag=="1"){
								@$errmsg="<span style='color:#FFC'>Please enter your email</span>";
							}elseif($flag=="2"){
								@$errmsg="<span style='color:#FFC'>This email is already registered</span>";
							}elseif($flag=="3"){
								@$errmsg="<span style='color:#F4FDEF'>Thank you for subscribing</span>";
							}elseif($flag=="4"){
								@$errmsg="<span style='color:#FDD'>Sorry an error. Please try later</span>";
							}
						echo @$errmsg;
						?>
                        <p>Sign up if you would like to receive emails from us.</p>
                        <?	$URL = "http://" . $_SERVER['HTTP_HOST']  . $_SERVER['REQUEST_URI'];//save current page url
?>
                        <form class="form-horizontal form-light" action="controller" method="post">
                            <div class="input-group">
                                <input type="text" class="form-control" name="useremail" placeholder="Your email address...">
                                <span class="input-group-btn">
                                   <!-- <button class="btn btn-base" type="submit">Go!</button>-->
                                   <input class="btn btn-base" type="submit" value="Send">
                                </span>
                                <input type="hidden" name="action" value="newsletter" required>
                                <input type="hidden" name="landingurl" value="<?=$URL?>">
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="col col-social-icons">
                        <h4>Follow us</h4>
                        <?
							$solmedia = $web_data['Social_Media'];
							$cntsocial=count($solmedia);
							if($cntsocial>0){
								for($s=0;$s<$cntsocial;$s++){
									
									$aclass=$solmedia[$s][0];
									$title=ucwords(strtolower($solmedia[$s][0]));
									$iclass=$solmedia[$s][0];
									if($aclass=="google"){//google
										$aclass="google";
										$title="Google Plus";
										$iclass="google-plus";
									}
									if($aclass=="linkedin"){//linkedin
										$aclass="linkdin";
										$title="Linkedin";
										$iclass="linkedin";
									}
									if($aclass=="instagram"){//instagram
										$aclass="instgram";
										$title="Instagram";
										$iclass="instagram";
									}
									if($aclass=="vimeo"){//vimeo
										$aclass="vimeo";
										$title="vimeo";
										$iclass="vimeo-square";
									}
						?>
										  
											<a class="<?=$aclass?> itl-tooltip" title="<?=$title?>" href="<?=$solmedia[$s][1]?>" target="_blank"><i class="fa fa-<?=$iclass?>"></i></a>
										
						<?	
								}
							}
						?>
                    </div>
                </div>

                 <div class="col-md-3">
                    <div class="col">
                        <h4>Visiting Hours</h4>
                        <p class="no-margin">
                        <?=$web_data['School_Visit']?>
                        <!--<br><br>
                        <a href="#" class="btn btn-block btn-base btn-icon fa-check"><span>Try it now</span></a>-->
                        </p>
                    </div>
                </div>
            </div>
                           
            <hr>
            
            <div class="row">
                <div class="col-lg-9 copyright">
                    &copy; <?=date("Y")?>  -  All Rights Reserved <a href="./"><?=$web_data['School_Name']?>
                </div>
                <div class="col-lg-3">
                  Powered By <a href="http://priscordigital.com/" target="_blank">Priscor Digital</a>&nbsp;|&nbsp;<a href="login">Admin</a> 
                </div>
            </div>
        </div>
    </footer>
</div>


<!-- Go To Top Link -->
<a href="#" class="back-to-top"></a>

<!--<div id="loader">
   <div class="spinner">
      <div class="dot1"></div>
      <div class="dot2"></div>
  </div>
</div>-->

<?	if($show_contact==1){?>
    <!-- Style Switcher -->
    <div class="switcher-box">
    
        <form class="subscribe contact-form" action="controller" method="post" id="contact-form">
               <a style="cursor:pointer" class="open-switcher show-switcher"><i class="fa fa-phone fa-2x"></i></a>
               <h4>Contact Us Via SMS</h4>
            
            
             <span><b>Enter Your Names:</b></span>
             <input type="text" class="email" placeholder="enter your names" name="usernames" required>
             
             <span><b>Your Phone Number:</b></span>
             <input type="text" class="email" placeholder="your phone number" name="phone" required>
             
             <span><b>Your Message:</b></span>
             <textarea  placeholder="Message" name="message" required="required" class="email"></textarea>
             <input type="submit" name="Post" id="submit" value="Send SMS" class="mybutton" title="send sms"/>
             
             <input type="hidden" name="action" value="send-sms">
        </form>
    
        <br>
        <b>OR</b>
        <br>
        <b>CALL <?=strip_tags($web_data['School_Phone'])?></b>
        
    </div>
<?	}?>
</body>
<?
if($show_scripts==1){
	getHeaderScriptss();
}
?>
</html>
<?	}?>