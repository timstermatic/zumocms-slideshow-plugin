<div>
<?php echo $this->Html->link('<i class="icon-plus-sign"></i> ' . __('Add a slide'), array('action'=>'create', $this->params['pass'][0]), array('class'=>'btn pull-right', 'escape'=>false));?> 
<h3><?php echo __('Slides for')?> &#8220;<?php echo $slideshow['Slideshow']['title']?>&#8221;</h3>
</div>

<div class="alert alert-info"><?php echo __('You can drag and drop items to reorder their position')?></div>

<?php echo $this->Session->flash()?>
<table class="table table-striped">
<tr>
    <th><?php echo __('Title')?></th>
    <th><?php echo __('Action')?></th>
</tr>
<tbody id="sortable">
<?php foreach($slideshow['Slide'] as $s) { ?>
<tr id="row_<?php echo $s['id']?>">
    <td><?php echo $s['title']?></td>
    <td>
        <?php echo $this->Html->link('edit', array('action'=>'edit', $s['id'], $this->params['pass'][0]),
            array('class'=>'btn btn-small'))?>

        <?php echo $this->Html->link('delete', array('action'=>'delete', $s['id'], $this->params['pass'][0]),
            array('class'=>'btn btn-small'), __('Are you sure that you want to delete this slide?'))?>
    </td>
</tr>
<?php } ?>
</tbody>
</table>
<?php echo $this->Html->script('sort-table')?>
<script>
$("#sortable").tableDnD({onDragClass: "being_dragged",onDrop: function(table, row) {
	$.ajax({
	type: "POST",
	url: "/cms/slideshows/slides/reorder",
	data: $.tableDnD.serialize()
});
}});
</script>
