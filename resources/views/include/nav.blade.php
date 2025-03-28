   <!-- BEGIN: SideNav-->
   <style>
    .activenav{
      background-color: #7b1fa2 !important;
      color: white !important;
    }
    .activenav a, .activenav i{
      color: white !important;
    }
    li.bold.activenav.active.open .collapsible-body {
        display: block;
    }
   </style>
   <aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light sidenav-active-square">
      <div class="brand-sidebar">
        <h1 class="logo-wrapper"><a class="brand-logo darken-1" href="index.html"><img src="{{ URL::asset('asset/images/logo/logo.png') }}" alt="logo"/><span class="logo-text hide-on-med-and-down"></span></a><a class="navbar-toggler" href="#"><i class="material-icons">radio_button_checked</i></a></h1>
      </div>
      <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">
        <li class="active"><a class="collapsible-body active" href="{{URL::to('/dashboard')}}" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span>Dashboard</span></a></li>
		    
        <li class="navigation-header"><a class="navigation-header-text">Applications</a><i class="navigation-header-icon material-icons">more_horiz</i></li>
	 			
				<li class="bold @if(Request::segment(1) == 'company-master') {{ 'active activenav' }} @endif"><a class="waves-effect waves-cyan " href="{{URL::to('/company-master/edit')}}"><i class="material-icons">store</i><span class="menu-title" data-i18n="">Update Your Info</span></a></li>

        <li class="bold @if(Request::segment(1) == 'property') {{ 'active activenav' }} @endif"><a class="collapsible-header waves-effect waves-cyan " href="#"><i class="material-icons">folder_open</i><span class="menu-title" data-i18n="">Property</span></a>
          <div class="collapsible-body">
            <ul class="collapsible" data-collapsible="accordion">
              <li><a class="collapsible-body" href="{{URL::to('/property')}}" data-i18n=""><i class="material-icons">folder_open</i><span>View Property</span></a></li>
              <li><a class="collapsible-body" href="{{URL::to('/property/create')}}" data-i18n=""><i class="material-icons">folder_open</i><span>Add Property</span></a> </li>
            </ul>
          </div>
        </li>				
      </ul>
    </aside>
    <!-- END: SideNav-->