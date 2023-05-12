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
    .text-right{
        text-align: right;
    }
    .img-responsive{
        display: block;
        width: 100%;
        height: auto;
    }

    .logo{
        width: 30%;
    }
    .invoice-number{
        text-align: right;
        text-transform: uppercase;
        font-weight: 700;
        font-size: 1.5em;
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

    .items > .table-header > .table-cell{
        padding: 4px 10px;
        background: #0095da !important;
        color: white;
        text-transform: uppercase;
        font-weight: 700;
        border-left: 0.1px solid white;
        border-right: 0.1px solid white;
    }
    .items > .table-content > .table-cell{
        padding: 4px 10px;
    }
    .items > .table-row > .table-cell:first-child{
        width: 20px;
    }

    .sum > .table-header > .table-cell{
        padding: 4px 10px;
        background: #0095da !important;
        color: white;
        font-weight: 700;
        font-size: 1.3em;
        border-left: 0.1px solid white;
        border-right: 0.1px solid white;
    }

    .signature{
        margin-top: 160px;
        margin-right: 100px;
        margin-left: auto;
        width: 160px;
        border-top: 1px solid black;
        padding: 5px 0;
        text-align: center;
        font-size: 12px;
    }
</style>
