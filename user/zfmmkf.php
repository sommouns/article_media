<?
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:120036745
include("../config/function.php");//��-�ο�-��-��-ϵQ-Q:12-00-3674-5
sesCheck();
$sqluser="select * from epzhu_user where uid='".$_SESSION[SHOPUSER]."' and ifemail=1";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){Audit_alert("��δ�����䣬���Ƚ��а�","emailbd.php");}

if(sqlzhuru($_POST[jvs])=="zf"){
 zwzr();
 if(empty($_POST[t1])){Audit_alert("��֤������","zfmm.php");}
 if(panduan("uid,getpwd","epzhu_user where getpwd='".sqlzhuru($_POST[t1])."' and uid='".$_SESSION[SHOPUSER]."'")==0){Audit_alert("��֤������","zfmm.php");}
 $zfmm=sha1(sqlzhuru($_POST[tzfmm]));
 updatetable("epzhu_user","zfmm='".$zfmm."',getpwd='' where uid='".$_SESSION[SHOPUSER]."'");
 php_toheader("zfmm.php?t=suc"); 

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
 if((document.f1.tzfmm.value).replace("/\s/","")==""){alert("�������µİ�ȫ��");document.f1.tzfmm.focus();return false;}
 if((document.f1.t1.value).replace("/\s/","")==""){alert("��������֤��");document.f1.t1.focus();return false;}
 tjwait();
 f1.action="zfmm.php";
}


//���Ϳ�ʼ
var sz;
var xmlHttp = false;
try {
  xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
  try {
    xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
  } catch (e2) {
    xmlHttp = false;
  }
}
if (!xmlHttp && typeof XMLHttpRequest != 'undefined') {
  xmlHttp = new XMLHttpRequest();
}

function updatePage() {
  if (xmlHttp.readyState == 4) {
    response = xmlHttp.responseText;
	response=response.replace(/[\r\n]/g,'');
	if(response=="err"){clearInterval(sz);document.getElementById("sjzouv").innerHTML=120;document.getElementById("fsid1").style.display="none";document.getElementById("fsid2").style.display="";alert("���Ȱ�����");return false;}
   else{sz=setInterval("sjzou()",1000);return false;}
  }
}


function yzonc(){
 document.getElementById("sjzouv").innerHTML=120;
 document.getElementById("fsid1").style.display=""; 
 document.getElementById("fsid2").style.display="none"; 
 var url = "mobtx.php";
 xmlHttp.open("post", url, true);
 xmlHttp.onreadystatechange = updatePage;
 xmlHttp.send(null);
}

function sjzou(){
 s=parseInt(document.getElementById("sjzouv").innerHTML);
 if(s<=0){
  clearInterval(sz);
  document.getElementById("fsid1").style.display="none"; 
  document.getElementById("fsid2").style.display=""; 
  return false;
 }else{document.getElementById("sjzouv").innerHTML=s-1;}
}

</script>
</head>
<body>
<? include("../tem/top.html");?>


<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > �޸İ�ȫ��</li>
</ul>
<? $leftid=5;include("leftkf.php");?>
<!--RB-->
<div class="right">
 <? include("rcap2.php");?>
 <script language="javascript">
 document.getElementById("rcap6").className="g_ac0_h g_bc0_h";
 </script>
 <? systs("��ϲ���������ɹ�!","zfmm.php")?>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="zf" name="jvs" />
 <ul class="uk">
 <li class="l1">�°�ȫ�룺</li>
 <li class="l2"><input type="password" class="inp" name="tzfmm" /></li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span>������֤�룺</li>
 <li class="l2"><input type="text" class="inp" name="t1" /> ����ǰ�󶨵�������<?=$rowuser[email]?>����<a href="emailbd.php" class="feng">�޸�����</a>��</li>
 <li class="l1"></li>
 <li class="l21" id="fsid1" style="display:none;">�����С���(<span id="sjzouv" class="red">120</span>��)</li>
 <li class="l21" id="fsid2">[<a href="#" onclick="javascript:yzonc();">������֤��</a>]</li>
 <li class="l3"></li>
 <li class="l4"><?=tjbtnr("�ύ")?></li>
 </ul>
 </form>

 
</div> 
<!--RE-->

</div>
</div>
<div class="yizhanw"> <div class="yizhanw2"><? include("../tem/bottom.html");?></div> </div>
</body>
</html>