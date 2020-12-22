<?php

namespace XML\RPC2\Exception;

/**
 * XML_RPC2_FaultException signals a XML-RPC response that contains a fault element instead of a regular params element.
 *
 * @category   XML
 * @package    XML_RPC2
 * @author     Sergio Carvalho <sergio.carvalho@portugalmail.com>
 * @copyright  2004-2006 Sergio Carvalho
 * @license    http://www.gnu.org/copyleft/lesser.html  LGPL License 2.1
 * @link       http://pear.php.net/package/XML_RPC2
 */
class FaultException extends Exception
{

    // {{{ properties

    /**
     * Fault code (in the response body)
     *
     * @var string
     */
    protected $faultCode = null;

    // }}}
    // {{{ constructor

    /** Construct a new XML_RPC2_FaultException with a given message string and fault code
     *
     * @param  string        The message string, corresponding to the faultString present in the response body
     * @param  string        The fault code, corresponding to the faultCode in the response body
     */
    function __construct($messageString, $faultCode)
    {
        parent::__construct($messageString);
        $this->faultCode = $faultCode;
    }

    // }}}
    // {{{ getFaultCode()

    /**
     * FaultCode getter
     *
     * @return string fault code
     */
    public function getFaultCode()
    {
        return $this->faultCode;
    }

    // }}}
    // {{{ getFaultString()

    /**
     * FaultString getter
     *
     * This is an alias to getMessage() in order to respect XML-RPC nomenclature for faults
     *
     * @return string fault code
     */
    public function getFaultString()
    {
        return $this->getMessage();
    }

    // }}}
    // {{{ createFromDecode()

    /**
     * Create a XML_RPC2_FaultException by decoding the corresponding xml string
     *
     * @param  string  $xml
     * @return object a XML_RPC2_FaultException
     */
    public static function createFromDecode($xml)
    {
        require_once 'XML/RPC2/Backend/Php/Value.php';

        // This is the only way I know of creating a new Document rooted in the provided simpleXMLFragment (needed for the xpath expressions that does not segfault sometimes
        $xml = simplexml_load_string($xml->asXML());
        $struct = XML_RPC2_Backend_Php_Value::createFromDecode($xml->value)->getNativeValue();
        if (! (is_array($struct) &&
            array_key_exists('faultString', $struct) &&
            array_key_exists('faultCode', $struct))) {
            throw new DecodeException('Unable to decode XML-RPC fault payload');
        }

        return new FaultException($struct['faultString'], $struct['faultCode']);
    }

    // }}}

}