<?
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:120036745
include("../config/function.php");//��-�ο�-��-��-ϵQ-Q:12-00-3674-5
sesCheck();
$bh=$_GET[bh];
$userid=returnuserid($_SESSION["SHOPUSER"]);

if($_GET[control]=="update"){
 $sj=date("Y-m-d H:i:s");	
 updatetable("epzhu_yunfei","tit='".sqlzhuru($_POST[ttit])."',money1=".sqlzhuru($_POST[tmoney1]).",money2=".sqlzhuru($_POST[tmoney2]).",sj='".$sj."',zt=0 where userid=".$userid." and bh='".$bh."'");
 php_toheader("yunfei.php?t=suc&bh=".$bh);

}

while0("*","epzhu_yunfei where userid=".$userid." and bh='".$bh."'");if(!$row=mysql_fetch_array($res)){php_toheader("yunfeilist.php");}
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
function tj(){
if((document.f1.ttit.value).replace("/\s/","")==""){alert("������ģ������");document.f1.ttit.focus();return false;}
a=document.f1.tmoney1.value;if(a.replace("/\s/","")=="" || isNaN(a)){alert("��������Ч���˷�");document.f1.tmoney1.focus();return false;}
a=document.f1.tmoney2.value;if(a.replace("/\s/","")=="" || isNaN(a)){alert("��������Ч�����ط���");document.f1.tmoney2.focus();return false;}
tjwait();
f1.action="yunfei.php?control=update&bh=<?=$bh?>";
}
</script>
</head>
<body>
<? include("../tem/top.html");?>


<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > �˷�ģ��</li>
</ul>
<? $leftid=1;include("left.php");?>

<!--RB-->
<div class="right">
 <? include("sellzf.php");?>
 <? include("rcap16.php");?>
 <script language="javascript">
 document.getElementById("rcap2").className="g_ac0_h g_bc0_h";
 </script>
 
 <? systs("��ϲ���������ɹ�!","yunfei.php?bh=".$bh)?>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="yunfei" name="jvs" />
 <ul class="uk">
 <li class="l1"><span class="red">*</span>ģ�����ƣ�</li>
 <li class="l2"><input name="ttit" class="inp" value="<?=$row[tit]?>" size="25" type="text" /></li>
 <li class="l1"><span class="red">*</span>�����˷ѣ�</li>
 <li class="l2"><input name="tmoney1" class="inp" value="<?=$row[money1]?>" size="10" type="text" /></li>
 <li class="l1"><span class="red">*</span>���ط��ã�</li>
 <li class="l2"><input name="tmoney2" class="inp" value="<?=$row[money2]?>" size="10" type="text" /> ÿ1������������</li>
 <li class="l3"></li>
 <li class="l4"><?=tjbtnr("�����޸�","yunfeilist.php")?></li>
 </ul>
 </form>
 
</div> 
<!--RE-->

</div>
</div>
<div class="yizhanw"> <div class="yizhanw2"><? include("../tem/bottom.html");?></div> </div>
</body>
</html>