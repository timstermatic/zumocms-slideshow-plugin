<div>
<h3><?php echo __('Edit slide for')?> &#8220;<?php echo $slideshow['Slideshow']['title']?>&#8221;</h3>
<?php echo $this->element('cms_slide');?>
<?php
            if($this->params['action'] == 'cms_edit') {
                $slide = glob('userfiles/slides/' . $this->params['pass'][0].'_*');
            }
?>
<?php if(!empty($slide)) { ?>
<h4>Current slide</h4>
<div class="row">
<?php echo $this->Html->image('/' . $slide[0], array('class'=>'thumbnail span6'))?>
</div>
<?php } ?>
