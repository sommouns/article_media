<?
include("../config/conn.php");
include("../config/function.php");

if($_GET["chk"]!=sha1($_GET[id].weburl)){php_toheader("../");}
$id=$_GET[id];
$tmp=$_GET[tmp];
if(!preg_match("/^[_a-zA-Z0-9.@]*$/",$tmp) || empty($tmp)){Audit_alert("�Ƿ���Դ��","../");}
while0("id,uid,getpwd","epzhu_user where id=".$id." and getpwd='".$tmp."'");if(!$row=mysql_fetch_array($res)){Audit_alert("·������","getpasswd.php");}
$uid=$row[uid];

if(sqlzhuru($_POST[jvs])=="repwd"){
 zwzr();
 $pwd=sha1(sqlzhuru($_POST[t1]));
 $y=time().rnd_num(100);
 updatetable("epzhu_user","pwd='".$pwd."',getpwd=''where id=".$id." and getpwd='".$tmp."'");
 $_SESSION["SHOPUSER"]=$uid;
 php_toheader("../user/");
}
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�һ����� - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="index.js"></script>
</head>
<body>

<? include("../tem/top--.html");?><? include("../tem/tongepzhu.html");?>

<div class="yjcode">

 <div class="getpassword">
  <ul class="u1">
  <li class="l1">��������</li>
  <li class="l2"></li>
  </ul>
 </div>
 
 <div class="getpwdmain">
  <form name="f1" method="post" onSubmit="return repwdtj(<?=$_GET[id]?>,'<?=$_GET[chk]?>','<?=$_GET[tmp]?>')">
  
  <ul class="u1">
  <li class="l1">�ʺţ�</li>
  <li class="l2"><input value="<?=$uid?>" readonly class="inp" type="text" style="width:184px;" /></li>
  <li class="l3"></li>
  </ul>
  
  <ul class="u1">
  <li class="l1">���������룺</li>
  <li class="l2"><input name="t1" class="inp" type="password" style="width:184px;" /></li>
  <li class="l3"></li>
  </ul>
  
  <ul class="u1">
  <li class="l1">�ظ������룺</li>
  <li class="l2"><input name="t2" class="inp" type="password" style="width:184px;" /></li>
  <li class="l3"></li>
  </ul>
  
  <ul class="u1">
  <li class="l1"></li>
  <li class="l2"><? tjbtnr("�ύ����");?></li>
  <li class="l3"></li>
  </ul>
  
  <input type="hidden" value="repwd" name="jvs" />
  </form>
 </div>

</div>

<div class="yizhanw"> <div class="yizhanw2"><? include("../tem/bottom.html");?></div> </div>
</body>
</html>