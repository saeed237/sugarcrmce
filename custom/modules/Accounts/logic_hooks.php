<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
 $hook_version = 1; 
$hook_array = Array(); 
// position, file, function 
$hook_array['after_ui_frame'] = Array(); 
$hook_array['after_ui_frame'][] = Array(1, 'Accounts InsideView frame', 'modules/Connectors/connectors/sources/ext/rest/insideview/InsideViewLogicHook.php','InsideViewLogicHook', 'showFrame'); 

$hook_array['before_save'][] = Array(1, 'Account push into PenguinCRM ', 'custom/modules/Accounts/account_Details.php','account_Details', 'get_account'); 


$hook_array['before_delete'][] = Array(1, 'Account delete from PenguinCRM ', 'custom/modules/Accounts/delete_account.php','delete_account', 'delete_account');



?>