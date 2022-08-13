
 @extends('front.layouts.master')
@section('content')

 <div class="mdk-header-layout__content page-content ">
                <div class="bg-grey pb-lg-64pt py-32pt">
                    <div class="container page__container">
                       @if(isset($storyandgame[0]['url']))
                             {!! $storyandgame[0]['url'] !!}
                       @else
                            <h2>No Data</h2>
                       @endif

                        <div class="d-flex flex-wrap align-items-end mb-16pt">
                            <h3 class="text-black flex m-0">{{$storyandgame[0]['title'] ?? ''}}</h3>
                            <p class="h3 text-black-50 font-weight-light m-0" id='addvideocount'>
                            {{-- $videocount  --}}
                            </p>
                        </div>


                        <div class="d-flex flex-column flex-sm-row align-items-center justify-content-start">

                        @if(isset($storyandgame[0]['url']))
                             {{ $storyandgame->links() }}
                            <a href="{{ url('/') }}" class="btn btn-primary">Go Back</a>
                        @endif
                        </div>
                    </div>
                </div>
            </div>


@endsection

@section('script')
<script>
    $("iframe").css({'width':'1200px','height':'615px'});
    $('.inline-flex').addClass('btn btn-white');


    var saveData = $.ajax({
        type: 'POST',
        url: "{{url('video/count')}}",
        data:  {
            school_id : {{auth()->user()->id}},
            course_id : {{\Session::get('course_id')}},
            video_id : {{ isset($storyandgame[0]['id']) ? $storyandgame[0]['id'] : ''}}
        },
        success: function(resultData) {
           // alert("Save Complete")
        }
    });

   var saveData2 = $.ajax({
        type: 'POST',
        url: "{{url('video-count-get')}}",
        data:  {
            school_id : {{auth()->user()->id}},
            course_id : {{\Session::get('course_id')}},
            video_id : {{ isset($storyandgame[0]['id']) ? $storyandgame[0]['id'] : ''}}
        },
        success: function(resultData) {
            $("#addvideocount").html(resultData);
        }
    });



</script>
@endsection

