<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response as IlluminateResponse;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });




    }

    /**
     * Returns 404 if the model is not found and the request is expecting JSON
     *
     * @param $request
     * @param Throwable $e - $e = Exception
     * @return IlluminateResponse|JsonResponse|RedirectResponse|Response
     * @throws Throwable
     */
    public function render($request, Throwable $e): IlluminateResponse|JsonResponse|RedirectResponse|Response
    {
        if ($e instanceof ModelNotFoundException && $request->wantsJson()) {
            return response()->json([
                'success' => false,
                'error' => 'Resource not found'
            ], 404);
        }

        if ($e instanceof UniqueConstraintViolationException && $request->wantsJson()) {
            return response()->json([
                'success' => false,
                'error' => 'Unique constraint violation. The resource already exists.'
            ], 422);
        }



        return parent::render($request, $e);
    }

}
