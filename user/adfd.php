<?
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:120036745
include("../config/function.php");//��-�ο�-��-��-ϵQ-Q:12-00-3674-5
sesCheck();
$bh=$_GET[bh];
$sj=date("Y-m-d H:i:s");
while0("*","epzhu_adlx where bh='".$bh."' and fflx=2 and admin=1");if(!$row=mysql_fetch_array($res)){php_toheader("adlx1.php");}

$id=$_GET[id];

$sqluser="select * from epzhu_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("../reg/");}

if($_GET[control]=="add"){  //��ʾ����
 zwzr();
 $d1=intval($_POST[d1]);
 while1("*","epzhu_adlx where id=".$d1);if(!$row1=mysql_fetch_array($res1)){php_toheader("adlx1.php");}
 if($rowuser[money1]<$row1[money1]){Audit_alert("���㣬���ȳ�ֵ��","pay.php");}
 $dqsj=date("Y-m-d H:i:s",strtotime("+".$row1[tianshu]." day"));
 $nxh=$row1[xh];
 $R1=sqlzhuru($_POST[R1]);
 $userid=$rowuser[id];
 $mbh=time()."adu".$userid;
 if($R1=="ͼƬ"){$tp=inp_tp_upload(1,"../gg/",$mbh);}elseif($R1=="����"){$tp=inp_tp_upload(2,"../gg/",$mbh);}
 if($tp!=""){$b=preg_split("/\./",$tp);$tptype=$b[1];}else{$tptype="";}
 if($R1=="ͼƬ"){$aurl=sqlzhuru($_POST[t1]);}elseif($R1=="����"){$aurl=sqlzhuru($_POST[t3]);}
 if(panduan("*","epzhu_ad where adbh='".$row[adbh]."' and zt<>99 and xh=".$nxh."")==1){$zt=1;}else{$zt=0;}
 intotable("epzhu_ad","bh,type1,jpggif,tit,adbh,txt,sj,aurl,xh,aw,ah,dqsj,zt,money1,userid","'".$mbh."','".$R1."','".$tptype."','".sqlzhuru($_POST[at1])."','".$row[adbh]."','".sqlzhuru($_POST[s1])."','".$sj."','".$aurl."',".$nxh.",".sqlzhuru($_POST[t2]).",".sqlzhuru($_POST[t4]).",'".$dqsj."',".$zt.",".$row1[money1].",".$userid."");
 PointUpdateM($userid,$row1[money1]*(-1));
 PointIntoM($userid,"�����������λ".$row[adbh],$row1[money1]*(-1));
 php_toheader("adlxlist.php?zt=".$zt);
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><div class="yjcode"><? adwhile("ADTOP");?></div>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�û�������� - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript" src="../js/layui.js"></script>
<script language="javascript" src="../js/common.js"></script>
<script language="javascript">
function lxsel(x){
	document.getElementById("adtp").style.display="none";
	document.getElementById("adcode").style.display="none";
	document.getElementById("adfont").style.display="none";
	document.getElementById("adflash").style.display="none";
	switch(x){
		case "ͼƬ":
	document.getElementById("adtp").style.display="";
		break;
		case "����":
	document.getElementById("adcode").style.display="";
		break;
		case "����":
	document.getElementById("adfont").style.display="";
		break;
		case "����":
	document.getElementById("adflash").style.display="";
		break;
		}
}
function tj(x){
 if((document.f1.at1.value).replace(/\s/,"")==""){alert("�����������");document.f1.at1.focus();return false;}
 r=document.getElementsByName("R1");rr="";for(i=0;i<r.length;i++){if(r[i].checked==true){rr=r[i].value;}}if(rr==""){alert("��ѡ�����ͣ�");return false;}
 if(rr=="����"){
  if((document.f1.t2.value).replace(/\s/,"")=="" || isNaN(document.f1.t2.value)){alert("��������Ч�Ķ�������");document.f1.t2.focus();return false;}
  if((document.f1.t4.value).replace(/\s/,"")=="" || isNaN(document.f1.t4.value)){alert("��������Ч�Ķ����߶�");document.f1.t4.focus();return false;}
 }
 if(!confirm("ȷ���ύ��һ���ύ�������޸ģ���˶���ϸ��")){return false;}
 tjwait();
 f1.action="adfd.php?control=add&bh=<?=$bh?>&id=<?=$id?>";
}
</script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/userepzhucom.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > <a href="adlx1.php">ѡ���������λ</a> > <?=$row[adbh]?></li>
</ul>
<? $leftid=1;include("indexleftAd.php");?>

<!--RB-->
<div class="right">

 <? include("rcap14.php");?>
 <script language="javascript">
 document.getElementById("rcap1").className="g_ac0_h g_bc0_h";
 </script>

 <ul class="ukad">
 <li class="l1">ѡ��λ�ã�</li>
 <li class="l2">
 <?
 $i=0;
 while1("*","epzhu_adlx where admin=2 and bh='".$bh."' GROUP by xh");while($row1=mysql_fetch_array($res1)){
 if(panduan("*","epzhu_ad where zt<>99 and adbh='".$row[adbh]."' and xh=".$row1[xh]."")==1){$s="s3 s31";$sy="���ۿ�Ԥ��";}
 else{$s="s3";$sy="�������";}
 ?>
 <a class="<?=$s?>" href="adfd.php?bh=<?=$bh?>&id=<?=$row1[id]?>"><b>λ��<?=$row1[xh]?></b><br><strong><?=$sy?></strong></a>
 <? $i++;}?>
 </li>
 </ul>

 <!--��ʼ���ӹ�����-->
 <?
 if(!empty($id)){
 $sqlad="select * from epzhu_adlx where id=".$id;mysql_query("SET NAMES 'GBK'");$resad=mysql_query($sqlad);
 if(!$rowad=mysql_fetch_array($resad)){php_toheader("adlx1.php");}
 ?>
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <ul class="uk">
 <li class="l1">���λ��</li>
 <li class="l21"><?=$row[adbh]?>��<?=$row[tit]?></li>
 <li class="l1">����λ�ã�</li>
 <li class="l21"><strong class="red" style="font-size:14px"><?=$rowad[xh]?></strong></li>
 <li class="l1">�Ŷ�������</li>
 <li class="l21"><?=returncount("epzhu_ad where adbh='".$row[adbh]."' and zt=1 and xh=".$rowad[xh]."")?></li>
 <li class="l1">���ߴ磺</li>
 <li class="l21">����<?=returnjgdw($row[adw],"px","����")?>���ߣ�<?=returnjgdw($row[adh],"px","����")?></li>
 <li class="l1">������</li>
 <li class="l21"><?=$rowuser[money1]?>Ԫ  [<a href="pay.php" target="_blank">��ֵ</a>]</li>
 <li class="l1"><span class="red">*</span> ����������</li>
 <li class="l2">
 <select name="d1">
 <option value="0">ѡ������</option>
 <? while1("*","epzhu_adlx where admin=2 and bh='".$bh."' and xh=".$rowad[xh]." order by id asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>"><?=$row1[tianshu]?>�죬�۸�<?=$row1[money1]?>Ԫ</option>
 <? }?>
 </select>
 </li>
 <li class="l1"><span class="red">*</span> ���⣺</li>
 <li class="l2"><input name="at1" size="40" onfocus="inpf(this)" onblur="inpb(this)" class="inp" type="text" /></li>
 <li class="l1"><span class="red">*</span> ������ͣ�</li>
 <li class="l2">
 <span class="finp">
 <? if(strstr($row[adty],"xcf1xcf")){?><input name="R1" onclick="lxsel('ͼƬ')" type="radio" value="ͼƬ" /> ͼƬ <? }?>
 <? if(strstr($row[adty],"xcf2xcf")){?><input name="R1" type="radio" value="����" onclick="lxsel('����')" /> ���� <? }?>
 <? if(strstr($row[adty],"xcf3xcf")){?><input name="R1" type="radio" value="����" onclick="lxsel('����')" /> ���� <? }?>
 <? if(strstr($row[adty],"xcf4xcf")){?><input name="R1" type="radio" value="����" onclick="lxsel('����')" /> ����Flash<? }?>
 </span>
 </li>
 </ul>
 
 <ul class="uk" id="adtp" style="display:none;">
 <li class="l1"><span class="red">*</span> ���ӵ�ַ��</li>
 <li class="l2"><input name="t1" value="http://" size="40" onfocus="inpf(this)" onblur="inpb(this)" class="inp" type="text" /></li>
 <li class="l1"><span class="red">*</span> ���ͼƬ��</li>
 <li class="l2"><input type="file" name="inp1" id="inp1" size="15"></li>
 </ul>

 <ul class="uk" id="adcode" style="display:none;">
 <li class="l9"><span class="red">*</span> ���룺</li>
 <li class="l10"><textarea name="s1"></textarea></li>
 </ul>

 <ul class="uk" id="adfont" style="display:none;">
 <li class="l1"><span class="red">*</span> ���ӵ�ַ��</li>
 <li class="l2"><input name="t3" value="http://" size="40" onfocus="inpf(this)" onblur="inpb(this)" class="inp" type="text" /></li>
 </ul>

 <ul class="uk" id="adflash" style="display:none;">
 <li class="l1"><span class="red">*</span> ѡ�񶯻���</li>
 <li class="l2"><input type="file" name="inp2" id="inp2" size="15"> </li>
 <li class="l1"><span class="red">*</span> �������ã�</li>
 <li class="l2">
 ����<input name="t2" size="10" value="0" onfocus="inpf(this)" onblur="inpb(this)" class="inp" type="text" /> 
 �ߣ�<input name="t4" value="0" onfocus="inpf(this)" onblur="inpb(this)" size="10" class="inp" type="text" /> 
 </li>
 </ul>

 
 <ul class="uk">
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("�ύ����","adlx1.php")?></li>
 </ul>
 </form>
 <? }?>


</div>
<!--RE-->

</div>
</div>
<div class="yizhanw"> <div class="yizhanw2"><? include("../tem/bottom.html");?></div> </div>
</body>
</html>