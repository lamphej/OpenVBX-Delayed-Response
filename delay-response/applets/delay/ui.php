<?php 
$delays = AppletInstance::getValue('delays[]', array('1','2','3'));
$messages = AppletInstance::getValue('messages[]');
$numbers = AppletInstance::getValue("numbers[]");
?>

<div class="vbx-applet delay-applet">
    <h2>Twilio API</h2>
    <p>Please enter your Twilio SID and Token Below</p>
    <fieldset class="vbx-input-container">
        <input type="text" name="sid" value="<?php echo AppletInstance::getValue("sid", "SID"); ?>" class="small"/>
        <input type="text" name="token" value="<?php echo AppletInstance::getValue("token", "TOKEN"); ?>" class="small"/>
    </fieldset><br />
	<h2>SMS Responses</h2>
	<table class="vbx-menu-grid options-table">
	<thead>
		<tr>
			<td>Delay (In Seconds)</td>
			<td>&nbsp;</td>
			<td>Response Message</td>
            <td>Response Number</td>
			<td>Add &amp; Remove</td>
		</tr>
	</thead>
	<tbody>
	<?php foreach($delays as $i=>$key): ?>
		<tr>
			<td>
				<fieldset class="vbx-input-container">
					<input type="text" class="small" value="<?php echo $key ?>" name="delays[]"/>
				</fieldset>
			</td>
			<td>&nbsp;</td>
			<td>
                <fieldset class="vbx-input-container">
                    <input type="text" class="small" value="<?php echo $messages[$i]; ?>" name="messages[]"/>
                </fieldset>
			</td>
            <td>
                <fieldset class="vbx-input-container">
                    <input type="text" class="small" value="<?php echo $numbers[$i]; ?>" name="numbers[]"/>
                </fieldset>
            </td>
			<td>
				<a href="" class="add action">
					<span class="replace">Add</span></a> <a href="" class="remove action"><span class="replace">Remove</span>
				</a>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	<tfoot>
		<tr class="hide">
			<td>
				<fieldset class="vbx-input-container">
					<input type="text" class="small" value="" name="delays[]"/>
				</fieldset>
			</td>
			<td>&nbsp;</td>
			<td>
                <input type="text" class="small" value="" name="messages[]"/>
			</td>
            <td>
                <input type="text" class="small" value="" name="numbers[]"/>
            </td>
			<td>
				<a class="add action" href="">
					<span class="replace">Add</span>
				</a>
				<a class="remove action" href="">
					<span class="replace">Remove</span>
				</a>
			</td>
		</tr>
	</tfoot>
	</table>
</div>


