<?php
global $db;

$get_sql=$db->fetchByAssoc($db->query("select *from mailchimp"));

$api_key=$get_sql['mailchimp_apikey'];

$listid=$get_sql['mailchimp_listid'];

//echo $listid; die;
//Api key
$api = new MCAPI($api_key);

// List id 
$list_id = $listid;


?>