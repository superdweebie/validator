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
class Currency extends AbstractValidator
{

    public function isValid($value){

        $messages = [];

        $result = true;

        $regEx = '/^\d+\.?\d{0,2}$/';

        if ( ! preg_match($regEx, $value)){
            $result = false;
            $messages[] = 'Must be currency format.';
        }

        return new ValidatorResult($result, $messages);
    }
}
