<div class="emailsTemplates index">
	<h2><?php echo __('Emails Templates');?></h2>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Emails Template'), array('action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('List Emails Senders'), array('controller' => 'emails_senders', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Emails Sender'), array('controller' => 'emails_senders', 'action' => 'add')); ?> </li>
	<li><?php echo $this->Html->link(__('List Emails Variables'), array('controller' => 'emails_variables', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Emails Variable'), array('controller' => 'emails_variables', 'action' => 'add')); ?> </li>
		</ul>
	</div>
	<div class="filter">
		<?php
        echo $this->Form->create('Filter');

        echo $this->Form->input('q', array(
            'label' => __('Search')
        ));

		echo $this->Form->input('emails_sender_id', array('empty' => ''));
		echo $this->Form->submit(
            __('Filter'),
            array(
                'after' => ' ' . $this->Html->link(__('Clear'), 'javascript:void(0);', array('id' => 'clearFilter'))
            )
        );
        echo $this->Form->end();
    	?>
        <div class="clear">&nbsp;</div>
    </div> 
    <table cellpadding="0" cellspacing="0">
			<?php 
	        $tableHeaders =  $this->Html->tableHeaders(array(
			$this->Paginator->sort('id'),
			$this->Paginator->sort('code'),
			$this->Paginator->sort('name'),
			$this->Paginator->sort('subject'),
			$this->Paginator->sort('body'),
			$this->Paginator->sort('weight'),
			$this->Paginator->sort('emails_sender_id'),
			$this->Paginator->sort('status'),
			 __('Actions'),
	        ));
	        echo $tableHeaders;
	        
	        $rows = array();
	        foreach ($emailsTemplates as $emailsTemplate){
	            $actions = '';
				$actions .= ' ' . $this->Html->link(__('Move up'), array('action' => 'moveup', $emailsTemplate['EmailsTemplate']['id']));
				$actions .= ' ' . $this->Html->link(__('Move down'), array('action' => 'movedown', $emailsTemplate['EmailsTemplate']['id']));
				$actions .= ' ' . $this->Html->link(__('Edit'), array('action' => 'edit', $emailsTemplate['EmailsTemplate']['id']));
				$actions .= ' ' . $this->Form->postLink(__('Delete'), array(
	                'action' => 'delete',
	                $emailsTemplate['EmailsTemplate']['id'],
	            ), null, __('Are you sure?', true));
	            
	            $rows[] = array(
					$emailsTemplate['EmailsTemplate']['id'],
					$emailsTemplate['EmailsTemplate']['code'],
					$emailsTemplate['EmailsTemplate']['name'],
					$emailsTemplate['EmailsTemplate']['subject'],
					$emailsTemplate['EmailsTemplate']['body'],
					$emailsTemplate['EmailsTemplate']['weight'],
					$emailsTemplate['EmailsSender']['title'],
					$this->Layout->status($emailsTemplate['EmailsTemplate']['status'], array('class' => 'status_toggle','value' => $emailsTemplate['EmailsTemplate']['id'])),
					$actions
				);
			}
			echo $this->Html->tableCells($rows);
			echo $tableHeaders;
		?>
    </table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>

<script>
//<![CDATA[
/**
 * EmailsTemplates */
var EmailsTemplates = {};

/**
 * functions to execute when document is ready
 */
$(document).ready(function() {
    EmailsTemplates.statusToggle();
    EmailsTemplates.filter();
    EmailsTemplates.clear();
});

EmailsTemplates.statusToggle = function (){
    $('img.status_toggle').unbind();
    $('img.status_toggle').click(function() {
        $(this).attr('src', Base.basePath + 'img/ajax/circle_ball.gif');
        var loadUrl = Base.basePath + 'admin/emails/' + Base.params.controller + '/toggle_status/' + $(this).attr('value');

        $(this).parent().load(loadUrl, function() {
            EmailsTemplates.statusToggle();
        });
        return false;
    });
}

/**
 * Submits form for filtering
 */
EmailsTemplates.filter = function() {
    $('#FilterAdminIndexForm').submit(function() {
        var params = '';

        $('#FilterAdminIndexForm input[type="text"], #FilterAdminIndexForm select').each(function(){
            if($(this).val() != ''){
                var name = $(this).attr('name');
                name = name.split('[');
                name = name[2].split(']');
                name = name[0];
                params += name + ':' + $(this).val() + '/';
            }
        });
        
        var str_action = Base.params.action;
        var loadUrl = Base.basePath + 'admin/emails/'  + Base.params.controller + '/' + str_action.replace('admin_', '') + '/' + params;       

        window.location = loadUrl;
        return false;
    });
}

/**
 * Clear form for filtering
 */
EmailsTemplates.clear = function () {
    $('#clearFilter').click(function (){
        $('#FilterAdminIndexForm input[type="text"], #FilterAdminIndexForm select').each(function(){
            $(this).val('');
        });
        $('#FilterAdminIndexForm').submit();
    });
}
//]]>
</script>