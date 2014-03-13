<?php
class SlideshowsController extends SlideshowsAppController {

/**
 * cms index
 */
    public function cms_index() 
    {
        $this->set('slideshows',$this->paginate());
    }

/**
 * cms create
 */
    public function cms_create() 
    {
        if(!empty($this->request->data)) {
            if($this->Slideshow->save($this->request->data)) {
                $this->Session->setFlash('Slideshow Created', 'flash_success');
                $this->redirect(array('controller'=>'slides', 'action'=>'index', $this->Slideshow->id));
            }
        }
    }

/**
 * cms edit
 */
    public function cms_edit($id=null) 
    {
        if(!empty($this->request->data)) {
            $this->Slideshow->id = $id;
            if($this->Slideshow->save($this->request->data)) {
                $this->Session->setFlash('Slideshow Updated', 'flash_success');
                $this->redirect(array('action'=>'index'));
            }
        }
        $this->request->data = $this->Slideshow->read(null, $id);
    }

/**
 * cms delete
 */
    public function cms_delete($id=null) 
    {
        $this->loadModel('Slideshows.Slide');
        $slideshow = $this->Slideshow->read(null, $id);
        foreach($slideshow['Slide'] as $s) {
            $slide = glob('userfiles/slides/' . $s['id'] . '_*');
            @unlink($slide[0]);
            $this->Slide->delete($s['id']);
        }
        $this->Slideshow->delete($id);
        $this->Session->setFlash('Slideshow Deleted', 'flash_success');
        $this->redirect(array('action'=>'index'));
}


}
