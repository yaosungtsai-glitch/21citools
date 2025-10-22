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

/**
 * 新增客戶資料
 **/
function customeradd(){

	OpenTable();
	
	CloseTable();
	include_once("footer.php");

}

$op='customer';
if ($_REQUEST['op']==$op && isAuthority($_SESSION['aid'],$_REQUEST['op']))
{	
	switch ($_REQUEST['op2'])
	{
		
		case "customeradd":	
			customeradd();
		break;

	}
}
?>
