<?
session_start();
header("Content-type: text/html; charset=gb2312"); 
include_once("config.php");
include_once("sql.php");
$conn=@mysql_connect(sqlhost.":".sqldk,sqluid,sqlpwd) or die("ERR001,��ϵ������Ա����");
mysql_select_db(sqltable,$conn) or die("ERR002,��ϵ������Ա����");
date_default_timezone_set('Asia/Shanghai');

$sqlcontrol="select * from epzhu_control";mysql_query("SET NAMES 'GBK'");$rescontrol=mysql_query($sqlcontrol,$conn);
if(!$rowcontrol=mysql_fetch_array($rescontrol)){echo "<h1>վ��δ���л������ã�������վ�޷�����,��ϵ������Ա�������������ERR004��</h1>";exit;}
define("weburl",$rowcontrol["weburlv"]); 
define("webname",$rowcontrol["webnamev"]);
define("websypos",$rowcontrol["websyposv"]);
?>