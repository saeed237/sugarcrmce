<?php
//added on 6th April 2013 PenguinCRM Pvt. Ltd.
require_once("config.php");

$host=$sugar_config['dbconfig']['db_host_name'];
$user=$sugar_config['dbconfig']['db_user_name'];
$pwd=$sugar_config['dbconfig']['db_password'];
$db_name=$sugar_config['dbconfig']['db_name'];

mysql_connect($host,$user,$pwd);
mysql_select_db($db_name);

	 global $db;
											
		/* 			$sql = "CREATE TABLE IF NOT EXISTS `mailchimp` (
					`mailchimp_id` int(11) unsigned NOT NULL auto_increment,
					`mailchimp_apikey` varchar(255) NOT NULL default '',
					`mailchimp_listid` varchar(255) NOT NULL default '',
					`mailchimp_date` varchar(255) NOT NULL default '',
					`mailchimp_ip` varchar(255) NOT NULL default '',
					`mapping_data` varchar(255) NOT NULL default '',

					PRIMARY KEY (`mailchimp_id`)
					)";
					
$db->query($sql);


 

 $get_tables = $db->getTablesArray();
 
if (in_array("accounts_cstm", $get_tables)) 
{
	$db->query("ALTER TABLE accounts_cstm ADD mailchimp_c tinyint(1) DEFAULT '1' ");
}
else
{
 			
$sql2="CREATE TABLE IF NOT EXISTS `accounts_cstm` (
  `id_c` char(36) NOT NULL,
  `mailchimp_c` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_c`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8";
					
$db->query($sql2); 

} */






if(isset($_POST['mailchimp_submit']))
{
extract($_POST);

$ip=$_SERVER['REMOTE_ADDR'];

$get_data=mysql_query("select *from mailchimp");
$get_id=mysql_fetch_array($get_data);
if(mysql_num_rows($get_data)>=1)
{

mysql_query("update mailchimp set mailchimp_apikey='$mailchimp_apikey' , mailchimp_listid='$mailchimp_listid', mailchimp_date=NOW(),mailchimp_ip='$ip' where mailchimp_id='$get_id[mailchimp_id]' ") ;
			
	header("location:index.php?module=Administration");

}
else
{
mysql_query("insert into mailchimp(mailchimp_apikey,mailchimp_listid,mailchimp_date,mailchimp_ip) 
			values('$mailchimp_apikey','$mailchimp_listid',now(),'$ip')");
			
	header("location:index.php?module=Administration");
}
}



?>

<div>
<form action="" method="post">
<table align="center" border="1" style="width:500px;margin-top:50px;">


<tr class="header_mailchimp" align="center"><td colspan="2"><h2>Submit Your MailChimp Details </h2> </td></tr>
<tr><td>&nbsp;</td></tr>

<tr class="even_mailchimp"><td>Api Key :</td><td><input type="text" name="mailchimp_apikey" style="width:250px" required ></td></tr>
<tr><td>&nbsp;</td></tr>
<tr class="even_mailchimp"><td>List Id :</td><td><input type="text" name="mailchimp_listid" style="width:250px" required ></td></tr>
<tr><td>&nbsp;</td></tr>

<tr  class="header_mailchimp" align="center"><td colspan="2"><input type="submit" name="mailchimp_submit" value="Submit" ></td></tr>
</table>
</div>



<style>
.header_mailchimp
{
height:30px;
font-weight:bold;
padding-left:15px;
border-left: none;
border-right: none;
border-top: 1px solid #cccccc;
border-bottom: 1px solid #cccccc;
background: #f6f6f6 !important;
}

.odd_mailchimp
{
height:30px;
font-weight:bold;
padding-left:15px;
border-left: none;
border-right: none;
border-top: 1px solid #cccccc;
border-bottom: 1px solid #cccccc;
background: #ebebed !important;

}
.odd_mailchimp td
{
color:#0046ad;
font-weight: normal;
padding-left: 50px;
}
.even_mailchimp
{
height:30px;
font-weight:bold;
padding-left:15px;
border-left: none;
border-right: none;
border-top: 1px solid #cccccc;
border-bottom: 1px solid #cccccc;
background: #fff !important;

}

.even_mailchimp td
{
color:#0046ad;
font-weight: normal;
padding-left: 50px;
}
</style>