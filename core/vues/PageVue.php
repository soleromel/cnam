<?php

class PageVue {

    private $page;

    function __construct($pageParam) {
        $this->page = $pageParam;
        include ROOT.DS.$this->page['template']['chemin'];
    }

    function loadModule($nomMod){
        if (isset($this->page['modules'][$nomMod]))
            Inclure::Module($this->page['modules'][$nomMod]['chemin']);
    }

   function existeComposant(){
       if (isset($this->page['composants']))
           return true;
   }

   function loadComposant(){
       foreach ($this->page['composants'] as $composant){
            include ROOT.DS.$composant['chemin'];
       }
   }
}