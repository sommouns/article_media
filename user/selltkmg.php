<?
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:120036745
include("../config/functionmg.php");
sesCheck();
$userid=returnuserid($_SESSION["SHOPUSER"]);
$orderbh=$_GET[orderbh];
while0("*","epzhu_ordermg where orderbh='".$orderbh."' and selluserid=".$userid);if(!$row=mysql_fetch_array($res)){php_toheader("ordermg.php");}


if(sqlzhuru($_POST[jvs])=="tk"){
 zwzr();
 $zfmm=sha1(sqlzhuru($_POST[t1]));
 if(panduan("uid,zfmm","epzhu_user where zfmm='".$zfmm."' and uid='".$_SESSION[SHOPUSER]."'")==0){Audit_alert("֧����������","selltkmg.php?orderbh=".$orderbh);}
 if($row[ddzt]!="back"){Audit_alert("δ֪����","sellorderviewmg.php?orderbh=".$orderbh);}
 while1("*","epzhu_tkkf where selluserid=".$row[selluserid]." and orderbh='".$orderbh."'");$row1=mysql_fetch_array($res1);
 $sj=date("Y-m-d H:i:s");
 //ͬ��B
 if(sqlzhuru($_POST[R1])=="yes"){
  $allmoney=$row[money1]*$row[num];
  PointUpdateM($row[userid],$allmoney);
  PointIntoM($row[userid],"����ͬ���˿�����",$allmoney);
  updatetable("epzhu_ordermg","ddzt='backsuc',tksj='".$row1[sj]."',tkly='".$row1[tkly]."',tkjg='".sqlzhuru($_POST[t2])."',tkoksj='".$sj."' where selluserid=".$userid." and id=".$row[id]);
  deletetable("epzhu_tkkf where orderbh='".$orderbh."' and selluserid=".$userid);
  deletetable("epzhu_dbkf where orderbh='".$orderbh."' and selluserid=".$userid);
 //ͬ��E
 //��ͬ��B
 }elseif(sqlzhuru($_POST[R1])=="no"){
  updatetable("epzhu_ordermg","ddzt='backerr',tksj='".$row1[sj]."',tkly='".$row1[tkly]."',tkjg='".sqlzhuru($_POST[t2])."',tkoksj='".$sj."' where selluserid=".$userid." and id=".$row[id]);
  deletetable("epzhu_tkkf where orderbh='".$orderbh."' and selluserid=".$userid);
 }
 //��ͬ��E

 
 php_toheader("sellorderviewmg.php?orderbh=".$orderbh); 

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
<link href="css/order.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript" src="../js/layui.js"></script>
<script language="javascript" src="../js/common.js"></script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/userepzhucom.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > �����˿�</li>
</ul>
<? $leftid=1;include("leftmg.php");?>

<!--RB-->
<div class="right">
 <? include("sellzfmg.php");?>
 <ul class="wz">
 <li class="l0">��ѡ��</li>
 <li class="g_ac0_h g_bc0_h">��������</li>
 <li class="l1"><a href="sellordermg.php">���ж���</a></li>
 </ul>
 <? include("sellordervmg.php");?>
 
 <? 
 if($row[ddzt]=="back"){
 while1("*","epzhu_tkkf where selluserid=".$row[selluserid]." and orderbh='".$orderbh."'");$row1=mysql_fetch_array($res1);
 ?>
 <script language="javascript">
 function tj(){
 if((document.f1.t1.value).replace("/\s/","")==""){alert("������֧������");document.f1.t1.focus();return false;}
 if(!confirm("ȷ���ύ��")){return false;}
 tjwait();
 f1.action="selltkmg.php?orderbh=<?=$orderbh?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="ordercz">
 <li class="l1">
 <strong>* վ����ʾ��</strong><br>
 * ���� <span class="red"><?=$row1[tkoksj]?></span> ǰ����������ϵͳĬ���������˿����룬������Զ��˻�����ʻ�<br>
 * �����ͬ�Ȿ���˿��������ҹ�ͨ���������𲻱�Ҫ�ķ���<br>
 * �˿����ɣ�<span class="blue"><?=$row1[tkly]?></span><br>
 * ����ʱ�䣺<?=$row1[sj]?>
 </li>
 <li class="l2">�Ƿ�ͬ���˿</li>
 <li class="l3">
 <label><input name="R1" type="radio" value="yes" checked="checked" /> ͬ��</label>&nbsp;&nbsp;&nbsp;&nbsp;
 <label><input name="R1" type="radio" value="no" /> ��ͬ��</label> 
 </li>
 <li class="l2">ԭ��</li>
 <li class="l3"><input  name="t2" class="inp" size="80" type="text"/></li>
 <li class="l2">����������֧�����룺(<a href="zfmm.php" class="red">����֧�����룿</a>)</li>
 <li class="l3"><input  name="t1" class="inp" size="30" type="password"/></li>
 <li class="l4"><?=tjbtnr("�ύ")?></li>
 </ul>
 <input type="hidden" value="tk" name="jvs" />
 <input type="hidden" value="<?=$orderbh?>" name="orderbh" />
 </form>
 <? }?>

</div> 
<!--RE-->

</div>
</div>
<div class="yizhanw"> <div class="yizhanw2"><? include("../tem/bottom.html");?></div> </div>
</body>
</html>