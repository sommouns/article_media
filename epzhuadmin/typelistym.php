<?php
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:12-0036-745
include("../config/functionym.php");
AdminSes_audit();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>������̨</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/quanju.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu1").className="a1";
</script>
<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0302,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="yjcode">
 <? $leftid=1;include("menu_quanfenlei.php");?>

<div class="right">

 <div class="bqu1">
 <a class="a1" href="typelistym.php">��Ʒ����</a>
 </div>
 <div class="rights">
 <strong>��ʾ��</strong><br>
 1��ÿ������Ĳ㼶����1�������5����<br>
 2����Ϊ��ʹ��վ�����ۺ�ʵ������ѣ�<span class="blue">�����Ƽ���ʹ����ﵽ3��</span>��
 </div>

 <!--begin-->
 <ul class="ksedi">
 <li class="l2">
 <a href="type1ym.php" class="a1">��������</a>
 <a href="javascript:checkDEL(4,'epzhu_typeym')" class="a2">ɾ��</a>
 </li>
 </ul>
 <ul class="typelistcap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">�����</li>
 <li class="l3">��������</li>
 <li class="l4">�Ƽ�Ӷ��</li>
 <li class="l5">����ʱ��</li>
 <li class="l6">���</li>
 <li class="l7">�༭ʱ��</li>
 <li class="l8">����</li>
 </ul>
 <?
 while1("*","epzhu_typeym where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){
 $nu="type1ym.php?action=update&id=".$row1[id];
 ?>
 <ul class="typelist">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row1[id]?>" /></li>
 <li class="l2">
 <a href="typelistsym.php?ty1id=<?=$row1[id]?>"><strong><?=$row1[type1]?></strong></a><? if(empty($row1[iftj])){?> <span class="red">(�Ƽ�)</span><? }?>
 </li>
 <li class="l3"><?=returnjgdw($row1[sellbl],"","ȫ��")?></li>
 <li class="l4"><?=returnjgdw($row1[tjmoney],"","ȫ��")?></li>
 <li class="l5"><?=returnjgdw($row1[dbsj],"","ȫ��")?></li>
 <li class="l6"><?=$row1[xh]?></li>
 <li class="l7"><?=$row1[sj]?></li>
 <li class="l8">
 <a href="type2ym.php?ty1id=<?=$row1[id]?>">����</a><span></span>
 <a href="<?=$nu?>">�༭</a><span></span><a href="typesxlistym.php?typeid=<?=$row1[id]?>">����ѡ��</a>
 </li>
 </ul>
 <? }?>
 <!--end-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>