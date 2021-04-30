<?php
/**
 * Charts 4 PHP
 *
 * @author Shani <support@chartphp.com> - http://www.chartphp.com
 * @version 2.0
 * @license: see license.txt included in package
 */
 
// only for free build
define("VERSION","free");

if (!empty($_GET["file"]))
{
	$f = $_GET["file"];
	
	$f = str_replace(".php","",$f);
	
	// remote file inclusion attempt fix
	if (strpos($f,".")!==false)
		die("+1 for you");
		
	$f = "demos/$f.php";

	if (!file_exists($f))
		die("+1 for you");

	$code = file_get_contents($f);
	
	highlight_string($code);
	echo "<br>&nbsp;";
	die;
}	

/* gets the data from a URL */
function get_data($url) {
	$data = "";
	if (function_exists("curl_init"))
	{
		$ch = curl_init();
		$timeout = 5;
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$data = curl_exec($ch);
		curl_close($ch);
	}
	return $data;
}

// check local version with current online

$current_ver = "";
$online_ver = "";
$ver_status = "";

$file = 'demos/basic/line.php';
$contents = file_get_contents($file);
$match = array();
preg_match('/(version)([^*]+)/', $contents, $match);
$current_ver = $match[0];

$fileonline = 'http://www.chartphp.com/demo/demos/basic/line.phps';
$contentsonline = get_data($fileonline);
$match = array();
preg_match('/(version)([^*]+)/', $contentsonline, $match);
if(!empty($match))
	$online_ver = $match[0];

$current_ver = str_replace("&nbsp;"," ",$current_ver);
$current_ver = str_replace("<br />","",$current_ver);
$current_ver = str_replace("version","",$current_ver);
$current_ver = trim($current_ver);

$online_ver = str_replace("&nbsp;"," ",$online_ver);
$online_ver = str_replace("<br />","",$online_ver);
$online_ver = str_replace("version","",$online_ver);
$online_ver = trim($online_ver);

$current_int = str_pad(str_replace(".","",$current_ver),3,"0");
$online_int = str_pad(str_replace(".","",$online_ver),3,"0");

if(!empty($online_ver) && intval($current_int)<intval($online_int))
	$ver_status = "New Version $online_ver Available!";

//RSS Updates
require_once('bootstrap/rss/rss_fetch.inc');
$rssurl = 'http://www.chartphp.com/feed/';
$rss = fetch_rss( $rssurl );
$num_items = 5;
$items = array_slice($rss->items, 0, $num_items);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Charts 4 PHP Demos | Free Charts 4 PHP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="icon" type="image/png" href="http://www.chartphp.com/wp-content/uploads/favicon.png">
    <!-- Le styles -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
	body {
		padding-top: 60px;
		padding-bottom: 0px;
	}
	.sidebar-nav {
		padding: 9px 0;
	}
	.nav
	{
		margin-bottom:10px;
	}
	.accordion-inner a {
		font-size: 13px;
		font-family:tahoma;
	}
	code
	{
		background: #FFF;
		border:0;
	}
    </style>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  </head>

  <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Charts 4 PHP Demos</a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
			<?php if ( !empty( $ver_status )) { ?>
				<a href="http://www.chartphp.com/version-update/" target="_blank" style="color:red; margin-right:10px; padding:0 5px; background-color:white; border:2px; font-size:large;"><b><?php echo $ver_status ?></b></a>
			<?php } ?>
			<?php if (defined("VERSION") && VERSION == "free") { ?>
				<a style="color:orange;font-weight:bold" target="_blank" href="http://www.chartphp.com/pricing/">Free Version</a> - 
			<?php } ?>			
              <a href="http://www.chartphp.com" class="navbar-link">www.chartphp.com</a>
			  <img src="http://www.chartphp.com/opentrack.png" style="width:1px; height:1px; display:none;">
            </p>
            <ul class="nav">
				<li><a href="http://www.chartphp.com">Home</a></li>
				<li class="active"><a href="#">Demos</a></li>
				<li><a target="_blank" href="http://www.chartphp.com/blog/">Updates</a></li>
				<li><a target="_blank" href="http://www.chartphp.com/docs/">Docs</a></li>
				<?php if (defined("VERSION") && VERSION == "free") { ?>
					<li><a style="color:orange;font-weight:bold" target="_blank" href="http://www.chartphp.com/pricing/">Pricing</a></li>
				<?php } ?>
				<li><a target="_blank" href="http://www.chartphp.com/contact/">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

	<?php 
	function dirToArray($dir) 
	{
		$result = array();
		$cdir = scandir($dir);
		foreach ($cdir as $key => $value)
		{
		  if (!in_array($value,array(".","..","temp")) && strpos($value,"_") === false && strpos($value,".bak") === false)
		  {
			 if (is_dir($dir . DIRECTORY_SEPARATOR . $value))
			 {
				$result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value);
			 }
			 else
			 {
				$result[] = $value;
			 }
		  }
		}

		return $result;
	}
	$samples = dirToArray("demos");
	
	$newsort = array("basic","advanced","database","integration","faqs","dev");
	$orderedArray = array();
	foreach ($newsort as $key) {
		if (isset($samples[$key]))
			$orderedArray[$key] = $samples[$key];
	}

	$samples = $orderedArray;
	
	if (!isset($_GET["filter"]))
		$_GET["filter"] = "all";
	
	?>
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span2">

			<div class="accordion" id="accordion_menu">
				<?php 
				foreach($samples as $k=>$v) 
				{
					if (is_numeric($k)) continue;
					$folder = ucwords($k);
					
					$show = 0;
					foreach($v as $f) 
					{
						if (!(filesize("demos/$k/$f") < 10))
							$show = 1;
					}

					if ($show == 0 && $_GET["filter"] == "free")
						continue;
					
					?>
					<div class="accordion-group">
					<div class="accordion-heading">
					<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion_menu" href="#collapse<?php echo $k?>">
					  <strong><?php echo $folder;?></strong>
					</a>
					</div>	
					<div id="collapse<?php echo $k?>" class="accordion-body collapse">
						<div class="accordion-inner">
							<?php
							foreach($v as $f) 
							{
								$fname = str_replace(".php","",$f);
								$fname = str_replace("-"," ",$fname);
								
								if (is_array($fname))
									continue;
									
								$fname = ucwords($fname);

								$ver = "";
								$star = "";
								if (filesize("demos/$k/$f") < 10)
								{
									if ($_GET["filter"] == "free")
									continue;
									
									$url = "http://www.chartphp.com/demo/demos/$k/$f";
									$star = " <font color='red'>*</font>";
									$ver .= "jQuery('#div_version').html('Available in licensed version. Currently loaded from www.chartphp.com');";
									$ver .= "jQuery('#span_version').show();";										
								}
								else
								{
									$url = "demos/$k/$f";
									$ver .= "jQuery('#span_version').hide();";
								}
									
								// echo "<a href='demos/$k/$f' onclick=\"jQuery('#code').load('index.php?file=/$k/$f'); $('#grid-demo-tabs a:first').tab('show');\" target='demo_frame'> $fname Chart </a><br/>";
								echo "<a href='$url' onclick=\"$ver;jQuery('#code').load('index.php?file=/$k/$f'); $('#grid-demo-tabs a:first').tab('show');\" target='demo_frame'>$fname Chart</a>$star<br/>";
							}
							?>
						</div>
					</div>	
					</div>
					<?php
				}
				?>
				
				<?php if (!defined("VERSION")) { ?>				
				<div class="accordion-group">
					<div class="accordion-heading">						
					<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion_menu" href="#collapsedash">
					  <strong>Dashboards</strong>
					</a>
					</div>	
					<div id="collapsedash" class="accordion-body collapse">
						<div class="accordion-inner">
							<a target="_blank" href='apps/dashboard-1/'>Admin LTE</a><br>
							<a target="_blank" href='apps/dashboard-2/'>ELA Admin</a><br>
							<a target="_blank" href='apps/dashboard-3/'>Admin BSB</a>
						</div>
					</div>								
				</div>				
				<?php } ?>
				
				<?php if ( !empty( $items )) { ?>
				<div class="accordion-group">
					<div class="accordion-heading">						
					<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion_menu" href="#collapseupdates">
					  <strong class="text-error">Recent Updates</strong>
					</a>
					</div>	
					<div id="collapseupdates" class="accordion-body collapse">
						<div class="accordion-inner">
							<?php
							foreach ( $items as $item ) {
								$href = $item['link'];
								$title = $item['title'];
								$date = date("M j, Y", strtotime($item['pubdate'])) ;
								echo "&bull; <a href='$href'>$title ($date)</a><br>";
							}
							?>						
						</div>
					</div>								
				</div>
				<?php } ?>
			</div>	  
			
			<?php if (defined("VERSION") && VERSION == "free") { ?>

			<select name="filter" style="width:177px" onchange="location.href='?filter='+this.value;">
				<option value="free" <?php echo ($_GET["filter"] == "free")?"selected":"";?>>Filter: Free Features</option>
				<option value="all" <?php echo ($_GET["filter"] == "all")?"selected":"";?>>Filter: All Features</option>
			</select>
				
			
			<div class="alert alert-info" align="center" style="padding-bottom:20px">
		  	<span style="font-family:tahoma;color:red;font-size:13px"></span> Advanced features are available in Licensed Version. <br>For Commercial Use:<br /><br />
			<strong>
		  		<a style="padding:10px" class="btn-primary" target="_blank" href="http://www.chartphp.com/pricing/">Get License Today!</a>
		  	</strong>
	        </div>
			
			<?php } ?>
			
        </div><!--/span-->
		
               <div class="span10">
          <div class="row-fluid">
            <div class="span12">
			
				<ul class="nav nav-tabs" id="grid-demo-tabs">
					<li class="active"><a href="#demo" data-toggle="tab">Demo</a></li>
					<li><a href="#code" data-toggle="tab">Code</a></li>
				</ul>
				
				<div class="tab-content" id="grid-demo-tabs-content">
				  
					<div id="demo" class="tab-pane fade in active">
						
						<span id="span_version" style="display:none">
						<a id="div_version" style="margin:auto; width:50%; font-family: tahoma; padding:5px; background-color: #117AC0; letter-spacing:1px; color: white; text-decoration:underline; display:block; text-align:center;" target="_blank" href="http://www.phpgrid.org/download/"></a>
						<br>
						<br>
						</span>						
						
						<iframe seamless="seamless" scrolling="no" name="demo_frame" id="demo_frame" frameborder="0" width="100%" height="500" src="about:blank"></iframe>
					</div>
				  
					<div id="code" class="tab-pane fade">
					</div>
				  
				</div>

            </div><!--/span-->
          </div><!--/row-->
        </div><!--/span-->
		
		<div class="row-fluid">
			<div class="span12" style="margin-top:20px">
			  <div class="row-fluid">
				<div class="alert alert-info">
					<a name="contact"></a>
				  <h2>Technical Support</h2>
				  <p class="text-info">For technical support query, ask at our <a href="http://www.chartphp.com/contact/">Support Center</a> </p>
				  <p>&copy; <a href="http://www.chartphp.com">www.chartphp.com</a> <?php echo date("Y");?></p>
				</div><!--/span-->
			  </div><!--/row-->
			</div><!--/span-->
		  </div><!--/row-->
		  
      </div><!--/row-->

		<!-- Le javascript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="bootstrap/js/jquery.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<script>
			
			$('#grid-demo-tabs a').click(function (e) {
			e.preventDefault();
			$(this).tab('show');
			})
			
			var demo = location.href.split("#")[1];
			if (!demo)
			{
				demo = 'basic/line.php';
			}

			jQuery('#demo_frame').attr('src','demos/'+demo);
			jQuery('#demo_frame').load(function() { iframeLoaded(this); } );
			jQuery('#demo_frame').css('height', jQuery(window).height() - 186);
			// jQuery('#demo_frame').css('overflow', 'hidden');
			
			jQuery('#code').load('index.php?file='+demo);
			jQuery('#code').css('height', jQuery(window).height() - 186);
			
			function iframeLoaded(iFrameID,stop) 
			{
				if(iFrameID) 
				{
					// if(iFrameID.contentDocument){
						// if (iFrameID.contentDocument.body)
							// if (iFrameID.height != iFrameID.contentDocument.body.scrollHeight)
								// iFrameID.height = iFrameID.contentDocument.body.scrollHeight + 35;
					// } 
					// else 
					{
						// iFrameID.height = iFrameID.contentWindow.document.body.scrollHeight + 45 + "px";
					}
				}
				
				// setTimeout(function(){iframeLoaded(iFrameID,1);},1000);
				
				// if (!stop) update_themes();
			}
			
			var accordion_list = $(".accordion-body");
			accordion_list.first().addClass("in");
		</script>

		<script>
		// js cookie
		!function(e){var n=!1;if("function"==typeof define&&define.amd&&(define(e),n=!0),"object"==typeof exports&&(module.exports=e(),n=!0),!n){var o=window.Cookies,t=window.Cookies=e();t.noConflict=function(){return window.Cookies=o,t}}}(function(){function g(){for(var e=0,n={};e<arguments.length;e++){var o=arguments[e];for(var t in o)n[t]=o[t]}return n}return function e(l){function C(e,n,o){var t;if("undefined"!=typeof document){if(1<arguments.length){if("number"==typeof(o=g({path:"/"},C.defaults,o)).expires){var r=new Date;r.setMilliseconds(r.getMilliseconds()+864e5*o.expires),o.expires=r}o.expires=o.expires?o.expires.toUTCString():"";try{t=JSON.stringify(n),/^[\{\[]/.test(t)&&(n=t)}catch(e){}n=l.write?l.write(n,e):encodeURIComponent(String(n)).replace(/%(23|24|26|2B|3A|3C|3E|3D|2F|3F|40|5B|5D|5E|60|7B|7D|7C)/g,decodeURIComponent),e=(e=(e=encodeURIComponent(String(e))).replace(/%(23|24|26|2B|5E|60|7C)/g,decodeURIComponent)).replace(/[\(\)]/g,escape);var i="";for(var c in o)o[c]&&(i+="; "+c,!0!==o[c]&&(i+="="+o[c]));return document.cookie=e+"="+n+i}e||(t={});for(var a=document.cookie?document.cookie.split("; "):[],s=/(%[0-9A-Z]{2})+/g,f=0;f<a.length;f++){var p=a[f].split("="),d=p.slice(1).join("=");this.json||'"'!==d.charAt(0)||(d=d.slice(1,-1));try{var u=p[0].replace(s,decodeURIComponent);if(d=l.read?l.read(d,u):l(d,u)||d.replace(s,decodeURIComponent),this.json)try{d=JSON.parse(d)}catch(e){}if(e===u){t=d;break}e||(t[u]=d)}catch(e){}}return t}}return(C.set=C).get=function(e){return C.call(C,e)},C.getJSON=function(){return C.apply({json:!0},[].slice.call(arguments))},C.defaults={},C.remove=function(e,n){C(e,"",g(n,{expires:-1}))},C.withConverter=e,C}(function(){})});
		var o = Cookies.get('cp_firstopen');
		if (o != 1)
		{
			Cookies.set('cp_firstopen', '1', { expires: 5000 });
			$(document.body).append('<img src="http://www.chartphp.com/firstopen.png" style="width:1px; height:1px; display:none;">')
		}
		</script>


	</div><!--/.fluid-container-->

	</body>
</html>