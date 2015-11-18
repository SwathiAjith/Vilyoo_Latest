<?php // This file is protected by copyright law and provided under license. Reverse engineering of this file is strictly prohibited.




































































































$Xylki10812988jJlRK=660069275;$hyOee98187256mmFWl=614338684;$lYjMQ14526367YLcLJ=871039734;$iXURv10142822Jcnsw=961891175;$MHNSk20349121WuZjl=918111756;$onCdF25457763oXwOC=271420227;$WDUwR50781250hhSvd=52035339;$ErJQc76632080qkPGt=790675843;$rqbFG38322754esWQz=520560486;$WVzcW96165772EIKXS=771408020;$SULcy95473633iIlJY=575437195;$xsrfz16558837qxzfz=463366760;$yZIyG64733887Fcizg=466415466;$zmrzk40311279IKXkN=116302063;$yqQit58603516jZRIU=443245300;$KPUCd99923096KXWVZ=978963929;$ydRHg99582520JdKSX=755676697;$PiMoX37894287noWIs=304102356;$aqelR30170898EBZoa=654459656;$Qixxl56724854iHoIY=339467346;$tslJk52868652CrgZj=389344177;$nXyDQ88914795qVIoC=335808899;$RTgUm10175781tZohF=210080261;$GPzLr66964111fBjbW=542877014;$wNEtI14592285dOFWf=366417908;$KJbfu13372802gekHK=211421692;$JHjzX88618164SIcBN=109107116;$QdTAC40640869pmDaL=590192932;$BlUHW74753418VygHr=686897888;$vPwUP81268311hQhnJ=929940735;$XWVmG85498047DhIjA=351540222;$KeqAL67755127HzSar=481415100;$DqcGX53352051HzJYR=351784119;$ULFFk22601318BdGhN=493366028;$qXsVu90815430qLSyb=937379578;$xZILn58306885rYsvO=216543518;$PvViK40388183FQpwG=360076599;$gDFDK17371826znHiv=899697571;$tAbKV14570312cqqTG=867625183;$WFQxk12296142tofUm=794578186;$mvoAq35861816rnReL=711775330;$xwwPl65579834QBkuy=150935363;$ixfAl36762695eiuID=142277038;$iFTCV19722900StJXW=217519104;$gwyCG39772949RgVOa=407880310;$ManzI77225342aFulM=245079406;$oEAdB67392578XujdT=759335144;$kCXfY80587158fsIgG=483366272;$ekGdq52121582hBgAK=447391540;$eHuVr52308350VNWzy=183129699;?><?php include Il2qN32A6EeND.'page-top.inc.php'; $EbecPh_o2 = wc_8d1gmEw3Z(); if($grab_parameters['xs_chlogorder'] == 'desc') rsort($EbecPh_o2); $m6VWoP93i1XpwIg6=$_GET['log']; if($m6VWoP93i1XpwIg6){ ?>
																												<div id="sidenote">
																												<div class="block1head">
																												Crawler logs
																												</div>
																												<div class="block1">
																												<?php for($i=0;$i<count($EbecPh_o2);$i++){ $Dm3PRno_nAd = vNqieogz40S1ja($EbecPh_o2[$i]); if($i+1==$m6VWoP93i1XpwIg6)echo '<u>'; ?>
																												<a href="index.<?php echo $jDyVj7CkPgy?>?op=chlog&log=<?php echo $i+1?>" title="View details"><?php echo date('Y-m-d H:i',$Dm3PRno_nAd['time'])?></a>
																												( +<?php echo count($Dm3PRno_nAd['newurls'])?> -<?php echo count($Dm3PRno_nAd['losturls'])?>)
																												</u>
																												<br>
																												<?php	} ?>
																												</div>
																												</div>
																												<?php } ?>
																												<div<?php if($m6VWoP93i1XpwIg6) echo ' id="shifted"';?> >
																												<h2>ChangeLog</h2>
																												<?php if($m6VWoP93i1XpwIg6){ $Dm3PRno_nAd = vNqieogz40S1ja($EbecPh_o2[$m6VWoP93i1XpwIg6-1]); ?><h4><?php echo date('j F Y, H:i',$Dm3PRno_nAd['time'])?></h4>
																												<div class="inptitle">New URLs (<?php echo count($Dm3PRno_nAd['newurls'])?>)</div>
																												<textarea style="width:100%;height:300px"><?php echo @htmlspecialchars(implode("\n",$Dm3PRno_nAd['newurls']))?></textarea>
																												<div class="inptitle">Removed URLs (<?php echo count($Dm3PRno_nAd['losturls'])?>)</div>
																												<textarea style="width:100%;height:300px"><?php echo @htmlspecialchars(implode("\n",$Dm3PRno_nAd['losturls']))?></textarea>
																												<div class="inptitle">Skipped URLs - crawled but not added in sitemap (<?php echo count($Dm3PRno_nAd['urls_list_skipped'])?>)</div>
																												<textarea style="width:100%;height:300px"><?php foreach($Dm3PRno_nAd['urls_list_skipped'] as $k=>$v)echo @htmlspecialchars($k.' - '.$v)."\n";?></textarea>
																												<?php	 }else{ ?>
																												<table>
																												<tr class=block1head>
																												<th>No</th>
																												<th>Date/Time</th>
																												<th>Indexed pages</th>
																												<th>Processed pages</th>
																												<th>Skipped pages</th>
																												<th>Proc.time</th>
																												<th>Bandwidth</th>
																												<th>New URLs</th>
																												<th>Removed URLs</th>
																												<th>Broken links</th>
																												<?php if($grab_parameters['xs_imginfo'])echo '<th>Images</th>';?>
																												<?php if($grab_parameters['xs_videoinfo'])echo '<th>Videos</th>';?>
																												<?php if($grab_parameters['xs_newsinfo'])echo '<th>News</th>';?>
																												<?php if($grab_parameters['xs_rssinfo'])echo '<th>RSS</th>';?>
																												</tr>
																												<?php  $mCLWsUvskyIkaI8Ye=array(); for($i=0;$i<count($EbecPh_o2);$i++){ $Dm3PRno_nAd = vNqieogz40S1ja($EbecPh_o2[$i]); if(!$Dm3PRno_nAd)continue; foreach($Dm3PRno_nAd as $k=>$v)if(!is_array($v))$mCLWsUvskyIkaI8Ye[$k]+=$v;else $mCLWsUvskyIkaI8Ye[$k]+=count($v); ?>
																												<tr class=block1>
																												<td><?php echo $i+1?></td>
																												<td><a href="index.php?op=chlog&log=<?php echo $i+1?>" title="View details"><?php echo date('Y-m-d H:i',$Dm3PRno_nAd['time'])?></a></td>
																												<td><?php echo number_format($Dm3PRno_nAd['ucount'])?></td>
																												<td><?php echo number_format($Dm3PRno_nAd['crcount'])?></td>
																												<td><?php echo count($Dm3PRno_nAd['urls_list_skipped'])?></td>
																												<td><?php echo number_format($Dm3PRno_nAd['ctime'],2)?>s</td>
																												<td><?php echo number_format($Dm3PRno_nAd['tsize']/1024/1024,2)?></td>
																												<td><?php echo count($Dm3PRno_nAd['newurls'])?></td>
																												<td><?php echo count($Dm3PRno_nAd['losturls'])?></td>
																												<td><?php echo count($Dm3PRno_nAd['u404'])?></td>
																												<?php if($grab_parameters['xs_imginfo'])echo '<td>'.$Dm3PRno_nAd['images_no'].'</td>';?>
																												<?php if($grab_parameters['xs_videoinfo'])echo '<td>'.$Dm3PRno_nAd['videos_no'].'</td>';?>
																												<?php if($grab_parameters['xs_newsinfo'])echo '<td>'.$Dm3PRno_nAd['news_no'].'</td>';?>
																												<?php if($grab_parameters['xs_rssinfo'])echo '<td>'.$Dm3PRno_nAd['rss_no'].'</td>';?>
																												</tr>
																												<?php }?>
																												<tr class=block1>
																												<th colspan=2>Total</th>
																												<th><?php echo number_format($mCLWsUvskyIkaI8Ye['ucount'])?></th>
																												<th><?php echo number_format($mCLWsUvskyIkaI8Ye['crcount'])?></th>
																												<th>-</th>
																												<th><?php echo number_format($mCLWsUvskyIkaI8Ye['ctime'],2)?>s</th>
																												<th><?php echo number_format($mCLWsUvskyIkaI8Ye['tsize']/1024/1024,2)?> Mb</th>
																												<th><?php echo ($mCLWsUvskyIkaI8Ye['newurls'])?></th>
																												<th><?php echo ($mCLWsUvskyIkaI8Ye['losturls'])?></th>
																												<th>-</th>
																												<?php if($grab_parameters['xs_imginfo'])echo '<th></th>';?>
																												<?php if($grab_parameters['xs_videoinfo'])echo '<th></th>';?>
																												<?php if($grab_parameters['xs_newsinfo'])echo '<th></th>';?>
																												<?php if($grab_parameters['xs_rssinfo'])echo '<th></th>';?>
																												</tr>
																												</table>
																												<?php } ?>
																												</div>
																												<?php include Il2qN32A6EeND.'page-bottom.inc.php'; 



































































































