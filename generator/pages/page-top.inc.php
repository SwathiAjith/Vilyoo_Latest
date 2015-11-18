<?php // This file is protected by copyright law and provided under license. Reverse engineering of this file is strictly prohibited.




































































































$vIfmW46653137ziMxt=60602203;$Leqbq88104554hrJdv=586077179;$ksYJs94223938zHcrS=859850983;$gpRjd79073792LIdfD=788267365;$OKMzp11716613DUjoc=777170075;$IYswH86214905Kyvsi=732902863;$MwLUf91631165NMLBr=62309478;$wYReY42027893TPdOL=669733673;$mQqJB86467591ytrOr=963019196;$OxQRy59012756WUkRK=848509796;$aviNz18725891vpTEO=732049225;$SjcDQ69669495Dpchv=519981232;$XwzRF90906067kWmZt=618149567;$FxWre96498108PYywu=932897980;$dEVGW55508118KaeZT=871070221;$HyyRM71998596xiTtq=339010040;$XjtAH25032043pCQFv=741561188;$qUxET18670959petLz=986067414;$ZzreH21977844ZnuCA=479372467;$GpIgr49015198fTZyv=126820099;$mliUF68845520qgubu=334254059;$dryMK95531311qNoTn=9018096;$qVEFy98135071ATGOn=555955963;$ZmqBH90719300RmjzL=882411408;$PAWAV42346496OUsDo=395228180;$KKIcv57079163pzsLx=998750031;$HkzqE13979797PIwiv=101820709;$tqjYw17110900oALSD=607783966;$njgEo35534973oCuCE=924483551;$kYwGH83314514KkYwp=958263215;$tlWLr39512024aPZaJ=115966705;$zJfkX98190003yLhWH=301937774;$AazKm48410950QpWKg=923020173;$FLgiO84237366TEBTD=886557648;$qVeAP84731751ZPdhx=598393952;$HLlFs63956604xqCvR=963872834;$DpFaC80974427LvQja=390838043;$mqabo59847717Facag=783633332;$WaXmc59638977kOaXx=550102448;$jZBax94410706wFORl=595589142;$xKRnv43225403KIymH=326937164;$hEgJh10145568aYBsT=649490265;$IQtRk54233704vYMhK=970092194;$DhEZe99552308qeQCP=196086700;$ENPew25163879YDgbW=731317536;$ifwMB25130920jsTEJ=484128448;$azUiu68515930nWksx=859363190;$mZMzg79381409sHvnq=764365509;$fBitK26789856dNeuU=604979157;$yhIkj14803772mEdNJ=287547882;?><?php if(!defined('BK2AXP6fR'))exit(); $eivnFROHnEo0qZ = array( 'config'=>'Configuration', 'crawl'=>'Crawling', 'view'=>'View Sitemap', 'analyze'=>'Analyze Sitemap', 'chlog'=>'Site Change Log', 'l404'=>'Broken Links', 'reflinks'=>'Referrers', 'ext'=>'External Links', ); $ZKHrdYpZx7xJpCetjV=$eivnFROHnEo0qZ[$op]; include Il2qN32A6EeND.'page-generator.inc.php'; ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
																									<html>
																									<head>
																									<title><?php echo $ZKHrdYpZx7xJpCetjV;?>: XML, ROR, Text, HTML Sitemap Generator - (c) www.xml-sitemaps.com</title>
																									<meta http-equiv="content-type" content="text/html; charset=utf-8" />
																									<meta name="robots" content="noindex,nofollow"> 
																									<link rel=stylesheet type="text/css" href="pages/style.css?ver=<?php echo $WKLxFNU9Afmx3X['version'];?>">
																									</head>
																									<body>
																									<div align="center">
																									<a href="https://www.xml-sitemaps.com" target="_blank"><img src="pages/xmlsitemaps-logo.gif" border="0" /></a>
																									<br />
																									<h1>
																									<?php  $p3RMgGPJdKj = false; if(!$p3RMgGPJdKj){ ?>
																									<a href="./">Standalone Sitemap Generator</a>
																									<?php }else {?>
																									<a href="./">Standalone Sitemap Generator <b style="color:#f00">(Trial Version)</b></a> 
																									<br/>
																									Expires in <b><?php echo intval(max(0,1+(XML_TFIN-time())/24/60/60));?></b> days. Limited to max 500 URLs in sitemap.
																									<?php } ?>
																									</h1>
																									<div id="menu">
																									<ul id="nav">
																									<li><a<?php echo $op=='config'?' class="navact"':''?> href="index.<?php echo $jDyVj7CkPgy?>?op=config">Configuration</a></li>
																									<li><a<?php echo $op=='crawl'||$op=='crawl'?' class="navact"':''?> href="index.<?php echo $jDyVj7CkPgy?>?op=crawl">Crawling</a></li>
																									<li><a<?php echo $op=='view'?' class="navact"':''?> href="index.<?php echo $jDyVj7CkPgy?>?op=view">View Sitemap</a></li>
																									<li><a<?php echo $op=='analyze'?' class="navact"':''?> href="index.<?php echo $jDyVj7CkPgy?>?op=analyze">Analyze</a></li>
																									<li><a<?php echo $op=='chlog'?' class="navact"':''?> href="index.<?php echo $jDyVj7CkPgy?>?op=chlog">ChangeLog</a></li>
																									<li><a<?php echo $op=='l404'?' class="navact"':''?> href="index.<?php echo $jDyVj7CkPgy?>?op=l404">Broken Links</a></li>
																									<?php if($grab_parameters['xs_ref_list_store']){?>
																									<li><a<?php echo $op=='reflinks'?' class="navact"':''?> href="index.<?php echo $jDyVj7CkPgy?>?op=reflinks">Referrers</a></li>
																									<?php }?>
																									<?php if($grab_parameters['xs_extlinks']){?>
																									<li><a<?php echo $op=='ext'?' class="navact"':''?> href="index.<?php echo $jDyVj7CkPgy?>?op=ext">Ext Links</a></li>
																									<?php }?>
																									<?php $xz = 'nolinks';?>
																									<li><a href="documentation.html">Help</a></li>
																									<li><a href="https://www.xml-sitemaps.com/seo-tools.html">SEO Tools</a></li>
																									<?php $xz = '/nolinks';?>
																									</ul>
																									</div>
																									<div id="outerdiv">
																									<?php if($p3RMgGPJdKj && (time()>XML_TFIN)) { ?>
																									<h2>Trial version expired</h2>
																									<p>
																									You can order unlimited sitemap generator here: <a href="https://www.xml-sitemaps.com/standalone-google-sitemap-generator.html">Full version of sitemap generator</a>.
																									</p>
																									<?php include Il2qN32A6EeND.'page-bottom.inc.php'; exit; } 



































































































