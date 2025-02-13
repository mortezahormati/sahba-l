<div class="row">



    <div class="col-md-12 mt-3">
        @include('errors.errors')
        <form id="createForm" action="{{ route('colors.update' , $color->id) }}" method="post"
              name="createColors" class="padding-30">
            @csrf
            <div class="form-group">
                <input type="text"
                       placeholder="{{ __('admin.colors.title') }}"
                       name="name" value="{{ $color->name }}" class="text form-control">
            </div>
            <div class="form-group">
                <input value="{{ $color->color }}" data-jscolor="{preset:'large', position:'right'}"
                       name="color"  class="text form-control">
            </div>

            <div class="form-group mt-5">
                <div class="row wrapper-sahba">
                    <div class="switch_box  col-md-12 ">
                        <div class="col-md-6">
                            <p for="sahba-checkbox"
                               class="font-size-5 ">@lang('admin.colors.status')
                            </p>
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3">
                            <input type="checkbox" name="status" {{ $color->status == 1 ?  'checked' : '0'  }}
                                   class="switch_1">
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group mt-5 text-center">
                <button type="submit"
                        class="btn  btn-outline-dark ">@lang('admin.colors.add-color')</button>
            </div>
        </form>
    </div>

</div>
