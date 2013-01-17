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
class Length extends AbstractValidator
{

    protected $min = 0;

    protected $max = 255;

    public function __construct($min = 0, $max = 255){
        $this->min = $min;
        $this->max = $max;
    }

    public function isValid($value){

        $messages = [];

        $result = true;

        $regEx = '/^.{' . $this->min . ',' . $this->max . '}$/';

        if ( ! preg_match($regEx, $value)){
            $result = false;
            $messages[] = 'Must be between ' . $this->min . ' and ' . $this->max . ' characters long.';
        }

        return new ValidatorResult($result, $messages);
    }
}
