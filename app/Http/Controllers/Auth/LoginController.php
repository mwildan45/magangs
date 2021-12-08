<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    public function showLoginForm()
    {
        session(['link' => url()->previous()]);
        return view('auth.login');
    }


    protected function authenticated(Request $request, $user)
    {
        Alert::toast('Selamat Datang Kembali', 'success', 'top-right')->autoClose(5000);
        return redirect(session('link'));
    }

    
    // public function redirectPath()
    // {
    //     return URL::previous();
    // }

    // protected function authenticated(Request $request, $user)
    // {
    //     
    //     return redirect()->back();
        
    // }

  //   protected function redirectTo()
  //   {
		// 
        
  //       if ($this->request->has('previous')) {
  //           $this->redirectTo = $this->request->get('previous');
  //       }

  //       return $this->redirectTo ?? '/home';
  //   }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
