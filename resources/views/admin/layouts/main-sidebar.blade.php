<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{asset('assets/images/wrench-adjustable.svg')}}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Car Doctor</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">{{trans('site.Home')}}</div>
            </a>
            <ul>
                <li> <a href="{{route('dash.home')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('site.Home')}}</a>
                </li>
            </ul>
        </li>
        <li class="menu-label">{{trans('site.Services')}}</li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bxs-car-mechanic"></i>
                </div>
                <div class="menu-title">{{trans('site.Mechanics')}}</div>
            </a>
            <ul>
                <li> <a href="{{route('dash.mechanic.index')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('site.Mechanics')}}</a>
                </li>


            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bxs-car-garage'></i>
                </div>
                <div class="menu-title">{{trans('site.Garage')}}</div>
            </a>
            <ul>
                <li> <a href="{{route('dash.garage.index')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('site.Garage')}}</a>
                </li>

            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-car'></i>
                </div>
                <div class="menu-title">{{trans('site.Repair van')}}</div>
            </a>
            <ul>
                <li> <a href="{{route('dash.car.index')}}"><i class="bx bx-right-arrow-alt"></i>{{trans('site.Repair van')}}</a>
                </li>

            </ul>
        </li>

    </ul>
    <!--end navigation-->
</div>
