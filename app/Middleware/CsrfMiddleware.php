<?php declare(strict_types=1);

namespace App\Middleware;

use Exception;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class CsrfMiddleware implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        if ($request->getMethod() === "POST" || $request->getMethod() === "PUT" || $request->getMethod() === "DELETE") {
            if (empty($_POST['__csrf_value']) || !csrf_token($_POST['__csrf_value'])) {
                throw new Exception('CSRF Token missing or invalid!!');
            } else {
                return $handler->handle($request);
            }
        }
        return $handler->handle($request);
    }
}