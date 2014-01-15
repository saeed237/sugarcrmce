<?php
/**
 * Processing index => For sorting before exporting the array
 * Label/type => Some string value to identify the hook
 * PHP file to include => Where your class is located. Insert into ./custom.
 * PHP class the method is in => The name of your class
 * PHP method to call => The name of your method
 *
 */
//$hook_array['after_retrieve'] = array();
$hook_array['after_save'][] = Array(1, 'after_save', 'custom/modules/Contacts/ContactHooks.php', 'ContactHooks', 'after_save_delete_wrong_network_enrty');
?>