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
class Cvv extends AbstractValidator
{

    public function isValid($value){

        $messages = [];

        $result = true;

        if (
            ! preg_match('/^\d\d\d$/', $value)
        ){
            $result = false;
            $messages[] = 'Cvv not valid format';
        }

        return new ValidatorResult($result, $messages);
    }
}
