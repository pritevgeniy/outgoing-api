<?php

declare(strict_types=1);

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * @param $request
     * @param Throwable $e
     * @return HttpResponse|JsonResponse|Response
     * @throws Throwable
     */
    public function render($request, Throwable $e): HttpResponse|JsonResponse|Response
    {
        if ($request->is('api/*')) {
            if ($e instanceof UnauthorizedHttpException) {
                return $this->jsonError($e, Response::HTTP_UNAUTHORIZED);
            }
            if ($e instanceof ModelNotFoundException) {
                return $this->jsonError($e, Response::HTTP_NOT_FOUND);
            }
            if ($e instanceof MethodNotAllowedHttpException) {
                return $this->jsonError($e, Response::HTTP_METHOD_NOT_ALLOWED);
            }

            return $this->jsonError($e, Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return parent::render($request, $e);
    }

    /**
     * @param Throwable $exception
     * @param int $code
     * @return JsonResponse
     */
    private function jsonError(Throwable $exception, int $code): JsonResponse
    {
        return response()->json(['message' => $exception->getMessage()], $code);
    }
}
