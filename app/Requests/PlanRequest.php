<?php

namespace App\Requests;

class PlanRequest extends MyBaseRequest
{

    public function validateBeforeSave(string $ruleGroup, bool $responseWithRedirect = false )
    {
        $this->validate($ruleGroup, $responseWithRedirect);
    }

}