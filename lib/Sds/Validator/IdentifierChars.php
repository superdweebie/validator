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
class IdentifierChars extends AbstractValidator
{

    protected $regEx = '/^[a-zA-Z0-9_-]+$/';

    public function isValid($value){

        $messages = [];

        $result = true;

        if ( ! preg_match($this->regEx, $value)){
            $result = false;
            $messages[] = 'Must contain only the characters a-z, A-Z, 0-9, _, or -.';
        }

        return new ValidatorResult($result, $messages);
    }
}
