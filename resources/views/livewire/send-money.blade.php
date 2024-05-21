<div class="col-lg-6 col-xl-5 my-auto">
    <div class="bg-white rounded shadow-md p-4">
        <h3 class="text-5 mb-4 text-center">Send Money</h3>
        <hr class="mb-4 mx-n4">
        <form wire:submit.prevent="fetchExchangeRate">
            <div class="mb-3">
                <label for="youSend" class="form-label">You Send {{ $youSendCurrency }} {{ $youSend }}</label>
                <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="text" class="form-control" id="youSend" wire:model.lazy="youSend">
                    <span class="input-group-text p-0">
                        <select id="youSendCurrency" wire:model.lazy="youSendCurrency"
                                class="form-select bg-transparent border-0">
                            <optgroup label="Popular Currency">
                                <option value="USD" selected="selected">USD</option>
                                <option value="GBP">GBP</option>
                                <option value="AUD">AUD</option>
                                <option value="INR">INR</option>
                            </optgroup>
                            <optgroup label="Other Currency">
                                <option value="AED">AED</option>
                                <option value="ARS">ARS</option>
                                <option value="BDT">BDT</option>
                                <!-- Add other currencies here -->
                            </optgroup>
                        </select>
                    </span>
                </div>
            </div>
            <div class="mb-3">
                <label for="recipientGets" class="form-label">Recipient Gets</label>
                <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="text" class="form-control" id="recipientGets" wire:model="recipientGets" readonly>
                    <span class="input-group-text p-0">
                        <select id="recipientCurrency" wire:model.lazy="recipientCurrency"
                                class="form-select bg-transparent border-0">
                            <optgroup label="Popular Currency">
                                <option value="USD">USD</option>
                                  <option value="GBP">GBP</option>
                                <option value="AUD">AUD</option>
                                <option value="INR">INR</option>
                            </optgroup>
                            <optgroup label="Other Currency">
                                <option value="AED">AED</option>
                                <option value="ARS">ARS</option>
                                <option value="BDT">BDT</option>
                                <option value="ZWL">ZIG</option>
                                <!-- Add other currencies here -->
                            </optgroup>
                        </select>
                    </span>
                </div>
            </div>
            <p class="text-muted mb-1">Fee Charge: <span class="fw-500">{{ $feeCharge }} {{ $youSendCurrency }}</span></p>
            <p class="text-muted mb-1">Total fees: <span class="fw-500">{{ $totalFees }} {{ $youSendCurrency }}</span></p>
            <p class="text-muted">The current exchange rate is <span
                    class="fw-500">1 {{ $youSendCurrency }} = {{ $exchangeRate }} {{ $recipientCurrency }}</span></p>
            <div class="d-grid">
                <button class="btn btn-primary" type="submit">Continue</button>
            </div>
        </form>
    </div>
</div>
