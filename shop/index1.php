<?
include("../config/conn.php");//����-����-��ϵQQ:1200-36745//��-�ο�-��-��-ϵQQ:12-00-36-745
include("../config/function.php");
include("../config/xy.php");
$sj=date("Y-m-d H:i:s");
$getstr=$_GET[str];
$tit="�̼ҷ��";
$ses=" where zt=1 and shopzt=2 and shopname<>''";
if(returnsx("s")!=-1){$skey=safeEncoding(returnsx("s"));$ses=$ses." and shopname like '%".$skey."%'";$tit=$tit." ".$skey;}
if(returnsx("q")!=-1){$ses=$ses." and uqq='".returnsx("q")."'";}
if(returnsx("p")!=-1){$page=returnsx("p");}else{$page=1;}
$px="order by sj desc";
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=$tit?> - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layui.js"></script>
<script language="javascript" src="../js/common.js"></script>
<div class="yjcode"><? adwhile("ADTOP");?></div>
</head>
<body>

<? include("../tem/top--.html");?><? include("../tem/tongepzhu.html");?>
<script language="javascript">topjconc(2,'����');document.getElementById("topt").value="<?=$skey?>";</script>
<div class="main rowElem">
<div class="yjcode">
 <div class="dqwz">
 <ul class="u1">
 <li class="l1">
 ��ǰλ�ã�<a href="<?=weburl?>">��ҳ</a> > �̼ҷ��
 </ul>
 </div>

 <!--��B-->
 <div class="left">
 <? adwhile("ADS01",0,200,0)?>
 
 <div class="sellm">
 <ul class="u1">
 <li class="l1">�������������а�</li>
 <li class="l2 l21" id="sellm1" onMouseOver="sellmover(1)">�������۶�</li>
 <li class="l2" id="sellm2" onMouseOver="sellmover(2)">�ۼ�����</li>
 </ul>
 <ul class="u2" id="sellu1">
 <? $i=1;while1("*","epzhu_user where zt=1 and shopzt=2 and shopname<>'' order by sellmyue desc limit 10");while($row1=mysql_fetch_array($res1)){?>
 <li class="l1<? if($i<=3){?> l11<? }?>"><?=$i?></li>
 <li class="l2"><a href="../shop/view<?=$row1[id]?>.html" title="<?=$row1[shopname]?>" target="_blank"><?=strgb2312($row1[shopname],0,16)?></a></li>
 <li class="l3">��<strong><?=$row1[sellmyue]?></strong></li>
 <? $i++;}?>
 </ul>
 <ul class="u2" id="sellu2" style="display:none;">
 <? $i=1;while1("*","epzhu_user where zt=1 and shopzt=2 and shopname<>'' order by sellmall desc limit 10");while($row1=mysql_fetch_array($res1)){?>
 <li class="l1<? if($i<=3){?> l11<? }?>"><?=$i?></li>
 <li class="l2"><a href="../shop/view<?=$row1[id]?>.html" title="<?=$row1[shopname]?>" target="_blank"><?=strgb2312($row1[shopname],0,16)?></a></li>
 <li class="l3">��<strong><?=$row1[sellmall]?></strong></li>
 <? $i++;}?>
 </ul>
 </div>
 
 <ul class="hotpro">
 <li class="l1">��Ʒ�Ƽ�</li>
 <? 
 while1("*","epzhu_pro where zt=0 and ifxj=0 and iftj>0 order by iftj asc limit 5");while($row1=mysql_fetch_array($res1)){
 ?>
 <li class="l2"><a href="../product/view<?=$row1[id]?>.html"><img alt="<?=$row1[tit]?>" src="../<?=returntp("bh='".$row1[bh]."' order by iffm asc","-2")?>" width="50" height="50" align="left"></a><a href="../product/view<?=$row1[id]?>.html" title="<?=$row1[tit]?>"><?=returntitdian($row1[tit],35)?></a><br><strong class="feng">��<?=returnjgdian(returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]))?></strong></li>
 <? }?>
 </ul> 
 </div>
 <!--��E-->

 <!--��B-->
 <div class="listright">
 
 <div class="shoptj fontyh">
 <ul class="u1">
 <li class="l1">�Ƽ��̼�</li>
 <li class="l2"><a href="">��ҲҪ����������</a></li>
 </ul>
 <? 
 while1("*","epzhu_user where zt=1 and shopzt=2 and pm>0 order by pm asc limit 4");while($row1=mysql_fetch_array($res1)){
 $au="view".$row1[id].".html";
 $sucnum=returnjgdw($row1[xinyong],"",returnxy($row1[id],1));
 ?>
 <div class="d1">
  <div class="dtp"><a href="<?=$au?>" target="_blank"><img border="0" src="<?=returntppd("../upload/".$row1[id]."/shop.jpg","../img/none180x180.gif")?>" width="112" height="112" /></a></div>
 <ul class="u2">
 <li class="l1"><a href="<?=$au?>" target="_blank"><?=$row1[shopname]?></a> <img src="../img/dj/<?=returnxytp($sucnum)?>" title="����ֵ<?=$sucnum?>" /></li>
 <li class="l2"><a href="view<?=$row1[id]?>.html" target="_blank">����</a></li>
 <li class="l3">����������<?=returncount("epzhu_pro where zt=0 and ifxj=0 and userid=".$row1[id])?>��</li>
 <li class="l4">
  <span class="s1">��<br>��<br>��<br>��</span>
  <?
  while2("*","epzhu_pro where userid=".$row1[id]." and zt=0 and ifxj=0 order by lastsj desc limit 4");while($row2=mysql_fetch_array($res2)){
  $au="../product/view".$row2[id].".html";
  $tp="../".returntp("bh='".$row2[bh]."' order by iffm desc","-2");
  ?>
  <span class="s2"><a href="<?=$au?>" target="_blank"><img src="<?=returntppd($tp,"../img/none180x180.gif")?>" width="65" height="68" border="0" /></a></span>
  <? }?>
 </li>
 </ul>
 </div>
 <?
 }
 ?>
 </div>
 
 <div class="listr">
 <?
 pagef($ses,10,"epzhu_user",$px);while($row=mysql_fetch_array($res)){
 $au="view".$row[id].".html";
 $sucnum=returnjgdw($row[xinyong],"",returnxy($row[id],1));
 ?>
 <ul class="u1 fontyh">
 <li class="l1"><a href="<?=$au?>" target="_blank"><img border="0" src="<?=returntppd("../upload/".$row[id]."/shop.jpg","../img/none180x180.gif")?>" width="120" height="120" /></a></li>
 <li class="l2">
 <a href="<?=$au?>" target="_blank" class="a1"><?=$row[shopname]?></a> <img src="../img/dj/<?=returnxytp($sucnum)?>" title="����ֵ<?=$sucnum?>" /><br>
 <? if(1==$row[ifmot]){?><span class="s2"><img src="../img/tel.gif" title="�ֻ���ͨ����֤" /></span><? }?>
 <? if(1==$row[ifemail]){?><span class="s2"><img src="../img/yx.gif" title="������ͨ����֤" /></span><? }?>
 <span class="s0">�ƹ�<?=$row[nc]?></span>
 <span class="s1">��Ʒ����<br><strong class="feng"><?=returncount("epzhu_pro where zt=0 and ifxj=0 and userid=".$row[id])?></strong></span>
 <span class="s1">���׳ɹ�<br><strong class="feng"><?=$sucnum?></strong></span>
 <span class="s1">�������۶�<br><strong class="feng">��<?=$row[sellmyue]?></strong></span>
 <span class="s1">�ÿ�����<br><strong class="feng"><?=$row[djl]?></strong></span>
 </li>
 <li class="l3">
 <a href="<?=$au?>" class="a1" target="_blank">����Ta�ĵ���</a>
 </li>
 </ul>
 <? }?>
 <div class="npa">
 <?
 $nowurl="search";
 $nowwd="";
 require("../tem/page.html");
 ?>
 </div>
 </div>
 
 </div>
 <!--��E-->

</div>
</div>
<div class="yizhanw"> <div class="yizhanw2"><? include("../tem/bottom.html");?></div> </div>
</body>
</html>