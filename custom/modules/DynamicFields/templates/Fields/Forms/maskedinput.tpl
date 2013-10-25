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
<tr>
	<td class='mbLBL'>{$MOD.LBL_MASKED_INPUT_STYLE}:</td>
	<td>
	<select name="custom" onchange="checkCustom(this);">
		{foreach from=$MOD.MASKED_INPUT_FIELD_DOM item=VALUE key=KEY}
			<option value="{$KEY}" {if $vardef.default == $KEY}selected{/if}>{$VALUE}</option>
		{/foreach}
	</select>		
{literal}
		<script>
		function checkCustom(field){
			var e1 = document.getElementById("c1");
			var e2 = document.getElementById("c2");
			if(field.options[field.selectedIndex].value=="custom") {
				e1.style.display='block';
				e2.style.display='block';
			} else {
				e1.style.display='none';
				e2.style.display='none';
			}
		}
		</script>
{/literal}
	</td>
</tr>
<tr>
	<td class='mbLBL'><div id="c1" style="display: none;">{$MOD.LBL_CUSTOM_FIELD}:</div></td>
	<td>
		<div id='c2' style="display: none;">
			<input type='text' name='mask' value='{$vardef.default}'>
			<img border='0' id="custom" src='{sugar_getimagepath file='helpInline.gif'}'>
		</div>
	</td>
</tr>
<tr>
	<td class='mbLBL'>{$MOD.LBL_MASKED_VIEW}:</td>
	<td>
	<select name="ext3" id="ext3" onchange="javascript: update_mask();">
		{foreach from=$MOD.MASKED_INPUT_VIEW_DOM item=VALUE key=KEY}
			<option value="{$KEY}" {if $vardef.ext3 == $KEY}selected{/if}>{$VALUE}</option>
		{/foreach}
	</select>
	<img border='0' id="detail" src='{sugar_getimagepath file='helpInline.gif'}'>
	</td>
</tr>

{include file="modules/DynamicFields/templates/Fields/Forms/coreBottom.tpl"}

<script type="text/javascript">
YAHOO.namespace("help.container");
YAHOO.help.container.tt1 = new YAHOO.widget.Tooltip("tt1", 
								{literal}{{/literal} context:"detail",								 
								text:"{$MOD.LBL_MASKED_VIEW_HELP}" {literal}}{/literal});
YAHOO.help.container.tt2 = new YAHOO.widget.Tooltip("tt2", 
								{literal}{{/literal} context:"custom",								 
								text:"{$MOD.LBL_CUSTOM_FIELD_HELP}" {literal}}{/literal});
YAHOO.help.container.tt1 = new YAHOO.widget.Tooltip("tt1", 
								{literal}{{/literal} context:"scope",								 
								text:"{$MOD.LBL_MASKED_VIEW_SCOPE_HELP}" {literal}}{/literal});
YAHOO.help.container.tt1 = new YAHOO.widget.Tooltip("tt1", 
								{literal}{{/literal} context:"users",								 
								text:"{$MOD.LBL_MASKED_VIEW_USERS_HELP}" {literal}}{/literal});

var ext1=document.getElementById('ext1');
var ext2=document.getElementById('ext2');
var ext3=document.getElementById('ext3');
if(ext3.selectedIndex!=0) {literal}{{/literal}
	if(ext1.selectedIndex==0) {literal}{{/literal}
		ext1.selectedIndex=1;
	{literal}}{/literal}
	if(ext2.selectedIndex==0) {literal}{{/literal}
		ext2.selectedIndex=1;
	{literal}}{/literal}
{literal}}{/literal}
if(ext3.selectedIndex==0) {literal}{{/literal}
		ext1.selectedIndex=0;
		ext2.selectedIndex=0;
		ext1.disabled=true;
		ext2.disabled=true;
{literal}}{/literal}

function update_mask() {literal}{{/literal}
	var ext3_value='{$vardef.ext3}';
	if (ext3_value=="" && document.getElementById('ext3').selectedIndex!=0) {literal}{{/literal}
		document.getElementById('ext1').selectedIndex=1;
		document.getElementById('ext2').selectedIndex=1;
		document.getElementById('ext1').disabled=false;
		document.getElementById('ext2').disabled=false;
	{literal}}{/literal}
	if (document.getElementById('ext3').selectedIndex==0) {literal}{{/literal}
		document.getElementById('ext1').selectedIndex=0;
		document.getElementById('ext2').selectedIndex=0;
		document.getElementById('ext1').disabled=true;
		document.getElementById('ext2').disabled=true;
	{literal}}{/literal}
{literal}}{/literal}
</script>