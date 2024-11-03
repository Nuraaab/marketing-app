<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Stripe\Checkout\Session;
use Stripe\Exception\ApiErrorException;
use Illuminate\Http\Request;
use App\Models\Package;
use Stripe\Stripe;
use App\Models\User;
use App\Models\Order; 
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\Mail; 
use App\Mail\PurchaseConfirmation;
use App\Mail\CompanyPurchaseNotification; 
class StripeController extends Controller
{
    public function success(Request $request): View|Factory|Application
    {
        
        $packageId = $request->query('package_id');
        $package = Package::find($packageId);
        $userEmail = $request->query('user_email');
        $order = Order::create([
            'payment_date' => now(), 
            'txn_id' => Str::random(10), 
            'user_id' => auth()->id(), 
            'package_id' => $packageId,
        ]);
        // Mail::to($userEmail)->send(new PurchaseConfirmation($package, $order));
        // Mail::to('ahmednuru215@gmail.com')->send(new CompanyPurchaseNotification($package, $order));
        return view('front.main-pages.success', compact('package', 'userEmail'));
    }

    public function test(Request $request): RedirectResponse
{
  
    $user = User::where('email', $request->input('email'))->first();

    if (!$user) {
        $user = User::create([
            'email'    => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
    }
    Auth::login($user);

    $currency ='';
    $packageId = $request->input('package_id');
    $packagePrice = $request->input('package_price'); 
    $packageUnit = $request->input('package_unit');   

    $package = Package::find($packageId);
    if($packagePrice == '$'){
        $currency = 'usd';
    }else if($packagePrice == 'ETB'){
        $currency = 'etb';
    }else{
        $currency = 'usd';
    }
    Stripe::setApiKey(config('stripe.test.sk'));
    $session = Session::create([
        'customer_email' => $user->email,
        'line_items'  => [
            [
                'price_data' => [
                    'currency'     => $currency,
                    'product_data' => [
                        'name' => "{$package->name} Package Purchase",
                    ],
                    'unit_amount'  => $packagePrice * 100, 
                ],
                'quantity'   => 1,
            ],
        ],
        'mode'        => 'payment',
        'success_url' => route('success', ['package_id' => $packageId, 'user_email' => $user->email]),
        'cancel_url'  => route('home'),
    ]);
    return redirect()->away($session->url);
}

//    public function test(Request $request): RedirectResponse
//     {
//          $currency ='';
//         Stripe::setApiKey(config('stripe.test.sk'));

//         $session = Session::create([
//             'line_items'  => [
//                 [
//                     'price_data' => [
//                         'currency'     => 'usd',
//                         'product_data' => [
//                             'name' => 'T-shirt',
//                         ],
//                         'unit_amount'  => 5000,
//                     ],
//                     'quantity'   => 1,
//                 ],
//             ],
//             'mode'        => 'payment',
//             'success_url' => route('success'),
//             'cancel_url'  => route('home'),
//         ]);

//         return redirect()->away($session->url);
//     }

    /**
     * @return RedirectResponse
     * @throws ApiErrorException
     */
    public function live(): RedirectResponse
    {
        Stripe::setApiKey(config('stripe.live.sk'));

        $session = Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'usd',
                        'product_data' => [
                            'name' => 'T-shirt',
                        ],
                        'unit_amount'  => 500,
                    ],
                    'quantity'   => 1,
                ],
            ],
            'mode'        => 'payment',
            'success_url' => route('success'),
            'cancel_url'  => route('checkout'),
        ]);

        return redirect()->away($session->url);
    }

   public function sucess(){

   }
}
