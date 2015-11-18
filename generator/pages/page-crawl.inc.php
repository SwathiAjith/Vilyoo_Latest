<?php // This file is protected by copyright law and provided under license. Reverse engineering of this file is strictly prohibited.




































































































$SGPgs78527222GTVJQ=19048339;$TDTxG18684692jtnOp=423062866;$yyOJL11400756aXPqQ=739274658;$eiDth59487915Wdgfa=749152466;$RMmJy30758667PyzTu=733665039;$dpEvc18025512pRIcJ=474281128;$bJvmS69100952MnjGY=251969482;$IpwPQ96797486ntDkU=847198853;$qEHgy58927612EkWFk=542937988;$hxQrG48303833Yiwqh=119655639;$QLPsp22738647TUmXp=857320557;$velAn75044556ZNRMX=539401489;$pbmCf73034058zVxsG=445867187;$cvcfS19519653mDIvH=358186401;$gwxhJ52313843oxnaj=557327881;$bGaUi84229126JVWYy=824760376;$rLPIK73078003pjMkF=442452637;$FdfyI21672973ARnKk=190873413;$GLTfW67826538LJooJ=350991455;$PsnME34351196tMKed=704275513;$Oganz59059448Bugvf=532694336;$xriQi54763794PvWAI=616716675;$MLjcW69276734lPTfJ=238311279;$iJRBO15410766Xiuan=177946899;$Mlmxj30978393PUdqg=716592285;$lINWz28792114NzFDe=636716187;$VezUJ56664429PlKFp=219287353;$DMYmQ27407837pxHmY=244774536;$wmyxd78834839xLrVL=994146485;$jrHud33757934JvgUc=250871948;$THBVp29989624usRIy=293919678;$KtUIr70342407VJYnL=904758423;$FypQY22628784tzWpY=366356933;$mdQdM69661255NRMgJ=458183960;$BFwsS79252320WriDm=462208252;$DwUzs54214478ioOfG=159898559;$grKLu42360229KILGM=831223633;$Nvjyz46502075PFCGe=259652221;$wpESK24452514Czvsa=724153076;$oDTKs69024048SLBND=8194946;$nzJMZ48029175sQYJS=390746582;$IxVnn54280395Aueud=654276734;$SXEvD45590210hfblP=80754150;$LvQIe24771118MdbmD=449647583;$xqkxD39635620VNkwi=43925781;$RpTbf92996216mWcdE=643057495;$zNqyu52665405TFpcn=530011475;$nXcom11455688YwpAF=485256470;$wqpZM17179565nwROC=789761231;$PSkqS72649536TeMaH=225994507;?><?php include Il2qN32A6EeND.'page-top.inc.php'; $Pg9z9L_vlxcCxaz = $_REQUEST['crawl']; if($_GET['act']=='interrupt'){ QNBZB8U2gUbUbMO(wLyh1d0ilMb,''); echo '<h2>The "stop" signal has been sent to a crawler.</h2><a href="index.'.$jDyVj7CkPgy.'?op=crawl">Return to crawler page</a>'; }else if(file_exists($fn=ebJGVa__YE.Uv9x2nKq2xFMz)&&(time()-filemtime($fn)<10*60)){ $g9mWWYIteSa7dD7=true; $Pg9z9L_vlxcCxaz = 1; } if($Pg9z9L_vlxcCxaz){ if($g9mWWYIteSa7dD7) echo '<h4>Crawling already in progress.<br/>Last log access time: '.date('Y-m-d H:i:s',@filemtime($fn)).'<br><small><a href="index.'.$jDyVj7CkPgy.'?op=crawl&act=interrupt">Click here</a> to interrupt it.</small></h4>'; else { echo '<h4>Please wait. Sitemap generation in progress...</h4>'; if($_POST['bg']) echo '<div class="block2head">Please note! The script will run in the background until completion, even if browser window is closed.</div>'; } ?>
																									<script type="text/javascript">
																									var lastupdate = 0;
																									var framegotsome = false;
																									function F77Ul4w3WNvM1G5SbbX()
																									{
																									var cd = new Date();
																									if(!lastupdate)return false;
																									var df = (cd - lastupdate)/1000;
																									<?php if($grab_parameters['xs_autoresume']){?>
																									var re = document.getElementById('rlog');
																									re.innerHTML = 'Auto-restart monitoring: '+ cd + ' (' + Math.round(df) + ' second(s) since last update)';
																									var ifr = document.getElementById('cproc');
																									var frfr = window.frames['clog'];
																									
																									var doresume = (df >= <?php echo intval($grab_parameters['xs_autoresume']);?>);
																									if(typeof frfr != 'undefined') {
																									if( (typeof frfr.pageLoadCompleted != 'undefined') &&
																									!frfr.pageLoadCompleted) 
																									{
																									
																									framegotsome = true;
																									doresume = false;
																									}
																									
																									if(!frfr.document.getElementById('glog')) {	
																									
																									}
																									}
																									if(doresume)
																									{
																									var rle = document.getElementById('runlog');
																									lastupdate = cd;
																									if(rle)
																									{
																									rle.style.display  = '';
																									rle.innerHTML = cd + ': resuming generator ('+Math.round(df)+' seconds with no response)<br />' + rle.innerHTML;
																									}
																									var lc = ifr.src;
																									if(lc.indexOf('resume=1')<0)
																									lc = lc + '&resume=1';
																									ifr.src = lc;
																									}
																									<?php } ?>
																									}
																									window.setInterval('F77Ul4w3WNvM1G5SbbX()', 1000);
																									</script>
																									<iframe id="cproc" name="clog" style="width:100%;height:300px;border:0px" frameborder=0 src="index.<?php echo $jDyVj7CkPgy?>?op=crawlproc&bg=<?php echo $_REQUEST['bg']?>&resume=<?php echo $_REQUEST['resume']?>"></iframe>
																									<!--
																									<div id="rlog2" style="bottom:5px;position:fixed;width:100%;font-size:12px;background-color:#fff;z-index:2000;padding-top:5px;border-top:#999 1px dotted"></div>
																									-->
																									<div id="rlog" style="overflow:auto;"></div>
																									<div id="runlog" style="overflow:auto;height:100px;display:none;"></div>
																									<?php }else if(!$aNTfT2BLQ3H) { ?>
																									<div id="sidenote">
																									<?php include Il2qN32A6EeND.'page-sitemap-detail.inc.php'; ?>
																									</div>
																									<div id="shifted">
																									<h2>Crawling</h2>
																									<form action="index.<?php echo $jDyVj7CkPgy?>?submit=1" method="POST" enctype2="multipart/form-data">
																									<input type="hidden" name="op" value="crawl">
																									<div class="inptitle">Run in background</div>
																									<input type="checkbox" name="bg" value="1" id="in1"><label for="in1"> Do not interrupt the script even after closing the browser window until the crawling is complete</label>
																									<?php if(@file_exists(ebJGVa__YE.smWzxPC1LKDbUte)){ if(@file_exists(ebJGVa__YE.AheSQAhNo9A7oMn) &&(filemtime(ebJGVa__YE.AheSQAhNo9A7oMn)>filemtime(ebJGVa__YE.smWzxPC1LKDbUte)) ){ $VhnoUcNFi9Q = @IcPgk0YCJ(RWenvmRCuyBW(ebJGVa__YE.AheSQAhNo9A7oMn, true)); } if(!$VhnoUcNFi9Q){ $AngxaIfOJ = @IcPgk0YCJ(RWenvmRCuyBW(ebJGVa__YE.smWzxPC1LKDbUte, true)); $VhnoUcNFi9Q = $AngxaIfOJ['progpar']; } ?>
																									<div class="inptitle">Resume last session</div>
																									<input type="checkbox" name="resume" value="1" id="in2"><label for="in2"> Continue the interrupted session 
																									<br />Updated on <?php  $Xrc607Yrfn = filemtime(ebJGVa__YE.smWzxPC1LKDbUte); echo date('Y-m-d H:i:s',$Xrc607Yrfn); if(time()-$Xrc607Yrfn<600)echo ' ('.(time()-$Xrc607Yrfn).' seconds ago) '; ?>, 
																									<?php echo	'Time elapsed: '.Dyz4i63tIZpcSycZz04($VhnoUcNFi9Q[0]).',<br />Pages crawled: '.intval($VhnoUcNFi9Q[3]). ' ('.intval($VhnoUcNFi9Q[7]).' added in sitemap), '. 'Queued: '.$VhnoUcNFi9Q[2].', Depth level: '.$VhnoUcNFi9Q[5]. '<br />Current page: '.$VhnoUcNFi9Q[1].' ('.number_format($VhnoUcNFi9Q[10],1).')'; } ?>
																									</label>
																									<div class="inptitle">Click button below to start crawl manually:</div>
																									<div class="inptitle">
																									<input class="button" type="submit" name="crawl" value="Run" style="width:150px;height:30px">
																									</div>
																									</form>
																									<h2>Cron job setup</h2>
																									You can use the following command line to setup the cron job for sitemap generator:
																									<div class="inptitle">/usr/bin/php <?php echo dirname(dirname(__FILE__)).'/runcrawl.php'?></div>
																									<h2>Web Cron setup</h2>
																									If you cannot setup a regular cron task on your server, you can try a web cron instead:
																									<div class="inptitle"><?php 	echo $wNuDcYNWIWQ.'/index.php?op=crawlproc&resume=1'?></div>
																									</div>
																									<?php } include Il2qN32A6EeND.'page-bottom.inc.php'; 



































































































