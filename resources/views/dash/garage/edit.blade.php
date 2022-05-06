@extends('empty')

@section('title')
    Car Doctor|Garage
@stop

@section('css')

@stop

@section('content')



    @if (session()->has('update'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('update') }}</strong>
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
                        <h5 class="mb-0 text-white">{{trans('site.Garage Registration')}}</h5>
                    </div>
                    <hr>
                    <form class="row g-3" method="post" action="{{route('dash.garage.update',$garage->id)}}" enctype="multipart/form-data">

                        {{@csrf_field()}}
                        {{@method_field('PATCH')}}

                        <div class="col-md-6">
                            <label for="inputFirstName" class="form-label">{{trans('site.name')}}</label>
                            <input type="text" value="{{$garage->name}}" name="name" class="form-control" id="inputFirstName">
                        </div>

                        <div class="col-md-6">
                            <label for="inputFirstName" class="form-label">{{trans('site.Location')}}</label>
                            <input type="text" name="location" value="{{$garage->location}}" class="form-control" id="inputFirstName">
                        </div>

                        <div class="col-md-6">
                            <label for="inputPassword" class="form-label">{{trans('site.phone')}}</label>
                            <input type="text" value="{{$garage->phone}}" name="phone" class="form-control" id="inputPassword">
                        </div>
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">{{trans('site.licence')}}</label>
                            <input type="file"  name="img" class="form-control">
                        </div>

                        <img src="{{asset('uploads/garage/'.$garage->img)}}" class="img-thumbnail" style="width: 200px;height: 100px">

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


@endsection
