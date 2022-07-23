
 @extends('front.layouts.master')
@section('content')

 <div class="mdk-header-layout__content page-content ">
                <div class="bg-primary pb-lg-64pt py-32pt">
                    <div class="container page__container">
                       @if(isset($storyandgame[0]['url']))
                             {!! $storyandgame[0]['url'] !!}
                       @else
                            <h2>No Data</h2>
                       @endif
                       
                        <div class="d-flex flex-wrap align-items-end mb-16pt">
                            <h1 class="text-white flex m-0"></h1>
                            <p class="h1 text-white-50 font-weight-light m-0"></p>
                        </div>

                      
                        <div class="d-flex flex-column flex-sm-row align-items-center justify-content-start">

                        @if(isset($storyandgame[0]['url']))
                             {{ $storyandgame->links() }}
                            <a href="{{ url('/') }}" class="btn btn-white">Go Back</a>
                        @endif
                        </div>
                    </div>
                </div>
            </div>


@endsection

@section('script')
<script>
    $("iframe").css({'width':'100%','height':'500px'});
    $('.inline-flex').addClass('btn btn-white');
</script>
@endsection

