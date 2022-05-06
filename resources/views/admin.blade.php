@extends('admin.layouts.master')

@section('title')
    Car Doctor
@stop

@section('css')

@stop

@section('content')

    <div class="page-content">
        <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
            <a href="{{route('dash.mechanic.index')}}">
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0">{{trans('site.Mechanics')}}</p>
                                <h4 class="my-1">{{\App\Mechanic::count()}}</h4>
                            </div>
                            <div class="widgets-icons ms-auto"><i class='bx bxs-car-mechanic'></i>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            </a>
            <a href="{{route('dash.garage.index')}}">
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0">{{trans('site.Garage')}}</p>
                                <h4 class="my-1">{{\App\Garage::count()}}</h4>
                            </div>
                            <div class="widgets-icons ms-auto"><i class='bx bxs-car-garage'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
            <a href="{{route('dash.car.index')}}">
            <div class="col-lg-12">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0">{{trans('site.Repair van')}}</p>
                                <h4 class="my-1">{{\App\Car::count()}}</h4>
                            </div>
                            <div class="widgets-icons ms-auto"><i class='bx bxs-car'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>
        <!--end row-->
        <div class="row row-cols-1 row-cols-xl-2">
            <div class="col d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div style="margin-top: 10px">
                                <h5 class="mb-1">CAR DOCTOR SERVICES</h5>
                            </div>
                            <div class="font-22 ms-auto">
                            </div>

                        </div>
                        <div style="width:100%;height: 100%;margin-top: 60px;">
                            {!! $chartjs->render() !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div style="margin-top: 10px">
                                <h5 class="mb-1">CAR DOCTOR SERVICES</h5>
                            </div>
                            <div class="font-22 ms-auto">
                            </div>

                        </div>
                        <div style="width:100%;height: 100%;margin-top: 60px;">
                            {!! $chartjs1->render() !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--end row-->

    </div>

@endsection

@section('script')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.js"></script>


@endsection
