<?
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:120036745
include("../config/function.php");//��-�ο�-��-��-ϵQ-Q:12-00-3674-5
sesCheck();
$sqluser="select * from epzhu_user where uid='".$_SESSION[SHOPUSER]."' and shopzt=2";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("openshop3.php");}
$timestamp=time();
$pwd=$rowuser[pwd];
$userid=$rowuser[id];
$bh=$_GET[bh];
while0("*","epzhu_pro where bh='".$bh."' and userid=".$userid);if(!$row=mysql_fetch_array($res)){php_toheader("productlist.php");}

//������ʼ
if($_GET[control]=="update"){
 zwzr();
 $sj=date("Y-m-d H:i:s");
 $myty=preg_split("/yjcode/",sqlzhuru($_POST[mty]));
 $txt=sqlzhuru1($_POST[content]);
 $tit=sqlzhuru($_POST[ttit]);
 $bz=sqlzhuru($_POST[tbz]);
 $azsf=sqlzhuru($_POST[azsf]);
 $anzhuang=sqlzhuru($_POST[anzhuang]);
if(empty($anzhuang)){
	$anzhuang = 0;
}
 $azzj=sqlzhuru($_POST[azzj]);
 $azxt=sqlzhuru($_POST[azxt]);
 $azhj=sqlzhuru($_POST[azhj]);
 $azfs=sqlzhuru($_POST[azfs]);
 $azwjt=sqlzhuru($_POST[azwjt]);
 $sizes=sqlzhuru($_POST[tsizes]);
 $mobile=sqlzhuru($_POST[mobile]);
 
 $wkey=strgb2312(sqlzhuru($_POST[twkey]),0,240);
 $wdes=strgb2312(sqlzhuru($_POST[twdes]),0,240);
 $money1=sqlzhuru($_POST[tmoney1]);
 $money2=sqlzhuru($_POST[tmoney2]);
 $kcnum=sqlzhuru($_POST[tkcnum]);if(!is_numeric($kcnum)){$kcnum=0;}
 if($money1<0 || $money2<0){Audit_alert("�۸���Ϊ������","productlist.php");}
 $fhxs=intval(sqlzhuru($_POST[Rfhxs]));
 if($rowcontrol[ifproduct]=="on"){$nzt=0;}else{$nzt=1;}
 if(!empty($anzhuang) && !is_numeric($anzhuang)){Audit_alert("��װ������������","productlist.php");}
 $tysx=sqlzhuru($_POST[tysx]);
 $tysxB=intval(sqlzhuru($_POST[tysxBnum]));
 for($i=1;$i<$tysxB;$i++){
  $tysxS=intval(sqlzhuru($_POST["tysxSnum".$i]));
  for($j=1;$j<=$tysxS;$j++){
  $zi=sqlzhuru($_POST["zi_".$i."_".$j]);
  if(!empty($zi)){
  $tysx=$tysx."xcf".$_POST["tysxty1_".$i].":".$zi;
  }
  }
 }
 
 $ifuserjd=intval($_POST[Rifuserdj]);
 if(1==$ifuserjd){
 deletetable("epzhu_prouserdj where probh='".$bh."'");
  for($i=1;$i<intval($_POST[djnum]);$i++){
  $zhekou=$_POST["zhekou_".$i];
  $djname=$_POST["name1_".$i];
  if(!empty($zhekou)){intotable("epzhu_prouserdj","probh,userid,djname,admin,zhi","'".$bh."',".$row[userid].",'".$djname."',1,".$zhekou."");}
  }
 }

 updatetable("epzhu_pro",$ses."
			 mybh='".sqlzhuru($_POST[tmybh])."',
			 myty1id=".$myty[0].",
			 myty2id=".$myty[1].",
			 lastsj='".$sj."',
			 tysx='".$tysx."',
			 anzhuang=".$anzhuang.",
			 azsf='".$azsf."',
			 azzj='".$azzj."',
			 azxt='".$azxt."',
			 azhj='".$azhj."',
			 azfs='".$azfs."',
			 azwjt='".$azwjt."',
			 sizes='".$sizes."',
			 mobile='".$mobile."',
			 zt=".$nzt.",
			 tit='".$tit."',
			 wkey='".$wkey."',
			 wdes='".$wdes."',
			 txt='".$txt."',
			 kcnum=".$kcnum.", 
			 money1=".$money1.", 
			 money2=".$money2.",
			 fhxs=".$fhxs.",
			 bz=".sqlzhuru($_POST[Rbz]).",
			 wpurl='".sqlzhuru($_POST[twpurl])."',
			 wppwd='".sqlzhuru($_POST[twppwd])."',
			 wppwd1='".sqlzhuru($_POST[twppwd1])."',
			 azbz='".sqlzhuru($_POST[tazbz])."',
			 ysweb='".sqlzhuru($_POST[tysweb])."',
			 ifuserdj=".$ifuserjd.",
			 txtmb='".sqlzhuru($_POST[ttxtmb])."',
			 zl=".sqlzhuru($_POST[tzl])."
			 where bh='".$bh."' and userid=".$userid);
 uploadtp($bh,"��Ʒ",$userid);
 //�ϴ�B
 if(3==$fhxs){
  $up1=$_FILES["inp1"]["name"];
  if(!empty($up1)){
  $mc=MakePassAll(15)."-".time()."-".$userid.".".returnhz($up1);
  $lj="../upload/".$userid."/".$bh."/";
  move_uploaded_file($_FILES["inp1"]['tmp_name'],$lj.$mc);
  delFile($lj.$row[upf]);
  updatetable("epzhu_pro","upf='".$mc."' where bh='".$bh."' and userid=".$userid);
  }
 }
 //�ϴ�E
 //����B
 if(4==$fhxs){
 $c=str_replace("\r","",($_POST[s1]));
 $d=preg_split("/\n/",$c);
 for($i=0;$i<=count($d);$i++){
  if(!empty($d[$i])){
   $e=preg_split("/\s/",$d[$i]);
     if(panduan("probh,userid,ka","epzhu_kc where probh='".$bh."' and ka='".$e[0]."' and userid=".$userid)==0){
     $mi="";
	 if(count($e)>=2){for($ei=1;$ei<count($e);$ei++){$mi=$mi." ".$e[$ei];}}
	 intotable("epzhu_kc","probh,userid,ka,mi,ifok","'".$bh."',".$userid.",'".$e[0]."','".$mi."',0");
	 }
  }
 }
 kamikc($bh);
 }
 //����E
 
 php_toheader("prosuc.php?bh=".$bh."&id=".$row[id]);

}
//�������

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><div class="yjcode"><? adwhile("ADTOP");?></div>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�û�������� - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<link href="css/product.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script type="text/javascript" src="js/adddate.js" ></script> 
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>


<script language="javascript">
function tj(){
if((document.f1.ttit.value).replace(/\s/,"")==""){alert("���������");document.f1.ttit.focus();return false;}
a=document.f1.tkcnum.value;if(a.replace("/\s/","")=="" || isNaN(a)){alert("��������Ч�Ŀ��");document.f1.tkcnum.focus();return false;}
a=document.f1.tmoney1.value;if(a.replace("/\s/","")=="" || isNaN(a)){alert("��������Ч�ļ۸�");document.f1.tmoney1.focus();return false;}
a=document.f1.tmoney2.value;if(a.replace("/\s/","")=="" || isNaN(a)){alert("��������Ч�ļ۸�");document.f1.tmoney2.focus();return false;}
a=document.f1.tsizes.value;if(a.replace("/\s/","")=="" || isNaN(a)){alert("����������С");document.f1.tsizes.focus();return false;}
var tmoney2 = $('input[name=tmoney2]').val();

var azjg = $('input[name=anzhuang]').val();
var azsf = $("input[name='azsf']:checked").val();
if(parseFloat(azjg)<=0 && parseFloat(azsf)==1){alert("�������շѷ���۸�");document.f1.azjg.focus();return false;}
if(parseFloat(azjg)>parseFloat(tmoney2) && parseFloat(azsf)==1){alert("��װ����Ѳ��ܸ��ڳ��ۼ۸�");document.f1.azjg.focus();return false;}
if($('input[name=azzj]').val()==''){alert("��ѡ��װ��������");document.f1.azzj.focus();return false;}
if($('input[name=azxt]').val()==''){alert("��ѡ��װϵͳ");document.f1.azxt.focus();return false;}
if($('input[name=azhj]').val()==''){alert("��ѡ��װ����");document.f1.azhj.focus();return false;}
if($('input[name=azfs]').val()==''){alert("��ѡ��װ��ʽ");document.f1.azfs.focus();return false;}
if($('input[name=azwjt]').val()==''){alert("��ѡ���Ƿ���Ҫα��̬");document.f1.azwjt.focus();return false;}


r=document.getElementsByName("Rfhxs");rr="";for(i=0;i<r.length;i++){if(r[i].checked==true){rr=r[i].value;}}if(rr==""){alert("��ѡ�񷢻���ʽ��");return false;}
cstr="xcf";
c=document.getElementsByName("Csx");
for(i=0;i<c.length;i++){if(c[i].checked==true){cstr=cstr+c[i].value+"xcf";}}
document.f1.tysx.value=cstr;
layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
tjwait();
f1.action="product.php?bh=<?=$bh?>&control=update";
}
function bzonc(x){
if(1==x){document.getElementById("bzul").style.display="none";}	
else if(2==x){document.getElementById("bzul").style.display="";}	
}

function anzhuangs(x){
if(1==x){document.getElementById("az_div").style.display="none";}	
else if(2==x){document.getElementById("az_div").style.display="";}	
}
function fhxsonc(x){
for(i=1;i<=5;i++){
d=document.getElementById("fhxs"+i);if(d){d.style.display="none";}
}
d=document.getElementById("fhxs"+x);if(d){d.style.display="";}
if(x==4){document.getElementById("kcuk").style.display="none";}else{document.getElementById("kcuk").style.display="";}
}

function djonc(x){
if(0==x){document.getElementById("djv").style.display="none";}else{document.getElementById("djv").style.display="";}
}

function szfz(){
if(!confirm("���뿪��ҳ�棬��ǰҳ���������δ���棬���ᶪʧ��ȷ����")){return false;}
location.href="protypelist.php";
}

function yjkscha(){
m2=document.f1.tmoney2.value;
yjk=document.f1.yjks.value;
if(isNaN(m2) || yjk==""){yj=m2;}else{yj=accMul(m2,yjk);}
document.f1.tmoney1.value=yj;
}
function yjkscha(){
m2=document.f1.tsizes.value;
yjk=document.f1.yjks.value;
if(isNaN(m2) || yjk==""){yj=m2;}else{yj=accMul(m2,yjk);}
document.f1.tmoney1.value=yj;
}
function mobileonc(x){
if(1==x){document.getElementById("mobiletul").style.display="none";}	
else if(2==x){document.getElementById("mobiletul").style.display="";}	
}
</script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/unit.js"></script>

</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/userepzhucom.html");?>
<!--��Ѱ�װѡ��js -->
<link href="../js/chose/src/ui-choose.css" rel="stylesheet" />
<script src="../js/chose/src/ui-choose.js"></script>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > ��Ʒ�༭</li>
</ul>
<? $leftid=1;include("left.php");?>
<!--RB-->
<div class="right">

 <? include("protop.php");?>
 <? include("rcap3.php");?>
 <script language="javascript">
 document.getElementById("rcap1").className="g_ac0_h g_bc0_h";
 </script>

 <!--B-->
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <!--����B-->
 <ul class="rcap"><li class="l1"></li><li class="l2">������Ŀ</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">���ڷ��飺</li>
 <li class="l21">
 <strong>
 <?=returntype(1,$row[ty1id])." - ".returntype(2,$row[ty2id])." - ".returntype(3,$row[ty3id])." - ".returntype(4,$row[ty4id])." - ".returntype(5,$row[ty5id])?>
 </strong>
 [<a href="productlx.php?action=update&id=<?=$row[id]?>">�޸�</a>]
 </li>
 <li class="l1">�Զ�����飺</li>
 <li class="l2">
 <select name="mty" class="inp1">
 <option value="0yjcode0">ѡ�����</option>
 <? while1("*","epzhu_protype where admin=1 and zt=0 and userid=".$luserid);while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>yjcode0"<? if($row1[id]==$row[myty1id] && $row[myty2id]==0){?> selected="selected"<? }?> style="background-color:#EFEFEF;color:#333;"><?=$row1[name1]?></option>
 <? while2("*","epzhu_protype where admin=2 and name1='".$row1[name1]."' and zt=0 and userid=".$luserid);while($row2=mysql_fetch_array($res2)){?>
 <option value="<?=$row1[id]?>yjcode<?=$row2[id]?>"<? if($row1[id]==$row[myty1id] && $row2[id]==$row[myty2id]){?> selected="selected"<? }?>> - <?=$row2[name2]?></option>
 <? }?>
 <? }?>
 </select>
 <span class="fd"> [<a href="javascript:void(0);" onclick="szfz()">���÷���</a>]</span>
 </li>
 <li class="l1">���⣺</li>
 <li class="l2"><input type="text" size="80" value="<?=$row[tit]?>" class="inp" name="ttit" /></li>

 <li class="l1">�ؼ��ʣ�</li>
 <li class="l2"><input  name="twkey" value="<?=$row[wkey]?>" size="80" type="text" class="inp" /></li>
 <li class="l9">������</li>
 <li class="l10"><textarea name="twdes"><?=$row[wdes]?></textarea></li>
 <!-- <li class="l1">�Զ�����룺</li>
 <li class="l2"><input type="text" size="10" value="<?=$row[mybh]?>" class="inp" name="tmybh" /></li>-->

  <!--<li class="l1">�Ż���ʽ��</li>
 <li class="l2">
 <label><input name="Ryhxs" type="radio" value="1" onclick="yhxsonc(1)" <? if(1==$row[yhxs]){?>checked="checked"<? }?> /> �����Ż�</label>
 <label><input name="Ryhxs" type="radio" value="2" onclick="yhxsonc(2)" <? if(2==$row[yhxs]){?>checked="checked"<? }?> /> ��ʱ�Ż�</label> 
 </li>-->
 <li class="l1">�ۼۣ�</li>
 <li class="l2">
 <input class="inp" name="tmoney2" value="<?=$row[money2]?>" size="20" type="text"/>Ԫ
</li>
 <li class="l1">ԭ�ۣ�</li>
 <li class="l2">
 <input class="inp" name="tmoney1" value="<?=$row[money1]?>" size="20" type="text"/>Ԫ
 <!--<select name="yjks" class="inp1" onchange="yjkscha()">
 <option value="">�������</option>
 <? for($i=1;$i<10;$i++){?>
 <option value="1.<?=$i?>">X1.<?=$i?>(�൱�ڵ�ǰ�ۼ�Ϊ<?=10-$i?>���Ż�)</option>
 <? }?>
 </select>
 </li>
 </ul>
 <ul class="uk uk0" id="yhxsul" style="display:none;">
 <li class="l1">��ʱ�Żݼۣ�</li>
 <li class="l2"><input class="inp" name="tmoney3" value="<?=$row[money3]?>" size="10" type="text"/></li>
 <li class="l1">�Ż�˵����</li>
 <li class="l2"><input type="text" size="80" value="<?=$row[yhsm]?>" class="inp" name="tyhsm" /></li>
 <li class="l1">�Ż�ʱ�䣺</li>
 <li class="l2">
 <input class="inp" name="tyhsj1" value="<?=$row[yhsj1]?>" readonly="readonly" onclick="SelectDate(this,'yyyy-MM-dd hh:mm:ss')" size="20" type="text"/> 
 <span class="fd">��</span> 
 <input class="inp" name="tyhsj2" value="<?=$row[yhsj2]?>" readonly="readonly" onclick="SelectDate(this,'yyyy-MM-dd hh:mm:ss')" size="20" type="text"/>-->
 </li>
 </ul>
 <ul class="uk uk0">
 <li class="l1">������ʽ��</li>
 <li class="l2">
 <? if(strstr($rowcontrol[fhxs],"1") || empty($rowcontrol[fhxs])){?>
 <label><input name="Rfhxs" type="radio" value="1" onclick="fhxsonc(1)" <? if(1==$row[fhxs]){?>checked="checked"<? }?> /> �ֶ�����</label> &nbsp;&nbsp;
 <? }?>
 <? if(strstr($rowcontrol[fhxs],"2") || empty($rowcontrol[fhxs])){?>
 <label><input name="Rfhxs" type="radio" value="2" onclick="fhxsonc(2)" <? if(2==$row[fhxs]){?>checked="checked"<? }?> /> �Զ�����</label> &nbsp;&nbsp;
 <? }?>
  <!--<? if(strstr($rowcontrol[fhxs],"3") || empty($rowcontrol[fhxs])){?>
 <label><input name="Rfhxs" type="radio" value="3" onclick="fhxsonc(3)" <? if(3==$row[fhxs]){?>checked="checked"<? }?> /> ��վֱ������</label>&nbsp;&nbsp;
 <? }?>-->
 <? if(strstr($rowcontrol[fhxs],"4") || empty($rowcontrol[fhxs])){?>
 <label><input name="Rfhxs" type="radio" value="4" onclick="fhxsonc(4)" <? if(4==$row[fhxs]){?>checked="checked"<? }?> /> �㿨����</label>&nbsp;&nbsp;
 <? }?>
 <!-- <? if(strstr($rowcontrol[fhxs],"5") || empty($rowcontrol[fhxs])){?>
 <label><input name="Rfhxs" type="radio" value="5" onclick="fhxsonc(5)" <? if(5==$row[fhxs]){?>checked="checked"<? }?> /> ʵ����</label>&nbsp;&nbsp;
 <? }?>-->
 </li>
 </ul> 
 <ul class="uk uk0" id="kcuk">
 <li class="l1">�������</li>
 <li class="l2"><input class="inp" name="tkcnum" value="<?=returnjgdw($row[kcnum],"",0)?>" size="10" type="text"/> <span class="fd hui">(����ǵ㿨�����࣬���ֵ������д�����Զ���ȡ)</span></li>
 </ul>
 <ul class="uk uk0" id="fhxs2" style="display:none;">
 <li class="l1">���̵�ַ��</li>
 <li class="l2"><input class="inp" name="twpurl" value="<?=$row[wpurl]?>" size="80" type="text"/></li>
 <li class="l1">�������룺</li>
 <li class="l2"><input class="inp" name="twppwd" value="<?=$row[wppwd]?>" size="20" type="text"/></li>
 <li class="l1">��ѹ���룺</li>
 <li class="l2"><input class="inp" name="twppwd1" value="<?=$row[wppwd1]?>" size="20" type="text"/></li>
 </ul>
 <ul class="uk uk0" id="fhxs3" style="display:none;">
 <li class="l1">�ϴ��ļ���</li>
 <li class="l2"><label><input type="file" name="inp1" id="inp1" size="25"></label></li>
 <? if(!empty($row[upf])){?>
 <li class="l1">�ļ�Ԥ����</li>
 <li class="l21">��<a href="../upload/<?=$row[userid]?>/<?=$row[bh]?>/<?=$row[upf]?>" class="blue" target="_blank">���Ԥ��</a>��</li>
 <? }?>
 </ul>
 <ul class="uk uk0" id="fhxs4" style="display:none;">
 <li class="l1">��棺</li>
 <li class="l21"><strong class="red"><?=$row[kcnum]?>��</strong> [<a href="kclist.php?bh=<?=$bh?>" target="_blank" class="blue">�������</a>]</li>
 <li class="l1">˵����</li>
 <li class="l21 red">�����ʽΪ����+�ո�+����(�ɸ��ϸ�������)��һ��һ�飬��AAAAA BBBBB</li>
 <li class="l11">���ӿ��ܣ�</li>
 <li class="l12"><textarea name="s1"></textarea></li>
 </ul>
 <ul class="uk uk0" id="fhxs5" style="display:none;">
 <li class="l1">������</li>
 <li class="l2"><input class="inp" name="tzl" value="<?=sprintf("%.2f",$row[zl])?>" size="10" type="text"/> <span class="fd">KG</span></li>
 </ul>
 <!--����E-->
 
 <!--Ч��ͼ/����B-->
 <ul class="rcap"><li class="l1"></li><li class="l2">Ч��ͼ/����</li><li class="l3"></li></ul>
 <ul class="uk uk0">
 <li class="l1">Ч��ͼ��</li>
 <li class="l2">
 <iframe style="float:left;" src="tpupload.php?admin=1&bh=<?=$bh?>" width="150" scrolling="no" height="33" frameborder="0"></iframe>
 <span class="fd hui">��������ϴ�7��Ч��ͼ</span>
 </li>
 </ul>
 <div class="xgtp">
  <div id="xgtp1" style="display:none;">���ڴ���</div>
  <div id="xgtp2"></div>
 </div>
 
 <ul class="uk uk0">
 <li class="l7">��Ʒ���飺</li>
 <li class="l8"><script id="editor" name="content" type="text/plain" style="width:790px;height:330px;"><?=$row[txt]?></script></li>
 </ul>
 <!--Ч��ͼ/����E-->
 
 <!--ѡ��B-->
 <ul class="rcap"><li class="l1"></li><li class="l2">ѡ����Ŀ</li><li class="l3"></li></ul>
 <div class="rts" style="cursor:pointer;" onclick="xtinfonc()">�����<span id="xtzs" class="red">����</span>�� ѡ��ֿ��Բ���д��������ѡ����Ϣ������������Ʒ������ۣ��������Ҳ���������������ƺá�</div>
 <div id="xuantian">
 <div class="tysx">
 <input type="hidden" value="<?=$row[tysx]?>" name="tysx" />
 <? $i=1;while1("*","epzhu_typesx where admin=1 and typeid=".$row[ty1id]." order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <input type="hidden" value="<?=$row1[id]?>" name="tysxty1_<?=$i?>" />
 <ul class="uk1">
 <li class="l1"><?=$row1[name1]?>��</li>
 <li class="l2">
 <? $j=1;while2("*","epzhu_typesx where admin=2 and name1='".$row1[name1]."' and typeid=".$row1[typeid]." order by xh asc");while($row2=mysql_fetch_array($res2)){?>
 <label><input name="Csx" type="checkbox" value="<?=$row2[id]?>"<? if(strstr($row[tysx],"xcf".$row2[id]."xcf")){?>checked="checked"<? }?> /> <?=$row2[name2]?></label>
 <? $j++;}?>
 <? 
 if(!empty($row1[ifzi])){
 $v="";
 $a1=preg_split("/xcf".$row1[id].":/",$row[tysx]);
 if(count($a1)>1){$b1=preg_split("/xcf/",$a1[1]);$v=$b1[0];}
 ?>
 <input type="text" name="zi_<?=$i?>_<?=$j?>" size="10" value="<?=$v?>" class="inp" />
 <? }?>
 <input type="hidden" value="<?=$j?>" name="tysxSnum<?=$i?>" />
 </li>
 </ul>
 <? $i++;}?>
 </div>

 
 <!--[if IE]>
		<script src="/js/html5.min.js"></script>
	<![endif]-->
 <style>
 .uk .azfw{margin-left:108px;font-size:14px;background:#f8f8f8;float:left;border:1px solid #ececec;z-index:1;padding-bottom:10px;}
 .uk .azfw .l1{width:70px;}
 .uk .azfw .l2{width:680px;}
 .uk .azfw .l1,.uk .azfw .l2{padding:5px 5px;line-height:30px;height:40px;}
 .uk .l2 .mf, .uk .l2 .sf{float:left;padding:0px 10px;width:80px;height:30px;text-align:center;line-height:30px;position:absolute;left:0;top:0;    cursor: pointer;}
  .uk .l2 .sf{left:95px;;}
 .uk .l2 .act{background:#f8f8f8;border:1px solid #ececec;border-bottom:none;z-index:10;height:31px;}
 </style>
  <div class="tysx">
 <ul class="uk11">
 <li class="l1">�ƶ��ˣ�</li>
 <li class=""<? if($row['mobile']!=0){echo 'act';}?>" onclick="mobileonc(6)"> <input name="mobile" type="radio" value="0" <? if(0==$row[mobile]){?>checked="checked"<? }?> />  <li class="l2">��</label>
 <li class=""<? if($row['mobile']==1){echo 'act';}?>" onclick="mobileonc(7)"> <input name="mobile" type="radio" value="1" <? if(1==$row[mobile]){?>checked="checked"<? }?> /> <li class="l2"> Wap</label>
 <li class=""<? if($row['mobile']==1){echo 'act';}?>" onclick="mobileonc(8)"> <input name="mobile" type="radio" value="2" <? if(2==$row[mobile]){?>checked="checked"<? }?> />  <li class="l2">App</label>
 <li class=""<? if($row['mobile']==1){echo 'act';}?>" onclick="mobileonc(9)"> <input name="mobile" type="radio" value="3" <? if(3==$row[mobile]){?>checked="checked"<? }?> />  <li class="l2">Wap+App</label>
 <li class=""<? if($row['mobile']==1){echo 'act';}?>" onclick="mobileonc(10)"> <input name="mobile" type="radio" value="4" <? if(4==$row[mobile]){?>checked="checked"<? }?> />  <li class="l2">����Ӧ</label>
 </li>
 </ul>
<ul class="uk"> 
<li class="l1" style="border-bottom:none;"><span class="red">*</span> ��װ����</li>
 <li class="l2">
 <span class="finp" style="position:relative;">

<div class="mf <? if($row['azsf']!=1){echo 'act';}?>"  onclick="anzhuangs(1)"> <input name="azsf" type="radio" value="0" <? if(0==$row[azsf]){?>checked="checked"<? }?> /> ��Ѱ�װ</div>
 
<div class="sf <? if($row['azsf']==1){echo 'act';}?>" onclick="anzhuangs(2)"> <input name="azsf" type="radio" value="1" <? if(1==$row[azsf]){?>checked="checked"<? }?> /> �շѰ�װ  </div>
 
 </span>
 </li>
 <div class="azfw">
 <div id="az_div" <? if($row['azsf']==0){?> style="display:none;"<? } ?>>
  <li class="l1"><span class="red">*</span> ��װ����</li>
 <li class="l2"><input class="inp" name="anzhuang"  value="<?=$row[anzhuang]?>" size="10" type="text"/> <span class="red">��ʾ����ֱ������۸�</span></li>
 </div>
<li class="l1"><span class="red">*</span> ��������</li>
<li class="l2">
	<select class="ui-choose" multiple="multiple" id="uc_01">
		<option value="������������������VPS��VM�� " <? if(strstr($row['azzj'],'������������������VPS��VM�� ')==true){echo 'selected="selected"';}?>>������������������VPS��VM��</option>
		<option value="��������������FTP������" <? if(strstr($row['azzj'],'��������������FTP������')==true){echo 'selected="selected"';}?>>��������������FTP������</option>
		<input type="hidden" class="azzj" name="azzj" value="<?=$row['azzj']?>">
	</select>
</li>
<li class="l1"><span class="red">*</span> ����ϵͳ</li>
<li class="l2">
	<select class="ui-choose" multiple="multiple" id="uc_02">
		<option value="Windows " <? if(strstr($row['azxt'],'Windows ')==true){echo 'selected="selected"';}?>>Windows</option>
		<option value=" Linux" <? if(strstr($row['azxt'],' Linux')==true){echo 'selected="selected"';}?>>Linux</option>
		<input type="hidden" class="azxt" name="azxt" value="<?=$row['azxt']?>">
		
	</select>
</li>
<li class="l1"><span class="red">*</span> web����</li>
<li class="l2">
	<select class="ui-choose" multiple="multiple" id="uc_03">
		<option value="IIS " <? if(strstr($row['azhj'],'IIS ')==true){echo 'selected="selected"';}?>>IIS</option>
		<option value=" Apache" <? if(strstr($row['azhj'],' Apache')==true){echo 'selected="selected"';}?>>Apache</option>
		<input type="hidden" class="azhj" name="azhj" value="<?=$row['azhj']?>">
	</select>
</li>
<li class="l1"><span class="red">*</span> ��װ��ʽ</li>
<li class="l2">
	<select class="ui-choose" multiple="multiple" id="uc_04">
		<option value="�ṩ����Ȩ�� " <? if(strstr($row['azfs'],'�ṩ����Ȩ�� ')==true){echo 'selected="selected"';}?>>�ṩ����Ȩ��</option>
		<option value="QQԶ�̰�װ " <? if(strstr($row['azfs'],' QQԶ�̰�װ')==true){echo 'selected="selected"';}?>>QQԶ�̰�װ</option>
		<input type="hidden" class="azfs" name="azfs" value="<?=$row['azfs']?>">
	</select>
</li>
<li class="l1"> α��̬</li>
<li class="l2">
	<select class="ui-choose" id="uc_05">
	<option value="1" <? if(strstr($row['azwjt'],'1')==true){echo 'selected="selected"';}?>>����Ҫ</option>
    <option value="2" <? if(strstr($row['azwjt'],'2')==true){echo 'selected="selected"';}?>>��Ҫ</option>
		<input type="hidden" class="azwjt" name="azwjt" value="<? if(empty($row['azwjt'])){echo 'b';}else{echo $row['azwjt'];}?>">
	</select>
</li>
<div class="layui-form-item">
    <label class="layui-form-label">��ע˵��</label>
    <div class="layui-input-inline" style="width:380px;">
		<textarea name="tazbz" style="height:50px;" class="layui-textarea checkLen" d_len="100"><?=$row[azbz]?></textarea> </div>
		<div class="layui-form-mid layui-word-aux">�ܹ����������� <b id="check_count">100</b> ����</div>
		</div>

 <script>

	// ������.ui-chooseʵ����
	$('.ui-choose').ui_choose();

	$('#uc_01').ui_choose().change = function(value, item) {
		$('.azzj').val(value);
	};
	
	$('#uc_02').ui_choose().change = function(value, item) {
		$('.azxt').val(value);
	};
	
	$('#uc_03').ui_choose().change = function(value, item) {
		$('.azhj').val(value);
	};
	
	$('#uc_04').ui_choose().change = function(value, item) {
		$('.azfs').val(value);
	};
	var uc_05 = $('#uc_05').data('ui-choose');
	uc_05.change = function(value, item) {
	   $('.azwjt').val(value);
	};
	</script>
<div class="notes">
<li> <h3> ��װ����˵����</h3></li>
<li><b>1.</b>����Ѱ�װ�������շѰ�װ�������ҽ���ѡ����һ�����ṩ�κΰ�װ��������������ۣ�</li>
<li><b>2.</b>���������͡���������ϵͳ���������л�����������װ��ʽ��ÿ������ѡһ��Ҳ��ȫѡ��</li>
<li><b>3.</b>��α��̬��Ϊ��ѡ�����Դ���Ƿ���Ҫα��̬���֧�ַ����������У�</li>
<li><b>4.</b>����ע˵����������дһЩ�Ϸ�δ��ѡ�����߸�Դ����ĳЩ�������֧�ֵȸ���˵����</li>
<li><b>5.</b>���������ķ���������Χ�ھ�����ѡ�������ڼ����л�ø�������ɸѡչʾ��</li>
<li><b>6.</b>�����ѡ������������ѡ��һ���޷��ṩ��������ѡ�ķ��񣬲������׾��׽��ж�Ϊ�������Ρ�</li>
	 </div>
  <div style="clear:both;"></div>
</ul>

 <input type="hidden" value="<?=$i?>" name="tysxBnum" />
 <ul class="uk">
 <li class="l1">��Ա�ȼ���</li>
 <li class="l2">
 <label><input name="Rifuserdj" type="radio" value="0" onclick="djonc(0)" <? if(empty($row[ifuserdj])){?>checked="checked"<? }?> /> ������</label> 
 <label><input name="Rifuserdj" type="radio" value="1" onclick="djonc(1)" <? if(1==$row[ifuserdj]){?>checked="checked"<? }?> /> ����</label> 
 </li>
 </ul>
 <div id="djv" style="display:none;">
 <ul class="dju1">
 <li class="l1">��Ա�ȼ�</li>
 <li class="l2">�����ۿ�(10��ʾ���ۿۣ�9��ʾ9��)</li>
 </ul>
 <? 
 $j=1;while1("*","epzhu_userdj where zt=0 order by xh asc");while($row1=mysql_fetch_array($res1)){
 while2("*","epzhu_prouserdj where probh='".$bh."' and djname='".$row1[name1]."'");if($row2=mysql_fetch_array($res2)){$zhekou=$row2[zhi];}else{$zhekou=$row1[zhekou];}
 ?>
 <ul class="dju2">
 <li class="l1"><input type="text" readonly="readonly" name="name1_<?=$j?>" value="<?=$row1[name1]?>" /></li>
 <li class="l2"><input type="text" name="zhekou_<?=$j?>" value="<?=$zhekou?>" /></li>
 </ul>
 <? $j++;}?>
 <input type="hidden" value="<?=$j?>" name="djnum" />
 </div>
 <ul class="uk uk0">
 <li class="l1">�ײ����ã�</li>
 <li class="l21">��<strong><a href="taocanlist.php?bh=<?=$row[bh]?>" target="_blank" class="blue">��������ײͱ༭</a></strong>��</li>
 <li class="l1">��ʾ��ַ��</li>
 <li class="l2"><input type="text" placeholder="�����գ�����Ҫ��http://��ͷ "size="60" value="<?=$row[ysweb]?>" class="inp" name="tysweb" /></li>
 <li class="l1">Դ���С��</li>
 <li class="l2">
 <input class="inp" name="tsizes" value="<?=$row[sizes]?>" size="20" type="text"/>MB
</li>
 <li class="l1">��Ʒ��Դ��</li>
 <li class="l2">
 <label><input name="Rbz" type="radio" value="0" onclick="bzonc(5)" <? if(0==$row[bz]){?>checked="checked"<? }?> /> ת����Ʒ</label>
 <label><input name="Rbz" type="radio" value="1" onclick="bzonc(4)" <? if(1==$row[bz]){?>checked="checked"<? }?> /> ԭ����Ʒ</label> 
 </li>
 <li class="l1">չʾģ�壺</li>
 <li class="l2">
 <select name="ttxtmb" class="inp1">
 <option value="">Ĭ��ģ��</option>
 <? while1("*","epzhu_txtmb where admin=1 order by mbid asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[mbid]?>"<? if($row1[mbid]==$row[txtmb]){?> selected="selected"<? }?>><?=$row1[tit]?>(<?=$row1[txt]?>)</option>
 <? }?>
 </select>

 </div>
 <!--ѡ��E-->
 <ul class="uk">
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("�ύ","productlist.php")?></li>
 </ul>
 </form>
 <!--E-->
</div> 
<!--RE-->
</div>
</div>
<div class="yizhanw"> <div class="yizhanw2"><? include("../tem/bottom.html");?></div> </div>
<script type="text/javascript">
//ʵ�����༭��
fhxsonc(<?=$row[fhxs]?>);
djonc(<?=returnjgdw($row[ifuserdj],"",0)?>);

function xgtread(x){
 $.get("protp.php",{bh:x},function(result){
  $("#xgtp2").html(result);
 });
}
function deltp(x){
 document.getElementById("xgtp1").style.display="";
 $.get("protpdel.php",{id:x},function(result){
  xgtread("<?=$bh?>");
  document.getElementById("xgtp1").style.display="none";
 });
}
xgtread("<?=$bh?>");

function xtinfonc(){
if(document.getElementById("xtzs").innerHTML=="չ��"){document.getElementById("xuantian").style.display="";document.getElementById("xtzs").innerHTML="����";}
else{document.getElementById("xuantian").style.display="none";document.getElementById("xtzs").innerHTML="չ��";}
}

var editor = UE.getEditor('editor'); 

</script>
</body>
</html>