<?php

namespace XML\RPC2\Exception;

/**
 * XML_RPC2_ReceivedInvalidStatusCodeExceptionextends is thrown whenever the XML_RPC2 response to a request does not return a 200 http status code.
 *
 * @category   XML
 * @package    XML_RPC2
 * @author     Sergio Carvalho <sergio.carvalho@portugalmail.com>
 * @copyright  2004-2006 Sergio Carvalho
 * @license    http://www.gnu.org/copyleft/lesser.html  LGPL License 2.1
 * @link       http://pear.php.net/package/XML_RPC2
 */
class ReceivedInvalidStatusCodeException extends TransportException
{
}