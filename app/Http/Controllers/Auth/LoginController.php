<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {   
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Check if the user has too many failed login attempts.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        if (auth()->attempt(['email' => $input['email'], 'password' => $input['password']])) {
            $this->clearLoginAttempts($request); // Clear the login attempts if successful

            if (auth()->user()->type == 'admin') {
                return redirect()->route('admin.index');
            } else if (auth()->user()->type == 'manager') {
                return redirect()->route('manager.home');
            } else if (auth()->user()->type == 'user') {
                return redirect()->route('user.home');
            } else if (auth()->user()->type == 'warehouse') {
                return redirect()->route('warehouse.home');
            } else {
                return redirect()->route('auth.login');
            }
        } else {
            // Increment login attempts if unsuccessful
            $this->incrementLoginAttempts($request);

            return redirect()->route('login')
                ->with('error', 'Email-Address And Password Are Wrong.');
        }
    }

    protected function sendLockoutResponse(Request $request)
    {
        $seconds = $this->limiter()->availableIn(
            $this->throttleKey($request)
        );

        throw ValidationException::withMessages([
            'email' => [trans('auth.throttle', ['seconds' => $seconds])],
        ])->status(429);
    }

    public function username()
    {
        return 'email';
    }

    protected function hasTooManyLoginAttempts(Request $request)
    {
        $maxAttempts = 3; // Max number of attempts
        return $this->limiter()->tooManyAttempts(
            $this->throttleKey($request), $maxAttempts
        );
    }

    protected function incrementLoginAttempts(Request $request)
    {
        $this->limiter()->hit(
            $this->throttleKey($request), 60 * 15 // Lockout time in seconds (15 minutes)
        );
    }

    protected function clearLoginAttempts(Request $request)
    {
        $this->limiter()->clear($this->throttleKey($request));
    }

    protected function throttleKey(Request $request)
    {
        return strtolower($request->input($this->username())).'|'.$request->ip();
    }
}
