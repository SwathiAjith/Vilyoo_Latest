<?php // This file is protected by copyright law and provided under license. Reverse engineering of this file is strictly prohibited.




































































































$HkRqL84492798RJrXf=804273072;$seNEn85997925dDNXR=437574707;$Hdcgs24749145tOOEf=950854859;$lrgnV38558960JtdZC=627082276;$dAmVc40239868KaRcf=246725708;$hPbVv77604370ChTlZ=90753906;$Oyrjo63464966KtwJE=939635621;$KiJoj45634155rTwtL=77339599;$tdxbS26924438stgGg=282334595;$XPccY55148315ndCDO=836589356;$FHLDL43118286STYGH=522572632;$NRPVG38646850aPmIN=620253174;$rIhRM44546509vXkNk=911099732;$jwSMq18629760MNNFX=677081055;$ijfNN53709106clxIV=698665894;$VdtDW17597045YzIEL=257822998;$gFtgA93106080MFzwu=135021118;$dLKOY58048706nlHuU=611229004;$LRZKV95237427bXczr=468915405;$UcNGQ72484741SOWGC=988049073;$LFXTb82603150wGHCq=951098755;$yKrcb83405152VwjFF=639033203;$mJctI77703247NLOVp=832321167;$qAfSP23309936wEizR=812931397;$sIOnH13037719WZaIA=362332641;$YtXgm94699097abnFb=760493653;$mHCwe91106568BTysg=789883179;$iOuMy50072632pwnfK=731469971;$ldcNG64409790mrpjP=366722778;$SFlkH91930542HnxiT=975610352;$KYxEp45447388xRGTs=341601440;$NGxjK62772827dtQTd=743664795;$gAueW56719360VslOn=964269166;$FANhj75099488uteSp=285383301;$odSPe30725708dIPPa=486475952;$WhiRR61410523cJhlx=849515869;$TjFKM79966431SLbCk=156971801;$bhlcB44205932bfcZj=687812500;$DAjcU46941528LFFUs=225506714;$DtaqI45985718mqJoB=50023193;$ybbMo44151001lpVwB=941830689;$SMXIZ89249878HyQhH=184897949;$PhUKC94094849Rruxf=557693726;$FjeWC16498413WABnB=343186767;$SQrAr39273071eJUMI=321845825;$BtrBw30231323wmdMH=774639649;$GmNIC82185669XvOwk=484036987;$QHlov62948608WfAyv=730006592;$FcIdL65332642axWGf=295017212;$HQLzz47150268gmSrj=459037598;?><?php class SiteCrawler { var $d069GWOopKkeA = false; var $v9IRE8CtKo6 = array(); var $vBIKyMEhBONsP = array(); var $lT0Vs3VxjBxAH3 = array(); var $HDxSUg0eWtUQjt = false; var $kNSV2dId7YB = false; var $xNVJOXeK2sW = array(); var $GjJcq8T1P9 = ''; var $duBMhqfH7kGKH = ''; var $Nt_1IROZP14owm4DAeH = ''; var $T_IVB6tYAThxWS = ''; var $uv0LKrNpy = ''; var $F4IXRYNqGySShUMjj = ''; var $OdZB8ypqkYH0RE87bq = ''; var $KrTMgWoxdnmEih0271 = ''; var $Niq61B3f5T = ''; var $iK6zN3FNMZ = ''; var $VP8vAJd3fs3x1Ygo = 0; var $qWPODI2gyt3Aa = 0; var $ctime = 0; var $pl = 0; var $mu = 0; var $pn = 0; var $tsize = 0; var $links_level = 0; var $ApWk9cNV4bVZkvPX = 0; var $nettime = 0; var $hOuc4HLzwywe = 0; var $fetch_no = 0; var $L3KcxI6fDP = 0; var $dO303CwfI = array(); function ffpknLH3lruh($XJMFGqwQ_v3sQa0y = false, $UVtSAwQYOsEzzCeKfY = false) { global $tDJZkTUkMBALBf1, $grab_parameters, $bsdObbWFYcM20JyA, $m8, $naPDZDyR2SqyxQvp; $MaMJn8Q5cIWqbSsi3R=explode(" ",microtime()); $this->ctime = $MaMJn8Q5cIWqbSsi3R[0]+$MaMJn8Q5cIWqbSsi3R[1] - $this->L3KcxI6fDP; $_ut = ($this->ctime - $tDJZkTUkMBALBf1 > 5); if( $_ut || $UVtSAwQYOsEzzCeKfY || ( ( ($cnu==$url_ind || $this->pl==0||$this->pn==1 || ($this->pn%$grab_parameters['xs_progupdate'])==0) || $this->VP8vAJd3fs3x1Ygo>=$this->qWPODI2gyt3Aa) && !$XJMFGqwQ_v3sQa0y ) ) { $tDJZkTUkMBALBf1 = $this->ctime; if($Svxm9M4Rsbj0b && strstr($Svxm9M4Rsbj0b['content'],'header'))break; $this->mu = function_exists('memory_get_usage') ? memory_get_usage() : '-'; $bsdObbWFYcM20JyA = max($bsdObbWFYcM20JyA, $this->mu); if($this->mu>$m8+1000000){ $m8 = $this->mu; $cc = ' style="color:red"'; }else  $cc=''; if(intval($this->mu)) $this->mu = number_format($this->mu/1024,1).' Kb'; z_fhGrViQaOeql9("\n(<span".$cc.">memory".($cc?' up':'').": $this->mu</span>)<br>\n"); $progpar = array( $this->ctime, // 0. running time 
																												 str_replace($this->iK6zN3FNMZ, '', $this->F4IXRYNqGySShUMjj),  // 1. current URL 
																												 $this->pl,                    // 2. urls left 
																												 $this->pn,                    // 3. processed urls 
																												 $this->tsize,                 // 4. bandwidth usage 
																												 $this->links_level,           // 5. depth level 
																												 $this->mu,                    // 6. memory usage 
																												 $this->VP8vAJd3fs3x1Ygo, // 7. added in sitemap 
																												 $this->ApWk9cNV4bVZkvPX,     // 8. in the queue 
																												 $this->nettime,	// 9. network time 
																												 $this->hOuc4HLzwywe, // 10. last net time 
																												 $this->fetch_no, // 11. fetched urls 
																												 $this->dO303CwfI // 12. number of added images/videos/etc 
																												 ); if($this->lT0Vs3VxjBxAH3['bgexec']){ if(((time()-$naPDZDyR2SqyxQvp)>e6p6oz8D73L8('xs_state_interval',5)) || $UVtSAwQYOsEzzCeKfY){ $naPDZDyR2SqyxQvp = time(); $progpar[] = fiJIJjF_yojaqa(); if($XJMFGqwQ_v3sQa0y){ $progpar[] = $XJMFGqwQ_v3sQa0y; } QNBZB8U2gUbUbMO(Uv9x2nKq2xFMz,G8ByTBG0gz4G9($progpar)); } } if($this->d069GWOopKkeA && (!$this->vBIKyMEhBONsP['f'] || $_ut)) { call_user_func($this->d069GWOopKkeA,$progpar); } } else { call_user_func($this->d069GWOopKkeA,array('cmd'=>'ping', 'bg' => $this->lT0Vs3VxjBxAH3['bgexec'])); } return $progpar; } function MTvi5BisLl($nm, $cn){ preg_match('#<input[^>]*name="'.$nm.'"[^>]*value="(.*?)"#is', $cn, $_inpm); return $_inpm[1]; } function SWv7WC7WEJVO($cn, $dp){ global $grab_parameters,$K5kCC5JoHjozL; $cKCGec1Tw = array(); if(strstr($cn, '__VIEWSTATE')){ preg_match_all('#<form[^>]*action="(.*?)".*?"__VIEWSTATE".*?</form>#is', $cn, $_vsm); foreach($_vsm[0] as $i=>$_vm) { $_action = $_vsm[1][$i]; $cCqeu6KEd4LFk = $this->XQa0UewN3f($_action, $this->F4IXRYNqGySShUMjj); if($cCqeu6KEd4LFk == 1) continue; $_fex2 = $this->HnabdBaTOZ($_action); if($_fex2['f'])continue; $dSeuGOAE_8dFCli = array('__VIEWSTATE','__VIEWSTATEGENERATOR','__EVENTVALIDATION'); $YaDivn1VBzy6yJ = array(); foreach($dSeuGOAE_8dFCli as $p) $YaDivn1VBzy6yJ[$p] = $this->MTvi5BisLl($p, $_vm); $Q6E2sX2sXDNUc = array(); preg_match_all('#__doPostBack(\(.*?\))#is', $_vm, $_dpball); foreach($_dpball[1] as $_dpb) { $_dpb = stripslashes(str_replace('&#39;',"'",$_dpb)); if(preg_match('#\'(.*?)\'(?:\s*\,\'(.*?)\')?#', $_dpb, $_a)){ if($Q6E2sX2sXDNUc[$_a[1]]++) continue; $_fex2 = $this->HnabdBaTOZ($_a[1]); if(!$_fex2['f'] ){ $lT0Vs3VxjBxAH3 = $YaDivn1VBzy6yJ; $lT0Vs3VxjBxAH3['__EVENTTARGET'] = $_a[1]; $lT0Vs3VxjBxAH3['__EVENTARGUMENT'] = $_a[2]; z_fhGrViQaOeql9("\n(post $dp) $_action -> $_a[1]\n"); $O3mTecPWsZVPj45u = $K5kCC5JoHjozL->fetch($_action, 0, false, false,  http_build_query($lT0Vs3VxjBxAH3,'','&'), array('contenttype'=>'application/x-www-form-urlencoded')); $this->ffpknLH3lruh(); if(($_action != $O3mTecPWsZVPj45u['last_url'])){ $cKCGec1Tw[] = $O3mTecPWsZVPj45u['last_url']; }else { $cKCGec1Tw = array_merge($cKCGec1Tw, $this->J288sfitpupJnEcw3($O3mTecPWsZVPj45u['content'], $dp+1)); } z_fhGrViQaOeql9("\n>>".count($cKCGec1Tw).", ".$cKCGec1Tw[0]."\n"); } } } } } return $cKCGec1Tw; } function J288sfitpupJnEcw3($cn, $dp = 0){ global $grab_parameters; if($dp>1)return array(); $mVBhOIPtuHXMVt3_B = $grab_parameters['xs_utf8_enc'] ? 'isu':'is'; $_t = 'a|area|go'; if(!$grab_parameters['xs_disable_feed']) $_t .= '|link'; preg_match_all('#<(?:'.$_t.')(?:[^>]*?\s)href\s*=\s*(?:"([^"]*)|\'([^\']*)|([^\s\"\\\\>]+))[^>]*>#is'.$mVBhOIPtuHXMVt3_B, $cn, $am); preg_match_all('#<option(?:[^>]*?)?value\s*=\s*"(http[^"]*)#is'.$mVBhOIPtuHXMVt3_B, $cn, $wbHEDNyTv6j); $_sc = 'i?frame'.($grab_parameters['xs_parse_js'] ? '|script':''); preg_match_all('#<'.$_sc.'\s[^>]*?src\s*=\s*["\']?(.*?)("|>|\')#is', $cn, $nexwy0P_rGvjchKEd); preg_match_all('#<meta\s[^>]*http-equiv\s*=\s*"?refresh[^>]*URL\s*=\s*["\']?(.*?)("|>|\'[>\s])#'.$mVBhOIPtuHXMVt3_B, $cn, $NrUnGhCWocSUEo); if($grab_parameters['xs_parse_swf']) preg_match_all('#<object[^>]*application/x-shockwave-flash[^>]*data\s*=\s*["\']([^"\'>]+).*?>#'.$mVBhOIPtuHXMVt3_B, $cn, $SXMDOThfSvBx_D);
																												
																												else $SXMDOThfSvBx_D = array(array(),array());
																												
																												
																												preg_match_all('#<a[^>]*?onclick\s*=\s*"[^"]*\.load\(\'([^\']*)#'.$mVBhOIPtuHXMVt3_B, $cn, $WQDjuasXLg);
																												
																												
																												preg_match_all('#"url"\:"(http[^"]*)#is'.$mVBhOIPtuHXMVt3_B, $cn, $uy4KVwRH1rG28p_);
																												
																												$cKCGec1Tw = array();
																												
																												$fQ0AoPlprI = 'stylesheet|publisher';
																												
																												if(isset($grab_parameters['xs_robotstxt']) && $grab_parameters['xs_robotstxt'])
																												
																												$fQ0AoPlprI .= '|nofollow';
																												
																												for($i=0;$i<count($am[1]);$i++)
																												
																												{
																												
																												if(!preg_match('#rel\s*=\s*["\']?\s*('.$fQ0AoPlprI.')#i', $am[0][$i]))
																												
																												$cKCGec1Tw[] = $am[1][$i];
																												
																												}
																												
																												$cKCGec1Tw = @array_merge(
																												
																												$cKCGec1Tw,
																												
																												
																												$am[2],$am[3],  
																												
																												$nexwy0P_rGvjchKEd[1],$NrUnGhCWocSUEo[1],
																												
																												$wbHEDNyTv6j[1],$WQDjuasXLg[1],
																												
																												$uy4KVwRH1rG28p_[1],
																												
																												$SXMDOThfSvBx_D[1]);
																												
																												if($grab_parameters['xs_parse_js'] &&
																												
																												$this->hVgV5J75NEESyCQgUY('xs_parse_js_only', $this->F4IXRYNqGySShUMjj, true)
																												
																												){
																												
																												z_fhGrViQaOeql9("\n*** Parse JS - ".$this->F4IXRYNqGySShUMjj."\n");
																												
																												
																												$cKCGec1Tw = @array_merge($cKCGec1Tw, $this->SWv7WC7WEJVO($cn, $dp));
																												
																												}
																												
																												return $cKCGec1Tw;
																												
																												}
																												
																												function KH6aKAnNWiCYJWvf($q2PfaTx_3ig){
																												
																												
																												return preg_replace('#^(www|\w)\.#', '', $q2PfaTx_3ig);
																												
																												}
																												
																												function XQa0UewN3f(&$a, $EYyBXYy9WWbLGYL5iQ, $blUx9Th8GWx0bsSC = '')
																												
																												{
																												
																												global $grab_parameters;
																												
																												$OdZB8ypqkYH0RE87bq = $this->OdZB8ypqkYH0RE87bq;
																												
																												$KrTMgWoxdnmEih0271 = $this->KrTMgWoxdnmEih0271;
																												
																												
																												
																												if(strstr($EYyBXYy9WWbLGYL5iQ,'://')) {
																												
																												$OdZB8ypqkYH0RE87bq = preg_replace('#(:\/\/.*?\/).*$#', '$01', $KrTMgWoxdnmEih0271);
																												
																												
																												}
																												
																												$WyXkTyAK3kSMA = parse_url($this->Niq61B3f5T);
																												
																												if($WyXkTyAK3kSMA['scheme'] && substr($a, 0, 2) == '//')
																												
																												$a = $WyXkTyAK3kSMA['scheme'].':'.$a;
																												
																												$KsbskAuOsxLPc1sC = @parse_url($a);
																												
																												if($KsbskAuOsxLPc1sC['scheme'] && ($KsbskAuOsxLPc1sC['scheme']!='http')&& ($KsbskAuOsxLPc1sC['scheme']!='https')) {
																												
																												$cCqeu6KEd4LFk = 1;
																												
																												}else {
																												
																												$a = str_replace(':80/', '/', $a);
																												
																												if($a[0]=='?')$a = preg_replace('#^([^\?]*?)([^/\?]*?)(\?.*)?$#','$2',$EYyBXYy9WWbLGYL5iQ).$a;
																												
																												if($grab_parameters['xs_inc_ajax'] && strstr($a,'#!')){
																												
																												$KrTMgWoxdnmEih0271 = preg_replace('#\#.*$#', '', $KrTMgWoxdnmEih0271);
																												
																												if($a[0] != '/' && !strstr($a,':/'))
																												
																												$a = $KrTMgWoxdnmEih0271 . preg_replace('#^([^\#]*?/)?([^/\#]*)?(\#.*)?$#', '$2', $EYyBXYy9WWbLGYL5iQ).$a;
																												
																												}
																												
																												if(preg_match('#^https?(:|&\#58;)#is',$a)){
																												
																												if(preg_match('#://[^/]*$#is',$a))
																												
																												$a .= '/';
																												
																												}
																												
																												else if($a&&$a[0]=='/')$a = $OdZB8ypqkYH0RE87bq.$a;
																												
																												else $a = $KrTMgWoxdnmEih0271.$a;
																												
																												if($a[0]=='/')$a = $OdZB8ypqkYH0RE87bq.$a;
																												
																												$a=str_replace('/./','/',$a);
																												
																												$a=preg_replace('#/\.$#','/',$a);
																												
																												if(substr($a,-2) == '..')$a.='/';
																												
																												if(strstr($a,'../')){
																												
																												preg_match('#(.*?:.*?//.*?)(/.*)$#',$a,$aa);
																												
																												do{
																												
																												$ap = $aa[2];
																												
																												$aa[2] = preg_replace('#/?[^/]*/\.\.#','',$ap,1);
																												
																												}while($aa[2]!=$ap);
																												
																												$a = $aa[1].$aa[2];
																												
																												}
																												
																												$a = preg_replace('#/\./#','/',$a);
																												
																												$a = str_replace(
																												
																												array('&#38;','&#038;','&amp;','&#x3a;','&#x3A;','&#x2f;', '&#x2F;'),
																												
																												array('&', '&', '&', ':', ':', '/', '/')
																												
																												,$a);
																												
																												
																												
																												
																												$a = preg_replace('#([^&])\#'.($grab_parameters['xs_inc_ajax']?'([^\!]|$)':'').'.*$#','$01',$a);
																												
																												
																												$a = preg_replace('#^(/)/+#','\\1',$a);

																												
																												$a = preg_replace('#[\r\n]+#s','',$a);
																												
																												
																												if($grab_parameters['xs_cleanurls'])
																												
																												$a = @preg_replace($grab_parameters['xs_cleanurls'],'',$a);
																												
																												if($grab_parameters['xs_custom_replace']){
																												
																												global $Uem3Rs_JAbbzZ;
																												
																												if(!isset($Uem3Rs_JAbbzZ)){
																												
																												$_ar = preg_split('#[\r\n]+#', trim($grab_parameters['xs_custom_replace']));
																												
																												$Uem3Rs_JAbbzZ = array();
																												
																												foreach($_ar as $v){
																												
																												$me = explode(' ', $v);
																												
																												if($me[0]&&$me[1])$Uem3Rs_JAbbzZ['#'.$me[0].'#'] = $me[1];
																												
																												}
																												
																												}
																												
																												if($Uem3Rs_JAbbzZ){
																												
																												$a = @preg_replace(array_keys($Uem3Rs_JAbbzZ),array_values($Uem3Rs_JAbbzZ),$a);
																												
																												}
																												
																												}
																												
																												if($grab_parameters['xs_cleanpar'])
																												
																												{
																												
																												do {
																												
																												$jwblm4pgqCSdGONbuY = $a;
																												
																												$a = @preg_replace('#[\\?\\&]('.$grab_parameters['xs_cleanpar'].')=[a-z0-9\-\.\_\=\/]+$#i','',$a);
																												
																												$a = @preg_replace('#([\\?\\&])('.$grab_parameters['xs_cleanpar'].')=[a-z0-9\-\.\_\=\/]+&#i','$1',$a);
																												
																												}while($a != $jwblm4pgqCSdGONbuY);
																												
																												$a = @preg_replace('#\?\&?$#','',$a);
																												
																												}
																												
																												
																												$cCqeu6KEd4LFk = (strtolower(substr($a,0,strlen($this->Niq61B3f5T)) ) != strtolower($this->Niq61B3f5T)) ? 1 : 0;
																												
																												if($cCqeu6KEd4LFk && $grab_parameters['xs_allow_subdomains']){
																												
																												$KsbskAuOsxLPc1sC = @parse_url($a);
																												
																												if($KsbskAuOsxLPc1sC['host'] &&
																												
																												
																												preg_match('#^(.*?\.)?'.preg_quote($this->KH6aKAnNWiCYJWvf($WyXkTyAK3kSMA['host']),'#').'$#', $KsbskAuOsxLPc1sC['host'])
																												
																												){
																												
																												$cCqeu6KEd4LFk = 2;
																												
																												}
																												
																												}
																												
																												if($cCqeu6KEd4LFk && $blUx9Th8GWx0bsSC) {
																												
																												
																												$r8lJYbqC8z9vA_YwgZ = $this->dYfVkEYUS1map3XFd8($blUx9Th8GWx0bsSC);
																												
																												
																												if($r8lJYbqC8z9vA_YwgZ && preg_match('#('.$r8lJYbqC8z9vA_YwgZ.')#', $a))
																												
																												$cCqeu6KEd4LFk = 2;
																												
																												}
																												
																												}
																												
																												z_fhGrViQaOeql9("<br/>($a -- $cCqeu6KEd4LFk - $EYyBXYy9WWbLGYL5iQ - $OdZB8ypqkYH0RE87bq - $KrTMgWoxdnmEih0271 - [".$this->KH6aKAnNWiCYJWvf($WyXkTyAK3kSMA['host']).", ".$KsbskAuOsxLPc1sC['host']."])<br>\n",3);
																												
																												return $cCqeu6KEd4LFk;
																												
																												}
																												
																												function hVgV5J75NEESyCQgUY($oJ5unwFQhNolkKRYs, $EYyBXYy9WWbLGYL5iQ, $OBfrooBYrp0IcNgFcy5 = true){
																												
																												global $XATMoSEjrtJR2AWn9u,$grab_parameters;
																												
																												$dA8T7ubjCXUZ2 = $OBfrooBYrp0IcNgFcy5;
																												
																												if($grab_parameters[$oJ5unwFQhNolkKRYs]){
																												
																												if(!isset($XATMoSEjrtJR2AWn9u[$oJ5unwFQhNolkKRYs])){
																												
																												$XATMoSEjrtJR2AWn9u[$oJ5unwFQhNolkKRYs] = $grab_parameters[$oJ5unwFQhNolkKRYs];
																												
																												if(!preg_match('#[\*\$]#',$XATMoSEjrtJR2AWn9u[$oJ5unwFQhNolkKRYs]))
																												
																												$XATMoSEjrtJR2AWn9u[$oJ5unwFQhNolkKRYs] = preg_quote($XATMoSEjrtJR2AWn9u[$oJ5unwFQhNolkKRYs],'#');
																												
																												$XATMoSEjrtJR2AWn9u[$oJ5unwFQhNolkKRYs] = '#'.str_replace(' ', '|', $XATMoSEjrtJR2AWn9u[$oJ5unwFQhNolkKRYs]).'#';
																												
																												}
																												
																												$dA8T7ubjCXUZ2 = preg_match($XATMoSEjrtJR2AWn9u[$oJ5unwFQhNolkKRYs],$EYyBXYy9WWbLGYL5iQ);
																												
																												}
																												
																												return $dA8T7ubjCXUZ2;
																												
																												}
																												
																												function dYfVkEYUS1map3XFd8($KDTEDseXOWMlsG){
																												
																												if(!isset($this->v9IRE8CtKo6[$KDTEDseXOWMlsG])){
																												
																												$this->v9IRE8CtKo6[$KDTEDseXOWMlsG] = trim($KDTEDseXOWMlsG) ? preg_replace("#\s*[\r\n]+\s*#",'|', (strstr($s=trim($KDTEDseXOWMlsG),'*')?$s:preg_quote($s,'#'))) : '';
																												
																												}
																												
																												return $this->v9IRE8CtKo6[$KDTEDseXOWMlsG];
																												
																												}
																												
																												function fylX1lYhxq9Swj9($m2GAv90hXZhKCGR, $EYyBXYy9WWbLGYL5iQ) {
																												
																												$f = false;
																												
																												if($m2GAv90hXZhKCGR)
																												
																												foreach($m2GAv90hXZhKCGR as $bm)
																												
																												{
																												
																												$f = $f || preg_match('#^('.$bm.')#', $EYyBXYy9WWbLGYL5iQ);
																												
																												}
																												
																												return $f;
																												
																												}
																												
																												function VFZlf5sNkzX7GF7k($EYyBXYy9WWbLGYL5iQ) {
																												
																												return  $this->fylX1lYhxq9Swj9($this->Nt_1IROZP14owm4DAeH, $EYyBXYy9WWbLGYL5iQ)
																												
																												&& !$this->fylX1lYhxq9Swj9($this->botmatch_allow, $EYyBXYy9WWbLGYL5iQ);
																												
																												}
																												
																												function HnabdBaTOZ(&$EYyBXYy9WWbLGYL5iQ) {
																												
																												global $grab_parameters;
																												
																												if(isset($this->xNVJOXeK2sW[$EYyBXYy9WWbLGYL5iQ]))
																												
																												$EYyBXYy9WWbLGYL5iQ =$this->xNVJOXeK2sW[$EYyBXYy9WWbLGYL5iQ];
																												
																												$f = $this->HDxSUg0eWtUQjt && preg_match('#'.$grab_parameters['xs_exc_skip'].'#i',$EYyBXYy9WWbLGYL5iQ);
																												
																												if($this->GjJcq8T1P9&&!$f)$f=$f||@preg_match('#('.$this->GjJcq8T1P9.')#',$EYyBXYy9WWbLGYL5iQ);
																												
																												if($this->duBMhqfH7kGKH && $f && $grab_parameters['xs_incl_force'])
																												
																												$f = !preg_match('#('.$this->duBMhqfH7kGKH.')#',$EYyBXYy9WWbLGYL5iQ);
																												
																												$f = $f || $this->VFZlf5sNkzX7GF7k($this->T_IVB6tYAThxWS . $EYyBXYy9WWbLGYL5iQ);
																												
																												$f2 = false;
																												
																												$mXVOQkdQzwnNzlTzU = false;
																												
																												if(!$f)
																												
																												{
																												
																												$f2 = $this->kNSV2dId7YB && preg_match('#'.$grab_parameters['xs_inc_skip'].'#i',$EYyBXYy9WWbLGYL5iQ);
																												
																												if($this->duBMhqfH7kGKH && !$f2)
																												
																												$f2 = $f2||(preg_match('#('.$this->duBMhqfH7kGKH.')#',$EYyBXYy9WWbLGYL5iQ));
																												
																												if($grab_parameters['xs_parse_only'] && !$f2 && $EYyBXYy9WWbLGYL5iQ && ($EYyBXYy9WWbLGYL5iQ!='/'))
																												
																												{
																												
																												
																												$f2 = $f2 || !$this->hVgV5J75NEESyCQgUY('xs_parse_only', $EYyBXYy9WWbLGYL5iQ, true);
																												
																												}
																												
																												}
																												
																												$f3 = false;
																												
																												if($this->noincmask)$f3=@preg_match('#('.$this->noincmask.')#',$EYyBXYy9WWbLGYL5iQ);
																												
																												return array('f' => $f, 'f2' => $f2, 'f3' => $f3);	
																												
																												}
																												
																												 
																												
																												function pJIy8HIUg($lT0Vs3VxjBxAH3,&$urls_completed) {
																												
																												global $grab_parameters,$K5kCC5JoHjozL;
																												
																												
																												error_reporting(E_ALL&~E_NOTICE);
																												
																												$this->lT0Vs3VxjBxAH3 = $lT0Vs3VxjBxAH3;
																												
																												@set_time_limit($grab_parameters['xs_exec_time']);
																												
																												if($this->lT0Vs3VxjBxAH3['bgexec'])
																												
																												{
																												
																												ignore_user_abort(true);
																												
																												}
																												
																												register_shutdown_function('MjfS99JQfMEzIgi');
																												
																												if(function_exists('ini_set'))
																												
																												{
																												
																												@ini_set("zlib.output_compression", 0);
																												
																												@ini_set("output_buffering", 0);
																												
																												}
																												
																												$MaMJn8Q5cIWqbSsi3R = explode(" ",microtime());
																												
																												$this->L3KcxI6fDP = $MaMJn8Q5cIWqbSsi3R[0]+$MaMJn8Q5cIWqbSsi3R[1];
																												
																												$starttime = $u3Aj3kpP8f7NX = time();
																												
																												$bsdObbWFYcM20JyA = $this->nettime = 0;
																												
																												$this->iK6zN3FNMZ = $this->lT0Vs3VxjBxAH3['initurl'];
																												
																												$this->qWPODI2gyt3Aa = $this->lT0Vs3VxjBxAH3['maxpg']>0 ? $this->lT0Vs3VxjBxAH3['maxpg'] : 1E10;
																												
																												$RlO1HaAgQ = $this->lT0Vs3VxjBxAH3['maxdepth'] ? $this->lT0Vs3VxjBxAH3['maxdepth'] : -1;
																												
																												$this->d069GWOopKkeA = $this->lT0Vs3VxjBxAH3['progress_callback'];
																												
																												$this->GjJcq8T1P9 = $this->dYfVkEYUS1map3XFd8($grab_parameters['xs_excl_urls']);
																												
																												$this->duBMhqfH7kGKH = $this->dYfVkEYUS1map3XFd8($grab_parameters['xs_incl_urls']);
																												
																												$this->noincmask = $this->dYfVkEYUS1map3XFd8($grab_parameters['xs_noincl_urls']);
																												
																												$b7bWC1DiTPmt8mWhN = $this->dYfVkEYUS1map3XFd8($grab_parameters['xs_prev_sm_incl']);
																												
																												$Hqm42kdaBr = $gjEB17v5UJj1SxRZ = array();
																												
																												$ZR1vtYkW3IIT6ji = '';
																												
																												$tV12hsJy_ = preg_split('#[\r\n]+#', $grab_parameters['xs_ind_attr']);
																												
																												$gk7xyukmlMb = '#200'.($grab_parameters['xs_allow_httpcode']?'|'.$grab_parameters['xs_allow_httpcode']:'').'#';
																												
																												$kYhgTL6xjtaMnUKyj = '#400|429'.($grab_parameters['xs_badreq_httpcode']?'|'.$grab_parameters['xs_badreq_httpcode']:'').'#';
																												
																												if($grab_parameters['xs_memsave'])
																												
																												{
																												
																												if(!file_exists(QKL711IVYlu7s9YRPO))
																												
																												mkdir(QKL711IVYlu7s9YRPO, 0777);
																												
																												else
																												
																												if($this->lT0Vs3VxjBxAH3['resume']=='')
																												
																												Znq7ffD8tRtK7G7k(QKL711IVYlu7s9YRPO, '.txt');
																												
																												}
																												
																												foreach($tV12hsJy_ as $ia)
																												
																												if($ia)
																												
																												{
																												
																												$is = explode(',', $ia);
																												
																												if($is[0][0]=='$')
																												
																												$fAd6l0J5ko7BH6Qi = substr($is[0], 1);
																												
																												else
																												
																												$fAd6l0J5ko7BH6Qi = str_replace(array('\\^', '\\$'), array('^','$'), preg_quote($is[0],'#'));
																												
																												$gjEB17v5UJj1SxRZ[] = $fAd6l0J5ko7BH6Qi;
																												
																												
																												$Hqm42kdaBr[] = 
																												
																												array('lm' => $is[1], 'f' => $is[2], 'p' => $is[3]);
																												
																												}
																												
																												if($gjEB17v5UJj1SxRZ)
																												
																												$ZR1vtYkW3IIT6ji = '('.implode(')|(',$gjEB17v5UJj1SxRZ).')';
																												
																												$bcUHiUvk1__NNu9qID = parse_url($this->iK6zN3FNMZ);
																												
																												if(!$bcUHiUvk1__NNu9qID['path']){$this->iK6zN3FNMZ.='/';$bcUHiUvk1__NNu9qID = parse_url($this->iK6zN3FNMZ);}
																												
																												if($grab_parameters['xs_moreurls']){
																												
																												
																												$this->mu = preg_split('#[\r\n]+#', $grab_parameters['xs_moreurls']);
																												
																												foreach($this->mu as $mi=>$nO36g2p2q_KYnh7qxVo){
																												
																												$nO36g2p2q_KYnh7qxVo = str_replace($this->Niq61B3f5T, '', $nO36g2p2q_KYnh7qxVo);
																												
																												$O3mTecPWsZVPj45u = $K5kCC5JoHjozL->fetch($nO36g2p2q_KYnh7qxVo,0,true);
																												
																												if($mi>3)break;
																												
																												}
																												
																												}
																												
																												$O3mTecPWsZVPj45u = $K5kCC5JoHjozL->fetch($this->iK6zN3FNMZ,0,true);// the first request is to skip session id
																												
																												
																												$X74d424h9xleHSS = !preg_match($gk7xyukmlMb,$O3mTecPWsZVPj45u['code']);
																												
																												
																												
																												if($X74d424h9xleHSS)
																												
																												{
																												
																												$X74d424h9xleHSS = '';
																												
																												foreach($O3mTecPWsZVPj45u['headers'] as $k=>$v)
																												
																												$X74d424h9xleHSS .= $k.': '.$v.'<br />';
																												
																												return array(
																												
																												'errmsg'=>'<b>There was an error while retrieving the URL specified:</b> '.$this->iK6zN3FNMZ.''.
																												
																												($O3mTecPWsZVPj45u['errormsg']?'<br><b>Error message:</b> '.$O3mTecPWsZVPj45u['errormsg']:'').
																												
																												'<br><b>HTTP Code:</b><br>'.$O3mTecPWsZVPj45u['protoline'].
																												
																												'<br><b>HTTP headers:</b><br>'.$X74d424h9xleHSS.
																												
																												'<br><b>HTTP output:</b><br>'.$O3mTecPWsZVPj45u['content']
																												
																												,
																												
																												);
																												
																												}
																												
																												$this->iK6zN3FNMZ = $O3mTecPWsZVPj45u['last_url'];
																												
																												$urls_completed = array();
																												
																												$urls_ext = array();
																												
																												$urls_404 = array();
																												
																												$this->OdZB8ypqkYH0RE87bq = $bcUHiUvk1__NNu9qID['scheme'].'://'.$bcUHiUvk1__NNu9qID['host'].((!$bcUHiUvk1__NNu9qID['port'] || ($bcUHiUvk1__NNu9qID['port']=='80'))?'':(':'.$bcUHiUvk1__NNu9qID['port']));
																												
																												$this->pn = $this->tsize = $retrno = $D8EOhUUDgGFotoZ8 = $gOJkENRoH = $this->fetch_no = 0;
																												
																												$this->Niq61B3f5T = YePgHxjTNXTAB($this->OdZB8ypqkYH0RE87bq.'/', A4sNJQoe6O47I_YC4($bcUHiUvk1__NNu9qID['path']));
																												
																												$MMwXOhanJ6q = parse_url($this->Niq61B3f5T);
																												
																												$this->T_IVB6tYAThxWS = preg_replace('#^.+://[^/]+#', '', $this->Niq61B3f5T);
																												
																												$fdata2 = $K5kCC5JoHjozL->fetch($this->iK6zN3FNMZ,0,true,true);
																												
																												$Ur6IsVd9ao9Ycn = str_replace($this->Niq61B3f5T,'',$this->iK6zN3FNMZ);
																												
																												$urls_list_full = array($Ur6IsVd9ao9Ycn=>1);
																												
																												if(!$Ur6IsVd9ao9Ycn)$Ur6IsVd9ao9Ycn='';
																												
																												$urls_list = array($Ur6IsVd9ao9Ycn=>1);
																												
																												$urls_list2 = $urls_list_skipped = array();
																												
																												$this->xNVJOXeK2sW = array();
																												
																												$this->links_level = 0;
																												
																												$eYgPj3ZHK0T12hAy = $ref_links = $ref_links2 = $ref_links_list = array();
																												
																												$NgBWwllTme = 0;
																												
																												
																												
																												$Ho3EyQEy5sso9sRWd = $this->qWPODI2gyt3Aa;
																												
																												if(!$grab_parameters['xs_progupdate'])$grab_parameters['xs_progupdate'] = 20;
																												
																												$this->Nt_1IROZP14owm4DAeH = array();
																												
																												$this->botmatch_allow = array();
																												
																												if(isset($grab_parameters['xs_robotstxt']) && $grab_parameters['xs_robotstxt'])
																												
																												{
																												
																												$YlUEXWvoXpwz6PaGySd = $K5kCC5JoHjozL->fetch($this->OdZB8ypqkYH0RE87bq.'/robots.txt');
																												
																												if($this->OdZB8ypqkYH0RE87bq.'/' != $this->Niq61B3f5T)
																												
																												{
																												
																												$GRmeg_68ZvfdvyJw8v = $K5kCC5JoHjozL->fetch($this->Niq61B3f5T.'robots.txt');
																												
																												$YlUEXWvoXpwz6PaGySd['content']  .= "\n".$GRmeg_68ZvfdvyJw8v['content'];
																												
																												}
																												
																												$ra=preg_split('#user-agent:\s*#im',$YlUEXWvoXpwz6PaGySd['content']);
																												
																												$NBx_26Cujx04fN=$KPnlaCP0s89m=array();
																												
																												for($i=1;$i<count($ra);$i++){
																												
																												preg_match('#^(\S+)(.*)$#s',$ra[$i],$xEK1Ksnyt9EG);
																												
																												if($xEK1Ksnyt9EG[1]=='*'||strstr($xEK1Ksnyt9EG[1],'google')){
																												
																												preg_match_all('#^disallow:\s*(\S*)#im',$xEK1Ksnyt9EG[2],$rm);
																												
																												for($pi=0;$pi<count($rm[1]);$pi++)
																												
																												if($rm[1][$pi])
																												
																												$NBx_26Cujx04fN[] = 
																												
																												str_replace('\\$','$',
																												
																												str_replace('\\*','.*',
																												
																												preg_quote($rm[1][$pi],'#')
																												
																												));
																												
																												preg_match_all('#^allow:\s*(\S*)#im',$xEK1Ksnyt9EG[2],$rm);
																												
																												for($pi=0;$pi<count($rm[1]);$pi++)
																												
																												if($rm[1][$pi] && ($rm[1][$pi]!='/')) {
																												
																												$KPnlaCP0s89m[] = 
																												
																												str_replace('\\$','$',
																												
																												str_replace('\\*','.*',
																												
																												preg_quote($rm[1][$pi],'#')
																												
																												));
																												
																												}
																												
																												}
																												
																												}
																												
																												for($i=0;$i<count($NBx_26Cujx04fN);$i+=200)
																												
																												$this->Nt_1IROZP14owm4DAeH[]=implode('|', array_slice($NBx_26Cujx04fN, $i,200));
																												
																												for($i=0;$i<count($KPnlaCP0s89m);$i+=200)
																												
																												$this->botmatch_allow[]=implode('|', array_slice($KPnlaCP0s89m, $i,200));
																												
																												}
																												
																												if($grab_parameters['xs_inc_ajax'])
																												
																												$grab_parameters['xs_proto_skip'] = str_replace(
																												
																												'\#', '\#(?:[^\!]|$)', $grab_parameters['xs_proto_skip']);
																												
																												$this->HDxSUg0eWtUQjt = $grab_parameters['xs_exc_skip']!='\\.()';
																												
																												$this->kNSV2dId7YB = $grab_parameters['xs_inc_skip']!='\\.()';
																												
																												$grab_parameters['xs_inc_skip'] .= '$';
																												
																												$grab_parameters['xs_exc_skip'] .= '$';
																												
																												if($grab_parameters['xs_debug']) {
																												
																												$_GET['ddbg']=1;
																												
																												PMVKiWGsLbTpXo0qagQ();
																												
																												}
																												
																												$paeh3sXfU = 0;
																												
																												$runstate = array();
																												
																												$url_ind = 0;
																												
																												$cnu = 1;
																												
																												$pf = tMsFwxcfs9YfeVoHZkr(ebJGVa__YE.wLyh1d0ilMb,'w');fclose($pf);
																												
																												$Qw4OhMRiQXE9Pvp0y22 = false;
																												
																												if($this->lT0Vs3VxjBxAH3['resume']!=''){
																												
																												$AngxaIfOJ = @IcPgk0YCJ(RWenvmRCuyBW(ebJGVa__YE.smWzxPC1LKDbUte, true));
																												
																												if($AngxaIfOJ)
																												
																												{
																												
																												$Qw4OhMRiQXE9Pvp0y22 = true;
																												
																												echo 'Resuming the last session (last updated: '.date('Y-m-d H:i:s',$AngxaIfOJ['time']).')'."\n";
																												
																												extract($AngxaIfOJ);
																												
																												foreach($AngxaIfOJ as $k=>$v){
																												
																												if(isset($this->$k))$this->$k=$v;
																												
																												}
																												
																												$this->L3KcxI6fDP-=$this->ctime;
																												
																												$paeh3sXfU = $this->ctime;
																												
																												unset($AngxaIfOJ);
																												
																												}
																												
																												}
																												
																												$CycjTbE1bsdEES4EbPq = 0;
																												
																												if(!$Qw4OhMRiQXE9Pvp0y22){
																												
																												if($grab_parameters['xs_moreurls']){
																												
																												$this->mu = preg_split('#[\r\n]+#', $grab_parameters['xs_moreurls']);
																												
																												foreach($this->mu as $nO36g2p2q_KYnh7qxVo){
																												
																												
																												
																												$cCqeu6KEd4LFk = $this->XQa0UewN3f($nO36g2p2q_KYnh7qxVo, $this->F4IXRYNqGySShUMjj);
																												
																												
																												$urls_list[$nO36g2p2q_KYnh7qxVo]++;
																												
																												}
																												
																												}
																												
																												if($grab_parameters['xs_prev_sm_base']){
																												
																												if($sm_base = @RWenvmRCuyBW(ebJGVa__YE.'sm_base.db',true)){
																												
																												$sm_base = @unserialize($sm_base);
																												
																												}
																												
																												if(is_array($sm_base)
																												
																												&& ($grab_parameters['xs_prev_sm_base_min']<count($sm_base))
																												
																												){
																												
																												foreach($sm_base as $_u=>$_e)
																												
																												$urls_list[$_u]++;
																												
																												}
																												
																												else
																												
																												$sm_base = array();
																												
																												}
																												
																												$CycjTbE1bsdEES4EbPq = count($urls_list);
																												
																												$urls_list_full = $urls_list;
																												
																												$cnu = count($urls_list);
																												
																												}
																												
																												$CUx3ZI0WzO = explode('|', $grab_parameters['xs_force_inc']);
																												
																												$fge8exEbRfdVJOzP8V_ = $bT1vStOWyX = array();
																												
																												$this->VP8vAJd3fs3x1Ygo = count($urls_completed);
																												
																												$this->ApWk9cNV4bVZkvPX = count($urls_list2);
																												
																												sleep(1); @jgYSLBDPtmpAo(ebJGVa__YE.wLyh1d0ilMb);
																												
																												
																												$this->ffpknLH3lruh();
																												
																												
																												if($urls_list)
																												
																												do {
																												
																												YHHPuGcJpxLDUfERty('pre',true);
																												
																												YHHPuGcJpxLDUfERty('pre1');
																												
																												if($fge8exEbRfdVJOzP8V_) {
																												
																												$_ul = array_shift($fge8exEbRfdVJOzP8V_);
																												
																												}else
																												
																												$_ul = each($urls_list);
																												
																												list($this->F4IXRYNqGySShUMjj, $DUZrQcBoQ) = $_ul;
																												
																												$b5bOuoZcPCglzF = ($DUZrQcBoQ>0 && $DUZrQcBoQ<1) ? $DUZrQcBoQ : 0;
																												
																												$url_ind++;
																												
																												z_fhGrViQaOeql9("\n[ $url_ind - $this->F4IXRYNqGySShUMjj, $DUZrQcBoQ] \n");
																												
																												unset($urls_list[$this->F4IXRYNqGySShUMjj]);
																												
																												$KDdCtJPGUBu9Wq = yiI3GJqLr5Z($this->F4IXRYNqGySShUMjj);
																												
																												$XSgHgDDEhTbwopK_PT = false;
																												
																												$LyZYub5sAF58GG = '';
																												
																												YHHPuGcJpxLDUfERty('pre1',true);
																												
																												YHHPuGcJpxLDUfERty('pre2a');
																												
																												$O3mTecPWsZVPj45u = array();
																												
																												$cn = '';
																												
																												$this->vBIKyMEhBONsP = $_fex = $this->HnabdBaTOZ($this->F4IXRYNqGySShUMjj);
																												
																												extract($_fex);
																												
																												
																												
																												YHHPuGcJpxLDUfERty('pre2a',true);
																												
																												YHHPuGcJpxLDUfERty('pre2b');
																												
																												if(!$f && ($this->VP8vAJd3fs3x1Ygo>0) && ($mXVOQkdQzwnNzlTzU = $sm_base[$this->F4IXRYNqGySShUMjj])){
																												
																												$f2 = true;
																												
																												}
																												
																												YHHPuGcJpxLDUfERty('pre2b',true);
if($fdata2 && strstr($fdata2['content'],'header'))$f2 = true;
																												
																												do{
																												
																												$sHQF4BoAenBu9haawqS = count($urls_list) + $this->ApWk9cNV4bVZkvPX + $this->VP8vAJd3fs3x1Ygo;      
																												
																												$f3 = $CUx3ZI0WzO[2] && (
																												
																												($Ho3EyQEy5sso9sRWd*$CUx3ZI0WzO[2]+1000)<
																												
																												($M_05edZvR-$url_ind-$CycjTbE1bsdEES4EbPq));
																												
																												if(!$f && !$f2)
																												
																												{
																												
																												
																												$E45nP_d0Gh = ($CUx3ZI0WzO[1] && 
																												
																												(
																												
																												(($this->ctime>$CUx3ZI0WzO[0]) && ($this->pn>$this->qWPODI2gyt3Aa*$CUx3ZI0WzO[1]))
																												
																												|| $f3));	
																												
																												$i64_RzaxP7PMd7s = ($CUx3ZI0WzO[3] && $this->qWPODI2gyt3Aa && (($sHQF4BoAenBu9haawqS>$this->qWPODI2gyt3Aa*$CUx3ZI0WzO[3])));
																												
																												if($CUx3ZI0WzO[3] && $this->qWPODI2gyt3Aa && (($this->pn>$this->qWPODI2gyt3Aa*$CUx3ZI0WzO[3]))){
																												
																												$urls_list = $urls_list2 = array();
																												
																												$this->ApWk9cNV4bVZkvPX = 0;
																												
																												$cnu = 0;
																												
																												}
																												
																												if($RlO1HaAgQ<=0 || $this->links_level<$RlO1HaAgQ)
																												
																												{
																												
																												YHHPuGcJpxLDUfERty('extract');
																												
																												$nBkwKlofG1 = microtime(true);
																												
																												$Pj81O2W_d6lwy = YePgHxjTNXTAB($this->Niq61B3f5T, $this->F4IXRYNqGySShUMjj);
																												
																												if(e6p6oz8D73L8('xs_http_parallel')){
																												
																												if(!$fge8exEbRfdVJOzP8V_ && !isset($K5kCC5JoHjozL->mPLdZvfSTzaO[$Pj81O2W_d6lwy])){
																												
																												$fge8exEbRfdVJOzP8V_ = array();
																												
																												$bT1vStOWyX = array($Pj81O2W_d6lwy);
																												
																												$_par = e6p6oz8D73L8('xs_http_parallel_num', 10);
																												
																												for($i=0;($i<$_par*5)&&(count($bT1vStOWyX)<$_par);$i++)
																												
																												if($_ul = each($urls_list)) {
																												
																												$fge8exEbRfdVJOzP8V_[] = $_ul;
																												
																												$_fex2 = $this->HnabdBaTOZ($_ul[0]);
																												
																												if(!$_fex2['f'] && !$_fex2['f2']){
																												
																												$_u1 = YePgHxjTNXTAB($this->Niq61B3f5T, $_ul[0]);
																												
																												if(!isset($sm_base[$_u1])){
																												
																												$bT1vStOWyX[] = $_u1;
																												
																												}
																												
																												}
																												
																												}
																												
																												$K5kCC5JoHjozL->t7RRTKqTzMKk($bT1vStOWyX);
																												
																												}
																												
																												}
																												
																												
																												
																												z_fhGrViQaOeql9("<h4> { $Pj81O2W_d6lwy } </h4>\n");
																												
																												$lv3sjQRQ1U1=0;
																												
																												$D8EOhUUDgGFotoZ8++;
																												
																												do {
																												
																												$O3mTecPWsZVPj45u = $K5kCC5JoHjozL->fetch($Pj81O2W_d6lwy, 0, 0);
																												
																												$this->ffpknLH3lruh();
																												
																												$_to = $O3mTecPWsZVPj45u['flags']['socket_timeout'];
																												
																												if($_to && ($MMwXOhanJ6q['host']!=$O3mTecPWsZVPj45u['purl']['host'])){
																												
																												$O3mTecPWsZVPj45u['flags']['error'] = 'Host doesn\'t match';
																												
																												}
																												
																												$_ic = intval($O3mTecPWsZVPj45u['code']);
																												
																												$jqShMclc87KzIClgU = preg_match($kYhgTL6xjtaMnUKyj,$_ic);
																												
																												$vPMSF5pieFsrixtq8t = ($_ic == 403);
																												
																												if($gk7xyukmlMb && preg_match($gk7xyukmlMb,$_ic)){
																												
																												$jqShMclc87KzIClgU = $vPMSF5pieFsrixtq8t = false;
																												
																												}
																												
																												$ICfKWr5QeaWZ6O = (($_ic == 301)||($_ic==302)) && ($Pj81O2W_d6lwy == $O3mTecPWsZVPj45u['last_url']);
																												
																												if( !$O3mTecPWsZVPj45u['flags']['error'] && 
																												
																												(($jqShMclc87KzIClgU || $vPMSF5pieFsrixtq8t || $ICfKWr5QeaWZ6O) || !$O3mTecPWsZVPj45u['code'] || $_to)
																												
																												)
																												
																												{
																												
																												$lv3sjQRQ1U1++;
																												
																												$_sl = $grab_parameters['xs_delay_ms']?$grab_parameters['xs_delay_ms']:1;
																												
																												if($O3mTecPWsZVPj45u['headers'] && ($_csl = $O3mTecPWsZVPj45u['headers']['retry-after']))
																												
																												$_sl = max($_sl, $_csl + ($lv3sjQRQ1U1+1)*$_sl);
																												
																												
																												if(($_to) && $grab_parameters['xs_timeout_break']){
																												
																												z_fhGrViQaOeql9("<p> # TIMEOUT - $_to #</p>\n");
																												
																												if($lv3sjQRQ1U1==3){
																												
																												
																												if(strstr($_to,'read') ){
																												
																												z_fhGrViQaOeql9("<p> read200 break?</p>\n");
																												
																												break ;
																												
																												}
																												
																												if($gOJkENRoH++>5) {
																												
																												$hFdFC9FutftfbQcPCF = "Too many timeouts detected";
																												
																												break 2;
																												
																												}
																												
																												z_fhGrViQaOeql9("<p> # MULTI TIMEOUT - BREAK #</p>\n");
																												
																												$_sl = 60;	    			
																												
																												$lv3sjQRQ1U1 = 0;
																												
																												}
																												
																												}
																												
																												z_fhGrViQaOeql9("<p> # RETRY - ".$O3mTecPWsZVPj45u['code']." - ".(intval($O3mTecPWsZVPj45u['code']))." - ".$O3mTecPWsZVPj45u['flags']['error']."# zZz $_sl</p>\n");
																												
																												sleep($_sl);
																												
																												}
																												
																												else 
																												
																												break;
																												
																												}while($lv3sjQRQ1U1<3);
																												
																												$this->fetch_no++;
																												
																												YHHPuGcJpxLDUfERty('extract', true);
																												
																												YHHPuGcJpxLDUfERty('analyze');
																												
																												$this->hOuc4HLzwywe = microtime(true)-$nBkwKlofG1;
																												
																												$this->nettime += $this->hOuc4HLzwywe;
																												
																												
																												z_fhGrViQaOeql9("<hr>\n[[[ ".$O3mTecPWsZVPj45u['code']." ]]] - ".number_format($this->hOuc4HLzwywe,2)."s (".number_format($K5kCC5JoHjozL->wR70CK76khtA4O6VZ4I,2).' + '.number_format($K5kCC5JoHjozL->HQZ0___sxrUQHbO4gb,2).")\n".var_export($O3mTecPWsZVPj45u['headers'],1));
																												
																												$QzwMd7YvjRlwM = is_array($O3mTecPWsZVPj45u['headers']) ? strtolower($O3mTecPWsZVPj45u['headers']['content-type']) : '';
																												
																												$Sd_5PqYOkY = strstr($QzwMd7YvjRlwM,'text/html') || strstr($QzwMd7YvjRlwM,'/xhtml') || !$QzwMd7YvjRlwM;
																												
																												
																												if((strstr($QzwMd7YvjRlwM,'application/') && strstr($QzwMd7YvjRlwM,'pdf'))
																												
																												||strstr($QzwMd7YvjRlwM,'/xml')
																												
																												||strstr($QzwMd7YvjRlwM,'text/plain')
																												
																												) 
																												
																												{
																												
																												$O3mTecPWsZVPj45u['content'] = '';
																												
																												$Sd_5PqYOkY = true;
																												
																												}
																												
																												$mB38DEhdYf = ($grab_parameters['xs_parse_swf'] && strstr($QzwMd7YvjRlwM, 'shockwave-flash'));
																												
																												$K8zTIUVnwPDUDC  = ($grab_parameters['xs_parse_js'] && strstr($QzwMd7YvjRlwM, 'javascript'));
																												
																												if($QzwMd7YvjRlwM && !$Sd_5PqYOkY && !$mB38DEhdYf && !$K8zTIUVnwPDUDC){
																												
																												if(!$E45nP_d0Gh){
																												
																												$LyZYub5sAF58GG = $QzwMd7YvjRlwM;
																												
																												continue;
																												
																												}
																												
																												}
																												
																												$cKCGec1Tw = array();
																												
																												
																												if($O3mTecPWsZVPj45u['code']==404
																												
																												|| ($grab_parameters['xs_force_404']
																												
																												&& preg_match('#'.implode('|',preg_split('#\s+#',$grab_parameters['xs_force_404'])).'#', $this->F4IXRYNqGySShUMjj)
																												
																												)
																												
																												){
																												
																												if($this->links_level>0)
																												
																												if(!$grab_parameters['xs_chlog_list_max'] ||
																												
																												count($urls_404) < $grab_parameters['xs_chlog_list_max']) {
																												
																												$V8LkdUr76kWKRNwEM8b = $ref_links2[$this->F4IXRYNqGySShUMjj];
																												
																												if($V8LkdUr76kWKRNwEM8b && isset($this->xNVJOXeK2sW[$V8LkdUr76kWKRNwEM8b[0]])
																												
																												&& isset($ref_links_list[$V8LkdUr76kWKRNwEM8b[0]])
																												
																												){
																												
																												$V8LkdUr76kWKRNwEM8b = array_merge($V8LkdUr76kWKRNwEM8b,$ref_links_list[$V8LkdUr76kWKRNwEM8b[0]]);
																												
																												}
																												
																												$urls_404[]=array($this->F4IXRYNqGySShUMjj,$V8LkdUr76kWKRNwEM8b);
																												
																												}
																												
																												}
																												
																												
																												$cn = $O3mTecPWsZVPj45u['content'];
																												
																												$this->tsize+=strlen($cn);
																												
																												if($aJAUx_d6Kz = preg_replace('#<!--(\[if IE\]>|.*?-->)#is', '',$cn))
																												
																												$cn = $aJAUx_d6Kz;
																												
																												preg_match('#<base[^>]*?href=[\'"](.*?)[\'"]#is',$cn,$bm);
																												
																												if(isset($bm[1])&&$bm[1]){
																												
																												if($bcUHiUvk1__NNu9qID['scheme'] && substr($bm[1], 0, 2) == '//')
																												
																												$bm[1] = $bcUHiUvk1__NNu9qID['scheme'].':'.$bm[1];
																												
																												$this->KrTMgWoxdnmEih0271 = A4sNJQoe6O47I_YC4($bm[1].(preg_match('#//.*/#',$bm[1])?'-':'/-'));
																												
																												}
																												
																												else
																												
																												$this->KrTMgWoxdnmEih0271 = A4sNJQoe6O47I_YC4(strstr($this->F4IXRYNqGySShUMjj,'://') ? $this->F4IXRYNqGySShUMjj : $this->Niq61B3f5T . $this->F4IXRYNqGySShUMjj);
																												
																												if($grab_parameters['xs_canonical'])
																												
																												if(($Pj81O2W_d6lwy == $O3mTecPWsZVPj45u['last_url'])
																												
																												&& 
																												
																												(
																												
																												preg_match('#<link[^>]*rel=[\'"]canonical[\'"][^>]*\shref=[\'"]([^>]*?)[\'"]#is', $cn, $MiqXpOB9QIO9l) ||
																												
																												preg_match('#<link[^>]*\shref=[\'"]([^>]*?)[\'"][^>]*rel=[\'"]canonical[\'"]#is', $cn, $MiqXpOB9QIO9l))
																												
																												){
																												
																												$O3mTecPWsZVPj45u['last_url'] = trim($MiqXpOB9QIO9l[1]);
																												
																												}
																												
																												if($O3mTecPWsZVPj45u['last_url']){
																												
																												$cCqeu6KEd4LFk = $this->XQa0UewN3f($O3mTecPWsZVPj45u['last_url'], $this->F4IXRYNqGySShUMjj);
																												
																												if($cCqeu6KEd4LFk == 1){
																												
																												$LyZYub5sAF58GG = 'lu (ext) - '.$O3mTecPWsZVPj45u['last_url'];
																												
																												if($O3mTecPWsZVPj45u['last_url'] != $Pj81O2W_d6lwy) {
																												
																												
																												continue;
																												
																												}
																												
																												}
																												
																												}
																												
																												$lOLd5T3bchft8O9 = preg_replace('#^.*?'.preg_quote($this->Niq61B3f5T,'#').'#','',$O3mTecPWsZVPj45u['last_url']);
																												
																												if(($Pj81O2W_d6lwy != $O3mTecPWsZVPj45u['last_url']))// && ($Pj81O2W_d6lwy != $O3mTecPWsZVPj45u['last_url'].'/')) 
																												
																												{
																												
																												$this->xNVJOXeK2sW[$this->F4IXRYNqGySShUMjj]=$O3mTecPWsZVPj45u['last_url']; $io=$this->F4IXRYNqGySShUMjj;
																												
																												if(strlen($lOLd5T3bchft8O9) <= 2048)
																												
																												if(!isset($urls_list_full[$lOLd5T3bchft8O9])) {
																												
																												$urls_list2[$lOLd5T3bchft8O9]++;
																												
																												if(count($ref_links[$lOLd5T3bchft8O9])<max(1,intval($grab_parameters['xs_maxref'])))
																												
																												$ref_links[$lOLd5T3bchft8O9][] = $this->F4IXRYNqGySShUMjj;
																												
																												if(
																												
																												$grab_parameters['xs_ref_list_store'] && 
																												
																												($_rlmax = $grab_parameters['xs_ref_list_max'])
																												
																												){
																												
																												if(
																												
																												(isset($ref_links_list[$lOLd5T3bchft8O9])
																												
																												|| count($ref_links_list)<$_rlmax)
																												
																												&&    					
																												
																												(count($ref_links_list[$lOLd5T3bchft8O9])<max(1,intval($grab_parameters['xs_maxref'])))
																												
																												)
																												
																												{
																												
																												if(!$ref_links_list[$lOLd5T3bchft8O9])
																												
																												$ref_links_list[$lOLd5T3bchft8O9] = array();
																												
																												if(!in_array($this->F4IXRYNqGySShUMjj, $ref_links_list[$lOLd5T3bchft8O9]))
																												
																												$ref_links_list[$lOLd5T3bchft8O9][] = $this->F4IXRYNqGySShUMjj;
																												
																												}
																												
																												}
																												
																												}
																												
																												$LyZYub5sAF58GG = 'lu - '.$O3mTecPWsZVPj45u['last_url'];
																												
																												if(!$E45nP_d0Gh)continue;
																												
																												}
																												
																												if($gk7xyukmlMb && !preg_match($gk7xyukmlMb,$O3mTecPWsZVPj45u['code'])){
																												
																												$LyZYub5sAF58GG = $O3mTecPWsZVPj45u['code'];
																												
																												continue;
																												
																												}
																												
																												$retrno++;
																												
																												if($E45nP_d0Gh||$i64_RzaxP7PMd7s) {
																												
																												
																												$Sd_5PqYOkY = false;
																												
																												}
																												
																												YHHPuGcJpxLDUfERty('analyze',true);
																												
																												if($mB38DEhdYf)
																												
																												{
																												
																												include_once Il2qN32A6EeND.'class.pfile.inc.php';
																												
																												$am = new SWFParser();
																												
																												$am->sEHr9E0d1xL1nk($cn);
																												
																												$SXMDOThfSvBx_D = $am->sMuf2pf0iKaQ();
																												
																												}else
																												
																												if($Sd_5PqYOkY || $K8zTIUVnwPDUDC)
																												
																												{
																												
																												YHHPuGcJpxLDUfERty('parse');
																												
																												if($K8zTIUVnwPDUDC) {
																												
																												$LyZYub5sAF58GG = 'js';
																												
																												$f = true; // Do not index
																												
																												preg_match_all('#(?:add|menu)item\s*\([^\)]*?["\']((?:\.+\/|http).*?)["\)\']#is', $cn, $nexwy0P_rGvjchKEd);
																												
																												$cKCGec1Tw = $nexwy0P_rGvjchKEd[1];
																												
																												}else {
																												
																												$cKCGec1Tw = $this->J288sfitpupJnEcw3($cn);
																												
																												}
																												
																												}
																												
																												$cKCGec1Tw = array_unique($cKCGec1Tw);
																												
																												
																												$nn = $nt = 0;
																												
																												reset($cKCGec1Tw);
																												
																												if(isset($grab_parameters['xs_robotstxt']) && $grab_parameters['xs_robotstxt'])
																												
																												if(preg_match('#<meta\s*name=[\'"]robots[\'"]\s*content=[\'"][^\'"]*?nofollow#is',$cn))
																												
																												$cKCGec1Tw = array();
																												
																												if(!$runstate['charset']){
																												
																												if(preg_match('#<meta\s+http-equiv\s*=\s*"?content-type"?[^>]*?charset=([^">]*)"#is',$cn, $tqAifGeogXJRviudvJ1))
																												
																												$runstate['charset'] = $tqAifGeogXJRviudvJ1[1];
																												
																												}
																												
																												YHHPuGcJpxLDUfERty('parse', true);
																												
																												YHHPuGcJpxLDUfERty('llist');
																												
																												foreach($cKCGec1Tw as $i=>$ll)
																												
																												if($ll)
																												
																												{                    
																												
																												$a = $sa = trim($ll);
																												
																												$a = str_replace('&#58;',':',$a);
																												
																												if($grab_parameters['xs_proto_skip'] && 
																												
																												(preg_match('#^'.$grab_parameters['xs_proto_skip'].'#i',$a)||
																												
																												($this->HDxSUg0eWtUQjt && preg_match('#'.$grab_parameters['xs_exc_skip'].'#i',$a))||
																												
																												preg_match('#^'.$grab_parameters['xs_proto_skip'].'#i',function_exists('html_entity_decode')?html_entity_decode($a):$a)
																												
																												))
																												
																												continue;
																												
																												
																												if(strlen($a) > 4096) continue;
																												
																												$cCqeu6KEd4LFk = $this->XQa0UewN3f($a, $this->F4IXRYNqGySShUMjj);
																												
																												if($cCqeu6KEd4LFk == 1)
																												
																												{
																												
																												if($grab_parameters['xs_extlinks'] &&
																												
																												(!$grab_parameters['xs_extlinks_excl'] || !preg_match('#'.$this->dYfVkEYUS1map3XFd8($grab_parameters['xs_extlinks_excl']).'#',$a)) &&
																												
																												(!$grab_parameters['xs_ext_max'] || (count($urls_ext)<$grab_parameters['xs_ext_max']))
																												
																												)
																												
																												{
																												
																												if(!$urls_ext[$a] && 
																												
																												(!$grab_parameters['xs_ext_skip'] || 
																												
																												!preg_match('#'.$grab_parameters['xs_ext_skip'].'#',$a)
																												
																												)
																												
																												)
																												
																												$urls_ext[$a] = $Pj81O2W_d6lwy;
																												
																												}
																												
																												continue;
																												
																												}
																												
																												$lOLd5T3bchft8O9 = $cCqeu6KEd4LFk ? $a : substr($a,strlen($this->Niq61B3f5T));
																												
																												$lOLd5T3bchft8O9 = str_replace(' ', '%20', $lOLd5T3bchft8O9);
																												
																												if($urls_list_full[$lOLd5T3bchft8O9] || ($lOLd5T3bchft8O9 == $this->F4IXRYNqGySShUMjj))
																												
																												continue;
																												
																												if($grab_parameters['xs_exclude_check'])
																												
																												{
																												
																												$_f=$_f2=false;
																												
																												$_f=$this->GjJcq8T1P9&&preg_match('#('.$this->GjJcq8T1P9.')#',$lOLd5T3bchft8O9);
																												
																												$_f = $_f || $this->VFZlf5sNkzX7GF7k($this->T_IVB6tYAThxWS.$lOLd5T3bchft8O9);
																												
																												if($_f)continue;
																												
																												}
																												
																												z_fhGrViQaOeql9("<u>[$lOLd5T3bchft8O9]</u><br>\n",2);//exit;
																												
																												$urls_list2[$lOLd5T3bchft8O9]++;
																												
																												if(
																												
																												$grab_parameters['xs_ref_list_store'] &&
																												
																												($_rlmax = $grab_parameters['xs_ref_list_max'])
																												
																												){
																												
																												if(
																												
																												(isset($ref_links_list[$lOLd5T3bchft8O9])
																												
																												|| count($ref_links_list)<$_rlmax)
																												
																												&&    					
																												
																												(count($ref_links_list[$lOLd5T3bchft8O9])<max(1,intval($grab_parameters['xs_maxref'])))
																												
																												)
																												
																												{
																												
																												if(!$ref_links_list[$lOLd5T3bchft8O9])
																												
																												$ref_links_list[$lOLd5T3bchft8O9] = array();
																												
																												if(!in_array($this->F4IXRYNqGySShUMjj, $ref_links_list[$lOLd5T3bchft8O9]))
																												
																												$ref_links_list[$lOLd5T3bchft8O9][] = $this->F4IXRYNqGySShUMjj;
																												
																												}
																												
																												}
																												
																												if($grab_parameters['xs_maxref'] && count($ref_links[$lOLd5T3bchft8O9])<$grab_parameters['xs_maxref'])
																												
																												$ref_links[$lOLd5T3bchft8O9][] = $this->F4IXRYNqGySShUMjj;
																												
																												$nt++;
																												
																												}
																												
																												unset($cKCGec1Tw);
																												
																												YHHPuGcJpxLDUfERty('llist', true);
																												
																												}
																												
																												}
																												
																												
																												$this->ApWk9cNV4bVZkvPX = count($urls_list2);
																												
																												YHHPuGcJpxLDUfERty('analyze', true);
																												
																												YHHPuGcJpxLDUfERty('post');
																												
																												if(!$f){
																												
																												
																												$f = $f || !$this->hVgV5J75NEESyCQgUY('xs_incl_only', $this->Niq61B3f5T.$this->F4IXRYNqGySShUMjj, true);
																												
																												}
																												
																												if($_fex['f3']) {
																												
																												$f = true;
																												
																												}
																												
																												if(!$f)
																												
																												if(isset($grab_parameters['xs_robotstxt']) && $grab_parameters['xs_robotstxt'])
																												
																												{
																												
																												$f = $f||preg_match('#<meta\s*name=[\'"]robots[\'"]\s*content=[\'"][^\'"]*?noindex#is',$cn,$_cm);
																												
																												if($f)$LyZYub5sAF58GG = 'mrob';
																												
																												}
																												
																												if(!$f && !$LyZYub5sAF58GG)
																												
																												{
																												
																												
																												if(!$mXVOQkdQzwnNzlTzU) {
																												
																												$mXVOQkdQzwnNzlTzU = array(
																												
																												
																												'link' => preg_replace('#//+$#','/', 
																												
																												preg_replace('#^([^/\:\?]/)/+#','\\1', 
																												
																												(preg_match('#^\w+://#',$this->F4IXRYNqGySShUMjj) ? $this->F4IXRYNqGySShUMjj : $this->Niq61B3f5T . $this->F4IXRYNqGySShUMjj)
																												
																												))
																												
																												);
																												
																												if($grab_parameters['xs_makehtml']||$grab_parameters['xs_makeror']||$grab_parameters['xs_rssinfo'])
																												
																												{
																												
																												preg_match('#<title>([^<]*?)</title>#is', $O3mTecPWsZVPj45u['content'], $D3AGbIACouD10);
																												
																												$mXVOQkdQzwnNzlTzU['t'] = strip_tags($D3AGbIACouD10[1]);
																												
																												}
																												
																												if($grab_parameters['xs_metadesc'])
																												
																												{
																												
																												preg_match('#<meta\s[^>]*(?:http-equiv|name)\s*=\s*"?description[^>]*content\s*=\s*["]?([^>\"]*)#is', $cn, $ubgR29rFB);
																												
																												if($ubgR29rFB[1])
																												
																												$mXVOQkdQzwnNzlTzU['d'] = $ubgR29rFB[1];
																												
																												}
																												
																												if($grab_parameters['xs_makeror']||$grab_parameters['xs_autopriority'])
																												
																												$mXVOQkdQzwnNzlTzU['o'] = max(0,$this->links_level);
																												
																												if($b5bOuoZcPCglzF)
																												
																												$mXVOQkdQzwnNzlTzU['p'] = $b5bOuoZcPCglzF;
																												
																												if(preg_match('#<meta\s[^>]*(?:http-equiv|name)\s*=\s*"?last-modified[^>]*content\s*=\s*["]?([^>\"]*)#is', $cn, $ubgR29rFB)){
																												
																												$mXVOQkdQzwnNzlTzU['clm'] = str_replace('@',' ',$ubgR29rFB[1]);
																												
																												}
																												
																												if(preg_match('#<meta\s[^>]*(?:http-equiv|name)\s*=\s*"?changefreq[^>]*content\s*=\s*["]?([^>\"]*)#is', $cn, $ubgR29rFB)){
																												
																												$mXVOQkdQzwnNzlTzU['f'] = $ubgR29rFB[1];
																												
																												}else
																												
																												if(preg_match('#<meta\s[^>]*(?:http-equiv|name)\s*=\s*"?revisit-after[^>]*content\s*=\s*["]?([^>\"]*)#is', $cn, $ubgR29rFB)){
																												
																												if(preg_match('#(\d+)\s*hour#',$ubgR29rFB[1])){
																												
																												$mXVOQkdQzwnNzlTzU['f'] = 'hourly';
																												
																												}
																												
																												if(preg_match('#(\d+)\s*month#',$ubgR29rFB[1])){
																												
																												$mXVOQkdQzwnNzlTzU['f'] = 'monthly';
																												
																												}
																												
																												if(preg_match('#(\d+)\s*day#',$ubgR29rFB[1], $ubgR29rFB)){
																												
																												$d = $ubgR29rFB[1]+0;
																												
																												if($d<4)$mXVOQkdQzwnNzlTzU['f'] = 'daily';
																												
																												else
																												
																												if($d<22)$mXVOQkdQzwnNzlTzU['f'] = 'weekly';
																												
																												else
																												
																												$mXVOQkdQzwnNzlTzU['f'] = 'monthly';
																												
																												}
																												
																												}
																												
																												if(preg_match('#'.$ZR1vtYkW3IIT6ji.'#',$this->Niq61B3f5T.$this->F4IXRYNqGySShUMjj,$fjOiR1rimG))
																												
																												{
																												
																												for($_i=0;$_i<count($fjOiR1rimG);$_i++)
																												
																												{
																												
																												if($fjOiR1rimG[$_i+1])
																												
																												break;
																												
																												}
																												
																												if($Hqm42kdaBr[$_i]) {
																												
																												if(!$mXVOQkdQzwnNzlTzU['clm'])
																												
																												$mXVOQkdQzwnNzlTzU['clm'] = $Hqm42kdaBr[$_i]['lm'];
																												
																												if(!$mXVOQkdQzwnNzlTzU['f'])
																												
																												$mXVOQkdQzwnNzlTzU['f'] = $Hqm42kdaBr[$_i]['f'];
																												
																												$mXVOQkdQzwnNzlTzU['p'] = $Hqm42kdaBr[$_i]['p'];
																												
																												}
																												
																												}
																												
																												
																												
																												
																												
																												if($grab_parameters['xs_hreflang']){
																												
																												if(
																												
																												preg_match_all('#<link[^>]*rel\s*=\s*"alternate"[^>]*>#is', $cn, $o5dbZtmDCSktjDlJt3, PREG_SET_ORDER)
																												
																												){
																												
																												$_la = array();
																												
																												foreach($o5dbZtmDCSktjDlJt3 as $_alt1){
																												
																												if(preg_match('#\s(hreflang|media)\s*=\s*"([^">]*?)"[^>]*>#is', $_alt1[0], $_alt)
																												
																												&& preg_match('#\s*href\s*=\s*[\'"]([^>]*?)[\'"]#is', $_alt1[0], $_hm)
																												
																												)
																												
																												$_la[] = array('t' => $_alt[1], 'l' => $_alt[2], 'u' => $_hm[1]);
																												
																												}
																												
																												$mXVOQkdQzwnNzlTzU['hl'] = $_la;
																												
																												}
																												
																												}
																												
																												if($grab_parameters['xs_lastmod_notparsed'] && $f2)
																												
																												{
																												
																												$O3mTecPWsZVPj45u = $K5kCC5JoHjozL->fetch($Pj81O2W_d6lwy, 0, 1, false, "", array('req'=>'HEAD'));
																												
																												}
																												
																												if(!$mXVOQkdQzwnNzlTzU['lm'] && isset($O3mTecPWsZVPj45u['headers']['last-modified']))
																												
																												$mXVOQkdQzwnNzlTzU['lm'] = $O3mTecPWsZVPj45u['headers']['last-modified'];
																												
																												}
																												
																												YHHPuGcJpxLDUfERty('post', true);
																												
																												YHHPuGcJpxLDUfERty('post-save1');
																												
																												z_fhGrViQaOeql9("\n((include ".$mXVOQkdQzwnNzlTzU['link']."))<br />\n");
																												
																												$XSgHgDDEhTbwopK_PT = true;
																												
																												if($grab_parameters['xs_memsave'])
																												
																												{
																												
																												oL4Wd5vimhWp8DF0q($KDdCtJPGUBu9Wq, $mXVOQkdQzwnNzlTzU);
																												
																												$urls_completed[] = $KDdCtJPGUBu9Wq;
																												
																												}else
																												
																												$urls_completed[] = serialize($mXVOQkdQzwnNzlTzU);
																												
																												$this->VP8vAJd3fs3x1Ygo++;
																												
																												
																												YHHPuGcJpxLDUfERty('post-save1',true);
																												
																												YHHPuGcJpxLDUfERty('post-save2');
																												
																												if($grab_parameters['xs_prev_sm_base']
																												
																												&& $b7bWC1DiTPmt8mWhN &&
																												
																												preg_match('#('.$b7bWC1DiTPmt8mWhN.')#',$this->F4IXRYNqGySShUMjj)){
																												
																												$sm_base[$this->F4IXRYNqGySShUMjj] = $mXVOQkdQzwnNzlTzU;
																												
																												}
																												
																												$Ho3EyQEy5sso9sRWd = $this->qWPODI2gyt3Aa - $this->VP8vAJd3fs3x1Ygo;
																												
																												YHHPuGcJpxLDUfERty('post-save2',true);
																												
																												
																												}
																												
																												}while(false);// zerowhile
																												
																												YHHPuGcJpxLDUfERty('post-progress1');
																												
																												if($url_ind>=$cnu)
																												
																												{
																												
																												unset($urls_list);
																												
																												$url_ind = 0;
																												
																												$urls_list = $urls_list2;
																												
																												
																												$urls_list_full += $urls_list;
																												
																												$cnu = count($urls_list);
																												
																												unset($ref_links2);
																												
																												$ref_links2 = $ref_links;
																												
																												unset($ref_links); unset($urls_list2);
																												
																												$ref_links = array();
																												
																												$urls_list2 = array();
																												
																												$this->links_level++;
																												
																												z_fhGrViQaOeql9("\n<br>NEXT LEVEL:$this->links_level<br />\n");
																												
																												}
																												
																												if(!$XSgHgDDEhTbwopK_PT){
																												
																												
																												z_fhGrViQaOeql9("\n({skipped ".$this->F4IXRYNqGySShUMjj." - $LyZYub5sAF58GG})<br />\n");
																												
																												if(!$grab_parameters['xs_chlog_list_max'] ||
																												
																												count($urls_list_skipped) < $grab_parameters['xs_chlog_list_max']) {
																												
																												$urls_list_skipped[$this->F4IXRYNqGySShUMjj] = $LyZYub5sAF58GG;
																												
																												}
																												
																												}
																												
																												YHHPuGcJpxLDUfERty('post-progress1',true);
																												
																												YHHPuGcJpxLDUfERty('post-progress2');
																												
																												$this->pn++;
																												
																												s_kA5FLQ9p4i();
																												
																												$this->pl=min($cnu-$url_ind,$Ho3EyQEy5sso9sRWd);
																												
																												$uIZDnQOguALfQ = ($this->VP8vAJd3fs3x1Ygo>=$this->qWPODI2gyt3Aa) || ($url_ind>=$cnu);
																												
																												if(!$hFdFC9FutftfbQcPCF) {
																												
																												
																												if($hFdFC9FutftfbQcPCF = N_Fm0hhD3owWta()){
																												
																												if(!@jgYSLBDPtmpAo($hFdFC9FutftfbQcPCF))
																												
																												$hFdFC9FutftfbQcPCF=0;
																												
																												}
																												
																												}
																												
																												YHHPuGcJpxLDUfERty('post-progress2',true);
																												
																												YHHPuGcJpxLDUfERty('post-progress3');
																												
																												$progpar = $this->ffpknLH3lruh(false, $uIZDnQOguALfQ||$hFdFC9FutftfbQcPCF);
																												
																												YHHPuGcJpxLDUfERty('post-progress3',true);
																												
																												YHHPuGcJpxLDUfERty('post-progress4');
																												
																												if($grab_parameters['xs_exec_time'] && 
																												
																												((time()-$u3Aj3kpP8f7NX) > $grab_parameters['xs_exec_time']) ){
																												
																												$hFdFC9FutftfbQcPCF = 'Time limit exceeded - '.($grab_parameters['xs_exec_time']).' - '.(time()-$u3Aj3kpP8f7NX);
																												
																												}
																												
																												if($grab_parameters['xs_savestate_time']>0 &&
																												
																												( 
																												
																												($this->ctime-$paeh3sXfU>$grab_parameters['xs_savestate_time'])
																												
																												|| $uIZDnQOguALfQ
																												
																												|| $hFdFC9FutftfbQcPCF
																												
																												)
																												
																												)
																												
																												{
																												
																												$paeh3sXfU = $this->ctime;
																												
																												z_fhGrViQaOeql9("(saving dump)<br />\n");
																												
																												$AngxaIfOJ = array();
																												
																												$ugr2aG5lxR = array(
																												
																												'url_ind',
																												
																												'urls_list','urls_list2','cnu',
																												
																												'ref_links','ref_links2','ref_links_list',
																												
																												'urls_list_full','urls_completed',
																												
																												'urls_404',
																												
																												'nt','tsize','pn','links_level','ctime', 'urls_ext','fetch_no',
																												
																												'starttime', 'retrno', 'nettime', 'urls_list_skipped',
																												
																												'imlist','imlist2', 'progpar', 'runstate', 'sm_base'
																												
																												);
																												
																												foreach($ugr2aG5lxR as $k){
																												
																												$AngxaIfOJ[$k] = isset($this->$k) ? $this->$k : $$k;
																												
																												}
																												
																												$AngxaIfOJ['time']=time();
																												
																												$k88k5WVVH7HOa=G8ByTBG0gz4G9($AngxaIfOJ);
																												
																												QNBZB8U2gUbUbMO(smWzxPC1LKDbUte,$k88k5WVVH7HOa,ebJGVa__YE,true);
																												
																												unset($AngxaIfOJ);
																												
																												unset($k88k5WVVH7HOa);
																												
																												}
																												
																												if($grab_parameters['xs_delay_req'] && $grab_parameters['xs_delay_ms'] &&
																												
																												(($D8EOhUUDgGFotoZ8%$grab_parameters['xs_delay_req'])==0))
																												
																												{
																												
																												sleep(intval($grab_parameters['xs_delay_ms']));
																												
																												}
																												
																												YHHPuGcJpxLDUfERty('post-progress4', true);
																												
																												}while(!$uIZDnQOguALfQ && !$hFdFC9FutftfbQcPCF);
																												
																												z_fhGrViQaOeql9("\n\n<br><br>Crawling completed<br>\n");
																												
																												if($_GET['ddbgexit']){
																												
																												echo '<hr><hr><h2>Dbg exit</h2>';
																												
																												echo $K5kCC5JoHjozL->ZwgAtu5BO_NYpaRWr.' / '.$K5kCC5JoHjozL->nettime.'<hr>';
																												
																												echo fiJIJjF_yojaqa().'<hr>';
																												
																												exit;
																												
																												}
																												
																												return array(
																												
																												'u404'=>$urls_404,
																												
																												'ref_links_list'=>$ref_links_list,
																												
																												'starttime'=>$starttime,
																												
																												'topmu' => $bsdObbWFYcM20JyA,
																												
																												'ctime'=>$this->ctime,
																												
																												'tsize'=>$this->tsize,
																												
																												'retrno' => $retrno,
																												
																												'nettime' => $this->nettime,
																												
																												'errmsg'=>'',
																												
																												'initurl'=>$this->iK6zN3FNMZ,
																												
																												'initdir'=>$this->Niq61B3f5T,
																												
																												'ucount'=>$this->VP8vAJd3fs3x1Ygo,
																												
																												'crcount'=>$this->pn,
																												
																												'fetch_no'=>$this->fetch_no,
																												
																												'time'=>time(),
																												
																												'params'=>$this->lT0Vs3VxjBxAH3,
																												
																												'interrupt'=>$hFdFC9FutftfbQcPCF,
																												
																												'runstate' => $runstate,
																												
																												'sm_base' => $sm_base,
																												
																												'urls_ext'=>$urls_ext,
																												
																												'urls_list_skipped' => $urls_list_skipped,
																												
																												'max_reached' => $this->VP8vAJd3fs3x1Ygo>=$this->qWPODI2gyt3Aa
																												
																												);
																												
																												}
																												
																												}
																												
																												$X5pGy9XVxZmKajMLt = new SiteCrawler();
																												
																												function MjfS99JQfMEzIgi(){
																												
																												@jgYSLBDPtmpAo(ebJGVa__YE.AheSQAhNo9A7oMn);
																												
																												if(@file_exists(ebJGVa__YE.Uv9x2nKq2xFMz))
																												
																												@rename(ebJGVa__YE.Uv9x2nKq2xFMz,ebJGVa__YE.AheSQAhNo9A7oMn);
																												
																												}
																												
																												



































































































