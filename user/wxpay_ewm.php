<?
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:120036745
include("../config/function.php");//��-�ο�-��-��-ϵQ-Q:12-00-3674-5
sesCheck();
$money1=$_GET[money1];
$sj=date("Y-m-d H:i:s");
if(sqlzhuru($_POST[jvs])=="pay"){
 zwzr();
 $t1=sqlzhuru($_POST[t1]);
 $t2=sqlzhuru($_POST[t2]);
 if(empty($t1)){Audit_alert("��������ɨ��֧��һ�µĽ��","wxpay_ewm.php");}
 if(empty($t2)){Audit_alert("������ɨ��֧���ɹ����΢�Ŷ�����","wxpay_ewm.php");}
 if(panduan("*","epzhu_payreng where ddbh='".$t2."'")){Audit_alert("��΢�Ŷ������Ѿ�¼�룬�޷��ظ��ύ","wxpay_ewm.php");}
 $userid=returnuserid($_SESSION[SHOPUSER]);
 intotable("epzhu_payreng","money1,type1,userid,ddbh,sj,ifok","".$t1.",2,".$userid.",'".$t2."','".$sj."',1");
 php_toheader("wxpay_ewm.php?t=suc"); 
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
function tj(){
 if((document.f1.t1.value).replace("/\s/","")==""){alert("��������ɨ��֧��һ�µĽ��");document.f1.t1.focus();return false;}
 if((document.f1.t2.value).replace("/\s/","")==""){alert("������ɨ��֧���ɹ����΢�Ŷ�����");document.f1.t2.focus();return false;}
 if(!confirm("ȷ���Ѿ�ɨ��֧��������������Ϣ����ʵ")){return false;}
 tjwait();
 f1.action="wxpay_ewm.php";
}
</script>
</head>
<body>
<? include("../tem/top.html");?>


<div class="bfb bfbuser">
<!--����E-->
<div class="yjcode">

<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > ΢�Ž���</li>
</ul>
<? $leftid=5;include("left.php");?>

<!--RB-->
<div class="right">
 <ul class="wz">
 <li class="l0">��ѡ��</li>
 <li class="g_ac0_h g_bc0_h">ɨ��֧��</li>
 </ul>
 
 <? systs("��ϲ���������ɹ���<strong>���ǽ������ʵ����</strong>�����Ե�!","wxpay_ewm.php")?>
 <ul class="uk1">
 <li class="l1"></li>
 <li class="l2"><img src="../img/wxpay_ewm.jpg" width="150" height="150" /></li>
 </ul>
 
 <form name="f1" method="post" onSubmit="return tj()">
 <input type="hidden" value="pay" name="jvs" />
 <ul class="uk">
 <li class="l1">������ʾ��</li>
 <li class="l21">����ֻ�<span class="red">΢��</span>��ɨ�����϶�ά���ֵת�ˣ��������ʣ�����ѯ�Ҳ�ͷ�QQ</li>
 <li class="l1">��ֵ��</li>
 <li class="l2"><input type="text" class="inp" name="t1" value="<?=$money1?>" /> <span class="red">�������ʵ�ʳ�ֵ����һ��</span></li>
 <li class="l1">΢�Ŷ����ţ�</li>
 <li class="l2"><input type="text" class="inp" name="t2" /> <span class="red">������ɨ��֧���ɹ����΢�Ŷ�����</span></li>
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("�ύ��ֵ")?></li>
 </ul>
 </form>
 
</div>
<!--RE-->

</div>
</div>
<div class="yizhanw"> <div class="yizhanw2"><? include("../tem/bottom.html");?></div> </div>
</body>
</html>