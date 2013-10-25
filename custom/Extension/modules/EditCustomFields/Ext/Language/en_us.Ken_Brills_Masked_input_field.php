<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/*********************************************************************************
 * The contents of this file are subject to the SugarCRM Enterprise Subscription
 * Agreement ("License") which can be viewed at
 * http://www.sugarcrm.com/crm/products/sugar-enterprise-eula.html
 * By installing or using this file, You have unconditionally agreed to the
 * terms and conditions of the License, and You may not use this file except in
 * compliance with the License.  Under the terms of the license, You shall not,
 * among other things: 1) sublicense, resell, rent, lease, redistribute, assign
 * or otherwise transfer Your rights to the Software, and 2) use the Software
 * for timesharing or service bureau purposes such as hosting the Software for
 * commercial gain and/or for the benefit of a third party.  Use of the Software
 * may be subject to applicable fees and any use of the Software without first
 * paying applicable fees is strictly prohibited.  You do not have the right to
 * remove SugarCRM copyrights from the source code or user interface.
 *
 * All copies of the Covered Code must include on each user interface screen:
 *  (i) the "Powered by SugarCRM" logo and
 *  (ii) the SugarCRM copyright notice
 * in the same form as they appear in the distribution.  See full license for
 * requirements.
 *
 * Your Warranty, Limitations of liability and Indemnity are expressly stated
 * in the License.  Please refer to the License for the specific language
 * governing these rights and limitations under the License.  Portions created
 * by SugarCRM are Copyright (C) 2004-2009 SugarCRM, Inc.; All Rights Reserved.
 ********************************************************************************/
$mod_strings['LBL_MASKED_INPUT_STYLE']='Mask';
$mod_strings['LBL_CUSTOM_FIELD']='Custom Field Mask';
$mod_strings['LBL_CUSTOM_FIELD_HELP']="<font  face='Courier New'><b><u>Custom mask syntax</u></b><br># = Numeric<br>@ = Alpha (Case Insensitive)<br>A = Alpha (Upper Case Only)<br>a = Alpha (Lower Case)<br>* = Any Character</font><br>";
$mod_strings['LBL_MASKED_VIEW']='View Mask';
$mod_strings['LBL_MASKED_VIEW_HELP']='Use this to hide confidential information like credit card numbers';
$mod_strings['LBL_MASKED_VIEW_SCOPE_HELP']='Should the mask be applied to the DetailView or both Detail and Edit Views?';
$mod_strings['LBL_MASKED_VIEW_USERS_HELP']='Should the mask apply to Normal Users or All Users?';
$mod_strings['LBL_INSTRUCTIONS']='These are the instructions';
$mod_strings['MASKED_INPUT_FIELD_DOM']= array(
'###-##-####'=>'###-##-#### [SSN]',
'(###)-###-####' => '(###)-###-#### [US Phone]',
'@@-####' => '@@-#### [Part Number]',
'**-####' => '**-#### [Test]',
'custom'=>'Custom'
);
$mod_strings['MASKED_INPUT_VIEW_USERS_DOM']= array(
''=>'',
'normal'=>'Normal Users Only',
'all' => 'All Users'
);
$mod_strings['MASKED_INPUT_VIEW_SCOPE_DOM']= array(
''=>'',
'detail'=>'Detail View',
'all' => 'Detail and Edit Views'
);
$mod_strings['MASKED_INPUT_VIEW_DOM']= array(
'' => 'Show all characters',
'X' => 'Show no characters (all masked like "****-***-****")',
'***'=>'Show last 3 characters',
'****' => 'Show last 4 characters',
);
?>
