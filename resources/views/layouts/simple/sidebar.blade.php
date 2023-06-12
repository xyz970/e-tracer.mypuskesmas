<div class="sidebar-wrapper">
	<div>
		<div class="logo-wrapper">
			<a href=""><h1>E-Tracer</h1></a>
			<div class="back-btn"><i class="fa fa-angle-left"></i></div>
			
		</div>
		{{-- <div class="logo-icon-wrapper"><a href=""><img class="img-fluid" src="{{asset('images/logo/logo-icon.png')}}" alt=""></a></div> --}}
		<div class="logo-icon-wrapper"><a href=""><h1>E-Tracer</h1></a></div>
		<nav class="sidebar-main">
			
			<div id="sidebar-menu">
			  <ul class="sidebar-links" id="simple-bar">
				<li class="back-btn"><a href="index.html"><h1>E-Tracer</h1></a>
				  <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
				</li>
				
				<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName() == 'dashboard' ? 'nav-selected' : ''}}" href="{{route('dashboard')}}"><i class="fa fa-home fa-lg icon"> </i> &nbsp;&nbsp;<span class="link-content">Dashboard</span></a></li>
				<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName() == 'rmd.index' ? 'nav-selected' : ''}}" href="{{route('rmd.index')}}"><i class="fa fa-wheelchair fa-lg icon"> </i> &nbsp;&nbsp;<span class="link-content">Data Pasien</span></a></li>
				<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName() == 'dokter.index' ? 'nav-selected' : ''}}" href="{{route('dokter.index')}}"><i class="fa fa-stethoscope fa-lg icon"> </i> &nbsp;&nbsp;<span class="link-content">Data Dokter</span></a></li>
				<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName() == 'poli.index' ? 'nav-selected' : ''}}" href="{{route('poli.index')}}"><i class="fa fa-user-md fa-lg icon"> </i> &nbsp;&nbsp;<span class="link-content">Data Poli</span></a></li>
				<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName() == 'peminjaman.index' ? 'nav-selected' : ''}}" href="{{route('peminjaman.index')}}"><i class="fa fa-archive fa-lg icon"> </i> &nbsp;&nbsp;<span class="link-content">Data Peminjaman</span></a></li>
				<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName() == 'pengembalian.index' ? 'nav-selected' : ''}}" href="{{route('pengembalian.index')}}"><i class="fa fa-exchange fa-lg icon"> </i> &nbsp;&nbsp;<span class="link-content">Data Pengembalian</span></a></li>
				<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName() == 'petugas.index' ? 'nav-selected' : ''}}" href="{{route('petugas.index')}}"><i class="fa fa-users fa-lg icon"> </i> &nbsp;&nbsp;<span class="link-content">Data Petugas</span></a></li>
				</ul>
			</div>
			<div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
		  </nav>
	</div>
</div>