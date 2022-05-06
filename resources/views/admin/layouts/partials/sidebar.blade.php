<aside class="sidebar sidebar-default navs-rounded ">
    <div class="sidebar-header d-flex align-items-center justify-content-start">
      <?php
      $company =App\Models\Company::first();
       ?>
        <a href="{{route('admin.home')}}" class="navbar-brand dis-none align-items-center justify-content-center">
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
                    <a class="nav-link active" aria-current="page" href="{{route('admin.home')}}">
                        <i class="icon">
                                                        <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M9.15722 20.7714V17.7047C9.1572 16.9246 9.79312 16.2908 10.581 16.2856H13.4671C14.2587 16.2856 14.9005 16.9209 14.9005 17.7047V17.7047V20.7809C14.9003 21.4432 15.4343 21.9845 16.103 22H18.0271C19.9451 22 21.5 20.4607 21.5 18.5618V18.5618V9.83784C21.4898 9.09083 21.1355 8.38935 20.538 7.93303L13.9577 2.6853C12.8049 1.77157 11.1662 1.77157 10.0134 2.6853L3.46203 7.94256C2.86226 8.39702 2.50739 9.09967 2.5 9.84736V18.5618C2.5 20.4607 4.05488 22 5.97291 22H7.89696C8.58235 22 9.13797 21.4499 9.13797 20.7714V20.7714" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>
                        </i>
                        <span class="item-name">Dashboard</span>
                    </a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-payment" role="button" aria-expanded="false" aria-controls="sidebar-user">
                        <i class="icon">
                                                      <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M21.6389 14.3957H17.5906C16.1042 14.3948 14.8993 13.1909 14.8984 11.7045C14.8984 10.218 16.1042 9.01409 17.5906 9.01318H21.6389" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M18.049 11.6429H17.7373" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.74766 3H16.3911C19.2892 3 21.6388 5.34951 21.6388 8.24766V15.4247C21.6388 18.3229 19.2892 20.6724 16.3911 20.6724H7.74766C4.84951 20.6724 2.5 18.3229 2.5 15.4247V8.24766C2.5 5.34951 4.84951 3 7.74766 3Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M7.03516 7.5382H12.4341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>
                        </i>
                        <span class="item-name">Payment Settings</span>
                        <i class="right-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="sidebar-payment" data-bs-parent="#sidebar">
                        <li class="nav-item">
                            <a class="nav-link " href="{{route('admin-payment-type')}}">
                                <i class="icon">
                                <svg width="10" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="0.5" y="1" width="11" height="11" stroke="currentcolor"/>
                                </svg>
                                </i>
                                <i class="sidenav-mini-icon"> T </i>
                                <span class="item-name">Payment Type</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{route('admin-payment-way')}}">
                                <i class="icon">
                                    <svg width="10" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="0.5" y="1" width="11" height="11" stroke="currentcolor"/>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> W </i>
                                <span class="item-name">Payment Way</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{route('admin-account-info')}}">
                                <i class="icon">
                                    <svg width="10" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="0.5" y="1" width="11" height="11" stroke="currentcolor"/>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> I </i>
                                <span class="item-name">Account Info</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{route('admin-packages')}}">
                        <i class="icon">
                                                          <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M3 6.5C3 3.87479 3.02811 3 6.5 3C9.97189 3 10 3.87479 10 6.5C10 9.12521 10.0111 10 6.5 10C2.98893 10 3 9.12521 3 6.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14 6.5C14 3.87479 14.0281 3 17.5 3C20.9719 3 21 3.87479 21 6.5C21 9.12521 21.0111 10 17.5 10C13.9889 10 14 9.12521 14 6.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M3 17.5C3 14.8748 3.02811 14 6.5 14C9.97189 14 10 14.8748 10 17.5C10 20.1252 10.0111 21 6.5 21C2.98893 21 3 20.1252 3 17.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14 17.5C14 14.8748 14.0281 14 17.5 14C20.9719 14 21 14.8748 21 17.5C21 20.1252 21.0111 21 17.5 21C13.9889 21 14 20.1252 14 17.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>
                        </i>
                        <span class="item-name">Package Setting</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-network" role="button" aria-expanded="false" aria-controls="sidebar-user">
                        <i class="icon">
                                                             <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M17.8877 10.8967C19.2827 10.7007 20.3567 9.50473 20.3597 8.05573C20.3597 6.62773 19.3187 5.44373 17.9537 5.21973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M19.7285 14.2505C21.0795 14.4525 22.0225 14.9255 22.0225 15.9005C22.0225 16.5715 21.5785 17.0075 20.8605 17.2815" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.8867 14.6638C8.67273 14.6638 5.92773 15.1508 5.92773 17.0958C5.92773 19.0398 8.65573 19.5408 11.8867 19.5408C15.1007 19.5408 17.8447 19.0588 17.8447 17.1128C17.8447 15.1668 15.1177 14.6638 11.8867 14.6638Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.8869 11.888C13.9959 11.888 15.7059 10.179 15.7059 8.069C15.7059 5.96 13.9959 4.25 11.8869 4.25C9.7779 4.25 8.0679 5.96 8.0679 8.069C8.0599 10.171 9.7569 11.881 11.8589 11.888H11.8869Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M5.88509 10.8967C4.48909 10.7007 3.41609 9.50473 3.41309 8.05573C3.41309 6.62773 4.45409 5.44373 5.81909 5.21973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M4.044 14.2505C2.693 14.4525 1.75 14.9255 1.75 15.9005C1.75 16.5715 2.194 17.0075 2.912 17.2815" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>
                        </i>
                        <span class="item-name">Network</span>
                        <i class="right-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="sidebar-network" data-bs-parent="#sidebar">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin-user-lists')}}">
                                <i class="icon">
                                    <svg width="10" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="0.5" y="1" width="11" height="11" stroke="currentcolor"/>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> U </i>
                                <span class="item-name">User List</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="icon">
                                    <svg width="10" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="0.5" y="1" width="11" height="11" stroke="currentcolor"/>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> N </i>
                                <span class="item-name">Add New User</span>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="../dashboard/auth/confirm-mail.html">
                                <i class="icon">
                                    <svg width="10" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="0.5" y="1" width="11" height="11" stroke="currentcolor"/>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> C </i>
                                <span class="item-name">Confirm Mail</span>
                            </a>
                        </li> -->


                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-fund" role="button" aria-expanded="false" aria-controls="sidebar-user">
                        <i class="icon">
                                                             <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M11.9951 16.6766V14.1396" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M18.19 5.33008C19.88 5.33008 21.24 6.70008 21.24 8.39008V11.8301C18.78 13.2701 15.53 14.1401 11.99 14.1401C8.45 14.1401 5.21 13.2701 2.75 11.8301V8.38008C2.75 6.69008 4.12 5.33008 5.81 5.33008H18.19Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M15.4951 5.32576V4.95976C15.4951 3.73976 14.5051 2.74976 13.2851 2.74976H10.7051C9.48512 2.74976 8.49512 3.73976 8.49512 4.95976V5.32576" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M2.77441 15.4829L2.96341 17.9919C3.09141 19.6829 4.50041 20.9899 6.19541 20.9899H17.7944C19.4894 20.9899 20.8984 19.6829 21.0264 17.9919L21.2154 15.4829" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>
                        </i>
                        <span class="item-name">Fund Management</span>
                        <i class="right-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="sidebar-fund" data-bs-parent="#sidebar">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('deposit-manage')}}">
                                <i class="icon">
                                    <svg width="10" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="0.5" y="1" width="11" height="11" stroke="currentcolor"/>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> A </i>
                                <span class="item-name">Add Fund Reqs</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('withdraw-manage')}}">
                                <i class="icon">
                                    <svg width="10" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="0.5" y="1" width="11" height="11" stroke="currentcolor"/>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> W </i>
                                <span class="item-name">Withdraw Fund Reqs</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="icon">
                                    <svg width="10" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="0.5" y="1" width="11" height="11" stroke="currentcolor"/>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> T </i>
                                <span class="item-name">Transaction Report</span>
                            </a>
                        </li>


                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">
                        <i class="icon">
                                                            <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M20.8064 7.62361L20.184 6.54352C19.6574 5.6296 18.4905 5.31432 17.5753 5.83872V5.83872C17.1397 6.09534 16.6198 6.16815 16.1305 6.04109C15.6411 5.91402 15.2224 5.59752 14.9666 5.16137C14.8021 4.88415 14.7137 4.56839 14.7103 4.24604V4.24604C14.7251 3.72922 14.5302 3.2284 14.1698 2.85767C13.8094 2.48694 13.3143 2.27786 12.7973 2.27808H11.5433C11.0367 2.27807 10.5511 2.47991 10.1938 2.83895C9.83644 3.19798 9.63693 3.68459 9.63937 4.19112V4.19112C9.62435 5.23693 8.77224 6.07681 7.72632 6.0767C7.40397 6.07336 7.08821 5.98494 6.81099 5.82041V5.82041C5.89582 5.29601 4.72887 5.61129 4.20229 6.52522L3.5341 7.62361C3.00817 8.53639 3.31916 9.70261 4.22975 10.2323V10.2323C4.82166 10.574 5.18629 11.2056 5.18629 11.8891C5.18629 12.5725 4.82166 13.2041 4.22975 13.5458V13.5458C3.32031 14.0719 3.00898 15.2353 3.5341 16.1454V16.1454L4.16568 17.2346C4.4124 17.6798 4.82636 18.0083 5.31595 18.1474C5.80554 18.2866 6.3304 18.2249 6.77438 17.976V17.976C7.21084 17.7213 7.73094 17.6516 8.2191 17.7822C8.70725 17.9128 9.12299 18.233 9.37392 18.6717C9.53845 18.9489 9.62686 19.2646 9.63021 19.587V19.587C9.63021 20.6435 10.4867 21.5 11.5433 21.5H12.7973C13.8502 21.5001 14.7053 20.6491 14.7103 19.5962V19.5962C14.7079 19.088 14.9086 18.6 15.2679 18.2407C15.6272 17.8814 16.1152 17.6807 16.6233 17.6831C16.9449 17.6917 17.2594 17.7798 17.5387 17.9394V17.9394C18.4515 18.4653 19.6177 18.1544 20.1474 17.2438V17.2438L20.8064 16.1454C21.0615 15.7075 21.1315 15.186 21.001 14.6964C20.8704 14.2067 20.55 13.7894 20.1108 13.5367V13.5367C19.6715 13.284 19.3511 12.8666 19.2206 12.3769C19.09 11.8873 19.16 11.3658 19.4151 10.928C19.581 10.6383 19.8211 10.3982 20.1108 10.2323V10.2323C21.0159 9.70289 21.3262 8.54349 20.8064 7.63277V7.63277V7.62361Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <circle cx="12.1747" cy="11.8891" r="2.63616" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></circle>                                </svg>
                        </i>
                        <span class="item-name">Country Setting</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">
                        <i class="icon">
                                                          <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M15.7161 16.2234H8.49609" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M15.7161 12.0369H8.49609" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M11.2521 7.86011H8.49707" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15.909 2.74976C15.909 2.74976 8.23198 2.75376 8.21998 2.75376C5.45998 2.77076 3.75098 4.58676 3.75098 7.35676V16.5528C3.75098 19.3368 5.47298 21.1598 8.25698 21.1598C8.25698 21.1598 15.933 21.1568 15.946 21.1568C18.706 21.1398 20.416 19.3228 20.416 16.5528V7.35676C20.416 4.57276 18.693 2.74976 15.909 2.74976Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>
                        </i>
                            <span class="item-name">Notice</span></a>
                </li>

                <li><hr class="hr-horizontal"></li>

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
