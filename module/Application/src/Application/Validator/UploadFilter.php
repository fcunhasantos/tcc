<?php
/**
 * Created by PhpStorm.
 * User: Felipe
 * Date: 13/10/2016
 * Time: 21:49
 */
namespace Application\Validator;

use Zend\InputFilter\InputFilter;
use Zend\Filter\File\RenameUpload;
use Zend\InputFilter\FileInput;
use Zend\Validator\File\MimeType;
use Zend\Validator\File\Size;

class UploadFilter extends InputFilter
{
    public function __construct($fieldName)
    {
        $arquivo = new FileInput($fieldName);
        $arquivo->getFilterChain()->attach(new RenameUpload(array(
            'target' => __DIR__.'\..\..\..\upload',
            'use_upload_extension' => true,
            'randomize' => true
        )));
        $arquivo->getValidatorChain()->attach(new Size(array(
            //'max' => substr(ini_get('upload_max_filesize'), 0, -1).'MB'
            'max' => '10MB'
        )));
        $arquivo->getValidatorChain()->attach(new MimeType(array(
            'application/excel',
            'application/mspowerpoint',
            'application/msword',
            'application/pdf',
            'image/gif',
            'image/jpeg',
            'image/png',
            'text/plain',
            'video/avi',
            'video/mpeg',
            'enableHeaderCheck' => true
        )));
        $this->add($arquivo);
    }
}