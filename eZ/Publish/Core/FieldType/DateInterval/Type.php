<?php

/**
 * @copyright Copyright (C) Ibexa AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
namespace eZ\Publish\Core\FieldType\DateInterval;

use eZ\Publish\SPI\FieldType\Generic\Type as GenericType;
use EzSystems\EzPlatformAdminUi\FieldType\FieldDefinitionFormMapperInterface;
use EzSystems\EzPlatformAdminUi\Form\Data\FieldDefinitionData;
use EzSystems\EzPlatformAdminUi\Form\Type\FieldDefinition\DateInterval\DateIntervalSettingsType;
use EzSystems\EzPlatformContentForms\FieldType\FieldValueFormMapperInterface;
use EzSystems\EzPlatformContentForms\Data\Content\FieldData;
use EzSystems\EzPlatformContentForms\Form\Type\FieldType\DateIntervalType;
use Symfony\Component\Form\FormInterface;

final class Type extends GenericType implements FieldValueFormMapperInterface, FieldDefinitionFormMapperInterface
{
    const WIDGET_CHOICE = 'choice';
    const WIDGET_TEXT = 'text';
    const WIDGET_INTEGER = 'integer';
    const WIDGET_SINGLE_TEXT = 'single_text';

    /**
     * Returns the field type identifier for this field type.
     *
     * @return string
     */
    public function getFieldTypeIdentifier()
    {
        return 'ibexadateinterval';
    }

    public function mapFieldValueForm(FormInterface $fieldForm, FieldData $data)
    {

        $definition = $data->fieldDefinition;
        $fieldForm->add('value', DateIntervalType::class, [
            'required' => $definition->isRequired,
            'label' => $definition->getName(),
            'widget' => $definition->fieldSettings['widget'] ?? 'choice'
        ]);
    }

    public function getSettingsSchema(): array
    {
        return [
            // One of the DEFAULT_* class constants
            'widget' => [
                'type' => 'choice',
                'default' => self::WIDGET_CHOICE,
            ],
        ];
    }

    public function mapFieldDefinitionForm(FormInterface $fieldDefinitionForm, FieldDefinitionData $data): void
    {
        $fieldDefinitionForm->add('fieldSettings', DateIntervalSettingsType::class, [
            'label' => false
        ]);
    }
}
