<div class="emailsVariables form">
<?php echo $this->Form->create('EmailsVariable');?>
<h2><?php echo __('Admin Edit Emails Variable'); ?></h2>
	<fieldset>
        <div class="tabs">
            <ul>
                <li><a href="#EmailsVariable-main"><span><?php echo __('General'); ?></span></a></li>
            </ul>
            <div id="EmailsVariable-main">
        	<?php
				echo $this->Form->input('id');
                echo $this->Form->input('code');
				echo $this->Form->input('name');
				echo $this->Form->input('EmailsTemplate');
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