	<div class="agile-main-top">
		<div class="container-fluid">
			<div class="row main-top-w3l py-2">
				
				<div class="col-lg-12 header-right mt-lg-0 mt-2">
					<!-- header lists -->
					<ul>
						
						
						<li class="text-center border-right text-black">
							<marquee><i style="color:black;" class="fas fa-phone mr-2"></i>+84 933 615 661</marquee>
						</li>
					
						<?php
						$cus_id=Session::get('customer_id');
						 if(isset($cus_id)){ ?> 



						<li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2 text-black">
							<!-- <a style="color: black" class="nav-link text-black" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								{{Session::get('customer_name')}}
								
							</a> -->
							<style>
							.dropbtn2 {
							    background-color: transparent;
							    /* color: white; */
							    padding: 0px 5px;
							    font-size: 16px;
							    border: none;
								width: max-content;
							}

							.dropdown {
							  position: absolute;
							  display: inline-block;
							  right: 140px;
							}

							.dropdown-content {
							  display: none;
							  position: absolute;
							  background-color: #f1f1f1;
							  min-width: 160px;
							  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
							  z-index: 1;
							}

							.dropdown-content a {
							  color: black;
							  padding: 12px 16px;
							  text-decoration: none;
							  display: block;
							}
							</style>
						</style>
							<div class="dropdown">
							  <h2 class="dropbtn2">{{Session::get('customer_name')}}</h2>
							  <!-- <div class="dropdown-content">
							    <a class="profile1" href="{{URL::to('profile')}}">xem thông tin</a>
							  </div> -->
							</div>
						</li>
						
						<li class="text-center border-right text-black" style="position: absolute; right: 0;">
							<a style="color: black"href="{{route('dangxuat_kh')}}"  class="text-black">
								<i class="fas fa-sign-in-alt mr-2"></i> @lang('lang.Logout') </a>
						</li>
						 	
						 <?php }else { ?>
						   <li class="text-center border-right text-black">
							<a href="#" style="color:black" data-toggle="modal" data-target="#exampleModal" class="text-black">
								<i class="fas fa-sign-in-alt mr-2"></i> @lang('lang.login') </a>
						</li>
						<li class="text-center border-right text-black">
							<a style="color:black" href="#" data-toggle="modal" data-target="#exampleModal2" class="text-black">
								<i class="fas fa-sign-out-alt mr-2"></i>@lang('lang.registration') </a>
						</li>

					     <?php } ?>
					     @if(session()->has('thank'))
					     <li class="text-center border-right text-black">
					     	<marquee><i style="color:black;"></i>
					     		
					     		<span class=marq>{{session('thank')}}</span><img src="{!! asset('web/images/icon-bieutuong_1.gif')!!}" width="41px" height="21px" alt="">
					     		
					     	</marquee>
					     </li>
					     @endif

					</ul>
					<!-- //header lists -->
				</div>
			</div>
		</div>
	</div>