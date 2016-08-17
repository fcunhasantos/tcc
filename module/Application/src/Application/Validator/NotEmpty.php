<?php

/**
 * Created by PhpStorm.
 * User: Felipe
 * Date: 16/08/2016
 * Time: 19:47
 */

namespace Application\Validator;

use Zend\Validator\NotEmpty as BaseNotEmpty;

class NotEmpty extends BaseNotEmpty
{
    protected $messageTemplates = [
        self::IS_EMPTY => "Não Vazeio",
        self::INVALID  => "Invalid type given. String, integer, float, boolean or array expected",
    ];
}