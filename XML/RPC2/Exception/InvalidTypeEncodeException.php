<?php

namespace XML\RPC2\Exception;

/**
 * XML_RPC2_InvalidTypeEncodeException is thrown whenever a class is asked to encode itself and provided a PHP type
 * that can't be translated to XML_RPC
 *
 * @category   XML
 * @package    XML_RPC2
 * @author     Sergio Carvalho <sergio.carvalho@portugalmail.com>
 * @copyright  2004-2006 Sergio Carvalho
 * @license    http://www.gnu.org/copyleft/lesser.html  LGPL License 2.1
 * @link       http://pear.php.net/package/XML_RPC2
 */
class InvalidTypeEncodeException extends Exception
{
}