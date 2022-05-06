@extends('empty')

@section('title')
    Car Doctor|Mechanics
@stop

@section('css')
    @toastr_css

@stop

@section('content')


    <div class="card">
        @if (session()->has('add'))
            <div class="alert alert-primary alert-dismissible fade show container" role="alert" style="width: 700px; margin-top: 20px">
                <strong>{{ session()->get('add') }}</strong>
            </div>
        @endif

    <div class="card">
        @if (session()->has('update'))
            <div class="alert alert-primary alert-dismissible fade show container" role="alert" style="width: 700px; margin-top: 20px">
                <strong>{{ session()->get('update') }}</strong>
            </div>
        @endif

        @if (session()->has('delete'))
            <div class="alert alert-danger alert-dismissible fade show container " role="alert" style="width: 700px; margin-top: 20px">
                <strong>{{ session()->get('delete') }}</strong>
            </div>
        @endif


        <div class="card-body">

            <div class="table-responsive">
                <a href="{{route('dash.mechanic.create')}}" class="btn btn-outline-primary btn-lg mb-1">{{trans('site.Add')}}</a>
                <table id="example" class="table table-striped table-bordered" style="width:100%;" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{trans('site.licence')}}</th>
                        <th>{{trans('site.name')}}</th>
                        <th>{{trans('site.email')}}</th>
                        <th>{{trans('site.Location')}}</th>
                        <th>{{trans('site.national')}}</th>
                        <th>{{trans('site.phone')}}</th>
                        <th>{{trans('site.Actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(\App\Mechanic::count() >0)
                    <tr>
                        <?php
                            $i=0;
                        ?>
                       @foreach($mechanics as $mech)
                        <td>{{++$i}}</td>
                        <td><img src="{{asset('uploads/mechanic/'.$mech->licence)}}" class="img-thumbnail" style="width: 100px"></td>
                        <td>{{$mech->name}}</td>
                        <td>{{$mech->email}}</td>
                        <td>{{$mech->location}}</td>
                        <td>{{$mech->nation_id}}</td>
                        <td>{{$mech->phone}}</td>
                        <td>
                            <a class="btn btn-primary"  href="{{route('dash.mechanic.edit',$mech->id)}}" style="display: inline-block">{{trans('site.Edit')}}</a>
                            <form method="post" action="{{route('dash.mechanic.destroy',$mech->id)}}" style="display: inline-block">
                                {{@csrf_field()}}
                                {{@method_field('delete')}}
                                <button type="submit" class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-danger ">{{trans('site.delete')}}</button>
                            </form>
                        </td>
                    </tr>

                    @endforeach
                    @else
                        <h1>{{trans('site.Sorry There is no available date')}}</h1>
                    @endif
                </table>
            </div>
        </div>
    </div>



            @endsection

@section('script')


                @jquery
                @toastr_js
                @toastr_render
@endsection
