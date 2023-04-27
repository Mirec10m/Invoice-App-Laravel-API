<style type="text/css">
    @font-face {
        font-family: 'DejaVu Sans';
        src: {{ asset('pdf-font/DejaVuSans.tff') }};
        font-weight: normal;
    }
    @font-face {
        font-family: 'DejaVu Sans';
        src: {{ asset('pdf-font/DejaVuSans-Bold.tff') }};
        font-weight: bold;
    }
    @page{
        width: 100%;

        padding: 40px;
    }
    body{
        box-sizing: border-box;
        -ms-overflow-style: scrollbar;
    }

    *,
    *::before,
    *::after {
        font-family: 'DejaVu Sans';
        font-size: 0.95em;
        box-sizing: border-box;
    }

    .table {
        display: table;
        width: 100%;
        border-collapse: collapse;
    }
    .table-row {
        display: table-row;
    }
    .table-cell {
        display: table-cell;
    }

    .mb-5{
        margin-bottom: 5px;
    }
    .mb-10{
        margin-bottom: 10px;
    }
    .mb-20{
        margin-bottom: 20px;
    }
    .mb-30{
        margin-bottom: 30px;
    }
    .mb-40{
        margin-bottom: 40px;
    }
    .width-50{
        width: 50%;
    }

    .logo{
        width: 30%;
    }
    .invoice-number{
        text-align: right;
        text-transform: uppercase;
    }

    .owner{
        width: 50%;
    }
    .owner-title{
        color: #0095da;
        text-transform: uppercase;
    }

    .dates{
        width: 40%;
        line-height: 1.2em;
    }
    .payment{
        background: dodgerblue;
        color: white;
    }
    .payment-info{
        width: 70%;
        border-right: 1px solid white;
    }
    .payment-sum{
        padding: 10px;
        border-bottom: 1px solid white;
    }
    .payment-sum-number{
        font-size: 1.2em;
        font-weight: 700;
    }
    .payment-data{
        padding: 10px;
    }
    .qr{
        padding: 10px;
    }
</style>
