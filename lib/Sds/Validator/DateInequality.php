<?php
/**
 * @link       http://superdweebie.com
 * @package    Sds
 * @license    MIT
 */
namespace Sds\Validator;

/**
 *
 * @since   1.0
 * @author  Tim Roediger <superdweebie@gmail.com>
 */
class DateInequality extends Inequality
{

    public function __construct($operator, $compareValue) {

        if ( ! $compareValue instanceof \DateTime){
            throw new \InvalidArgumentException;
        }
        $this->operator = (string) $operator;
        $this->compareValue = $compareValue;
    }

    public function isValid($value){

        if ( ! $value instanceof \DateTime){
            throw new \InvalidArgumentException;
        }

        return parent::isValid($value);
    }

    protected function stringify($value){
        return $value->format('c');
    }
}
