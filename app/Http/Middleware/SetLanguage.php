<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;

class SetLanguage
{
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->getPreferredLanguage(['en', 'es']);
        app()->setLocale($locale);

        $response = $next($request);

        if ($response instanceof BinaryFileResponse) {
            // Configurar cabeceras para BinaryFileResponse
            $response->headers->set('Content-Language', $locale);
            $response->headers->set('x-metatags-translationrequest', 'no');
        } elseif ($response instanceof Response) {
            // Configurar cabeceras para Response
            $content = str_replace(
                '<html',
                '<html lang="' . $locale . '" translate="no"',
                $response->getContent()
            );

            $content = str_replace(
                '<head>',
                '<head><meta http-equiv="Content-Language" content="' . $locale . '"><meta name="x-metatags-translationrequest" content="no">',
                $content
            );

            $response->setContent($content);
        }

        return $response;
    }
}
