<?
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:120036745
include("../config/function.php");//��-�ο�-��-��-ϵQ-Q:12-00-3674-5
if(empty($_SESSION["SHOPUSER"])){echo "ok";exit;}
while1("uid,email,ifemail","epzhu_user where uid='".$_SESSION[SHOPUSER]."' and ifemail=1");if(!$row1=mysql_fetch_array($res1)){echo "ok";exit;}

require("../config/mailphp/sendmail.php");
$yz=MakePass(6);
$str="�������󶨣���֤�룺<font color='red' style='font-size:18px;'>".$yz."</font>,�����ڽ����������󶨲�����������Ǳ��˲���������Դ���Ϣ����".webname."��<hr>���ʼ�Ϊϵͳ����������ظ�";
yjsendmail("�������󶨡�".webname."��",$row1["email"],$str);

updatetable("epzhu_user","bdemail='".$yz."' where uid='".$_SESSION[SHOPUSER]."'");echo "ok";exit;

?>