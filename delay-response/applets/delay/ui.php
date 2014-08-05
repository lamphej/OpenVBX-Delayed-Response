<?php 
$delays = AppletInstance::getValue('delays[]', array('1','2','3'));
$messages = AppletInstance::getValue('messages[]');
?>

<div class="vbx-applet delay-applet">
	<h2>SMS Responses</h2>
	<table class="vbx-menu-grid options-table">
	<thead>
		<tr>
			<td>Delay (In Seconds)</td>
			<td>&nbsp;</td>
			<td>Response Message</td>
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


