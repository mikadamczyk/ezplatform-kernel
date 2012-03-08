<?php
/**
 * File containing the BinaryFile Type class
 *
 * @copyright Copyright (C) 1999-2012 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */

namespace eZ\Publish\Core\Repository\FieldType\BinaryFile;
use eZ\Publish\Core\Repository\FieldType,
    ezp\Base\Exception\InvalidArgumentType,
    ezp\Base\Exception\InvalidArgumentValue,
    eZ\Publish\API\Repository\Values\IO\BinaryFile;

/**
 * The TextLine field type.
 *
 * This field type represents a simple string.
 */
class Type extends FieldType
{
    protected $allowedValidators = array(
        'eZ\\Publish\\Core\\Repository\\FieldType\\BinaryFile\\FileSizeValidator'
    );

    /**
     * Build a Value object of current FieldType
     *
     * Build a FiledType\Value object with the provided $file as value.
     *
     * @param string $file
     * @return \eZ\Publish\Core\Repository\FieldType\BinaryFile\Value
     * @throws \eZ\Publish\API\Repository\Exceptions\InvalidArgumentException
     */
    public function buildValue( $file )
    {
        return new Value( $file );
    }

    /**
     * Return the field type identifier for this field type
     *
     * @return string
     */
    public function getFieldTypeIdentifier()
    {
        return "ezbinaryfile";
    }

    /**
     * Returns the fallback default value of field type when no such default
     * value is provided in the field definition in content types.
     *
     * @return \eZ\Publish\Core\Repository\FieldType\BinaryFile\Value
     */
    public function getDefaultDefaultValue()
    {
        return new Value;
    }

    /**
     * Checks the type and structure of the $Value.
     *
     * @throws \ezp\Base\Exception\InvalidArgumentType if the parameter is not of the supported value sub type
     * @throws \ezp\Base\Exception\InvalidArgumentValue if the value does not match the expected structure
     *
     * @param \eZ\Publish\Core\Repository\FieldType\BinaryFile\Value $inputValue
     *
     * @return \eZ\Publish\Core\Repository\FieldType\BinaryFile\Value
     */
    public function acceptValue( $inputValue )
    {
        if ( !$inputValue instanceof Value )
        {
            throw new InvalidArgumentType( 'value', 'eZ\\Publish\\Core\\Repository\\FieldType\\BinaryFile\\Value' );
        }

        if ( isset( $inputValue->file ) && !$inputValue->file instanceof BinaryFile )
        {
            throw new InvalidArgumentValue( $inputValue, get_class( $this ) );
        }

        return $inputValue;
    }

    /**
     * BinaryFile does not support sorting
     *
     * @return bool
     */
    protected function getSortInfo( $value )
    {
        return false;
    }

    /**
     * Converts an $hash to the Value defined by the field type
     *
     * @param mixed $hash
     *
     * @return \eZ\Publish\Core\Repository\FieldType\BinaryFile\Value $value
     */
    public function fromHash( $hash )
    {
        return new Value( $hash );
    }

    /**
     * Converts a $Value to a hash
     *
     * @param \eZ\Publish\Core\Repository\FieldType\BinaryFile\Value $value
     *
     * @return mixed
     */
    public function toHash( $value )
    {
        return $value->file;
    }

    /**
     * Returns whether the field type is searchable
     *
     * @return bool
     */
    public function isSearchable()
    {
        return true;
    }
}
