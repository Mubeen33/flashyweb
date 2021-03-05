<?php

namespace App\Http\Controllers\Customers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:customer');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function index(EmailVerificationRequest $request){

        $request->fulfill();
        return redirect()->route('verification.notice.success');
    }

    public function resend(Request $request)
    {

//        check last verify link generate time
        $lastMail=Auth::guard('customer')->user()->last_resend_email_verified_link;
        $start=Carbon::parse($lastMail);
        $end=Carbon::now();
//        //email is already verified
//        if(Auth::guard('customer')->user()->email_verified_at){
//            return redirect()->route('frontend.rootPage');
//        }

        //email is not verified yet
        if(!$lastMail){
        $this->updateLastEmailTime();
            $request->user()->sendEmailVerificationNotification();
            alert()->success('Message','Email verification link has been sent to you Check your email inbox')->autoClose(9000);
        }else{

            //difference b/t current and previous mail
            $diff=$start->diff($end)->format('%i');
            //resend email after 1 mint from previous
                if($diff> 1){

                    $this->updateLastEmailTime();
                    $request->user()->sendEmailVerificationNotification();
                    alert()->success('Message','Email verification link has been sent to you Check your email inbox')->autoClose(9000);

                }else{

                //alert is user resend email before 1 mints
                    alert()->html('<i>Message</i>',"
                     A email verification link has been sent to you at  <b>".$start->format('h:i:s')."</b>,
                      you can regenerate verification link after 1 minute form first link
                    ",'WarningAlert')->autoClose(9000);

                }
        }
        return back();
    }
    private function updateLastEmailTime(){
        Customer::where('id',Auth::guard('customer')->user()->id)->update(['last_resend_email_verified_link'=>Carbon::now()]);
    }

    public function verifyPage(){
        if(Auth::guard('customer')->user()->email_verified_at){
            return redirect()->route('verification.notice.success');
        }
        return view('auth.verify-email');
    }

    public function verifySuccessPage(){
            return view('auth.verify-success-page');
        }


}
