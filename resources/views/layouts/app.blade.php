<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('includes.head')
    @yield('custom-css')
</head>
<body>
    <div id="app">
        @include('includes.header')
        @yield('content')
        @include('auth.login')
        @include('auth.register')
    </div>

    <!-- Scripts -->

    <script src="{{ asset('js/app.js') }}"></script>

    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/fullcalendar.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.2/pagination.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.2/pagination.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.1/js/standalone/selectize.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/js/standalone/selectize.min.js"></script>
    <script src="{{ asset('assets/js/global.js') }}"></script>
    <script>
        $('#currency-select').select2({
            minimumResultsForSearch: -1
        });
        $('#language-select').select2({
            minimumResultsForSearch: -1
        });
        $('[data-toggle="popover"]').popover({
            placement : 'bottom',

            trigger : 'click',
            html : true,
            content : function(){
                var content = '';
                content = $('#select-div').html();
                return content;
            }
        }).on('shown.bs.popover', function(){
        });

        $(document).delegate('.btn-go','click', function(e){
            e.preventDefault();
            alert('Go Click');
        });

        $(document).delegate('.btn-cancel-option', 'click', function(e){
            e.preventDefault();
            var element = $(this).parents('.popover');
            if(element.size()){
                $(element).removeClass('in').addClass('out');
            }
        });$('body').on('click', function (e) {
            $('[data-toggle=popover]').each(function () {
                // hide any open popovers when the anywhere else in the body is clicked
                if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
                    $(this).popover('hide');
                }
            });
        });

    </script>
    @yield('custom-scripts')
    @include('includes.footer')
</body>
</html>
