<div>
<?php echo $this->Html->link('<i class="icon-plus-sign"></i> ' . __('Add a slideshow'), array('action'=>'create'), array('class'=>'btn pull-right', 'escape'=>false));?> 
    <h3><i class="icon-picture"></i> <?php echo __('Slideshows')?></h3>
</div>
<?php echo $this->Paginator->numbers()?>
<table class="table table-striped">
<tr>
<th><?php echo $this->Paginator->sort('title', 'Title')?></th>
<th><?php echo __('Action')?></th>
</tr>
<?php foreach($slideshows as $s) { ?>
<tr>
<td><?php echo $s['Slideshow']['title']?> (<?php echo count($s['Slide'])?> slides)</td>
<td>
    <?php echo $this->Html->link('edit title', array('action'=>'edit', $s['Slideshow']['id']), array('class'=>'btn btn-small'))?> 

    <?php echo $this->Html->link('slides', array('controller'=>'slides', 'action'=>'index', $s['Slideshow']['id']), array('class'=>'btn btn-small'))?>

    <?php echo $this->Html->link('delete', array('action'=>'delete', $s['Slideshow']['id']), array('class'=>'btn btn-small'), __("Are you sure?\nThis will also remove all associated slides."))?> 
</td>
</tr>
<?php } ?>
</table>


