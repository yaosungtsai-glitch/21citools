<?php
/**
* Company: 
* Program: customer.php
* Author:  Ken Tsai
* Date:    2025.10.21
* Version: 2.0
* Description: 客戶管理功能
*/

Header ("Cache-Control: no-cache, must-revalidate");  // HTTP/1.1
if (!preg_match('/'.ADMINPAGE.'/', $_SERVER['PHP_SELF'])) { die ("Access Denied"); }
include_once("admin/language/customer-".DEFAULTLANGUAGE.".php");
include_once("lib/dbpager.inc.php");
/*
系統管理menu
*/
function customermenu()
{
	include_once("header.php");
	GraphicAdmin();
	OpenTable();
	echo "<center class='toptitle'>"._CUSTOMERADMIN."</center>\n";
	echo "<br/>";
	echo "<a href='".$_SERVER['PHP_SELF']."?op=customer&op2=customeradd'>"._CUSTOMERADD."</a>|";
	echo "<a href='".$_SERVER['PHP_SELF']."?op=customer&op2=customerlist'>"._CUSTOMERLIST."</a>&nbsp&nbsp";
	CloseTable();
	echo "<br/>";
}

/**
 *  身份證需檢核列表 
 **/

function customerlist(){
	customermenu();
	OpenTable();
	echo "<center><font class='undertitle'>"._CUSTOMERLIST."</font></center>\n";
	$sql="select a.id,a.name,a.email,a.cellphone,b.name, case b.enable 
															when '1' then '"._YES."'
															when '0' then '"._NO."'
															else '"._YES."' end 
	from ".ADOPREFIX."_customer a , ".ADOPREFIX."_store b where a.store_id=b.id order by id DESC";
    $colnames= array(_ID,_CUSTOMERNAME,_EMAIL,_CUSTOMERCELLPHONE,_CUSTOMERSTORE,_CUSTOMERSTOREENABLE,_FUNCTIONS);
    $links[0]['link']="op=customer&op2=customeredit";
    $links[0]['label']=_EDIT;    
  
    $rows=dbpage($GLOBALS['adoconn'],$sql,$colnames,$links);
	CloseTable();
	include_once("footer.php");

}

$op='customer';
if ($_REQUEST['op']==$op && isAuthority($_SESSION['aid'],$_REQUEST['op']))
{	

	switch ($_REQUEST['op2'])
	{
		
		case "customerlist":	
			customerlist();
		break;
		default:
			 customermenu();
			 include_opdir($op);
			 include_once("footer.php");
		break;
	}
}
?>
