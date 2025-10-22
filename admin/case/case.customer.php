<?php
/*******************************************
 * Company: 
 * Program: case.customer.php
 * Author:  Ken Tsai
 * Date:    from 2025.10.21
 * Version: 2.0
 *******************************************/

//if (!eregi(ADMINPAGE, $_SERVER['PHP_SELF'])) { die ("Access Denied"); }
if (!preg_match('/'.ADMINPAGE.'/i', $_SERVER['PHP_SELF'])) { die ("Access Denied"); }
if ($_REQUEST['op']=="customer")
{
	include_once("admin/modules/customer.php");
}
?>
