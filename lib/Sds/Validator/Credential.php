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
class Credential extends AbstractValidator
{

    protected $lengthRegEx = '/^.{6,40}$/';

    protected $containAlphaRegEx = '/[a-zA-Z]/';

    protected $containNumRegEx ='/[0-9]/';

    public function isValid($value){

        $messages = [];

        $result = true;

        if ( ! preg_match($this->lengthRegEx, $value)){
            $result = false;
            $messages[] = 'Must be between 6 and 40 characters long.';
        }

        if ( ! preg_match($this->containAlphaRegEx, $value)){
            $result = false;
            $messages[] = 'Must contain at least one alpha character.';
        }

        if ( ! preg_match($this->containNumRegEx, $value)){
            $result = false;
            $messages[] = 'Must contain at least one numeric character.';
        }

        return new ValidatorResult($result, $messages);
    }
}
