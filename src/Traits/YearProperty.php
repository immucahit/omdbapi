<?php

namespace OMDBAPI\Traits;

trait YearProperty{

    public function getYear() : int {
        return $this->data['y'];
    }

    public function setYear(int $year) : void{
        $this->data['y'] = $year;
    }

}