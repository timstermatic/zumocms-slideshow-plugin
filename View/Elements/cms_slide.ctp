<?php echo $this->Form->create(array('type'=>'file'))?>
<?php echo $this->Form->input('Slide.file', array('type'=>'file'))?>
<?php echo $this->Form->input('Slide.title', array('class'=>'span6'))?>
<?php echo $this->Form->input('Slide.content', array('class'=>'span6'))?>
<?php echo $this->Form->submit(__('Save'), array('class'=>'button'))?>
<?php echo $this->Form->end()?>
