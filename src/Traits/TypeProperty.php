<?php

namespace OMDBAPI\Traits;

trait TypeProperty{

    public function getType() : ?string {
        switch($this->data['type']){
            case Type::MOVIE:
                return Type::MOVIE;
            break;
            case Type::SERIES:
                return Type::SERIES;
            break;
            default:
                return null;
        }
    }

    public function setType(string $type) : void{
        $this->data['type'] = $type;
    }

}