<?
include("../config/conn.php");//二次开发联系QQ:120036745//二次开发联系QQ:120036745
include("../config/functionwz.php");
sesCheck();
$userid=returnuserid($_SESSION["SHOPUSER"]);
$orderbh=$_GET[orderbh];
while0("*","epzhu_orderwz where orderbh='".$orderbh."' and selluserid=".$userid);if(!$row=mysql_fetch_array($res)){php_toheader("sellorderwz.php");}


if(sqlzhuru($_POST[jvs])=="close"){
 zwzr();
 $zfmm=sha1(sqlzhuru($_POST[t1]));
 if(panduan("uid,zfmm","epzhu_user where zfmm='".$zfmm."' and uid='".$_SESSION[SHOPUSER]."'")==0){Audit_alert("支付密码有误！","sellclosewz.php?orderbh=".$orderbh);}
 if($row[ddzt]!="wait"){Audit_alert("未知错误！","sellorderviewwz.php?orderbh=".$orderbh);}
 $allmoney=$row[money1]*$row[num];
 PointUpdateM($row[userid],$allmoney);
 PointIntoM($row[userid],"卖家取消订单",$allmoney);
 $sj=date("Y-m-d H:i:s");
 updatetable("epzhu_orderwz","ddzt='close',closesj='".$sj."' where selluserid=".$userid." and id=".$row[id]);
 php_toheader("sellorderviewwz.php?orderbh=".$orderbh); 

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><div class="yjcode"><? adwhile("ADTOP");?></div>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>用户管理面板 - <?=webname?></title>
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
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 取消订单</li>
</ul>
<? $leftid=1;include("leftwz.php");?>

<!--RB-->
<div class="right">
 <? include("sellzfwz.php");?>
 <ul class="wz">
 <li class="l0">请选择：</li>
 <li class="g_ac0_h g_bc0_h">订单详情</li>
 <li class="l1"><a href="sellorderwz.php">所有订单</a></li>
 </ul>
 <? include("sellordervwz.php");?>
 
 <? if($row[ddzt]=="wait"){?>
 <script language="javascript">
 function tj(){
 if((document.f1.t1.value).replace("/\s/","")==""){alert("请输入支付密码");document.f1.t1.focus();return false;}
 tjwait();
 f1.action="sellclosewz.php?orderbh=<?=$orderbh?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="ordercz">
 <li class="l1">
 <strong>* 站长提示：</strong><br>
 * 您尚未发货，取消订单后，买家支付的费用将直接退回至其帐号内<br>
 </li>
 <li class="l2">请输入您的支付密码：(<a href="zfmm.php" class="red">忘了支付密码？</a>)</li>
 <li class="l3"><input  name="t1" class="inp" size="30" type="password"/></li>
 <li class="l4"><?=tjbtnr("取消订单")?></li>
 </ul>
 <input type="hidden" value="close" name="jvs" />
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