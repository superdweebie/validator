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
class Identifier extends Group
{

    public function __construct(){
        $this->validators = [
            new Length(3, 40),
            new IdentifierChars()
        ];
    }
}
