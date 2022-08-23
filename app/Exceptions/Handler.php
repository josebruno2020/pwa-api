<?php

namespace App\Exceptions;

use Facade\FlareClient\Http\Exceptions\NotFound;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
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
    public function register()
    {
        $this->renderable(function (NotFound $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        });
        $this->renderable(function (ServiceException $e) {
            return response()->json(['error' => $e->getMessage()], $e->getCode());
        });


        $this->reportable(function (Throwable $e) {

        });
    }
}
