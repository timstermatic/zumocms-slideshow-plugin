<div>
<h3><i class="icon-picture"></i> <?php echo __('Edit  slideshow')?></h3>
</div>
<div class="alert alert-warning"><?php echo __('You will be able to add slides in the next step')?></div>
<?php echo $this->Form->create()?>
<?php echo $this->Form->input('Slideshow.title', array('class'=>'span6'))?>
<?php echo $this->Form->submit(__('Save'), array('class'=>'btn'))?>
<?php echo $this->Form->end()?>
