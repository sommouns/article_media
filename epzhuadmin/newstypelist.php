<?php
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:12-0036-745
include("../config/function.php");
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
<script language="javascript">
function del(x){
document.getElementById("chk"+x).checked=true;
checkDEL(5,'epzhu_newstype')
}
</script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu1").className="a1";
</script>
<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0302,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="yjcode">
 <? $leftid=1;include("menu_quan.php");?>

<div class="right">
 
 <div class="bqu1">
 <a class="a1" href="newstypelist.php">��Ѷ����</a>
 </div>
 <div class="rights">
 <strong>��ʾ��</strong><br>
 Ϊ��ʹ��վ�����ۺ�ʵ������ѣ�<span class="blue">�����Ƽ�ÿ����Ѷ�����ܴﵽ2��</span>��
 </div>
 
 <!--begin-->
 <ul class="ksedi">
 <li class="l2">
 <a href="newstype.php" class="a1">��������</a>
 <a href="javascript:checkDEL(5,'epzhu_newstype')" class="a2">ɾ��</a>
 </li>
 </ul>
 <ul class="qjlistcap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">�����б�</li>
 <li class="l3">���</li>
 <li class="l4">�༭ʱ��</li>
 <li class="l5">����</li>
 </ul>
 <?
 while1("*","epzhu_newstype where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){
 $nu="newstype.php?action=update&id=".$row1[id];
 ?>
 <ul class="qjlist1">
 <li class="l1"><input name="C1" id="chk<?=$row1[id]?>" type="checkbox" value="<?=$row1[id]?>xcf0" /></li>
 <li class="l2"><a href="<?=$nu?>"><?=$row1[name1]?></a></li>
 <li class="l3"><?=$row1[xh]?></li>
 <li class="l4"><?=$row1[sj]?></li>
 <li class="l5">
 <a href="javascript:void(0);" onclick="del(<?=$row1[id]?>)">ɾ��</a><span></span>
 <a class="add" href="newstype1.php?ty1id=<?=$row1[id]?>">��������</a><span></span>
 <a class="edi" href="<?=$nu?>">�޸���Ϣ</a>
 </li>
 </ul>
 <?
 while2("*","epzhu_newstype where admin=2 and name1='".$row1[name1]."' order by xh asc");while($row2=mysql_fetch_array($res2)){
 $nu="newstype1.php?action=update&id=".$row2[id]."&ty1id=".$row1[id]; 
 ?>
 <ul class="qjlist2">
 <li class="l1"><input name="C1" id="chk<?=$row2[id]?>" type="checkbox" value="xcf<?=$row2[id]?>" /></li>
 <li class="l2">- <a href="<?=$nu?>"><?=$row2[name2]?></a></li>
 <li class="l3"><?=$row2[xh]?></li>
 <li class="l4"><?=$row2[sj]?></li>
 <li class="l5">
 <a href="javascript:void(0);" onclick="del(<?=$row2[id]?>)">ɾ��</a><span></span>
 <a href="<?=$nu?>">�޸���Ϣ</a>
 </li>
 </ul>
 <? }}?>
 <!--end-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>