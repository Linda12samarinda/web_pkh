<ul class="sidebar-menu" data-widget="tree">
          <li class="header">MENU</li>
          <!-- Optionally, you can add icons to the links -->
          <li><a href="{{url('/')}}" target="_blank"><i class="fa fa-eye"></i> <span>@lang('Halaman Utama')</span></a></li>
          <li class="{{Request::is('home')?'active':''}}"><a href="{{url('home')}}"><i class="fa fa-dashboard"></i> <span>@lang('Maps')</span></a></li>
          <li class="{{Request::is('kategoris')?'active':''}}"><a href="{{url('kategoris')}}"><i class="fa fa-tags"></i> <span>@lang('Kategory')</span></a></li>
          <li class="{{Request::is('kategory')?'active':''}}"><a href="{{url('rts')}}"><i class="fa fa-tags"></i> <span>@lang('RT')</span></a></li>
          <li class="{{Request::is('kategory')?'active':''}}"><a href="{{url('kelurahans')}}"><i class="fa fa-tags"></i> <span>@lang('Kelurahan')</span></a></li>
          <li class="{{Request::is('kategory')?'active':''}}"><a href="{{url('kecamatans')}}"><i class="fa fa-tags"></i> <span>@lang('Kecamatan')</span></a></li>
          <li class="{{Request::is('bpnts')?'active':''}}"><a href="{{url('bpnts')}}"><i class="fa fa-map"></i> <span>@lang('BPNT')</span></a></li>
          <li class="treeview {{Request::is('setting')?'active':''}}">
            <a href="#"><i class="fa fa-gear"></i> <span>@lang('Setting')</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{Request::is('setting')?'active':''}}"><a href="{{url('setting')}}">Aplikasi</a></li>
              <li><a href="#">User (Demo)</a></li>
            </ul>
          </li>
          <li>
            <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <i class="fa fa-lock"></i> <span>Logout</span>
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
</ul>