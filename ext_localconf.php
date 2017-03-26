<?php

defined('TYPO3_MODE') or die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Extcode.' . $_EXTKEY,
    'Product',
    [
        'Product' => 'show, list',
    ],
    // non-cacheable actions
    [
        'Product' => 'list',
    ]
);

$dispatcher = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
    \TYPO3\CMS\Extbase\SignalSlot\Dispatcher::class
);
$dispatcher->connect(
    'Extcode\Cart\Utility\ProductUtility',
    'loadCartProductFromForeignDataStorage',
    'Extcode\CartSimpleProduct\Utility\ProductUtility',
    'loadCartProductFromForeignDataStorage'
);
