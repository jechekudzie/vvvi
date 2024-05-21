<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
class ExchangeRates extends Component
{
    public $baseCurrency = 'USD';
    public $targetCurrency = 'EUR';
    public $exchangeRate;

    public function mount()
    {
        $this->fetchExchangeRate();
    }

    public function fetchExchangeRate()
    {
        $apiKey = env('EXCHANGE_RATES_API_KEY');
        $url = "http://api.exchangeratesapi.io/v1/latest?access_key={$apiKey}&base={$this->baseCurrency}&symbols={$this->targetCurrency}";

        $response = Http::get($url);
        $data = $response->json();

        if (isset($data['rates'][$this->targetCurrency])) {
            $this->exchangeRate = $data['rates'][$this->targetCurrency];
        } else {
            $this->exchangeRate = 'Error fetching rate';
        }
    }

    public function render()
    {
        return view('livewire.exchange-rates');
    }
}
