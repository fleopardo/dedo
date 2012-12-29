<div class="emailsTemplates form">
<?php echo $this->Form->create('EmailsTemplate');?>
	<h2><?php echo __('Admin Edit Emails Template'); ?></h2>
	<fieldset>
		<div class="tabs">
            <ul>
                <li><a href="#EmailsTemplate-main"><span><?php echo __('General'); ?></span></a></li>
            </ul>
            <div id="EmailsTemplate-main">
				<?php
				echo $this->Form->input('id');
				echo $this->Form->input('code');
				echo $this->Form->input('name');
				echo $this->Form->input('subject');
				echo $this->Form->input('body');
				echo $this->Form->input('status');
				echo $this->Form->input('emails_sender_id');
				echo $this->Form->input('EmailsVariable');
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
<?php  echo $this->Html->script(array('/emails/js/emails_templates'));?>
<script>
//<![CDATA[

var EmailsQueues = {};
EmailsQueues.lastFocus = 'EmailsTemplateSubject';

$(document).ready(function() {
    $('#EmailsTemplateSubject').click(function(){
        EmailsQueues.lastFocus = 'EmailsTemplateSubject';
    });

    $('#EmailsTemplateBody').click(function(){
        EmailsQueues.lastFocus = 'EmailsTemplateBody';
    });
    
});

//]]>
</script>