<?php

namespace app\Transitions\Request;

interface RequestTransition
{
    public static function execute(Request $request): Request;
}
