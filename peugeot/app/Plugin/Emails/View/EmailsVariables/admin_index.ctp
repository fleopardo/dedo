
<div class="emailsVariables index">
	<h2><?php echo __('Emails Variables');?></h2>
    <div class="actions">
        <ul>
            <li><?php echo $this->Html->link(__('New Emails Variable'), array('action' => 'add')); ?></li>
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
            $this->Paginator->sort('code'),
			$this->Paginator->sort('name'),
			__('Actions'),
        ));
        echo $tableHeaders;
        
        $rows = array();
        foreach ($emailsVariables as $emailsVariable){
            $actions = '';
			$actions .= ' ' . $this->Html->link(__('Edit'), array('action' => 'edit', $emailsVariable['EmailsVariable']['id']));
            $actions .= ' ' . $this->Html->link(__('Delete'), array(
                'action' => 'delete',
                $emailsVariable['EmailsVariable']['id'],
                'token' => $this->params['_Token']['key'],
            ), null, __('Are you sure?'));
            
            $rows[] = array(
				$emailsVariable['EmailsVariable']['id'],
                $emailsVariable['EmailsVariable']['code'],
				$emailsVariable['EmailsVariable']['name'],
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
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous'), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next') . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>

<script>
//<![CDATA[
/**
 * EmailsVariables */
var EmailsVariables = {};

/**
 * functions to execute when document is ready
 */
$(document).ready(function() {
    EmailsVariables.statusToggle();
    EmailsVariables.filter();
    EmailsVariables.clear();
});

EmailsVariables.statusToggle = function (){
    $('img.status_toggle').unbind();
    $('img.status_toggle').click(function() {
        $(this).attr('src', Base.basePath + 'img/ajax/circle_ball.gif');
        var loadUrl = Base.basePath + 'admin/' + Base.params.controller + '/toggle_status/' + $(this).attr('value');

        $(this).parent().load(loadUrl, function() {
            EmailsVariables.statusToggle();
        });
        return false;
    });
}

/**
 * Submits form for filtering
 */
EmailsVariables.filter = function() {
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
        var loadUrl = Base.basePath + 'admin/' + Base.params.controller + '/' + str_action.replace('admin_', '') + '/' + params;       

        window.location = loadUrl;
        return false;
    });
}

/**
 * Clear form for filtering
 */
EmailsVariables.clear = function () {
    $('#clearFilter').click(function (){
        $('#FilterAdminIndexForm input[type="text"], #FilterAdminIndexForm select').each(function(){
            $(this).val('');
        });
        $('#FilterAdminIndexForm').submit();
    });
}
//]]>
</script>