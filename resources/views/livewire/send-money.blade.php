<div class="col-lg-6 col-xl-5 my-auto">
    <!-- Special Offer end -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="bg-white rounded shadow-md p-4">
        <h3 class="text-5 mb-4 text-center">Today’s Exchange Rate</h3>
        <hr class="mb-4 mx-n4">

        <form wire:submit.prevent="fetchExchangeRate">
            <div class="mb-3">
                <label for="youSend" class="form-label">You Send - Enter Amount below</label>
                <div class="input-group">
                    {{--<span class="input-group-text">$</span>--}}
                    <input type="text" class="form-control" id="youSend" wire:model.lazy="youSend">
                    <span class="input-group-text p-0">
                <select id="youSendCurrency" wire:model.lazy="youSendCurrency"
                        class="form-control bg-transparent border-0" data-style="form-select bg-transparent border-0" data-container="body" data-live-search="true" required="">
                    <optgroup label="Popular Currency">
                         <option value="USD" class="currency-flag currency-flag-usd">USD</option>
                        <option value="EUR" class="currency-flag currency-flag-eur">EUR</option>
                        <option value="GBP" class="currency-flag currency-flag-gbp">GBP</option>
                        <option value="AUD" class="currency-flag currency-flag-aud">AUD</option>
                    </optgroup>
                    <option data-divider="true"></option>
                    <optgroup label="Other Currency">
                        <option value="AED" class="currency-flag currency-flag-aed">AED</option>
                        <option value="ARS" class="currency-flag currency-flag-ars">ARS</option>
                        <option value="BDT" class="currency-flag currency-flag-bdt">BDT</option>
                        <option value="BGN" class="currency-flag currency-flag-bgn">BGN</option>
                        <option value="BRL" class="currency-flag currency-flag-brl">BRL</option>
                        <option value="CAD" class="currency-flag currency-flag-cad">CAD</option>
                        <option value="CHF" class="currency-flag currency-flag-chf">CHF</option>
                        <option value="CLP" class="currency-flag currency-flag-clp">CLP</option>
                        <option value="CNY" class="currency-flag currency-flag-cny">CNY</option>
                        <option value="CZK" class="currency-flag currency-flag-czk">CZK</option>
                        <option value="DKK" class="currency-flag currency-flag-dkk">DKK</option>
                        <option value="EGP" class="currency-flag currency-flag-egp">EGP</option>
                        <option value="EUR" class="currency-flag currency-flag-eur">EUR</option>
                        <option value="GBP" class="currency-flag currency-flag-gbp">GBP</option>
                        <option value="GEL" class="currency-flag currency-flag-gel">GEL</option>
                        <option value="GHS" class="currency-flag currency-flag-ghs">GHS</option>
                        <option value="HKD" class="currency-flag currency-flag-hkd">HKD</option>
                        <option value="HRK" class="currency-flag currency-flag-hrk">HRK</option>
                        <option value="HUF" class="currency-flag currency-flag-huf">HUF</option>
                        <option value="IDR" class="currency-flag currency-flag-idr">IDR</option>
                        <option value="ILS" class="currency-flag currency-flag-ils">ILS</option>
                        <option value="JPY" class="currency-flag currency-flag-jpy">JPY</option>
                        <option value="KES" class="currency-flag currency-flag-kes">KES</option>
                        <option value="KRW" class="currency-flag currency-flag-krw">KRW</option>
                        <option value="LKR" class="currency-flag currency-flag-lkr">LKR</option>
                        <option value="MAD" class="currency-flag currency-flag-mad">MAD</option>
                        <option value="MXN" class="currency-flag currency-flag-mxn">MXN</option>
                        <option value="MYR" class="currency-flag currency-flag-myr">MYR</option>
                        <option value="NGN" class="currency-flag currency-flag-ngn">NGN</option>
                        <option value="NOK" class="currency-flag currency-flag-nok">NOK</option>
                        <option value="NPR" class="currency-flag currency-flag-npr">NPR</option>
                        <option value="NZD" class="currency-flag currency-flag-nzd">NZD</option>
                        <option value="PEN" class="currency-flag currency-flag-pen">PEN</option>
                        <option value="PHP" class="currency-flag currency-flag-php">PHP</option>
                        <option value="PKR" class="currency-flag currency-flag-pkr">PKR</option>
                        <option value="PLN" class="currency-flag currency-flag-pln">PLN</option>
                        <option value="RON" class="currency-flag currency-flag-ron">RON</option>
                        <option value="RUB" class="currency-flag currency-flag-rub">RUB</option>
                        <option value="SEK" class="currency-flag currency-flag-sek">SEK</option>
                        <option value="SGD" class="currency-flag currency-flag-sgd">SGD</option>
                        <option value="THB" class="currency-flag currency-flag-thb">THB</option>
                        <option value="TRY" class="currency-flag currency-flag-try">TRY</option>
                        <option value="UAH" class="currency-flag currency-flag-uah">UAH</option>
                        <option value="UGX" class="currency-flag currency-flag-ugx">UGX</option>
                        <option value="VND" class="currency-flag currency-flag-vnd">VND</option>
                        <option value="ZAR" class="currency-flag currency-flag-zar">ZAR</option>
                    </optgroup>
                </select>
            </span>
                </div>
            </div>
            <div class="mb-3">
                <label for="recipientGets" class="form-label">Recipient Gets</label>
                <div class="input-group">
                    {{--<span class="input-group-text">$</span>--}}
                    <input type="text" class="form-control" id="recipientGets" wire:model="recipientGets" readonly>
                    <span class="input-group-text p-0">
                <select id="recipientCurrency" wire:model.lazy="recipientCurrency"
                        class="form-control bg-transparent border-0" data-style="form-select bg-transparent border-0" data-container="body" data-live-search="true" required="">
                    <optgroup label="Popular Currency">
                        <option value="USD" class="currency-flag currency-flag-usd">USD</option>
                        <option value="EUR" class="currency-flag currency-flag-eur">EUR</option>
                        <option value="GBP" class="currency-flag currency-flag-gbp">GBP</option>
                        <option value="AUD" class="currency-flag currency-flag-aud">AUD</option>
                    </optgroup>
                    <option data-divider="true"></option>
                    <optgroup label="Other Currency">
                        <option value="AED" class="currency-flag currency-flag-aed">AED</option>
                        <option value="ARS" class="currency-flag currency-flag-ars">ARS</option>
                        <option value="BDT" class="currency-flag currency-flag-bdt">BDT</option>
                        <option value="BGN" class="currency-flag currency-flag-bgn">BGN</option>
                        <option value="BRL" class="currency-flag currency-flag-brl">BRL</option>
                        <option value="CAD" class="currency-flag currency-flag-cad">CAD</option>
                        <option value="CHF" class="currency-flag currency-flag-chf">CHF</option>
                        <option value="CLP" class="currency-flag currency-flag-clp">CLP</option>
                        <option value="CNY" class="currency-flag currency-flag-cny">CNY</option>
                        <option value="CZK" class="currency-flag currency-flag-czk">CZK</option>
                        <option value="DKK" class="currency-flag currency-flag-dkk">DKK</option>
                        <option value="EGP" class="currency-flag currency-flag-egp">EGP</option>
                        <option value="EUR" class="currency-flag currency-flag-eur">EUR</option>
                        <option value="GBP" class="currency-flag currency-flag-gbp">GBP</option>
                        <option value="GEL" class="currency-flag currency-flag-gel">GEL</option>
                        <option value="GHS" class="currency-flag currency-flag-ghs">GHS</option>
                        <option value="HKD" class="currency-flag currency-flag-hkd">HKD</option>
                        <option value="HRK" class="currency-flag currency-flag-hrk">HRK</option>
                        <option value="HUF" class="currency-flag currency-flag-huf">HUF</option>
                        <option value="IDR" class="currency-flag currency-flag-idr">IDR</option>
                        <option value="ILS" class="currency-flag currency-flag-ils">ILS</option>
                        <option value="JPY" class="currency-flag currency-flag-jpy">JPY</option>
                        <option value="KES" class="currency-flag currency-flag-kes">KES</option>
                        <option value="KRW" class="currency-flag currency-flag-krw">KRW</option>
                        <option value="LKR" class="currency-flag currency-flag-lkr">LKR</option>
                        <option value="MAD" class="currency-flag currency-flag-mad">MAD</option>
                        <option value="MXN" class="currency-flag currency-flag-mxn">MXN</option>
                        <option value="MYR" class="currency-flag currency-flag-myr">MYR</option>
                        <option value="NGN" class="currency-flag currency-flag-ngn">NGN</option>
                        <option value="NOK" class="currency-flag currency-flag-nok">NOK</option>
                        <option value="NPR" class="currency-flag currency-flag-npr">NPR</option>
                        <option value="NZD" class="currency-flag currency-flag-nzd">NZD</option>
                        <option value="PEN" class="currency-flag currency-flag-pen">PEN</option>
                        <option value="PHP" class="currency-flag currency-flag-php">PHP</option>
                        <option value="PKR" class="currency-flag currency-flag-pkr">PKR</option>
                        <option value="PLN" class="currency-flag currency-flag-pln">PLN</option>
                        <option value="RON" class="currency-flag currency-flag-ron">RON</option>
                        <option value="RUB" class="currency-flag currency-flag-rub">RUB</option>
                        <option value="SEK" class="currency-flag currency-flag-sek">SEK</option>
                        <option value="SGD" class="currency-flag currency-flag-sgd">SGD</option>
                        <option value="THB" class="currency-flag currency-flag-thb">THB</option>
                        <option value="TRY" class="currency-flag currency-flag-try">TRY</option>
                        <option value="UAH" class="currency-flag currency-flag-uah">UAH</option>
                        <option value="UGX" class="currency-flag currency-flag-ugx">UGX</option>
                        <option value="VND" class="currency-flag currency-flag-vnd">VND</option>
                        <option value="ZAR" class="currency-flag currency-flag-zar">ZAR</option>
                    </optgroup>
                </select>
            </span>
                </div>
            </div>
           {{-- <p class="text-muted mb-1">Fee Charge: <span class="fw-500">{{ $feeCharge }} {{ $youSendCurrency }}</span></p>
            <p class="text-muted mb-1">Total fees: <span class="fw-500">{{ $totalFees }} {{ $youSendCurrency }}</span></p>--}}
            <p class="text-muted">The current exchange rate is <span class="fw-500">1 {{ $youSendCurrency }} = {{ $exchangeRate }} {{ $recipientCurrency }}</span></p>
            {{--<div class="d-grid">
                <button class="btn btn-primary" type="submit">Continue</button>
            </div>--}}
        </form>

    </div>
</div>
