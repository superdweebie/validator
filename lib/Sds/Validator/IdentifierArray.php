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
class IdentifierArray extends AbstractValidator
{

    public function isValid($value)
    {
        $messages = [];

        $validator = new Identifier();
        $result = true;

        foreach ($value as $name) {
            $validatorResult = $validator->isValid($name);
            if ( ! $validatorResult->getResult()) {
                $result = false;
                foreach ($validatorResult->getMessages() as $message){
                    $messages[] = $name . ' not valid. ' . $message;
                }
            }
        }

        return new ValidatorResult($result, $messages);
    }
}
