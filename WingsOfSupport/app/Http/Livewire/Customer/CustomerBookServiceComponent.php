<?php

namespace App\Http\Livewire\Customer;

use App\Models\BookService;
use App\Models\Payment;
use App\Models\Service;
use App\Models\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Stripe\Exception\SignatureVerificationException;
use Stripe\Checkout\Session;
use Stripe\Stripe;
use Illuminate\Http\JsonResponse;
use Stripe\Webhook;

class CustomerBookServiceComponent extends Component
{

    public $service_id;
    public $service_provider_id;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'service_id' => 'required',
            'service_provider_id' => 'required',
        ]);
    }

    // public function bookService()
    // {
    //     $user = Auth::user();
    //     $this->validate([
    //         'service_id' => 'required',
    //         'service_provider_id' => 'required',
    //     ]);

    //     $bookservice = new BookService();
    //     $bookservice->service_id = $this->service_id;
    //     $bookservice->service_provider_id = $this->service_provider_id;
    //     $bookservice->user_id = $user->id;

    //     $bookservice->save();
    //     session()->flash('message','Service has been book successfully!!');
    //     $this->reset('service_id','service_provider_id');
    // }

    public function bookService()
    {
        $user = Auth::user();
        $service = Service::where('id','=',$this->service_id)->first();
        $serviceProvider = ServiceProvider::where('id','=',$this->service_provider_id)->first();
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $YOUR_DOMAIN = 'http://127.0.0.1:8000';

        $session = Session::create([
            'line_items' => [[
                'price_data' => [
                    'currency' => $_ENV["STRIPE_PAYMENT_CURRENCY"],
                    'unit_amount' => intval($serviceProvider->charge),
                    'product_data' => [
                        'name' => $service->name,
                    ],
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'metadata' => [
                'user_id' => $user->id,
                'service_id' => $service->id,
                'service_provider_id' => $serviceProvider->id
            ],
            'payment_intent_data' => [
                'metadata' => [
                    'user_id' => $user->id,
                    'service_id' => $service->id,
                    'service_provider_id' => $serviceProvider->id
                ]
            ],
            'success_url' => $YOUR_DOMAIN . '/customer/dashboard',
            'cancel_url' => $YOUR_DOMAIN . '/cancel.html',
        ]);

        return redirect()->to($session->url);

    }

    public function stripeWebhook(Request $request)
	{
		$payload = $request->getContent();
		$signature = $request->server('HTTP_STRIPE_SIGNATURE');
		$webhookSecretKey = env('STRIPE_WEBHOOK_SECRET_KEY');

		if (is_null($signature)) {
			return new jsonResponse(['success' => false, 'message' => 'Missing header signature']);
		}

		try {
			$event = Webhook::constructEvent(
				$payload,
				$signature,
				$webhookSecretKey,
				700
			);
		} catch (SignatureVerificationException $e) {
			return new jsonResponse(
				[
					'success' => false,
					'message' => $e->getMessage(),
				]
			);
		}

        if($event->type === 'charge.succeeded')
        {
            $paymentIntent = $event->data->object;
            $payment = new Payment();
            $payment->user_id = $paymentIntent->metadata['user_id'];
            $payment->service_id = $paymentIntent->metadata['service_id'];
            $payment->service_provider_id = $paymentIntent->metadata['service_provider_id'];
            $payment->amount = $paymentIntent->amount;
            $payment->currency = $paymentIntent->currency;

            $payment->save();

            return response()->json([
                'success' => true,
                'message' => 'Payment was successful.'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Payment was failed!!.'
        ]);
	}


    public function render()
    {
        $services = Service::all();
        $providers = ServiceProvider::whereHas('service',function($query){
            $query->where('service_id',$this->service_id);
        })->get();
        return view('livewire.customer.customer-book-service-component',['services'=>$services,'providers'=>$providers])->layout('layouts.base');
    }

}
