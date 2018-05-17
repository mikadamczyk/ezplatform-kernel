<?php

return array(
    'ezurlalias_ml' => array(
        0 => array(
            'action' => 'eznode:2',
            'action_type' => 'eznode',
            'alias_redirects' => '1',
            'id' => '1',
            'is_alias' => '0',
            'is_original' => '1',
            'lang_mask' => '3',
            'link' => '1',
            'parent' => '0',
            'text' => '',
            'text_md5' => 'd41d8cd98f00b204e9800998ecf8427e',
        ),
        1 => array(
            'action' => 'eznode:314',
            'action_type' => 'eznode',
            'alias_redirects' => '1',
            'id' => '2',
            'is_alias' => '0',
            'is_original' => '1',
            'lang_mask' => '2',
            'link' => '2',
            'parent' => '0',
            'text' => 'jedan',
            'text_md5' => '6896260129051a949051c3847c34466f',
        ),
        2 => array(
            'action' => 'eznode:315',
            'action_type' => 'eznode',
            'alias_redirects' => '1',
            'id' => '3',
            'is_alias' => '0',
            'is_original' => '1',
            'lang_mask' => '2',
            'link' => '3',
            'parent' => '0',
            'text' => 'dva',
            'text_md5' => 'c67ed9a09ab136fae610b6a087d82e21',
        ),
        3 => array(
            'action' => 'eznode:316',
            'action_type' => 'eznode',
            'alias_redirects' => '1',
            'id' => '4',
            'is_alias' => '0',
            'is_original' => '1',
            'lang_mask' => '10',
            'link' => '4',
            'parent' => '2',
            'text' => 'swap-this',
            'text_md5' => '21940df6bebbfc9501b3b512640dffe5',
        ),
        4 => array(
            'action' => 'eznode:316',
            'action_type' => 'eznode',
            'alias_redirects' => '1',
            'id' => '4',
            'is_alias' => '0',
            'is_original' => '1',
            'lang_mask' => '4',
            'link' => '4',
            'parent' => '2',
            'text' => 'swap-en',
            'text_md5' => '5a1cafd1fc29c227c11c751d79b0c155',
        ),
        5 => array(
            'action' => 'eznode:317',
            'action_type' => 'eznode',
            'alias_redirects' => '1',
            'id' => '5',
            'is_alias' => '0',
            'is_original' => '1',
            'lang_mask' => '2',
            'link' => '5',
            'parent' => '3',
            'text' => 'swap-hr',
            'text_md5' => 'b0a33436ea51b6cc92f20b7d5be52cf6',
        ),
        6 => array(
            'action' => 'eznode:317',
            'action_type' => 'eznode',
            'alias_redirects' => '1',
            'id' => '5',
            'is_alias' => '0',
            'is_original' => '1',
            'lang_mask' => '24',
            'link' => '5',
            'parent' => '3',
            'text' => 'swap-this',
            'text_md5' => '21940df6bebbfc9501b3b512640dffe5',
        ),
    ),
    'ezcontent_language' => array(
        0 => array(
            'disabled' => 0,
            'id' => 2,
            'locale' => 'cro-HR',
            'name' => 'Croatian (Hrvatski)'
        ),
        1 => array(
            'disabled' => 0,
            'id' => 4,
            'locale' => 'eng-GB',
            'name' => 'English (United Kingdom)'
        ),
        2 => array(
            'disabled' => 0,
            'id' => 8,
            'locale' => 'ger-DE',
            'name' => 'German'
        ),
        3 => array(
            'disabled' => 0,
            'id' => 16,
            'locale' => 'nor-NO',
            'name' => 'Norwegian (Bokmal)'
        ),
    ),
    'ezurlalias_ml_incr' => array(
        0 => array(
            'id' => '1',
        ),
        1 => array(
            'id' => '2',
        ),
        2 => array(
            'id' => '3',
        ),
        3 => array(
            'id' => '4',
        ),
        4 => array(
            'id' => '5',
        ),
    ),
    'ezcontentobject_tree' => array(
        0 => array(
            'node_id' => 314,
            'main_node_id' => 314,
            'parent_node_id' => 2,
            'path_string' => '',
            'path_identification_string' => '',
            'remote_id' => '',
            'contentobject_id' => 1,
        ),
        1 => array(
            'node_id' => 315,
            'main_node_id' => 315,
            'parent_node_id' => 2,
            'path_string' => '',
            'path_identification_string' => '',
            'remote_id' => '',
            'contentobject_id' => 2,
        ),
        2 => array(
            'node_id' => 316,
            'main_node_id' => 316,
            'parent_node_id' => 314,
            'path_string' => '',
            'path_identification_string' => '',
            'remote_id' => '',
            'contentobject_id' => 3,
        ),
        3 => array(
            'node_id' => 317,
            'main_node_id' => 317,
            'parent_node_id' => 315,
            'path_string' => '',
            'path_identification_string' => '',
            'remote_id' => '',
            'contentobject_id' => 4,
        ),
    ),
    'ezcontentobject' => array(
        0 => array(
            'id' => 3,
            'initial_language_id' => 2,
            'current_version' => 1,
        ),
        1 => array(
            'id' => 4,
            'initial_language_id' => 2,
            'current_version' => 1,
        ),
    ),
    'ezcontentobject_name' => [
        0 => [
            'contentobject_id' => 3,
            'content_version' => 1,
            'name' => 'swap hr',
            'content_translation' => 'cro-HR',
        ],
        1 => [
            'contentobject_id' => 3,
            'content_version' => 1,
            'name' => 'swap this',
            'content_translation' => 'ger-DE',
        ],
        2 => [
            'contentobject_id' => 3,
            'content_version' => 1,
            'name' => 'swap this',
            'content_translation' => 'nor-NO',
        ],
        3 => [
            'contentobject_id' => 4,
            'content_version' => 1,
            'name' => 'swap this',
            'content_translation' => 'cro-HR',
        ],
        4 => [
            'contentobject_id' => 4,
            'content_version' => 1,
            'name' => 'swap this',
            'content_translation' => 'ger-DE',
        ],
        5 => [
            'contentobject_id' => 4,
            'content_version' => 1,
            'name' => 'swap en',
            'content_translation' => 'eng-GB',
        ],
    ],
);
