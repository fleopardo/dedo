
<div class="emailsQueues index">
	<h2><?php echo __('Emails Queues');?></h2>
    <div class="actions">
        <ul>
            <li><?php echo $this->Html->link(__('New Emails Queue', true), array('action' => 'add')); ?></li>
            </ul>
    </div>	
    <div class="filter">
	<?php
        echo $this->Form->create('Filter');

        echo $this->Form->input('q', array(
            'label' => __('Search', true)
        ));

		echo $this->Form->submit(
            __('Filter'),
            array(
                'after' => ' ' . $this->Html->link(__('Clear'), 'javascript:;', array('id' => 'clearFilter'))
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
			$this->Paginator->sort('subject'),
			$this->Paginator->sort('to'),
			//$this->Paginator->sort('body'),
			$this->Paginator->sort('priority'),
			$this->Paginator->sort('sent'),
            $this->Paginator->sort('created'),
			__('Actions', true),
        ));
        echo $tableHeaders;
        
        $rows = array();
        foreach ($emailsQueues as $emailsQueue){
            $actions = '';
			$actions .= ' ' . $this->Html->link(__('Edit'), array('action' => 'edit', $emailsQueue['EmailsQueue']['id']));
            $actions .= ' ' . $this->Html->link(__('Delete'), array(
                'action' => 'delete',
                $emailsQueue['EmailsQueue']['id'],
                'token' => $this->params['_Token']['key'],
            ), null, __('Are you sure?', true));
            
            $rows[] = array(
				$emailsQueue['EmailsQueue']['id'],
				$emailsQueue['EmailsQueue']['subject'],
				$emailsQueue['EmailsQueue']['to'],
				//$emailsQueue['EmailsQueue']['body'],
				$emailsQueue['EmailsQueue']['priority'],
                $this->Layout->status($emailsQueue['EmailsQueue']['sent'], array('class' => 'status_toggle','value' => $emailsQueue['EmailsQueue']['id'],)),
                $emailsQueue['EmailsQueue']['created'],
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
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>

<script>
//<![CDATA[
/**
 * EmailsQueues */

var lastFocus = 'EmailsTemplateSubject';
var EmailsQueues = {};

/**
 * functions to execute when document is ready
 */
$(document).ready(function() {
    EmailsQueues.statusToggle();
    EmailsQueues.filter();
    EmailsQueues.clear();
    
    //$('ul.selected li').live('click', function(){console.log($(this).attr('title'))})
    $.fn.extend({
        insertAtCaret: function(myValue) {
            if (document.selection) {
                    this.focus();
                    sel = document.selection.createRange();
                    sel.text = myValue;
                    this.focus();
            }
            else if (this.selectionStart || this.selectionStart == '0') {
                var startPos = this.selectionStart;
                var endPos = this.selectionEnd;
                var scrollTop = this.scrollTop;
                this.value = this.value.substring(0, startPos)+myValue+this.value.substring(endPos,this.value.length);
                this.focus();
                this.selectionStart = startPos + myValue.length;
                this.selectionEnd = startPos + myValue.length;
                this.scrollTop = scrollTop;
            } else {
                this.value += myValue;
                this.focus();
            }
        }
    })    
});

EmailsQueues.statusToggle = function (){
    $('img.status_toggle').unbind();
    $('img.status_toggle').click(function() {
        $(this).attr('src', Base.basePath + 'img/ajax/circle_ball.gif');
        var loadUrl = Base.basePath + 'admin/emails/' + Base.params.controller + '/toggle_status/' + $(this).attr('value');

        $(this).parent().load(loadUrl, function() {
            EmailsQueues.statusToggle();
        });
        return false;
    });
}

/**
 * Submits form for filtering
 */
EmailsQueues.filter = function() {
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
        var loadUrl = Base.basePath + 'admin/emails/' + Base.params.controller + '/' + str_action.replace('admin_', '') + '/' + params;       

        window.location = loadUrl;
        return false;
    });
}

/**
 * Clear form for filtering
 */
EmailsQueues.clear = function () {
    $('#clearFilter').click(function (){
        $('#FilterAdminIndexForm input[type="text"], #FilterAdminIndexForm select').each(function(){
            $(this).val('');
        });
        $('#FilterAdminIndexForm').submit();
    });
}

//]]>
</script>