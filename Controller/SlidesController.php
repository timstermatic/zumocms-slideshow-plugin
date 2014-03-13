<?php
class SlidesController extends SlideshowsAppController {

/**
 * cms index
 */
    public function cms_index($id=null) 
    {
        $this->loadModel('Slideshows.Slideshow');
       $this->Slideshow->id = $id;
       if(!$this->Slideshow->exists()) {
            throw new NotFoundException();
       }
        $this->set('slideshow', $this->Slideshow->read(null, $id));
    }

/**
 * cms create
 */
   public function cms_create($id=null) 
   {
       $this->loadModel('Slideshows.Slideshow');
       $this->Slideshow->id = $id;
       if(!$this->Slideshow->exists()) {
            throw new NotFoundException();
       }
        
       if(!empty($this->request->data['Slide']['file']['tmp_name'])) {
           if(!is_dir('userfiles/slides')) {
                mkdir('userfiles/slides');
           }
           $this->request->data['Slide']['slideshow_id'] = $id;
           if($this->Slide->save($this->request->data)) {
                move_uploaded_file($this->request->data['Slide']['file']['tmp_name'], 
                    'userfiles/slides/' . $this->Slide->id . '_' . $this->request->data['Slide']['file']['name']);
                $this->Session->setFlash('Slide saved', 'flash_success');
                $this->redirect(array('action'=>'index', $id));
           }
       }


       $this->set('slideshow', $this->Slideshow->read(null, $id));
   }

/**
 * cms edit
 */
   public function cms_edit($id=null,$slideshow_id=null) 
   {
       $this->loadModel('Slideshows.Slideshow');
       $this->Slideshow->id = $slideshow_id;
       if(!$this->Slideshow->exists()) {
            throw new NotFoundException();
       }
        
       if(!empty($this->request->data)) {
            if(!empty($this->request->data['Slide']['file']['tmp_name'])) {
                    $slide = glob('userfiles/slides/' . $id . '_*');
                    @unlink($slide[0]);
                    move_uploaded_file($this->request->data['Slide']['file']['tmp_name'], 
                        'userfiles/slides/' . $id . '_' . $this->request->data['Slide']['file']['name']);
            }
           $this->Slide->id = $id;
           if($this->Slide->save($this->request->data)) {
                $this->Session->setFlash('Slide saved', 'flash_success');
                $this->redirect(array('action'=>'index', $slideshow_id));
           }
       }
       $this->set('slideshow', $this->Slideshow->read(null, $slideshow_id));
       $this->request->data = $this->Slide->read(null, $id);
   }
/**
 * cms delete
 */
    public function cms_delete($id=null,$slideshow_id=null) 
    {
        $slide = glob('userfiles/slides/' . $id . '_*');
        @unlink($slide[0]);
        $this->Slide->delete($id); 
        $this->Session->setFlash('Slide saved', 'flash_success');
        $this->redirect(array('action'=>'index', $slideshow_id));
    }


/**
 * cms reorder
 **/
 	public function cms_reorder() {
		$this->autoRender = false;
		foreach($this->request->data['sortable'] as $k=>$v) {
			$this->Slide->updateAll(
				array('Slide.position' => $k),
				array('Slide.id' => str_replace('row_','',$v))
			);
		}
	}


}
