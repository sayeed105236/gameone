<aside class="sidebar sidebar-default navs-rounded ">
    <div class="sidebar-header d-flex align-items-center justify-content-start">
      <?php
      $company =App\Models\Company::first();
       ?>
        <a href="{{route('home')}}" class="navbar-brand dis-none align-items-center justify-content-center">
          @if($company->company_icon != null)
          <img
            src="{{asset("storage/Company/$company->company_icon")}}"
            alt="image"

            width="36"

          />
          @else

          @endif
            @if($company->company_name != null)
                       <h4 class="logo-title m-0"> {{$company->company_name}}</h4>
                       @else
                       <h4 class="logo-title m-0"> Company Name</h4>
                       @endif
        </a>
        <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
            <i class="icon">
                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5"></path>
                    <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor" stroke-width="1.5"></path>
                </svg>
            </i>
        </div>
    </div>
    <div class="sidebar-body p-0 data-scrollbar">
        <div class="collapse navbar-collapse pe-3" id="sidebar">
            <ul class="navbar-nav iq-main-menu">
                <li class="nav-item ">
                    <a class="nav-link active" aria-current="page" href="{{route('home')}}">
                        <i class="icon">
                                                        <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M9.15722 20.7714V17.7047C9.1572 16.9246 9.79312 16.2908 10.581 16.2856H13.4671C14.2587 16.2856 14.9005 16.9209 14.9005 17.7047V17.7047V20.7809C14.9003 21.4432 15.4343 21.9845 16.103 22H18.0271C19.9451 22 21.5 20.4607 21.5 18.5618V18.5618V9.83784C21.4898 9.09083 21.1355 8.38935 20.538 7.93303L13.9577 2.6853C12.8049 1.77157 11.1662 1.77157 10.0134 2.6853L3.46203 7.94256C2.86226 8.39702 2.50739 9.09967 2.5 9.84736V18.5618C2.5 20.4607 4.05488 22 5.97291 22H7.89696C8.58235 22 9.13797 21.4499 9.13797 20.7714V20.7714" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>
                        </i>
                        <span class="item-name">Dashboard</span>
                    </a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-farming" role="button" aria-expanded="false" aria-controls="sidebar-user">
                        <i class="icon">
                                                  <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M3 6.5C3 3.87479 3.02811 3 6.5 3C9.97189 3 10 3.87479 10 6.5C10 9.12521 10.0111 10 6.5 10C2.98893 10 3 9.12521 3 6.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14 6.5C14 3.87479 14.0281 3 17.5 3C20.9719 3 21 3.87479 21 6.5C21 9.12521 21.0111 10 17.5 10C13.9889 10 14 9.12521 14 6.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M3 17.5C3 14.8748 3.02811 14 6.5 14C9.97189 14 10 14.8748 10 17.5C10 20.1252 10.0111 21 6.5 21C2.98893 21 3 20.1252 3 17.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14 17.5C14 14.8748 14.0281 14 17.5 14C20.9719 14 21 14.8748 21 17.5C21 20.1252 21.0111 21 17.5 21C13.9889 21 14 20.1252 14 17.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>
                        </i>
                        <span class="item-name">Farming</span>
                        <i class="right-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="sidebar-farming" data-bs-parent="#sidebar">
                        <li class="nav-item">
                            <a class="nav-link " href="/home/buy_package/{{Auth::user()->id}}">
                                <i class="icon">
                                <svg width="10" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="0.5" y="1" width="11" height="11" stroke="currentcolor"/>
                                </svg>
                                </i>
                                <i class="sidenav-mini-icon"> U </i>
                                <span class="item-name">Buy Package</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="/home/my_asset/{{Auth::user()->id}}">
                                <i class="icon">
                                    <svg width="10" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="0.5" y="1" width="11" height="11" stroke="currentcolor"/>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> U </i>
                                <span class="item-name">My Asset</span>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link " href="../dashboard/app/user-list.html">
                                <i class="icon">
                                    <svg width="10" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="0.5" y="1" width="11" height="11" stroke="currentcolor"/>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> U </i>
                                <span class="item-name">User List</span>
                            </a>
                        </li> -->
                    </ul>
                </li>
                <li class="nav-item">
                   <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-affiliate" role="button" aria-expanded="false" aria-controls="sidebar-user">
                       <i class="icon">
                                                      <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M17.8877 10.8967C19.2827 10.7007 20.3567 9.50473 20.3597 8.05573C20.3597 6.62773 19.3187 5.44373 17.9537 5.21973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M19.7285 14.2505C21.0795 14.4525 22.0225 14.9255 22.0225 15.9005C22.0225 16.5715 21.5785 17.0075 20.8605 17.2815" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.8867 14.6638C8.67273 14.6638 5.92773 15.1508 5.92773 17.0958C5.92773 19.0398 8.65573 19.5408 11.8867 19.5408C15.1007 19.5408 17.8447 19.0588 17.8447 17.1128C17.8447 15.1668 15.1177 14.6638 11.8867 14.6638Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.8869 11.888C13.9959 11.888 15.7059 10.179 15.7059 8.069C15.7059 5.96 13.9959 4.25 11.8869 4.25C9.7779 4.25 8.0679 5.96 8.0679 8.069C8.0599 10.171 9.7569 11.881 11.8589 11.888H11.8869Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M5.88509 10.8967C4.48909 10.7007 3.41609 9.50473 3.41309 8.05573C3.41309 6.62773 4.45409 5.44373 5.81909 5.21973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M4.044 14.2505C2.693 14.4525 1.75 14.9255 1.75 15.9005C1.75 16.5715 2.194 17.0075 2.912 17.2815" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>
                       </i>
                       <span class="item-name">Affiliate</span>
                       <i class="right-icon">
                           <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                           </svg>
                       </i>
                   </a>
                   <ul class="sub-nav collapse" id="sidebar-affiliate" data-bs-parent="#sidebar">
                       <li class="nav-item">
                           <a class="nav-link " href="/home/my-affilate/{{Auth::user()->id}}">
                               <i class="icon">
                               <svg width="10" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                   <rect x="0.5" y="1" width="11" height="11" stroke="currentcolor"/>
                               </svg>
                               </i>
                               <i class="sidenav-mini-icon"> U </i>
                               <span class="item-name">My Affiliate</span>
                           </a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link " href="/home/add-affilate/{{Auth::user()->id}}">
                               <i class="icon">
                                   <svg width="10" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                   <rect x="0.5" y="1" width="11" height="11" stroke="currentcolor"/>
                                   </svg>
                               </i>
                               <i class="sidenav-mini-icon"> U </i>
                               <span class="item-name">Add Affiliate</span>
                           </a>
                       </li>
                       <!-- <li class="nav-item">
                           <a class="nav-link " href="../dashboard/app/user-list.html">
                               <i class="icon">
                                   <svg width="10" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                   <rect x="0.5" y="1" width="11" height="11" stroke="currentcolor"/>
                                   </svg>
                               </i>
                               <i class="sidenav-mini-icon"> U </i>
                               <span class="item-name">User List</span>
                           </a>
                       </li> -->
                   </ul>
               </li>
               <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-payment" role="button" aria-expanded="false" aria-controls="sidebar-user">
                      <i class="icon">
                                                    <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M11.9951 16.6766V14.1396" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M18.19 5.33008C19.88 5.33008 21.24 6.70008 21.24 8.39008V11.8301C18.78 13.2701 15.53 14.1401 11.99 14.1401C8.45 14.1401 5.21 13.2701 2.75 11.8301V8.38008C2.75 6.69008 4.12 5.33008 5.81 5.33008H18.19Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M15.4951 5.32576V4.95976C15.4951 3.73976 14.5051 2.74976 13.2851 2.74976H10.7051C9.48512 2.74976 8.49512 3.73976 8.49512 4.95976V5.32576" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M2.77441 15.4829L2.96341 17.9919C3.09141 19.6829 4.50041 20.9899 6.19541 20.9899H17.7944C19.4894 20.9899 20.8984 19.6829 21.0264 17.9919L21.2154 15.4829" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>
                      </i>
                      <span class="item-name">Payment</span>
                      <i class="right-icon">
                          <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                          </svg>
                      </i>
                  </a>
                  <ul class="sub-nav collapse" id="sidebar-payment" data-bs-parent="#sidebar">
                      <li class="nav-item">
                          <a class="nav-link " href="/home/add-fund/{{Auth::user()->id}}">
                              <i class="icon">
                              <svg width="10" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <rect x="0.5" y="1" width="11" height="11" stroke="currentcolor"/>
                              </svg>
                              </i>
                              <i class="sidenav-mini-icon"> U </i>
                              <span class="item-name">Add Fund</span>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link " href="/home/withdraw/{{Auth::user()->id}}">
                              <i class="icon">
                                  <svg width="10" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <rect x="0.5" y="1" width="11" height="11" stroke="currentcolor"/>
                                  </svg>
                              </i>
                              <i class="sidenav-mini-icon"> U </i>
                              <span class="item-name">Withdraw Fund</span>
                          </a>
                      </li>
                       <li class="nav-item">
                          <a class="nav-link " href="/home/fund-transfer/{{Auth::user()->id}}">
                              <i class="icon">
                                  <svg width="10" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <rect x="0.5" y="1" width="11" height="11" stroke="currentcolor"/>
                                  </svg>
                              </i>
                              <i class="sidenav-mini-icon"> U </i>
                              <span class="item-name">Transfer Fund</span>
                          </a>
                      </li>
                      <li class="nav-item">
                         <a class="nav-link " href="/home/transactions/{{Auth::user()->id}}">
                             <i class="icon">
                                 <svg width="10" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <rect x="0.5" y="1" width="11" height="11" stroke="currentcolor"/>
                                 </svg>
                             </i>
                             <i class="sidenav-mini-icon"> U </i>
                             <span class="item-name">Transaction Report</span>
                         </a>
                     </li>
                  </ul>
              </li>
              <li class="nav-item">
                 <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-trade" role="button" aria-expanded="false" aria-controls="sidebar-user">
                     <i class="icon">
                                                                                  <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M3.09277 9.40421H20.9167" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M16.442 13.3097H16.4512" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M12.0045 13.3097H12.0137" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M7.55818 13.3097H7.56744" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M16.442 17.1962H16.4512" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M12.0045 17.1962H12.0137" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M7.55818 17.1962H7.56744" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M16.0433 2V5.29078" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M7.96515 2V5.29078" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.2383 3.5791H7.77096C4.83427 3.5791 3 5.21504 3 8.22213V17.2718C3 20.3261 4.83427 21.9999 7.77096 21.9999H16.229C19.175 21.9999 21 20.3545 21 17.3474V8.22213C21.0092 5.21504 19.1842 3.5791 16.2383 3.5791Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>
                     </i>
                     <span class="item-name">Trade</span>
                     <i class="right-icon">
                         <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                         </svg>
                     </i>
                 </a>
                 <ul class="sub-nav collapse" id="sidebar-trade" data-bs-parent="#sidebar">
                     <li class="nav-item">
                         <a class="nav-link " href="#">
                             <i class="icon">
                             <svg width="10" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <rect x="0.5" y="1" width="11" height="11" stroke="currentcolor"/>
                             </svg>
                             </i>
                             <i class="sidenav-mini-icon"> U </i>
                             <span class="item-name">Buy Order</span>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link " href="#">
                             <i class="icon">
                                 <svg width="10" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <rect x="0.5" y="1" width="11" height="11" stroke="currentcolor"/>
                                 </svg>
                             </i>
                             <i class="sidenav-mini-icon"> U </i>
                             <span class="item-name">Sell Order</span>
                         </a>
                     </li>


                 </ul>
             </li>


            </ul>        </div>
        <div id="sidebar-footer" class="position-relative sidebar-footer">
            <div class="card mx-4">
                <div class="card-body">
                    <div class="sidebarbottom-content">
                        <div class="image">
                            <img src="{{asset('assets/images/coins/13.png')}}" alt="User-Profile" class="img-fluid">
                        </div>
                        <!-- <p class="mb-0">Be more secure with Pro Feature</p>
                        <button type="button" class="btn btn-primary mt-3">Upgrade Now</button> -->
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
    </div>
</aside>
