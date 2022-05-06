@extends('empty')

@section('title')
    Car Doctor|Mechanics
@stop

@section('css')
{{--    <link href="toastr.css" rel="stylesheet"/>--}}

    @toastr_css
@stop

@section('content')



    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @include('error')

    <!--end breadcrumb-->
    <div class="row mt-5" >
        <div class="col-xl-7 mx-auto">
            <hr/>
            <div class="card border-top border-0 border-4 border-white">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22 text-white"></i>
                        </div>
                        <h5 class="mb-0 text-white">{{trans('site.Mechanics Registration')}}</h5>
                    </div>
                    <hr>
                    <form class="row g-3" method="post" action="{{route('dash.mechanic.store')}}" enctype="multipart/form-data">

                        {{@csrf_field()}}

                        <div class="col-md-6">
                            <label for="inputFirstName" class="form-label">{{trans('site.name')}}</label>
                            <input type="text" name="name" class="form-control" id="inputFirstName">
                        </div>

                        <div class="col-md-6">
                            <label for="inputFirstName" class="form-label">{{trans('site.Name IN Arabic')}}</label>
                            <input type="text" name="name_ar" class="form-control" id="inputFirstName">
                        </div>

                        <div class="col-md-6">
                            <label for="inputFirstName" class="form-label">{{trans('site.Location')}}</label>
                            <input type="text" name="location" class="form-control" id="inputFirstName">
                        </div>

                        <div class="col-md-6">
                            <label for="inputLastName" class="form-label">{{trans('site.email')}}</label>
                            <input type="email" name="email" class="form-control" id="inputLastName">
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail" class="form-label">{{trans('site.national')}}</label>
                            <input type="text" name="national" class="form-control" id="inputEmail">
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword" class="form-label">{{trans('site.phone')}}</label>
                            <input type="text" name="phone" class="form-control" id="inputPassword">
                        </div>
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">{{trans('site.licence')}}</label>
                            <input type="file" name="img" class="form-control">
                        </div>
                        <div class="col-12">
                            <label for="inputAddress2" class="form-label">{{trans('site.password')}}</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-light px-5">{{trans('site.Register')}}</button>
                        </div>
                    </form>
                </div>
            </div>
    </div>
    <!--end row-->

@endsection

@section('script')

            <script src="jquery.min.js"></script>
            <script src="toastr.js"></script>


@endsection
