<div class="sidebar-wrapper">
	<div>
		<div class="logo-wrapper">
			<a href=""><img class="img-fluid for-light" src="{{asset('assets/images/logo/logo.png')}}" alt=""><img class="img-fluid for-dark" src="{{asset('assets/images/logo/logo_dark.png')}}" alt=""></a>
			<div class="back-btn"><i class="fa fa-angle-left"></i></div>
			<div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
		</div>
		<div class="logo-icon-wrapper"><a href=""><img class="img-fluid" src="{{asset('assets/images/logo/logo-icon.png')}}" alt=""></a></div>
		<nav class="sidebar-main">
			<div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
			<div id="sidebar-menu">
			  <ul class="sidebar-links" id="simple-bar">
				<li class="back-btn"><a href="index.html"><img class="img-fluid" src="../assets/images/logo/logo-icon.png" alt=""></a>
				  <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
				</li>
				
				<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="bookmark.html"><i class="fa fa-home fa-lg icon"> </i> &nbsp;&nbsp;<span class="link-content">Dashboard</span></a></li>
				<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName() == 'rmd.index' ? 'nav-selected' : ''}}" href="{{route('rmd.index')}}"><i class="fa fa-wheelchair fa-lg icon"> </i> &nbsp;&nbsp;<span class="link-content">Data Pasien</span></a></li>
				<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName() == 'dokter.index' ? 'nav-selected' : ''}}" href="{{route('dokter.index')}}"><i class="fa fa-stethoscope fa-lg icon"> </i> &nbsp;&nbsp;<span class="link-content">Data Dokter</span></a></li>
				<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName() == 'poli.index' ? 'nav-selected' : ''}}" href="{{route('poli.index')}}"><i class="fa fa-user-md fa-lg icon"> </i> &nbsp;&nbsp;<span class="link-content">Data Poli</span></a></li>
				<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="social-app.html"><i class="fa fa-archive fa-lg icon"> </i> &nbsp;&nbsp;<span class="link-content">Data Peminjaman</span></a></li>
				<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="to-do.html"><i class="fa fa-exchange fa-lg icon"> </i> &nbsp;&nbsp;<span class="link-content">Data Pengembalian</span></a></li>
				<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName() == 'petugas.index' ? 'nav-selected' : ''}}" href="{{route('petugas.index')}}"><i class="fa fa-users fa-lg icon"> </i> &nbsp;&nbsp;<span class="link-content">Data Petugas</span></a></li>
				
				<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="knowledgebase.html"><i data-feather="sunrise"> </i><span>Knowledgebase</span></a></li>
				<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="support-ticket.html"><i data-feather="users"> </i><span>Support Ticket</span></a></li>
			  </ul>
			</div>
			<div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
		  </nav>
	</div>
</div>