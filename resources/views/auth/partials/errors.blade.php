@if($errors->any())
{{--    <div class="alert alert-danger">--}}


        @foreach($errors->all() as $error)
            <p class="small text-danger" style=""> {{  $error  }}</p>

        @endforeach
{{--    </div>--}}

@endif
