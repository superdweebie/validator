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
class Inequality extends AbstractValidator
{

    const GREATER_THAN = '>';

    const GREATER_THAN_EQUAL = '>=';

    const LESS_THAN = '<';

    const LESS_THAN_EQUAL = '<=';

    const NOT_EQUAL = '!=';

    protected $operator = self::GREATER_THAN;

    protected $compareValue = 0;

    public function __construct($operator, $compareValue) {
        $this->operator = (string) $operator;
        $this->compareValue = (float) $compareValue;
    }

    public function isValid($value){

        $messages = [];

        $result = true;

        switch ($this->operator){
            case self::GREATER_THAN:
                if ( ! ($this->compareValue > $value)){
                    $result = false;
                    $messages[] = 'Must be less than ' . $this->compareValue;
                }
                break;
            case self::GREATER_THAN_EQUAL:
                if ( ! ($this->compareValue >= $value)){
                    $result = false;
                    $messages[] = 'Must be less than or equal to ' . $this->compareValue;
                }
                break;
            case self::LESS_THAN:
                if ( ! ($this->compareValue < $value)){
                    $result = false;
                    $messages[] = 'Must be greater than ' . $this->compareValue;
                }
                break;
            case self::LESS_THAN_EQUAL:
                if ( ! ($this->compareValue <= $value)){
                    $result = false;
                    $messages[] = 'Must be greater than or equal to ' . $this->compareValue;
                }
                break;
            case self::NOT_EQUAL;
                if ( ! ($this->compareValue != $value)){
                    $result = false;
                    $messages[] = 'Must not be equal to ' . $this->compareValue;
                }
                break;
        }

        return new ValidatorResult($result, $messages);
    }
}
