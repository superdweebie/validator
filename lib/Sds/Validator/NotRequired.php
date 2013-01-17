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
class NotRequired extends AbstractValidator
{

    public function isValid($value){

        $messages = [];

        $result = true;
        $this->haltOnPass = false;

        if ( !isset($value) || $value == ''){
            $this->haltOnPass = true;
        }

        return new ValidatorResult($result, $messages);
    }
}
