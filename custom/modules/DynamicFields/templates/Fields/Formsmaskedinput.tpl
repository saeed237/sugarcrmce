{*

/**
 * kbrill - inputmask
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
 */



*}


{include file="modules/DynamicFields/templates/Fields/Forms/coreTop.tpl"}
<input type=hidden id='ext1' name='ext3' value='{$vardef.gen}'>
<tr>
	<td class='mbLBL'>{$MOD.LBL_MASKED_INPUT_STYLE}:</td>
	<td>
	<select name="ext3" onchange="checkCustom(this);">
		{foreach from=$MOD.MASKED_INPUT_FIELD_DOM item=VALUE key=KEY}
			<option value="{$KEY}" {if $MODULE == $KEY}selected{/if}>{$VALUE}</option>
		{/foreach}
	</select>		
           	{literal}
		<script>
		function checkCustom(field){
			if(this.options[this.selectedindex].value=="custom") {
				document.form.custom_div.style.display='show';
			} else {
				document.form.custom_div.style.display='none';
			}
		}
		</script>
		{/literal}
	</td>
</tr>
<div id='custom_div' style="display:none;">
<tr>
	<td class='mbLBL'>{$MOD.LLBL_CUSTOM_FIELD}:</td>
	<td>
		<input type='text' name='ext2' value='{$vardef.ext4}'>
	</td>
</tr>
</div>
{include file="modules/DynamicFields/templates/Fields/Forms/coreBottom.tpl"}
