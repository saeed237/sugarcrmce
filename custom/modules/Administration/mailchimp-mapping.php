<?php
//added on 6th April 2013 PenguinCRM Pvt. Ltd.
error_reporting(0);

global $db;
require_once("config.php");

$host=$sugar_config['dbconfig']['db_host_name'];
$user=$sugar_config['dbconfig']['db_user_name'];
$pwd=$sugar_config['dbconfig']['db_password'];
$db_name=$sugar_config['dbconfig']['db_name'];

mysql_connect($host,$user,$pwd);
mysql_select_db($db_name);

require('MCAPI.class.php');


   //-------------------------- Get account table columns list ---------------------------//
		$table1 = 'accounts';
		$table2 = 'accounts_cstm';

        $query1 = "SHOW COLUMNS FROM $table1";
		
		$query2 = "SHOW COLUMNS FROM $table2";
		
        $output = $db->query($query1);
            $columns = array();
            while($result = $db->fetchByAssoc($output))
			{
                $columns[] = $result['Field'];
			}
			
			  $output2 = $db->query($query2);
			 while($result1 = $db->fetchByAssoc($output2))
			{
                $columns[] = $result1['Field'];
			}
      
	 for($i=0;$i<count($columns);$i++)
	 {
		$fld_drp.= "<option value=$columns[$i]>$columns[$i]</option>";
	 }

//--------------------------End  Get account table columns list ---------------------------//



//-------------------------- Get MailChimp Tags ---------------------------//
	 
	 $get_sql=$db->fetchByAssoc($db->query("select *from mailchimp"));

						$api_key=$get_sql['mailchimp_apikey'];

						$listid=$get_sql['mailchimp_listid'];

						//echo $listid; die;
						//Api key
						$api = new MCAPI($api_key);

						// List id 
						$list_id = $listid;
						
						
						$get_form_tags=$api->listMergeVars($list_id);
	
				//echo "<pre>";print_r($list);
					$arr=array();
				  foreach ($get_form_tags as $i => $var)
				  {
					$arr[].=$var['tag'];
					$arr_names[].=$var['name'];
				  }
				  
				$tag_length=count($arr);
				
//-------------------------- End Get MailChimp Tags ---------------------------//	


		  
	 
if(isset($_POST['mailchimp_mapping']))
{

//$ss=array_pop($_POST);




//echo "<pre>";print_r($_POST);

$transport=array_slice($_POST,0,count($_POST)-1);


//echo "<pre>";
//print_r($transport);

$aa=array_combine($arr,$transport);

//$aa=serialize($aa);

//echo "<pre>";print_r($aa); 
$sdf="";
foreach($aa as $key=>$row)
{
$sdf.=$key."+".$row.",";
}

$sdf=rtrim($sdf,",");

$sdf=explode(",",$sdf);
//print_r($sdf);
//echo $sdf;
$pqr='';
foreach($sdf as $val)
{
if(!strpos($val, "select"))
{
$pqr.=$val.",";
}
}
$mapping_string = rtrim($pqr,",");



$get_data=mysql_query("select *from mailchimp");
$get_id=mysql_fetch_array($get_data);
if(mysql_num_rows($get_data)>=1)
{

$db->query("update mailchimp set mapping_data='$mapping_string' where mailchimp_id='$get_id[mailchimp_id]' ");

header("location:index.php?module=Administration");
}
else
{
$db->query("insert into mailchimp(mapping_data) values('$mapping_string') ");

header("location:index.php?module=Administration");
}

}


?>


<form action="" method="post">
<table align="center" border="1" style="width:700px;margin-top:20px">
<tr class="header_mailchimp"   align="center"><td colspan="2"><h3><u>Save MailChimp Mapping</u></h3></td></tr>

<tr class="header_mailchimp"><td>Module Fields</td><td>Mailchimp Fields</td></tr>
<?php 
for($j=0;$j<count($arr);$j++)
{

if( 1 == $j%2 )
{
 ?>
 
<tr class="odd_mailchimp"><td>
<select name="fld_<?php echo $j ; ?>">
<option value="select">Select Field Name</option>
<?php echo $fld_drp ; ?>
<option value="email1">Email</option>
</select>
</td>
<td>
<?php echo $arr_names[$j] ; ?>
</td>
</tr>
<?php 
}
else
{ ?>
<tr class="even_mailchimp"><td>
<select name="fld_<?php echo $j ; ?>">
<option value="select">Select Field Name</option>
<?php echo $fld_drp ; ?>
<option value="email1">Email</option>
</select>
</td>
<td>
<?php echo $arr_names[$j] ; ?>
</td>
</tr>
<?php
}

 } 
 ?>


<tr align="center"><td colspan="2"><input type="submit" name="mailchimp_mapping" value="Submit" ></td></tr>
</table>



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
.header_mailchimp td
{
padding-left: 91px;
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