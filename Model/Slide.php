<?php
class Slide extends AppModel {
    
    public $belongsTo = array('Slideshow');
    public $order = array('Slide.id'=>'asc');

}
