<head>
    @include('pdf._partials.css')
</head>
<body>
<div class="table mb-20">
    <div class="table-row">
        <div class="table-cell logo">
            <img src="{{ public_path() . '/img/logo.png' }}" class="img-responsive">
        </div>

        <div class="table-cell invoice-number">
            Faktúra
            {{ $invoice->number }}
        </div>
    </div>
</div>

<div class="table mb-30">
    <div class="table-row">
        <div class="table-cell owner">
            <div class="owner-title mb-10">Dodávateľ</div>

            <div class="owner-name">DeMi Studio, s. r. o.</div>
            <div class="owner-address mb-5">
                Lomnická 26<br>
                949 01 Nitra<br>
                Slovensko
            </div>

            <div class="owner-id">IČO: 51037483</div>
            <div class="owner-tax-id">DIČ: 2120569319</div>
            <div class="owner-tax-info">Nie je platiteľ DPH.</div>
        </div>

        <div class="table-cell client">
            <div class="owner-title mb-10">Odberateľ</div>

            <div class="owner-name">
                {{ $invoice->customer->name }}
            </div>
            <div class="owner-address mb-5">
                {{ $invoice->customer->address }}<br>
                {{ $invoice->customer->postal_code }} {{ $invoice->customer->city }}<br>
                {{ $invoice->customer->country }}
            </div>

            <div class="owner-id">
                IČO:
                {{ $invoice->customer->business_id }}
            </div>
        </div>
    </div>
</div>

<div class="table mb-20">
    <div class="table-row">
        <div class="table-cell dates">

            <div class="table">
                <div class="table-row">
                    <div class="table-cell width-50">
                        Dátum vystavenia:
                        <br>
                        Dátum dodania:
                        <br>
                        Splatnosť:
                    </div>

                    <div class="table-cell">
                        {{ $invoice->formatted_issued_at }}
                        <br>
                        {{ $invoice->formatted_delivered_at }}
                        <br>
                        <b>{{ $invoice->formatted_due_at }}</b>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-cell payment">

            <div class="table">
                <div class="table-row">
                    <div class="table-cell payment-info">
                        <div class="payment-sum">
                            Suma:
                            <div class="payment-sum-number">{{ $invoice->formatted_sum }} EUR</div>
                        </div>
                        <div class="payment-data">
                            Spôsob úhrady:
                            bankový prevod
                            <br>
                            Variabilný symbol:
                            <b>{{ $invoice->variable_symbol }}</b>
                            <br>
                            IBAN: <b>SK02 1100 0000 0029 4904 3065</b>
                        </div>
                    </div>

                    <div class="table-cell qr">
                        QR code
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="table items mb-20">
    <div class="table-row table-header">
        <div class="table-cell">
            Č.
        </div>
        <div class="table-cell">
            Názov položky
        </div>
        <div class="table-cell">
            Spolu
        </div>
    </div>

    <div class="table-row table-content">
        <div class="table-cell">
            1.
        </div>
        <div class="table-cell">
            <b>{{ $invoice->item }}</b>
        </div>
        <div class="table-cell">
            <b>{{ $invoice->formatted_sum }}</b>
        </div>
    </div>
</div>

<div class="table">
    <div class="table-row">
        <div class="table-cell width-50"></div>
        <div class="table-cell">
            <div class="table sum">
                <div class="table-row table-header">
                    <div class="table-cell">Spolu</div>
                    <div class="table-cell text-right">
                        {{ $invoice->formatted_sum }}
                        EUR
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="signature">
    Podpis
</div>
</body>
