<?php
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:12-0036-745
include("../config/function.php");
AdminSes_audit();
$id=$_GET[id];
while0("*","epzhu_user where id=".$id);if(!$row=mysql_fetch_array($res)){php_toheader("userlist.php");}

//������ʼ
if($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0701,")){Audit_alert("Ȩ�޲���","default.php");}
 zwzr();
 $d1=intval($_POST[d1]);
 $t=sqlzhuru($_POST[t2]);
 $t1=sprintf("%.2f",$_POST[t1]);
 if($d1==1){$money1=abs($t1);$tit=returnjgdw($t,"","��֤���ֵ");PointIntoB($id,$tit,$money1);PointUpdateB($id,$money1);}
 elseif($d1==2){$money1=abs($t1)*(-1);$tit=returnjgdw($t,"","��֤��۳�");PointIntoB($id,$tit,$money1);PointUpdateB($id,$money1); }
 
 php_toheader("userbao.php?t=suc&id=".$id);

}
//�������
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>����ϵͳ</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
<script language="javascript">
function tj(){
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("��������Ч�ı�֤������!");document.f1.t1.select();return false;}
 if(isNaN(document.f1.t1.value)){alert("��������Ч�ı�֤������!");document.f1.t1.select();return false;}
 layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
 f1.action="userbao.php?control=update&id=<?=$row[id]?>";
 }
</script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu2").className="a1";
</script>
<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0702,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="yjcode">
 <? $leftid=1;include("menu_user.php");?>

<div class="right">
 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���","userbao.php?id=".$id);}?>
 <? include("rightcap3.php");?>
 <script language="javascript">document.getElementById("rtit6").className="a1";</script>
 <!--B-->
 <div class="rkuang">
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="uk">
 <li class="l1">��Ա�ʺţ�</li>
 <li class="l2"><input type="text" class="inp redony" readonly="readonly" name="tuid" size="20" value="<?=$row[uid]?>" /></li>
 <li class="l1">���ñ�֤��</li>
 <li class="l2"><input class="inp redony" readonly="readonly" value="<?=sprintf("%.2f",$row[baomoney])?>" size="10" type="text"/></li>
 <li class="l1">��֤�������</li>
 <li class="l2">
 <select name="d1" class="inp">
 <option value="1">��֤�����</option>
 <option value="2">��֤��۳�</option>
 </select>
 </li>
 <li class="l1">��֤��������</li>
 <li class="l2"><input name="t1" class="inp" size="10" type="text" /></li>
 <li class="l1">˵����</li>
 <li class="l2"><input name="t2" class="inp" size="50" type="text" /></li>
 <li class="l3"><input type="submit" value="�����޸�" class="btn1" /></li>
 </ul>
 </form>
 </div>
 <!--E-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>