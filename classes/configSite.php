<?php 
class configSite
{
    public $nameSite;
    public $logoSite;
    public $telSite;
    public $emailSite;
    private $paramBool;


    public function __construct($nameSite,$logoSite,$telSite,$emailSite){
            $this->nameSite = $nameSite;
            $this->logoSite = $logoSite;
            $this->telSite = $telSite;
            $this->emailSite = $emailSite;   
            $this->paramBool = new Collection(); 
        }

    public function getCollection(){
        return $this->paramBool;
    }

       /**
	 *  Retourne l'élément de la collection
	 */
	public function getElementCollection($tab, $name){
		foreach ($tab->getTab() as $element) {
			if($element->getNameParam() == $name){
				return $element;
				}
		}
	}
}



