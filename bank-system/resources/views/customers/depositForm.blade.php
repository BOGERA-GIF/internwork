@extends('layouts.customer_app')

@section('content')
<div class="flex justify-center">
    <div class="w-full max-w-md">
        <div class="p-6">
            <h2 class="text-2xl font-semibold mb-4">Deposit Funds</h2>
            <form method="POST" action="{{ route('customers.process_deposit') }}">
                @csrf
                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">Amount</label>
                    <input type="number" name="amount" class="form-input w-full">
                </div>
                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">Narrative</label>
                    <input type="text" name="narrative" class="form-input w-full">
                </div>
                <div class="mb-4">
                    <!-- Loading bar and timeout notification elements -->
                    <div id="loading-bar" class="loading-bar hidden"></div>
                    <div id="timeout-notification" class="timeout-notification hidden">Transaction Timed Out</div>
                    
                    <button type="submit" id="submit-button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    var loadingBar = document.getElementById("loading-bar");
    var timeoutNotification = document.getElementById("timeout-notification");
    var depositButton = document.getElementById("deposit-button");
    var depositForm = document.getElementById("deposit-form");

    depositButton.addEventListener("click", function() {
        loadingBar.style.display = "block";
        depositButton.disabled = true;

        simulateDepositProcess();
    });

    function simulateDepositProcess() {
        setTimeout(function() {
            loadingBar.style.display = "none";
            depositButton.disabled = false;

            var success = Math.random() < 0.8;

            if (success) {
                alert("Transaction successful!");
            } else {
                timeoutNotification.style.display = "block";
            }
        }, 3000);
    }
});


<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
// ... your existing JavaScript code ...

depositButton.addEventListener("click", function() {
    loadingBar.style.display = "block";
    depositButton.disabled = true;

    // Make the actual API call to Yo Payments
    makeYoPaymentsAPICall();
});
</script>

public function ac_transaction_check_status($transaction_reference, $private_transaction_reference=NULL)
    {
        $xml = '';
        
        $xml .= '<AutoCreate>';
        $xml .= '<Request>';
        $xml .= '<APIUsername>'.$this->username.'</APIUsername>';
        $xml .= '<APIPassword>'.$this->password.'</APIPassword>';
        $xml .= '<Method>actransactioncheckstatus</Method>';
        if($transaction_reference!=NULL){ $xml .= '<TransactionReference>'.$transaction_reference.'</TransactionReference>'; }
        if( $private_transaction_reference != NULL ) { $xml .= '<PrivateTransactionReference>'.$private_transaction_reference.'</PrivateTransactionReference>'; }
        $xml .= '<DepositTransactionType>'.$this->deposit_transaction_type.'</DepositTransactionType>';
        $xml .= '</Request>';
        $xml .= '</AutoCreate>';

        $xml_response = $this->get_xml_response($xml);

        $simpleXMLObject =  new SimpleXMLElement($xml_response);
        $response = $simpleXMLObject->Response;

        $result = array();
        $result['Status'] = (string) $response->Status;
        $result['StatusCode'] = (string) $response->StatusCode;
        $result['StatusMessage'] = (string) $response->StatusMessage;
        $result['TransactionStatus'] = (string) $response->TransactionStatus;
        if (!empty($response->ErrorMessageCode)) {
            $result['ErrorMessageCode'] = (string) $response->ErrorMessageCode;
        }
        if (!empty($response->ErrorMessage)) {
            $result['ErrorMessage'] = (string) $response->ErrorMessage;
        }
        if (!empty($response->TransactionReference)) {
            $result['TransactionReference'] = (string) $response->TransactionReference;
        }
        if (!empty($response->MNOTransactionReferenceId)) {
            $result['MNOTransactionReferenceId'] = (string) $response->MNOTransactionReferenceId;
        }
        if (!empty($response->Amount)) {
            $result['Amount'] = (string) $response->Amount;
        }
        if (!empty($response->AmountFormatted)) {
            $result['AmountFormatted'] = (string) $response->AmountFormatted;
        }
        if (!empty($response->CurrencyCode)) {
            $result['CurrencyCode'] = (string) $response->CurrencyCode;
        }
        if (!empty($response->TransactionInitiationDate)) {
            $result['TransactionInitiationDate'] = (string) $response->TransactionInitiationDate;
        }
        if (!empty($response->TransactionCompletionDate)) {
            $result['TransactionCompletionDate'] = (string) $response->TransactionCompletionDate;
        }
        if (!empty($response->IssuedReceiptNumber)) {
            $result['IssuedReceiptNumber'] = (string) $response->IssuedReceiptNumber;
        }

        return $result;
    }

    /**
    * Transfer funds from your Payment Account to another Yo! Payments Account
    * @param string $currency_code 
    * Options
    * * "UGX-MTNMM" -> Uganda Shillings - MTN Mobile Money
    * * "UGX-MTNAT" -> Uganda Shillings - MTN Airtime
    * * "UGX-WTLAT" -> Uganda Shillings - Warid Airtime
    * * "UGX-OULAT" -> Uganda Shillings - Orange Airtime
    * * "UGX-AIRAT" -> Uganda Shillings - Airtel Airtime
    * @param double $amount  The amount to be transferred
    * @param int $beneficiary_account Account number of Yo! Payments User
    * @param string $beneficiary_email Email Address of the recipient of funds
    * @param string $narrative Textual narrative about the transaction
    * @return array
    */
function makeYoPaymentsAPICall() {
    // Replace this with your actual API endpoint and payload
     $apiUrl = "https://api.yopayments.com/your/api/endpoint";

        $requestData = [
    'amount' => $depositAmount * 100, // Convert to cents (assuming the API expects amount in cents)
    'narrative' => $request->input('narrative'),
    'msisdn' => '256705126810', // Replace with the appropriate MSISDN (mobile number) for the customer
    'external_reference' => $transaction_reference, // The transaction reference you generated
    ];

    // $apiUrl = "https://api.yopayments.com/your/api/endpoint"; 



    axios.post(apiUrl, requestData)
        .then(function(response) {
            loadingBar.style.display = "none";
            depositButton.disabled = false;

            // Process the response from Yo Payments API
            var success = response.data.success; // Adjust this based on your API response structure

            if (success) {
                alert("Transaction successful!");
            } else {
                timeoutNotification.style.display = "block";
            }
        })
        .catch(function(error) {
            loadingBar.style.display = "none";
            depositButton.disabled = false;

            // Handle error and show appropriate notification
            console.error("API Error:", error);
            alert("Transaction failed. Please try again.");
        });
}
</script>







@endsection
