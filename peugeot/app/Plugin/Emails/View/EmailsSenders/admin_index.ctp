<div class="emailsSenders index">
	<h2><?php echo __('Emails Senders');?></h2>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Emails Sender'), array('action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('List Emails Templates'), array('controller' => 'emails_templates', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Emails Template'), array('controller' => 'emails_templates', 'action' => 'add')); ?> </li>
		</ul>
	</div>
	<div class="filter">
		<?php
        echo $this->Form->create('Filter');

        echo $this->Form->input('q', array(
            'label' => __('Search')
        ));

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
			$this->Paginator->sort('title'),
			$this->Paginator->sort('delivery'),
			$this->Paginator->sort('port'),
			$this->Paginator->sort('timeout'),
			$this->Paginator->sort('host'),
			$this->Paginator->sort('username'),
			$this->Paginator->sort('status'),
			 __('Actions'),
	        ));
	        echo $tableHeaders;
	        
	        $rows = array();
	        foreach ($emailsSenders as $emailsSender){
	            $actions = '';
				$actions .= ' ' . $this->Html->link(__('Edit'), array('action' => 'edit', $emailsSender['EmailsSender']['id']));
				$actions .= ' ' . $this->Form->postLink(__('Delete'), array(
	                'action' => 'delete',
	                $emailsSender['EmailsSender']['id'],
	            ), null, __('Are you sure?', true));
	            
	            $rows[] = array(
					$emailsSender['EmailsSender']['id'],
					$emailsSender['EmailsSender']['title'],
					$emailsSender['EmailsSender']['delivery'],
					$emailsSender['EmailsSender']['port'],
					$emailsSender['EmailsSender']['timeout'],
					$emailsSender['EmailsSender']['host'],
					$emailsSender['EmailsSender']['username'],
					$this->Layout->status($emailsSender['EmailsSender']['status'], array('class' => 'status_toggle','value' => $emailsSender['EmailsSender']['id'])),
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
 * EmailsSenders */
var EmailsSenders = {};

/**
 * functions to execute when document is ready
 */
$(document).ready(function() {
    EmailsSenders.statusToggle();
    EmailsSenders.filter();
    EmailsSenders.clear();
});

EmailsSenders.statusToggle = function (){
    $('img.status_toggle').unbind();
    $('img.status_toggle').click(function() {
        $(this).attr('src', Base.basePath + 'img/ajax/circle_ball.gif');
        var loadUrl = Base.basePath + 'admin/emails/' + Base.params.controller + '/toggle_status/' + $(this).attr('value');

        $(this).parent().load(loadUrl, function() {
            EmailsSenders.statusToggle();
        });
        return false;
    });
}

/**
 * Submits form for filtering
 */
EmailsSenders.filter = function() {
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
EmailsSenders.clear = function () {
    $('#clearFilter').click(function (){
        $('#FilterAdminIndexForm input[type="text"], #FilterAdminIndexForm select').each(function(){
            $(this).val('');
        });
        $('#FilterAdminIndexForm').submit();
    });
}
//]]>
</script>