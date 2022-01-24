<?php

namespace Core;

use Exception;

class BaseController
{
    public function __construct()
    {

    }

    /**
     * @throws Exception
     */
    public function validate($request, $arr = [])
    {
        Validator::request($request, $arr);
    }

}