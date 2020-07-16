<?php

namespace OMDBAPI\Traits;

trait PlotProperty{

    public function getPlot() : string{
        return $this->data['plot'];
    }

    public function setPlot(string $plot) : void {
        $this->data['plot'] = $plot;
    }

}