<?php
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:12-0036-745
include("../config/functionzh.php");
AdminSes_audit();

//������ʼ
if($_GET[control]=="add"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0101,")){Audit_alert("Ȩ�޲���","default.php");}
 zwzr();
 $sj=date("Y-m-d H:i:s");
 $uip=$_SERVER["REMOTE_ADDR"];
 $uid=sqlzhuru($_POST[t1]);
 while1("uid,zt,shopzt","epzhu_user where uid='".$uid."' and zt=1 and shopzt=2");if(!$row1=mysql_fetch_array($res1)){Audit_alert("��Ա�����ڣ�","productlxzh.php");}
 $userid=returnuserid($uid);
 $bh=time()."-".$userid;
 createDir("../upload/".$userid."/".$bh."/");
 intotable("epzhu_prozh","bh,userid,sj,lastsj,uip,ty1id,ty2id,ty3id,ty4id,ty5id,zt,djl,xsnum,yhxs,ifxj,pf1,pf2,pf3,iftj,fhxs","'".$bh."',".$userid.",'".$sj."','".$sj."','".$uip."',".sqlzhuru($_POST[type1id]).",".sqlzhuru($_POST[type2id]).",".sqlzhuru($_POST[type3id]).",".sqlzhuru($_POST[type4id]).",".sqlzhuru($_POST[type5id]).",99,0,0,1,0,5,5,5,0,1");
 php_toheader("productzh.php?bh=".$bh); 
 

}elseif($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0101,")){Audit_alert("Ȩ�޲���","default.php");}
 zwzr();
 updatetable("epzhu_prozh","ty1id=".sqlzhuru($_POST[type1id]).",ty2id=".sqlzhuru($_POST[type2id]).",ty3id=".sqlzhuru($_POST[type3id]).",ty4id=".sqlzhuru($_POST[type4id]).",ty5id=".sqlzhuru($_POST[type5id])." where id=".$_GET[id]);
 php_toheader("productzh.php?bh=".$_GET[bh]); 

}
//��������

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>����ϵͳ</title>
<link href="../css/pty.css" rel="stylesheet" type="text/css" />
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/ptyezh.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
<style type="text/css">
.productlx{margin-left:20px;}
</style>
<script language="javascript">
function uidsel(){
document.f1.t1.value=document.f1.d1.value;	
}
</script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu1").className="a1";
</script>

<div class="yjcode">
 <? $leftid=1;include("menu_quan.php");?>

<div class="right">
 <div class="bqu1">
 <a href="javascript:void(0);" class="a1">��Ʒ�༭</a>
 <a href="productlistzh.php">�����б�</a>
 </div> 
 
 <!--begin-->
 <? if($_GET[action]==""){?>
 <form name="f1" method="post" onsubmit="return tjadd('productlxzh.php',1)">
 <input type="hidden" name="type1id" value="0" />
 <input type="hidden" name="type2id" value="0" />
 <input type="hidden" name="type3id" value="0" />
 <input type="hidden" name="type4id" value="0" />
 <input type="hidden" name="type5id" value="0" />
 <div class="productlx">
 
  <div class="ptype">
  <a href="javascript:void(0);" class="a1">ѡ����� <img border="0" src="../img/jiandown.gif" width="7" height="4" /></a>
  <? while1("*","epzhu_typezh where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
  <a href="javascript:typeonc(<?=$row1[id]?>,'<?=$row1[type1]?>')" class="a2"><?=$row1[type1]?></a>
  <? }?>
  </div>
  
  <div class="ptype">
  <iframe name="ptype2" id="ptype2" marginwidth="1" scrolling="no" marginheight="1" height="100%" width="100%" border="0" frameborder="0"></iframe>
  </div>
  
  <div class="ptype">
  <iframe name="ptype3" id="ptype3" marginwidth="1" scrolling="no" marginheight="1" height="100%" width="100%" border="0" frameborder="0"></iframe>
  </div>
  
  <div class="ptype">
  <iframe name="ptype4" id="ptype4" marginwidth="1" scrolling="no" marginheight="1" height="100%" width="100%" border="0" frameborder="0"></iframe>
  </div>
  
  <div class="ptype">
  <iframe name="ptype5" id="ptype5" marginwidth="1" scrolling="no" marginheight="1" height="100%" width="100%" border="0" frameborder="0"></iframe>
  </div>
  
  <div class="sel">
  <strong>����ǰѡ����ǣ�</strong>
  <span id="type1name"></span>
  <span id="type2name"></span>
  <span id="type3name"></span>
  <span id="type4name"></span>
  <span id="type5name"></span>
  </div>
  <ul class="uk">
  <li class="l1">�����Ա�ʺţ�</li>
  <li class="l2">
  <input type="text" class="inp" name="t1" onfocus="inpf(this)" onblur="inpb(this)" />
  <select name="d1" onchange="uidsel()">
  <option value="">���ʹ��</option>
  <? while1("uid,nc,zt,shopzt","epzhu_user where zt=1 and shopzt=2 order by sj desc limit 5");while($row1=mysql_fetch_array($res1)){?>
  <option value="<?=$row1[uid]?>"><?=$row1[uid]." ".$row1[nc]?></option>
  <? }?>
  </select>
  </li>
  </ul>
  <div class="fb"><input type="submit" value="�����Ķ����¹������ڷ�����Ʒ" /></div>
  <div class="gz"><input id="C1" checked="checked" type="checkbox" value="1" /> �����Ķ���<a href="../help/aboutview8.html" class="feng" target="_blank">��Ʒ������֪����</a>����ͬ��</div>
  
 </div>
 </form>
 
 <? 
 }elseif($_GET[action]=="update"){
 while0("*","epzhu_prozh where id=".$_GET[id]."");if(!$row=mysql_fetch_array($res)){php_toheader("productlistzh.php");}
 ?>
 <form name="f1" method="post" onsubmit="return tjupdate('productlxzh.php',<?=$_GET[id]?>,'<?=$row[bh]?>')">
 <input type="hidden" name="type1id" value="<?=$row[ty1id]?>" />
 <input type="hidden" name="type2id" value="<?=$row[ty2id]?>" />
 <input type="hidden" name="type3id" value="<?=$row[ty3id]?>" />
 <input type="hidden" name="type4id" value="<?=$row[ty4id]?>" />
 <input type="hidden" name="type5id" value="<?=$row[ty5id]?>" />
 <div class="productlx">
 
  <div class="ptype">
  <a href="javascript:void(0);" class="a1">ѡ����� <img border="0" src="../img/jiandown.gif" width="7" height="4" /></a>
  <? while1("*","epzhu_typezh where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
  <a href="javascript:typeonc(<?=$row1[id]?>,'<?=$row1[type1]?>')" class="a2"><?=$row1[type1]?></a>
  <? }?>
  </div>
  
  <div class="ptype">
  <iframe name="ptype2" id="ptype2" marginwidth="1" scrolling="no" marginheight="1" height="100%" width="100%" border="0" frameborder="0" src="../tem/protype2zh.php?type1id=<?=$row[ty1id]?>"></iframe>
  </div>
  
  <div class="ptype">
  <iframe name="ptype3" id="ptype3" marginwidth="1" scrolling="no" marginheight="1" height="100%" width="100%" border="0" frameborder="0" src="../tem/protype3zh.php?type1id=<?=$row[ty1id]?>&type2id=<?=$row[ty2id]?>"></iframe>
  </div>
  
  <div class="ptype">
  <iframe name="ptype4" id="ptype4" marginwidth="1" scrolling="no" marginheight="1" height="100%" width="100%" border="0" frameborder="0" src="../tem/protype4zh.php?type1id=<?=$row[ty1id]?>&type2id=<?=$row[ty2id]?>&type3id=<?=$row[ty3id]?>"></iframe>
  </div>
  
  <div class="ptype">
  <iframe name="ptype5" id="ptype5" marginwidth="1" scrolling="no" marginheight="1" height="100%" width="100%" border="0" frameborder="0" src="../tem/protype5zh.php?type1id=<?=$row[ty1id]?>&type2id=<?=$row[ty2id]?>&type3id=<?=$row[ty3id]?>&type4id=<?=$row[ty4id]?>"></iframe>
  </div>
  
  <div class="sel">
  ����ǰѡ����ǣ�
  <span id="type1name"><?=returntype(1,$row[ty1id])?> >> </span>
  <span id="type2name"><?=returntype(2,$row[ty2id])?> >> </span>
  <span id="type3name"><?=returntype(3,$row[ty3id])?> >> </span>
  <span id="type4name"><?=returntype(4,$row[ty4id])?> >> </span>
  <span id="type5name"><?=returntype(5,$row[ty5id])?></span>
  </div>
  <div class="fb"><input type="submit" value="�����Ķ����¹������ڷ�����Ʒ" /></div>
  <div class="gz"><input id="C1" checked="checked" type="checkbox" value="1" /> �����Ķ���<a href="../help/aboutview8.html" class="feng" target="_blank">��Ʒ������֪����</a>����ͬ��</div>

 </div>
 </form>
 
 <? }?>
 <!--end-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>