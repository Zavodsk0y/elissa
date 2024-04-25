<?php

namespace app\Transitions\Request;

use App\Models\Request;

interface RequestTransition
{
    public static function execute(Request $request): Request;
}
