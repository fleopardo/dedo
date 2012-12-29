<div class="emailsQueues form">
<?php echo $this->Form->create('EmailsQueue');?>
<h2><?php echo __('Admin Add Emails Queue'); ?></h2>
	<fieldset>
        <div class="tabs">
            <ul>
                <li><a href="#EmailsQueue-main"><span><?php echo __('General'); ?></span></a></li>
            </ul>
            <div id="EmailsQueue-main">
        	<?php
				echo $this->Form->input('subject');
				echo $this->Form->input('to');
				echo $this->Form->input('body');
                echo $this->Form->input('bcc');
                echo $this->Form->input('emails_sender_id');
				echo $this->Form->input('priority');
				echo $this->Form->input('sent');
			?>
            </div>
        </div>
	</fieldset>
    <div class="buttons">

    <?php
        echo $this->Form->end(__('Save', true));
        echo $this->Html->link(__('Cancel', true), array(
            'action' => 'index',
        ), array(
            'class' => 'cancel',
        ));
    ?>
    </div>
</div>