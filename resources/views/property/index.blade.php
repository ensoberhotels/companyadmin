@extends('template.base')

@section('title', 'Ensober Admin Dashboard ')

@section('styles')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<style type="text/css">
    .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate {
    color: #333;
    display: none;
}
table.dataTable thead .sorting {
    /* background-image: url(../images/sort_both.png); */
    font-size: 12px;
} 
/*.table>caption+thead>tr:first-child>td, .table>caption+thead>tr:first-child>th, .table>colgroup+thead>tr:first-child>td, .table>colgroup+thead>tr:first-child>th, .table>thead:first-child>tr:first-child>td, .table>thead:first-child>tr:first-child>th {
    border-top: 0;
    /* font-weight: normal; */
    /*font-size: 12px;*/
    /* display: inline-table; */
    width: 20%;
    /* padding-left: 26px; */
} */
   </style>
@endsection

@section('content')
	<!-- BEGIN: Page Main-->
	<div id="main">
      <div class="row">
        <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
          <!-- Search for small screen-->
          <div class="container">
            <div class="row">
              <div class="col s10 m6 l6">
                <h5 class="breadcrumbs-title mt-0 mb-0">Dashboard</h5>
                <ol class="breadcrumbs mb-0">
                 <li class="breadcrumb-item"><a href="#">Activity</a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">All Activity Sub Cats</a>
                  </li>
                </ol>
              </div>
              <div class="col s2 m6 l6"><a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn right" href="#!" data-target="dropdown1"><i class="material-icons hide-on-med-and-up">settings</i><span class="hide-on-small-onl">Settings</span><i class="material-icons right">arrow_drop_down</i></a>
                <ul class="dropdown-content" id="dropdown1" tabindex="0">
                  <li tabindex="0"><a class="grey-text text-darken-2" href="user-profile-page.html">Profile<span class="new badge red">2</span></a></li>
                  <li tabindex="0"><a class="grey-text text-darken-2" href="app-contacts.html">Contacts</a></li>
                  <li tabindex="0"><a class="grey-text text-darken-2" href="page-faq.html">FAQ</a></li>
                  <li class="divider" tabindex="-1"></li>
                  <li tabindex="0"><a class="grey-text text-darken-2" href="user-login.html">Logout</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col s12">
          <div class="container">
            <div class="section section-data-tables">
  <div class="card">
    <div class="card-content">
      <p class="caption mb-0">Tables are a nice way to organize a lot of data. We provide a few utility classes to help
        you style your table as easily as possible. In addition, to improve mobile experience, all tables on
        mobile-screen widths are centered automatically.</p>
    </div>
  </div>

  <!-- Multi Select -->

  <div class="row">
    <div class="col s12">
      <div class="card">
        <div class="card-content">
			<div class="row">
				<div class="col s6">
					<h4 class="card-title">Property Detail</h4>
				</div>
				<!-- <div class="col s2 m6 l6" style="text-align: right;">
					<!-- <a class="mb-6 btn waves-effect waves-light gradient-45deg-purple-deep-orange gradient-shadow">Delete</a> 
					<a href="{{URL::to('/company_admin/property/create')}}" class="btn waves-effect waves-light" style="margin-right: 10px;height: 26px;padding: 6px 6px 6px 6px;background-color: #1cd106;font-size: 12px;line-height: 1;">ADD</a>
				</div> -->
			</div>
          <div class="row">
            <div class="col s12">
              <div class="card-content">
                <div class="divider"></div><br>
                <div class="row" id="hotel_listing">
                  @if(count($property) > 0)
                  @foreach($property as $propertys)
                    <div class="col s12 m3">
                      <div class="hotel_item">
                        <div class="smole_size">
                          <img src="{{ asset('public/asset/property_logo/') }}/{{$propertys->property_image}}" style="height: 200px;" class="img-responsive" />
                        </div>
                        <lable style="font-size: 13px;float: left;width: 100%;background: linear-gradient(45deg, #828919, #68dfeb) !important;color: #fff;padding: 1px 9px;">{{ $propertys->property_name }}</lable>
                        <!-- <div class="button_area_1" id="hover_log_{{$propertys->id}}">
                          
                        </div> -->
                        <div class="button_area">
                          <!-- <button class="mb-6 btn-floating waves-effect waves-light gradient-45deg-purple-deep-orange car_delete gradient-shadow" title="Delete" onclick="return confirm('Are you sure?')">
                            <i class="material-icons">delete_sweep</i>
                          </button> /company_admin/log_admin-->
                          <a href="{{URL::to('/log_admin')}}" target="_blank" class="mb-6 btn-floating waves-effect waves-light gradient-45deg-purple-deep-orange car_delete gradient-shadow"><i class="material-icons">login</i></a>
                          <a href="{{URL::to('/property/')}}/{{$propertys->id}}"><button class="mb-6 btn-floating waves-effect waves-light gradient-45deg-green-teal gradient-shadow"><i class="material-icons">brush</i></button></a>
                        </div>
                      </div>
                    </div>
                  @endforeach
                  @else
                    <div class="col s12 m3">
                      <p>No Property Found!</p>
                    </div>
                  @endif
              </div>
            </div>
          </div>
    </div>
  </div>
</div>

<!-- START RIGHT SIDEBAR NAV -->
<!--  -->
<!-- END RIGHT SIDEBAR NAV -->
            <!-- <div style="bottom: 50px; right: 19px;" class="fixed-action-btn direction-top"><a class="btn-floating btn-large gradient-45deg-light-blue-cyan gradient-shadow"><i class="material-icons">add</i></a> -->
    <!--<ul>
        <li><a href="css-helpers.html" class="btn-floating blue"><i class="material-icons">help_outline</i></a></li>
        <li><a href="cards-extended.html" class="btn-floating green"><i class="material-icons">widgets</i></a></li>
        <li><a href="app-calendar.html" class="btn-floating amber"><i class="material-icons">today</i></a></li>
        <li><a href="app-email.html" class="btn-floating red"><i class="material-icons">mail_outline</i></a></li>
    </ul>-->
</div>
          </div>
        </div>
      </div>
    </div>
    <!-- END: Page Main-->
@endsection

@section('scripts')
<style type="text/css">
  .hotel_item .button_area{
    display: none;
  }
  .hotel_item:hover .button_area{display:block}
 /* .hotel_item div.button_area:focus {
    display: block;

}*/
   .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding-left: 3px;
    line-height: 1;
    font-size: 14px;
    font-weight: normal;
}
.bg-success {
    --bs-bg-opacity: 1;
    background-color: #1976d2 !important;
    font-size: 13px;
    border: 0px;
}
.bg-operator {
    --bs-bg-opacity: 1;
    background-color: #d31254 !important;
    font-size: 13px;
    border: 0px;
}
.bg-danger{
    --bs-bg-opacity: 1;
    background-color: #ff1a1a !important;
    border: 0px;
    margin-left: 5px;
}
.bg-warning{
  --bs-bg-opacity: 1;
    background-color: #ffff1a !important;
    border: 0px;
    margin-right: 5px;
}
.badge {
    --bs-badge-padding-x: 0.45em;
    --bs-badge-padding-y: 0.35em;
    --bs-badge-font-size: 0.75em;
    --bs-badge-font-weight: 700;
    --bs-badge-color: #fff;
    --bs-badge-border-radius: 0.375rem;
    display: inline-block;
    padding: var(--bs-badge-padding-y) var(--bs-badge-padding-x);
    font-size: var(--bs-badge-font-size);
    font-weight: var(--bs-badge-font-weight);
    line-height: 1;
    color: var(--bs-badge-color);
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    /*border-radius: var(--bs-badge-border-radius);*/
}
.hotel_item .button_area {
    float: left;
    width: 20%;
    text-align: center;
    margin: 15px 0 0;
    position: absolute;
    bottom: 54px;
}
.hotel_item .button_area_1 {
    float: left;
    width: 20%;
    text-align: center;
    margin: 15px 0 0;
    position: absolute;
   top: 134px;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- BEGIN VENDOR JS-->
    <!-- <script src="{{ URL::asset('asset/js/vendors.min.js') }}" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS
    <!-- BEGIN PAGE VENDOR JS
    <script src="{{ URL::asset('asset/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('asset/js/dataTables.responsive.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('asset/js/dataTables.select.min.js') }}" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN THEME  JS--
    <script src="{{ URL::asset('asset/js/plugins.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('asset/js/custom/custom-script.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('asset/js/scripts/customizer.js') }}" type="text/javascript"></script>
    <!-- END THEME  JS-->
    <!-- BEGIN PAGE LEVEL JS
    <script src="{{ URL::asset(' asset/js/scripts/data-tables.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
	
	<script>
		function removeData(id){
      jQuery.ajax({
          type: "POST",
          url: '/menu-master',
          data: {'id':id},
          success: function(response) {
            console.log(response);
            if (response.status == 1) {
              iziToast.success({
                timeout: 5000, 
                icon: 'fa fa-chrome', 
                title: 'Success', 
                message: response.msg,
                position:'topRight'
              });
              setTimeout(function() {
                location.reload();
              }, 5000);
            }else{
              iziToast.error({timeout: 5000,title: 'Required', message: response.msg,position:'topRight'});
            }
          }
        });
    }
    jQuery(document).ready(function(){
      jQuery('.button_area_1').hide();
    });
    function showLog(id){
      jQuery('#hover_log_'+id).show();
    }
    
	</script>
@endsection