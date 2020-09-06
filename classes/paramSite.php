<?php 
class paramSite
{
    private $nameParam;
    private $valeurParam;
    private $paramBool;


    public function __construct($nameParam,$valeurParam,$paramBool){
            $this->nameParam = $nameParam;     
            $this->valeurParam = $valeurParam;     
            $this->paramBool = $paramBool;
        }

    public function getNameParam(){
            return $this->nameParam;
    }
    public function getValeurParam(){
            return $this->valeurParam;
    }

    public function getParamBool(){
        return $this->paramBool;
    }
    
    
 
}



