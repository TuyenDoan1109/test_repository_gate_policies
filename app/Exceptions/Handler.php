<?php

namespace App\Exceptions;

use App\Helper\Response;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\App;
use Illuminate\Validation\ValidationException;
use Throwable;
use Illuminate\Auth\AuthenticationException;
use Auth;



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


    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if (in_array('admin', $exception->guards())) {
            return $request->expectsJson()
                ? response()->json([
                    'message' => $exception->getMessage()
                ], 401)
                : redirect()->guest(route('admin.login'));
        }

        return $request->expectsJson()
            ? response()->json([
                'message' => $exception->getMessage()
            ], 401)
            : redirect()->guest(route('login'));
    }

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
        $this->reportable(function (Throwable $e) {
            //
        });
    }

//    public function render($request, Throwable $e): \Illuminate\Http\Response|\Illuminate\Http\JsonResponse|array|\Symfony\Component\HttpFoundation\Response
//    {
//        $statusCode = 500;
//        if (method_exists($e, 'getStatusCode')) {
//            $statusCode = $e->getStatusCode();
//        }
//        if (!App::environment(['local']) && !$e instanceof ValidationException){
//            return response()->json(Response::dataError($e->getMessage(), $statusCode));
//        }
//        return parent::render($request, $e);
//    }
}
