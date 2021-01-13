<?php 
class myQueryClass
{
    private $table;
    private $conditions;
    private $order;
    private $value;
    private $limit;
    public function __construct($table,$mesConditions = '',$order = '',$value = '', $limit =''){
        $this->table = $table;
        $this->conditions = $mesConditions;
        $this->order = $order;
        $this->value = $value;
        $this->limit = $limit;
    }


    /**
     *  Select d'une query
     */
    function myQuerySelect(){
        $pdo = bdd();   
        $mesConditions = '';
        $mesOrder = '';
        $derniereCondition = '';
        if($this->conditions != ''){
            $nbCondit = 1;
            foreach($this->conditions as $condition ){
                if(count($this->conditions) == 1 ){
                if($condition['name'] != ''){
                    $condition['name'] = ':'.$condition['name'];
                }
                $mesConditions = "WHERE ".$condition['nameChamps'].' '.$condition['type'].' '.$condition['name'];
                }
                else {
                    if($condition['name'] != ''){
                        $condition['name'] = ':'.$condition['name'];
                    }
                    if($nbCondit == 1 ){
                        $mesConditions =  "WHERE ".$condition['nameChamps'].' '.$condition['type'].' '.$condition['name'];
                    } else {
                        if(isset($condition['operator'])){
                            $operator = $condition['operator'];
                        }else{
                            $operator = 'AND';       
                        }    
                   
                        $mesConditions.= ' '.$operator.'  '.$condition['nameChamps'].' '.$condition['type'].' '.$condition['name'];
                    }
                    $nbCondit++;
                }
            }
        } 
        if($this->order != ''){
            $nbOrder = 1;
            foreach($this->order as $order ){
                if(count($this->order) == 1 ){
                    $mesOrder = "Order by ".$order['nameChamps'].' '.$order['sens'];
                    }
                else {
                        if($nbOrder == 1 ){
                            $mesOrder =  "Order by  ".$order['nameChamps'].' '.$order['sens'];
                        } else {
                            $mesOrder.= ', '.$order['nameChamps'].' '.$order['sens'];
                        }
                        $nbOrder++;
                }
            }
        }

        // Reconsctruction des conditions pour mettre des paranthèse pour les and
        $mesConditionsNonConstruit = explode('AND', $mesConditions);
        $conditionsConstruit = ''; 
        $compteur =0;
        foreach($mesConditionsNonConstruit as $e){
            
            if($compteur != 0){
            $conditionsConstruit .= 'And ('.$e.') ';
            }else{
                $where =  explode('WHERE', $e);
                if(count($where) > 1){
                $conditionsConstruit .= 'where ('.$where[0].' '.$where[1].' )' ;
                }
            }
            $compteur++;
        }
    

        $requete = $pdo->prepare("SELECT * FROM ".$this->table." ".$conditionsConstruit." ".$mesOrder." ".$this->limit);
        if($this->conditions != ''){
            foreach($this->conditions as $condition ){
                if(isset($condition['int'])){
                    $requete->bindParam($condition['name'], $condition['value'],  PDO::PARAM_INT);
                }else{
                $requete->bindParam($condition['name'], $condition['value']);
                }
            }
        } 
        $requete->execute();
      
        
        $r = $requete->fetchAll();
        return $r;
    }


    function myQueryInsert(){
        $pdo = bdd();
        if($this->conditions != ''){
            $mesConditionsName = '';
            $mesConditionsValue = '';
            $nbreCondi = count($this->conditions); //nbre de conditions
            $nb = 1;
            foreach($this->conditions as $condition ){
                    if(($nbreCondi != 1) && ($nb != 1)){
                       $mesConditionsName.= ", `".$condition["name"]."`";
                       $mesConditionsValue.= ", :".$condition["name"]."";
                       $nb++;
                    }else{     
                    $mesConditionsName.= "`".$condition["name"]."`";
                    $mesConditionsValue.=":".$condition["name"]."";
                }
                $nb++;
            }
        }
    
       $requete = $pdo->prepare("INSERT INTO ".$this->table." (".$mesConditionsName." )  VALUES (".$mesConditionsValue.");");
        if($this->conditions != ''){
            foreach($this->conditions as $condition ){
                $requete->bindParam($condition['name'], $condition['value']);
           }
        }
         $requete->execute();
        ;
         
    }


    function myQueryUpdate(){
        $pdo = bdd();
        $mesConditions = '';
        $mesValues = '';
        if($this->conditions != ''){
            $nbCondit = 1;
            foreach($this->conditions as $condition ){
                if(count($this->conditions) == 1 ){
                $mesConditions = "WHERE ".$condition['nameChamps'].' '.$condition['type'].' :'.$condition['name'];
                }
                else {
                    if($nbCondit == 1 ){
                        $mesConditions =  "WHERE ".$condition['nameChamps'].' '.$condition['type'].' :'.$condition['name'];
                    } else {
                        $mesConditions.= ' AND '.$condition['nameChamps'].' '.$condition['type'].' :'.$condition['name'];
                    }
                    $nbCondit++;
                }
            }
        } 
        if($this->value != ''){
            $nbCondit = 1;
            foreach($this->value as $value ){
                if(count($this->value) == 1 ){
                $mesValues = $value['nameChamps'].'= :'.$value['name'];
                }
                else {
                    if($nbCondit == 1 ){
                        $mesValues =  $value['nameChamps'].'= :'.$value['name'];
                    } else {
                        $mesValues.=  ','.$value['nameChamps'].'= :'.$value['name'];
                    }
                    $nbCondit++;
                }
            }
        } 
        $requete = $pdo->prepare("Update ".$this->table." set ".$mesValues." ".$mesConditions);
        if($this->value != ''){
            foreach($this->conditions as $conditions ){
                $requete->bindParam($conditions['name'], $conditions['value']);
            }
        }
        if($this->value != ''){
            foreach($this->value as $value ){
                $requete->bindParam($value['name'], $value['value']);
            }
        }
        $requete->execute();
    }

    function myQueryDelete(){
        $pdo = bdd();
        $mesConditions = '';

        if($this->conditions != ''){
            $nbCondit = 1;
            foreach($this->conditions as $condition ){
                if(count($this->conditions) == 1 ){
                $mesConditions = "WHERE ".$condition['nameChamps'].' '.$condition['type'].' :'.$condition['name'];
                }
                else {
                    if($nbCondit == 1 ){
                        $mesConditions =  "WHERE ".$condition['nameChamps'].' '.$condition['type'].' :'.$condition['name'];
                    } else {
                        $mesConditions.= ' AND '.$condition['nameChamps'].' '.$condition['type'].' :'.$condition['name'];
                    }
                    $nbCondit++;
                }
            }
        } 
       
        $requete = $pdo->prepare("Delete from ".$this->table." ".$mesConditions);
        if($this->conditions != ''){
            foreach($this->conditions as $conditions ){
                $requete->bindParam($conditions['name'], $conditions['value']);
            }
        }
        $requete->execute();
    }
}