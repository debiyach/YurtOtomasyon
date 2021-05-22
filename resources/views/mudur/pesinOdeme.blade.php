@extends('layouts.mudur')

@section('content')
    @include('layouts.components.errors')
    @include('layouts.components.pesinOdeme')
@endsection

@section('script')

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.payment/1.0.1/jquery.payment.min.js">
    </script>

    <script type="text/javascript">
        $(function() {

            $('input[name="tarih"]').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear'
                }
            });

            $('input[name="tarih"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format(
                    'MM/DD/YYYY'));
            });

            $('input[name="tarih"]').on('can cel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });

        });

        $(function() {
            // Set form height on document ready


            // Set up formatting for Credit Card fields
            $('#credit .cc-number').formatCardNumber();
            $('#credit .cc-expires').formatCardExpiry();
            $('#credit .cc-cvc').formatCardCVC();
        });

    </script>

@endsection
