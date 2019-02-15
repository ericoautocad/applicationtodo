<?php

namespace App\Filter\Api;

use Illuminate\Http\Request;

class OrdenationTodo
{
    private $sortingCriterion = [];
    
    public function getOrdenation(Request $request)
    {   
        if (!empty($request->all()['order'])) {
            $order = $request->all()['order'];
        } else {
            $order = null;
        }
        if ($order !== null) {
            $this->setSortingOrder($order);
        }
        return $this->getSortingCriterion();
    }

    public function setSortingCriterion($sortingCriterion)
    {
        if (in_array($sortingCriterion, ['uuid', 'type', 'content', 'sort_order', 'done', 'date_created'])) {
            $this->sortingCriterion[] = $sortingCriterion;
        }
    }
    
    public function getSortingCriterion()
    {
        if (count($this->sortingCriterion) == 2) {
            return $this->sortingCriterion;
        } else {
            return [];
        }
    }
    
    public function setSortingDirection($sortingDirection)
    {
        $sortingDirection = strtoupper($sortingDirection);
        if (in_array($sortingDirection, ['ASC', 'DESC'])) {
            $this->sortingCriterion[] = $sortingDirection;
        }
    }
    
    public function setSortingOrder($order)
    {
        $order = explode(',', $order);
        if (!empty($order[0])) {
            $this->setSortingCriterion($order[0]);
        }
        if (!empty($order[1])) {
            $this->setSortingDirection($order[1]);
        }
    }
}
