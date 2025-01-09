<?php

use App\Models\ComponyInfo;

function logo(){
    $componyInfo = ComponyInfo::orderBy('id','desc')->first();
    return $componyInfo->logo;
}