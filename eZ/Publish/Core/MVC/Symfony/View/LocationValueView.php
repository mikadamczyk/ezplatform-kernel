<?php

/**
 * @copyright Copyright (C) Ibexa AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
namespace eZ\Publish\Core\MVC\Symfony\View;

interface LocationValueView
{
    /**
     * @return \eZ\Publish\API\Repository\Values\Content\Location
     */
    public function getLocation();
}
