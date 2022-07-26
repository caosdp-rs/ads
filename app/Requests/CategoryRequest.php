<?php

namespace App\Requests;

class CategoryRequest extends MyBaseRequest
{

    public function validateBeforeSave(string $ruleGroup, bool $responseWithRedirect = false )
    {
        $this->validate($ruleGroup, $responseWithRedirect);
    }

}