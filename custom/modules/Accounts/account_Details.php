<?php
// Added on 6th April 2013 PenguinCRM Pvt. Ltd.
error_reporting(0);
require('MCAPI.class.php');
		
//require('mailchimp-config.php');

class account_Details 
{
	function get_account(&$bean,$event,$arguments)
	{
		global $db;
		
		//echo "<pre>"; print_r($bean);die();
		/* 
		echo "<pre>"; print_r($bean->fetched_row['assigned_user_id']);
		print_r($bean['assigned_user_id']);
		die();
	 */
	
		//$email= $bean->email_address;
		//echo $bean->email1;
		//echo $bean->website; die;
	
		//............................Curl Concept ...............
		
	

		
		   
			
		//----------------------------- database connect and get api key and list id ----------------//
					

						$get_sql=$db->fetchByAssoc($db->query("select *from mailchimp"));

						$api_key=$get_sql['mailchimp_apikey'];
						
						//echo $get_sql['mapping_data']; die;

						$listid=$get_sql['mailchimp_listid'];

						//echo $listid; die;
						//Api key
						$api = new MCAPI($api_key);

						// List id 
						$list_id = $listid;
						
		//---------------------End  database connect and get api key and list id ----------------//
		
				
$ar=$get_sql['mapping_data'];

$ar=explode(",",$ar);
$rty=array();

foreach($ar as $key=>$sing)
{
	//echo $sing."<br>";
	$ar=explode("+",$sing);
	//$ptr=$ar[1];
	
	//$rty[$ar[0]]=$printbutton.$ptr;
	
	foreach($bean as  $key=>$val)
	{
		if($key==$ar[1])
		$rty[$ar[0]]=$val;
		
	}
	
	
	
	//print_r($ar);
}

//print_r($rty);
//$rty=array_slice($rty,0,count($rty)-1);
//echo "<pre>";print_r($rty); 

//die;
		
		
		
		//---------chack in mailchimp email is present or not ------------------------------//
		
		$retval = $api->listMemberInfo($list_id, $bean->email1);
		
		//--------- End chack in mailchimp email is present or not ------------------------------//
		
			$mailchimp_data=array(
						'email'=>$bean->email1,
						'name'=>$bean->name,
						'phone'=>$bean->phone_office,
							);
			
			//print_r($mailchimp_data);die;
			
			//----------------get mailchimp tags ----------------------//
				$get_form_tags=$api->listMergeVars($list_id);
	
				//echo "<pre>";print_r($list);
					$arr=array();
				  foreach ($get_form_tags as $i => $var)
				  {
					$arr[].=$var['tag'];
				  }
				   
				//----------------End get mailchimp tags ----------------------//  
					//$form_val=array($bean->email1,$bean->name,$bean->billing_address_street,$bean->billing_address_city,$bean->phone_office,' ');
					
					//  echo "<pre>";print_r($arr); 
					// echo "<pre>"; print_r($bean);die;
				 
					//$c=array_combine($arr,$form_val);
				   
				//print_r($c); die;


			//	print_r($mailchimp_data); die;
					
			
			//echo "<pre>";print_r($retval); 
			
			//echo $retval['data'][0]['id'] ; die;
			
			
			if($bean->mailchimp_c==1)
			{
					if($retval['data'][0]['id']=="")
					{
						//insert_mailchimp($mailchimp_data);
						$email=$bean->email1;
						$mergeVars = $rty;
					// print_r($mergeVars); die;
						$api->listSubscribe($list_id, $email, $mergeVars) ;
						
					}
					else
					{
						//update_mailchimp($mailchimp_data);
						
						$email=$bean->email1;
						$mergeVars = $rty;
											
						// print_r($mergeVars); die;
						$api->listUpdateMember($list_id, $email, $mergeVars) ;
					}
			}			
	
	}

}


  



?>