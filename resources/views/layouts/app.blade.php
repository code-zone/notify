@include('components/header')
    @include('components/sidebar')
        <div id="app" class="app-container expanded">
            @include('components/navbar')
                        <!-- Main Content -->
            <div class="container-fluid">
                <div class="side-body padding-top">
                    <div class="row">
                    	@yield('content')
                    </div>
                </div>
            </div>
        </div>
        @include('components.modal')
@include('components/footer')
@stack('js')
            
            <script type="text/javascript">
                $(".ajaxModal").on('click',function(e) {
                    var url;
                    url = $(this).attr('href');
                    md = $('#ajax-modal');
                    md.load(url ,function( response, status, xhr ) {
                        if ( status == "error" ) {
                            alert('error loading resource')
                        }
                    });
                    md.modal('show');
                    e.preventDefault();
                });
            </script>

    </body>
</html>
