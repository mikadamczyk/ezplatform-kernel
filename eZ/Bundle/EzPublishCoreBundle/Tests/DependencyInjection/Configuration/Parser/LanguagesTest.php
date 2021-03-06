<?php

/**
 * File containing the LanguagesTest class.
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
namespace eZ\Bundle\EzPublishCoreBundle\Tests\DependencyInjection\Configuration\Parser;

use eZ\Bundle\EzPublishCoreBundle\DependencyInjection\Configuration\Parser\Languages;
use eZ\Bundle\EzPublishCoreBundle\DependencyInjection\EzPublishCoreExtension;
use Symfony\Component\Yaml\Yaml;

class LanguagesTest extends AbstractParserTestCase
{
    protected function getContainerExtensions(): array
    {
        return [new EzPublishCoreExtension([new Languages()])];
    }

    protected function getMinimalConfiguration(): array
    {
        return $this->minimalConfig = Yaml::parse(file_get_contents(__DIR__ . '/../../Fixtures/ezpublish_minimal.yml'));
    }

    public function testLanguagesSingleSiteaccess()
    {
        $langDemoSite = ['eng-GB'];
        $langFre = ['fre-FR', 'eng-GB'];
        $langEmptyGroup = ['pol-PL'];
        $config = [
            'siteaccess' => [
                'list' => ['fre2'],
                'groups' => [self::EMPTY_SA_GROUP => []],
            ],
            'system' => [
                'ezdemo_site' => ['languages' => $langDemoSite],
                'fre' => ['languages' => $langFre],
                'fre2' => ['languages' => $langFre],
                self::EMPTY_SA_GROUP => ['languages' => $langEmptyGroup],
            ],
        ];
        $this->load($config);

        $this->assertConfigResolverParameterValue('languages', $langDemoSite, 'ezdemo_site');
        $this->assertConfigResolverParameterValue('languages', $langFre, 'fre');
        $this->assertConfigResolverParameterValue('languages', $langFre, 'fre2');
        $this->assertConfigResolverParameterValue('languages', $langEmptyGroup, self::EMPTY_SA_GROUP);
        $this->assertSame(
            [
                'eng-GB' => ['ezdemo_site'],
                'fre-FR' => ['fre', 'fre2'],
                'pol-PL' => [self::EMPTY_SA_GROUP],
            ],
            $this->container->getParameter('ezpublish.siteaccesses_by_language')
        );
        // languages for ezdemo_site_admin will take default value (empty array)
        $this->assertConfigResolverParameterValue('languages', [], 'ezdemo_site_admin');
    }

    public function testLanguagesSiteaccessGroup()
    {
        $langDemoSite = ['eng-US', 'eng-GB'];
        $config = [
            'system' => [
                'ezdemo_frontend_group' => ['languages' => $langDemoSite],
                'ezdemo_site' => [],
                'fre' => [],
            ],
        ];
        $this->load($config);

        $this->assertConfigResolverParameterValue('languages', $langDemoSite, 'ezdemo_site');
        $this->assertConfigResolverParameterValue('languages', $langDemoSite, 'fre');
        $this->assertConfigResolverParameterValue('languages', [], self::EMPTY_SA_GROUP);
        $this->assertSame(
            [
                'eng-US' => ['ezdemo_frontend_group', 'ezdemo_site', 'fre'],
            ],
            $this->container->getParameter('ezpublish.siteaccesses_by_language')
        );
        // languages for ezdemo_site_admin will take default value (empty array)
        $this->assertConfigResolverParameterValue('languages', [], 'ezdemo_site_admin');
    }

    public function testTranslationSiteAccesses()
    {
        $translationSAsDemoSite = ['foo', 'bar'];
        $translationSAsFre = ['foo2', 'bar2'];
        $config = [
            'system' => [
                'ezdemo_site' => ['translation_siteaccesses' => $translationSAsDemoSite],
                'fre' => ['translation_siteaccesses' => $translationSAsFre],
            ],
        ];
        $this->load($config);

        $this->assertConfigResolverParameterValue('translation_siteaccesses', $translationSAsDemoSite, 'ezdemo_site');
        $this->assertConfigResolverParameterValue('translation_siteaccesses', $translationSAsFre, 'fre');
        $this->assertConfigResolverParameterValue('translation_siteaccesses', [], 'ezdemo_site_admin');
        $this->assertConfigResolverParameterValue('translation_siteaccesses', [], self::EMPTY_SA_GROUP);
    }

    public function testTranslationSiteAccessesWithGroup()
    {
        $translationSAsDemoSite = ['ezdemo_site', 'fre'];
        $config = [
            'system' => [
                'ezdemo_frontend_group' => ['translation_siteaccesses' => $translationSAsDemoSite],
                'ezdemo_site' => [],
                'fre' => [],
            ],
        ];
        $this->load($config);

        $this->assertConfigResolverParameterValue('translation_siteaccesses', $translationSAsDemoSite, 'ezdemo_site');
        $this->assertConfigResolverParameterValue('translation_siteaccesses', $translationSAsDemoSite, 'fre');
        $this->assertConfigResolverParameterValue('translation_siteaccesses', [], 'ezdemo_site_admin');
        $this->assertConfigResolverParameterValue('translation_siteaccesses', [], self::EMPTY_SA_GROUP);
    }
}
