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
 * @since         4.4.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
namespace Cake\Error\Renderer;

use Cake\Error\Debugger;
use Cake\Error\ErrorRendererInterface;
use Cake\Error\PhpError;

/**
 * Interactive HTML error rendering with a stack trace.
 *
 * Default output renderer for non CLI SAPI.
 */
class HtmlRenderer implements ErrorRendererInterface
{
    /**
     * @inheritDoc
     */
    public function render(PhpError $error): string
    {
        $id = 'cakeErr' . uniqid();

        // Some of the error data is not HTML safe so we escape everything.
        $description = h($error->getMessage());
        $path = h($error->getFile());
        $line = h($error->getLine());
        $trace = h($error->getTraceAsString());

        debug($error);
        $errorMessage = sprintf(
            '<b>%s</b> (%s)',
            h(ucfirst($error->getLabel())),
            h($error->getCode())
        );
        $toggle = $this->renderToggle($errorMessage, $id, 'trace');
        $codeToggle = $this->renderToggle('Code', $id, 'code');
        $excerpt = Debugger::excerpt($error->getFile(), $error->getLine(), 1);
        $code = implode("\n", $excerpt);

        $html = <<<HTML
<pre class="cake-error">
    {$toggle}: {$description} [in <b>{$path}</b>, line <b>{$line}</b>]
    <div id="{:id}-trace" class="cake-stack-trace" style="display: none;">
        {$codeToggle}
        <pre id="{$id}-code" class="cake-code-dump" style="display: none;">
            {$code}
        </pre>
        <div class="cake-trace">
            {$trace}
        </div>
    </div>
</pre>
HTML;

        return $html;
    }

    /**
     * Render a toggle link in the error content.
     *
     * @param string $text The text to insert. Assumed to be HTML safe.
     * @param string $id The error id scope.
     * @param string $suffix The element selector.
     * @return string
     */
    private function renderToggle(string $text, string $id, string $suffix): string
    {
        $selector = $id . '-' . $suffix;

        // phpcs:disable
        return <<<HTML
<a href="javascript:void(0);"
  onclick="document.getElementById('{$selector}').style.display = (document.getElementById('{$selector}').style.display == 'none' ? '' : 'none'"
>
    {$text}
</a>
HTML;
        // phpcs:enable
    }
}