   <!-- BEGIN: SideNav-->
    <aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light sidenav-active-square">
      <div class="brand-sidebar">
        <h1 class="logo-wrapper"><a class="brand-logo darken-1" href="index.html"><img src="{{ URL::asset('asset/images/logo/logo.png') }}" alt="logo"/><span class="logo-text hide-on-med-and-down"></span></a><a class="navbar-toggler" href="#"><i class="material-icons">radio_button_checked</i></a></h1>
      </div>
      <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">
        <li class="active"><a class="collapsible-body active" href="{{URL::to('/company_admin/dashboard')}}" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span>Dashboard</span></a>
        </li>
		
		<li class="navigation-header"><a class="navigation-header-text">Applications</a><i class="navigation-header-icon material-icons">more_horiz</i>
        </li>
	 			
				<li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="{{URL::to('/company_admin/company-master/edit')}}"><i class="material-icons">store</i><span class="menu-title" data-i18n="">Update Your Info</span></a>
        <!-- <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="{{URL::to('/company-privilege')}}"><i class="material-icons">person_outline</i><span class="menu-title" data-i18n="">User Master</span></a>
        <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="{{URL::to('/company-privilege')}}"><i class="material-icons">person_add</i><span class="menu-title" data-i18n="">User Privilege</span></a> -->
        <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="{{URL::to('/company_admin/property')}}"><i class="material-icons">folder_open</i><span class="menu-title" data-i18n="">Property</span></a>
                    <!-- <div class="collapsible-body">
                        <ul class="collapsible" data-collapsible="accordion">
                            <li><a class="collapsible-body" href="{{URL::to('/admin/hotel')}}" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span>Hotel Vendor</span></a>
                            </li>
                            <li><a class="collapsible-body" href="{{URL::to('/admin/hotel')}}" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span>Activity Vendor</span></a> 
                            </li>
							
							<li><a class="collapsible-body" href="{{URL::to('/admin/hotel')}}" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span>Transport Vendor</span></a> 
                            </li>
                        </ul>
                    </div> -->
                </li>
				
        </li>
      </ul>
    </aside>
    <!-- END: SideNav-->