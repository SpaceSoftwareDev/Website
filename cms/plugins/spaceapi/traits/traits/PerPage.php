<?php namespace SpaceApi\Traits\Traits;

trait PerPage {

    public $perPage = 999999;

    public function _resultsPerPage()
    {
        return get('results_per_page') ?? $this->perPage;
    }
}
