<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Conservatively minifies HTML responses in production.
 *
 * Whitespace inside <pre>, <textarea>, <script> and <style> is preserved by
 * masking those regions out before collapsing, then restoring them. Disabled
 * when APP_DEBUG is on so local development output stays readable.
 */
class MinifyHtml
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if (config('app.debug')) {
            return $response;
        }

        $contentType = $response->headers->get('Content-Type');
        if ($contentType && ! str_contains($contentType, 'text/html')) {
            return $response;
        }

        // Only operate on standard responses with string content.
        if (! method_exists($response, 'getContent') || ! method_exists($response, 'setContent')) {
            return $response;
        }

        $html = $response->getContent();
        if (! is_string($html) || $html === '') {
            return $response;
        }

        $response->setContent($this->minify($html));

        return $response;
    }

    private function minify(string $html): string
    {
        $placeholders = [];

        // Mask out content where whitespace is significant.
        $html = preg_replace_callback(
            '#<(pre|textarea|script|style)\b[^>]*>.*?</\1>#is',
            function ($m) use (&$placeholders) {
                $key = "\x01" . count($placeholders) . "\x01";
                $placeholders[$key] = $m[0];
                return $key;
            },
            $html
        );

        if ($html === null) {
            return $placeholders === [] ? '' : implode('', $placeholders);
        }

        // Strip HTML comments (keep IE conditionals just in case).
        $html = preg_replace('#<!--(?!\[if).*?-->#s', '', $html);
        // Collapse whitespace between tags.
        $html = preg_replace('/>\s+</', '><', $html);
        // Collapse runs of whitespace.
        $html = preg_replace('/\s{2,}/', ' ', $html);

        // Restore masked regions.
        return strtr($html, $placeholders);
    }
}
