<?php
/**
 * Created by PhpStorm.
 * User: Felipe
 * Date: 18/07/2016
 * Time: 22:06
 */

namespace Application\Form;


use DoctrineModule\Stdlib\Hydrator\DoctrineObject;
use Zend\Form\Form;
use Zend\InputFilter\InputFilter;

class AbstractCrudForm extends Form
{
    protected $fields = array();
    protected $filters = array();

    public function __construct($name, $entity, $entityManager)
    {
        parent::__construct($name, array('om' => $entityManager));
        $this->setObject(new $entity);
        $this->setHydrator(new DoctrineObject($entityManager));
        foreach ($this->fields as $field) {
            $this->add($field);
        }
        $inputFilter = new InputFilter();
        foreach ($this->filters as $filter) {
            $inputFilter->add($filter);
        }
        $this->setInputFilter($inputFilter);
    }

}