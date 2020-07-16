<?php

namespace OMDBAPI\Parameters;

use OMDBAPI\Traits\PlotProperty;

class IDParameter extends Parameter{

    use PlotProperty;

    public function getId() : string {
        return $this->data['i'];
    }

    public function setId(string $id) : void{
        $this->data['i'] = $id;
    }
}