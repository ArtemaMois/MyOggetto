<?php

namespace App\Exceptions;

use App\Exceptions\Account\InactiveUserException;
use App\Exceptions\Account\InvalidCredentialsException;
use App\Exceptions\Email\ErrorSendingEmailException;
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

        $this->renderable(function (InvalidCredentialsException $e) {
            return response()->json([
                'status' => 'failed',
                'message' => __("exceptions.{$e->getMessage()}")
            ]);
        });

        $this->renderable(function (InactiveUserException $e) {
            return response()->json([
                'status' => 'failed',
                'message' => __("exceptions.{$e->getMessage()}")
            ]);
        });

        $this->renderable(function (ErrorSendingEmailException $e) {
            return response()->json([
                'status' => 'failed',
                'message' => __("exceptions.{$e->getMessage()}")
            ]);
        });

        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
