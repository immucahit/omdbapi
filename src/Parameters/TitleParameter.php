<?php

namespace OMDBAPI\Parameters;

use OMDBAPI\Traits\YearProperty;
use OMDBAPI\Traits\TypeProperty;
use OMDBAPI\Traits\PlotProperty;

class TitleParameter extends Parameter{

    use YearProperty, TypeProperty, PlotProperty;

    public function getTitle() : string{
        return $this->data['t'];
    }

    public function setTitle(string $title) : void{
        $this->data['t'] = $title;
    }

}