<?php
namespace Home\Controller;
use Think\Controller;
class PublicController extends Controller {
    public function main(){
       
    }
    public function left(){
        $this->display();
    }
    
    public function head(){
        $this->display();
    }
    public function foot(){
        $this->display();
    }
}