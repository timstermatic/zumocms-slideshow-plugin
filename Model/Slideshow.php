<?php
class Slideshow extends AppModel {
    public $hasMany = array('Slide'=>array('order'=>array('Slide.position'=>'asc')));
}
