<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         3.0.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\I18n\I18n;

// Backwards compatibility alias for custom translation messages loaders which return a Package instance.
// phpcs:disable
if (!class_exists('Aura\Intl\Package')) {
    class_alias('Cake\I18n\Package', 'Aura\Intl\Package');
}
// phpcs:enable

if (!function_exists('__i')) {
    /**
     * Returns a translated string if one is found; Otherwise, the submitted message.
     *
     * @param string $singular Text to translate.
     * @param mixed ...$args Array with arguments or multiple arguments in function.
     * @return string The translated text.
     * @link https://book.cakephp.org/4/en/core-libraries/global-constants-and-functions.html#__
     */
    function __i(string $singular, ...$args): string
    {
        if (!$singular) {
            return '';
        }
        if (isset($args[0]) && is_array($args[0])) {
            $args = $args[0];
        }

        return I18n::getTranslator()->translate($singular, $args);
    }

}

if (!function_exists('__n')) {
    /**
     * Returns correct plural form of message identified by $singular and $plural for count $count.
     * Some languages have more than one form for plural messages dependent on the count.
     *
     * @param string $singular Singular text to translate.
     * @param string $plural Plural text.
     * @param int $count Count.
     * @param mixed ...$args Array with arguments or multiple arguments in function.
     * @return string Plural form of translated string.
     * @link https://book.cakephp.org/4/en/core-libraries/global-constants-and-functions.html#__n
     */
    function __n(string $singular, string $plural, int $count, ...$args): string
    {
        if (!$singular) {
            return '';
        }
        if (isset($args[0]) && is_array($args[0])) {
            $args = $args[0];
        }

        return I18n::getTranslator()->translate(
            $plural,
            ['_count' => $count, '_singular' => $singular] + $args
        );
    }

}

if (!function_exists('__d')) {
    /**
     * Allows you to override the current domain for a single message lookup.
     *
     * @param string $domain Domain.
     * @param string $msg String to translate.
     * @param mixed ...$args Array with arguments or multiple arguments in function.
     * @return string Translated string.
     * @link https://book.cakephp.org/4/en/core-libraries/global-constants-and-functions.html#__d
     */
    function __d(string $domain, string $msg, ...$args): string
    {
        if (!$msg) {
            return '';
        }
        if (isset($args[0]) && is_array($args[0])) {
            $args = $args[0];
        }

        return I18n::getTranslator($domain)->translate($msg, $args);
    }

}

if (!function_exists('__dn')) {
    /**
     * Allows you to override the current domain for a single plural message lookup.
     * Returns correct plural form of message identified by $singular and $plural for count $count
     * from domain $domain.
     *
     * @param string $domain Domain.
     * @param string $singular Singular string to translate.
     * @param string $plural Plural.
     * @param int $count Count.
     * @param mixed ...$args Array with arguments or multiple arguments in function.
     * @return string Plural form of translated string.
     * @link https://book.cakephp.org/4/en/core-libraries/global-constants-and-functions.html#__dn
     */
    function __dn(string $domain, string $singular, string $plural, int $count, ...$args): string
    {
        if (!$singular) {
            return '';
        }
        if (isset($args[0]) && is_array($args[0])) {
            $args = $args[0];
        }

        return I18n::getTranslator($domain)->translate(
            $plural,
            ['_count' => $count, '_singular' => $singular] + $args
        );
    }

}

if (!function_exists('__x')) {
    /**
     * Returns a translated string if one is found; Otherwise, the submitted message.
     * The context is a unique identifier for the translations string that makes it unique
     * within the same domain.
     *
     * @param string $context Context of the text.
     * @param string $singular Text to translate.
     * @param mixed ...$args Array with arguments or multiple arguments in function.
     * @return string Translated string.
     * @link https://book.cakephp.org/4/en/core-libraries/global-constants-and-functions.html#__x
     */
    function __x(string $context, string $singular, ...$args): string
    {
        if (!$singular) {
            return '';
        }
        if (isset($args[0]) && is_array($args[0])) {
            $args = $args[0];
        }

        return I18n::getTranslator()->translate($singular, ['_context' => $context] + $args);
    }

}

if (!function_exists('__xn')) {
    /**
     * Returns correct plural form of message identified by $singular and $plural for count $count.
     * Some languages have more than one form for plural messages dependent on the count.
     * The context is a unique identifier for the translations string that makes it unique
     * within the same domain.
     *
     * @param string $context Context of the text.
     * @param string $singular Singular text to translate.
     * @param string $plural Plural text.
     * @param int $count Count.
     * @param mixed ...$args Array with arguments or multiple arguments in function.
     * @return string Plural form of translated string.
     * @link https://book.cakephp.org/4/en/core-libraries/global-constants-and-functions.html#__xn
     */
    function __xn(string $context, string $singular, string $plural, int $count, ...$args): string
    {
        if (!$singular) {
            return '';
        }
        if (isset($args[0]) && is_array($args[0])) {
            $args = $args[0];
        }

        return I18n::getTranslator()->translate(
            $plural,
            ['_count' => $count, '_singular' => $singular, '_context' => $context] + $args
        );
    }

}

if (!function_exists('__dx')) {
    /**
     * Allows you to override the current domain for a single message lookup.
     * The context is a unique identifier for the translations string that makes it unique
     * within the same domain.
     *
     * @param string $domain Domain.
     * @param string $context Context of the text.
     * @param string $msg String to translate.
     * @param mixed ...$args Array with arguments or multiple arguments in function.
     * @return string Translated string.
     * @link https://book.cakephp.org/4/en/core-libraries/global-constants-and-functions.html#__dx
     */
    function __dx(string $domain, string $context, string $msg, ...$args): string
    {
        if (!$msg) {
            return '';
        }
        if (isset($args[0]) && is_array($args[0])) {
            $args = $args[0];
        }

        return I18n::getTranslator($domain)->translate(
            $msg,
            ['_context' => $context] + $args
        );
    }

}

if (!function_exists('__dxn')) {
    /**
     * Returns correct plural form of message identified by $singular and $plural for count $count.
     * Allows you to override the current domain for a single message lookup.
     * The context is a unique identifier for the translations string that makes it unique
     * within the same domain.
     *
     * @param string $domain Domain.
     * @param string $context Context of the text.
     * @param string $singular Singular text to translate.
     * @param string $plural Plural text.
     * @param int $count Count.
     * @param mixed ...$args Array with arguments or multiple arguments in function.
     * @return string Plural form of translated string.
     * @link https://book.cakephp.org/4/en/core-libraries/global-constants-and-functions.html#__dxn
     */
    function __dxn(string $domain, string $context, string $singular, string $plural, int $count, ...$args): string
    {
        if (!$singular) {
            return '';
        }
        if (isset($args[0]) && is_array($args[0])) {
            $args = $args[0];
        }

        return I18n::getTranslator($domain)->translate(
            $plural,
            ['_count' => $count, '_singular' => $singular, '_context' => $context] + $args
        );
    }

}
