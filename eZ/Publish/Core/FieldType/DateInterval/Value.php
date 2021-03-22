<?php

/**
 * @copyright Copyright (C) Ibexa AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
namespace eZ\Publish\Core\FieldType\DateInterval;

use eZ\Publish\Core\FieldType\Value as BaseValue;
use eZ\Publish\Core\Base\Exceptions\InvalidArgumentValue;
use Exception;
use DateInterval;

/**
 * Value for DateInterval field type.
 */
final class Value extends BaseValue
{
    /**
     * @var \DateInterval|null
     */
    public $dateInterval;

    /**
     * DateInterval format to be used by {@link __toString()}.
     *
     * @var string
     */
    public $format = '%y year, %m month, %d day';

    /**
     * Construct a new Value object and initialize with $dateInterval.
     *
     * @param \DateInterval|null $dateInterval intervale as a DateInterval object
     */
    public function __construct(?DateInterval $dateInterval = null)
    {
        if ($dateInterval !== null ) {
            $dateInterval = clone $dateInterval;
        }

        $this->dateInterval = $dateInterval;
    }

    /**
     * @see \eZ\Publish\Core\FieldType\Value
     */
    public function __toString()
    {
        if (!$this->dateInterval instanceof DateInterval) {
            return '';
        }

        return $this->dateInterval->format($this->format);
    }
}
