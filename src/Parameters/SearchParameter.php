<?php

namespace OMDBAPI\Parameters;

use OMDBAPI\Traits\YearProperty;
use OMDBAPI\Traits\TypeProperty;

class SearchParameter extends Parameter{

    use YearProperty, TypeProperty;

    public function getKeyword() : string {
        return $this->data['s'];
    }

    public function setKeyword(string $keyword) : void{
        $this->data['s'] = $keyword;
    }

    public function getPage() : int {
        return $this->data['page'];
    }

    public function setPage(int $page) : void {
        $this->data['page'] = $page;
    }
}