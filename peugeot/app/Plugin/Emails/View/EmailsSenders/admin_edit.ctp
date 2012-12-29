<div class="emailsSenders form">
<?php echo $this->Form->create('EmailsSender');?>
	<h2><?php echo __('Admin Edit Emails Sender'); ?></h2>
	<fieldset>
		<div class="tabs">
            <ul>
                <li><a href="#EmailsSender-main"><span><?php echo __('General'); ?></span></a></li>
            </ul>
            <div id="EmailsSender-main">
				<?php
				echo $this->Form->input('id');
				echo $this->Form->input('title');
				echo $this->Form->input('email');
				echo $this->Form->input('delivery');
				echo $this->Form->input('port');
				echo $this->Form->input('timeout');
				echo $this->Form->input('host');
				echo $this->Form->input('username');
				echo $this->Form->input('password');
				echo $this->Form->input('status');
				?>
			</div>
		</div>
	</fieldset>
    <div class="buttons">
		<?php
	    echo $this->Form->end(__('Save'));
	    echo $this->Html->link(__('Cancel'), array(
	    	'action' => 'index',
		), array(
	    	'class' => 'cancel',
		));
	    ?>
    </div>
</div>