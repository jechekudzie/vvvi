<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class SendMoney extends Component
{
    public $youSend = 1;
    public $youSendCurrency = 'GBP';
    public $recipientGets;
    public $recipientCurrency = 'USD';
    public $exchangeRate;
    public $totalFees;
    public $feeCharge;
    public $chargePercentage;

    public function mount()
    {
        $this->fetchExchangeRate();
    }

    public function updated($propertyName)
    {
        if (in_array($propertyName, ['youSend', 'youSendCurrency', 'recipientCurrency'])) {
            $this->fetchExchangeRate();
        }
    }

    public function fetchExchangeRate()
    {
        $apiKey = env('EXCHANGE_RATES_API_KEY');
        $url = "http://api.exchangeratesapi.io/v1/latest?access_key={$apiKey}&base={$this->youSendCurrency}&symbols={$this->recipientCurrency}";

        // Initialize chargePercentage (e.g., 5% fee)
        $this->chargePercentage = 0.05;

        try {
            $response = Http::get($url);
            // Uncomment for debugging if needed
            $data = $response->json();

            if (isset($data['rates'][$this->recipientCurrency])) {
                $this->exchangeRate = $data['rates'][$this->recipientCurrency];
                $this->recipientGets = $this->youSend * $this->exchangeRate;

                // Calculate feeCharge
                $this->feeCharge = $this->youSend * $this->chargePercentage;

                // Calculate totalFees
                $this->totalFees = $this->youSend + $this->feeCharge;
            } else {
                $this->exchangeRate = 'Error fetching rate';
                $this->recipientGets = null;
            }
        } catch (\Exception $e) {
            $this->exchangeRate = 'Error fetching rate';
            $this->recipientGets = null;
        }
    }

    public function render()
    {
        return view('livewire.send-money');
    }
}
