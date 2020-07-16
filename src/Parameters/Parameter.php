<?php

namespace OMDBAPI\Parameters;

use OMDBAPI\ReturnType;
use function \json_encode;

abstract class Parameter{
    
    protected array $data;

    public function __contructer(){
        $this->data = [];
    }

    public function getReturnType() : string {
        return $this->data['r'];
    }

    public function setReturnType(string $returnType) : void{
        $this->data['r'] = $returnType;
    }

    public function toJSON() : string {
        return json_encode($this->data);
    }
}