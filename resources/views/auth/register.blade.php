

<!doctype html>
<html lang="en" >
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
        <?php
        $company =App\Models\Company::first();
         ?>
           @if($company->company_name != null)
             <title>{{$company->company_name}}</title>
             @else
      <title>Company Name</title>
      @endif

      <!-- Favicon -->
      <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}" />
      <link rel="stylesheet" href="{{asset('assets/css/libs.min.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/coinex.css?v=1.0.0')}}">  </head>
  <body class="" data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
    <!-- loader Start -->
    <div id="loading">
      <div class="loader simple-loader">
          <div class="loader-body"></div>
      </div>    </div>
    <!-- loader END -->
      <div style="background-image:  url('../../assets/images/auth/01.png')" >
        <div class="wrapper">
<section class="vh-100 bg-image">
   <div class="container h-100">
      <div class="row justify-content-center h-100 align-items-center">
         <div class="col-md-6 mt-5">
            <div class="card">
               <div class="card-body">
                  <div class="auth-form">
                    <div class="text-center">
                      @if($company->company_icon != null)
                      <img
                        src="{{asset("storage/Company/$company->company_image")}}"
                        alt="image"

                        width="100"

                      />
                      @else

                      @endif
                    </div>

                        <h2 class="text-center mb-4">Sign Up</h2>
                        <form method="POST" action="{{ route('register') }}">
                          @csrf
                           <p>Register here to join GAMEUM community</p>
                           <div class="row">
                              <div class="col-md-6 mb-4">
                                  <div class="form-floating mb-3">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        <label for="firstName">Name</label>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                              </div>
                              <div class="col-md-6 mb-4">
                                 <div class="form-floating mb-3">
                                        <input id="user_name" type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{ old('user_name') }}" required autocomplete="suer_name" autofocus>
                                        <label for="lastName">Username</label>
                                        @error('user_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6 mb-4">
                                  <div class="form-floating mb-3">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                        <label for="floatingInput">Email</label>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                              </div>
                              @if(isset($_GET['ref']))
                              <div class="col-md-6 mb-4">
                                 <div class="form-floating mb-3">
                                       <input type="text" class="form-control" value="{{$_GET['ref']}}" name="sponsor" id="sponsor" placeholder="Sponsor Username">
                                       <label for="sponsor">Sponsor</label>
                                 </div>
                                 <div id="suggestUser"></div>
                              </div>
                              @else
                              <div class="col-md-6 mb-4">
                                 <div class="form-floating mb-3">
                                       <input type="text" class="form-control" name="sponsor" id="sponsor" placeholder="Sponsor Username">
                                       <label for="sponsor">Sponsor</label>
                                 </div>
                                 <div id="suggestUser"></div>
                              </div>
                              @endif

                           </div>
                           <div class="row">
                              <div class="col-md-6 mb-4">
                                  <div class="form-floating mb-2">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                        <label for="Password">Password</label>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                              </div>
                              <div class="col-md-6 mb-4">
                                  <div class="form-floating mb-2">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        <label for="confirmpassword">Confirm-password</label>
                                    </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6 mb-4">
                                  <div class="form-floating mb-2">
                                        <input id="address" type="text" class="form-control" name="address" required autocomplete="address">
                                        <label for="address">Address</label>

                                    </div>
                              </div>
                              <div class="col-md-6 mb-4">
                                  <div class="form-floating mb-2">
                                        <input id="city" type="text" class="form-control" name="city" required autocomplete="city">
                                        <label for="city">City</label>
                                    </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6 mb-4">
                                  <div class="form-floating mb-2">
                                        <input id="postal_code" type="number" class="form-control" name="postal_code" required autocomplete="postal_code">
                                        <label for="address">Postal Code</label>

                                    </div>
                              </div>
                              <div class="col-md-6 mb-4">
                                  <div class="form-floating mb-2">
                                    <select class="form-control" name="country" id="country">
                                        <option label="Choose Country"></option>
                                        <option selected>Choose Country</option>

                                        <option value="AF">Afghanistan</option>
                                        <option value="AX">&Aring;land Islands</option>
                                        <option value="AL">Albania</option>
                                        <option value="DZ">Algeria</option>
                                        <option value="AS">American Samoa</option>
                                        <option value="AD">Andorra</option>
                                        <option value="AO">Angola</option>
                                        <option value="AI">Anguilla</option>
                                        <option value="AQ">Antarctica</option>
                                        <option value="AG">Antigua and Barbuda</option>
                                        <option value="AR">Argentina</option>
                                        <option value="AM">Armenia</option>
                                        <option value="AW">Aruba</option>
                                        <option value="AU">Australia</option>
                                        <option value="AT">Austria</option>
                                        <option value="AZ">Azerbaijan</option>
                                        <option value="BS">Bahamas</option>
                                        <option value="BH">Bahrain</option>
                                        <option value="BD">Bangladesh</option>
                                        <option value="BB">Barbados</option>
                                        <option value="BY">Belarus</option>
                                        <option value="BE">Belgium</option>
                                        <option value="BZ">Belize</option>
                                        <option value="BJ">Benin</option>
                                        <option value="BM">Bermuda</option>
                                        <option value="BT">Bhutan</option>
                                        <option value="BO">Bolivia, Plurinational State of</option>
                                        <option value="BA">Bosnia and Herzegovina</option>
                                        <option value="BW">Botswana</option>
                                        <option value="BV">Bouvet Island</option>
                                        <option value="BR">Brazil</option>
                                        <option value="IO">British Indian Ocean Territory</option>
                                        <option value="BN">Brunei Darussalam</option>
                                        <option value="BG">Bulgaria</option>
                                        <option value="BF">Burkina Faso</option>
                                        <option value="BI">Burundi</option>
                                        <option value="KH">Cambodia</option>
                                        <option value="CM">Cameroon</option>
                                        <option value="CA">Canada</option>
                                        <option value="CV">Cape Verde</option>
                                        <option value="KY">Cayman Islands</option>
                                        <option value="CF">Central African Republic</option>
                                        <option value="TD">Chad</option>
                                        <option value="CL">Chile</option>
                                        <option value="CN">China</option>
                                        <option value="CX">Christmas Island</option>
                                        <option value="CC">Cocos (Keeling) Islands</option>
                                        <option value="CO">Colombia</option>
                                        <option value="KM">Comoros</option>
                                        <option value="CG">Congo</option>
                                        <option value="CD">Congo, the Democratic Republic of the</option>
                                        <option value="CK">Cook Islands</option>
                                        <option value="CR">Costa Rica</option>
                                        <option value="CI">C&ocirc;te d'Ivoire</option>
                                        <option value="HR">Croatia</option>
                                        <option value="CU">Cuba</option>
                                        <option value="CY">Cyprus</option>
                                        <option value="CZ">Czech Republic</option>
                                        <option value="DK">Denmark</option>
                                        <option value="DJ">Djibouti</option>
                                        <option value="DM">Dominica</option>
                                        <option value="DO">Dominican Republic</option>
                                        <option value="EC">Ecuador</option>
                                        <option value="EG">Egypt</option>
                                        <option value="SV">El Salvador</option>
                                        <option value="GQ">Equatorial Guinea</option>
                                        <option value="ER">Eritrea</option>
                                        <option value="EE">Estonia</option>
                                        <option value="ET">Ethiopia</option>
                                        <option value="FK">Falkland Islands (Malvinas)</option>
                                        <option value="FO">Faroe Islands</option>
                                        <option value="FJ">Fiji</option>
                                        <option value="FI">Finland</option>
                                        <option value="FR">France</option>
                                        <option value="GF">French Guiana</option>
                                        <option value="PF">French Polynesia</option>
                                        <option value="TF">French Southern Territories</option>
                                        <option value="GA">Gabon</option>
                                        <option value="GM">Gambia</option>
                                        <option value="GE">Georgia</option>
                                        <option value="DE">Germany</option>
                                        <option value="GH">Ghana</option>
                                        <option value="GI">Gibraltar</option>
                                        <option value="GR">Greece</option>
                                        <option value="GL">Greenland</option>
                                        <option value="GD">Grenada</option>
                                        <option value="GP">Guadeloupe</option>
                                        <option value="GU">Guam</option>
                                        <option value="GT">Guatemala</option>
                                        <option value="GG">Guernsey</option>
                                        <option value="GN">Guinea</option>
                                        <option value="GW">Guinea-Bissau</option>
                                        <option value="GY">Guyana</option>
                                        <option value="HT">Haiti</option>
                                        <option value="HM">Heard Island and McDonald Islands</option>
                                        <option value="VA">Holy See (Vatican City State)</option>
                                        <option value="HN">Honduras</option>
                                        <option value="HK">Hong Kong</option>
                                        <option value="HU">Hungary</option>
                                        <option value="IS">Iceland</option>
                                        <option value="IN">India</option>
                                        <option value="ID">Indonesia</option>
                                        <option value="IR">Iran, Islamic Republic of</option>
                                        <option value="IQ">Iraq</option>
                                        <option value="IE">Ireland</option>
                                        <option value="IM">Isle of Man</option>
                                        <option value="IL">Israel</option>
                                        <option value="IT">Italy</option>
                                        <option value="JM">Jamaica</option>
                                        <option value="JP">Japan</option>
                                        <option value="JE">Jersey</option>
                                        <option value="JO">Jordan</option>
                                        <option value="KZ">Kazakhstan</option>
                                        <option value="KE">Kenya</option>
                                        <option value="KI">Kiribati</option>
                                        <option value="KP">Korea, Democratic People's Republic of</option>
                                        <option value="KR">Korea, Republic of</option>
                                        <option value="KW">Kuwait</option>
                                        <option value="KG">Kyrgyzstan</option>
                                        <option value="LA">Lao People's Democratic Republic</option>
                                        <option value="LV">Latvia</option>
                                        <option value="LB">Lebanon</option>
                                        <option value="LS">Lesotho</option>
                                        <option value="LR">Liberia</option>
                                        <option value="LY">Libyan Arab Jamahiriya</option>
                                        <option value="LI">Liechtenstein</option>
                                        <option value="LT">Lithuania</option>
                                        <option value="LU">Luxembourg</option>
                                        <option value="MO">Macao</option>
                                        <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                                        <option value="MG">Madagascar</option>
                                        <option value="MW">Malawi</option>
                                        <option value="MY">Malaysia</option>
                                        <option value="MV">Maldives</option>
                                        <option value="ML">Mali</option>
                                        <option value="MT">Malta</option>
                                        <option value="MH">Marshall Islands</option>
                                        <option value="MQ">Martinique</option>
                                        <option value="MR">Mauritania</option>
                                        <option value="MU">Mauritius</option>
                                        <option value="YT">Mayotte</option>
                                        <option value="MX">Mexico</option>
                                        <option value="FM">Micronesia, Federated States of</option>
                                        <option value="MD">Moldova, Republic of</option>
                                        <option value="MC">Monaco</option>
                                        <option value="MN">Mongolia</option>
                                        <option value="ME">Montenegro</option>
                                        <option value="MS">Montserrat</option>
                                        <option value="MA">Morocco</option>
                                        <option value="MZ">Mozambique</option>
                                        <option value="MM">Myanmar</option>
                                        <option value="NA">Namibia</option>
                                        <option value="NR">Nauru</option>
                                        <option value="NP">Nepal</option>
                                        <option value="NL">Netherlands</option>
                                        <option value="AN">Netherlands Antilles</option>
                                        <option value="NC">New Caledonia</option>
                                        <option value="NZ">New Zealand</option>
                                        <option value="NI">Nicaragua</option>
                                        <option value="NE">Niger</option>
                                        <option value="NG">Nigeria</option>
                                        <option value="NU">Niue</option>
                                        <option value="NF">Norfolk Island</option>
                                        <option value="MP">Northern Mariana Islands</option>
                                        <option value="NO">Norway</option>
                                        <option value="OM">Oman</option>
                                        <option value="PK">Pakistan</option>
                                        <option value="PW">Palau</option>
                                        <option value="PS">Palestinian Territory, Occupied</option>
                                        <option value="PA">Panama</option>
                                        <option value="PG">Papua New Guinea</option>
                                        <option value="PY">Paraguay</option>
                                        <option value="PE">Peru</option>
                                        <option value="PH">Philippines</option>
                                        <option value="PN">Pitcairn</option>
                                        <option value="PL">Poland</option>
                                        <option value="PT">Portugal</option>
                                        <option value="PR">Puerto Rico</option>
                                        <option value="QA">Qatar</option>
                                        <option value="RE">R&eacute;union</option>
                                        <option value="RO">Romania</option>
                                        <option value="RU">Russian Federation</option>
                                        <option value="RW">Rwanda</option>
                                        <option value="BL">Saint Barth&eacute;lemy</option>
                                        <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                        <option value="KN">Saint Kitts and Nevis</option>
                                        <option value="LC">Saint Lucia</option>
                                        <option value="MF">Saint Martin (French part)</option>
                                        <option value="PM">Saint Pierre and Miquelon</option>
                                        <option value="VC">Saint Vincent and the Grenadines</option>
                                        <option value="WS">Samoa</option>
                                        <option value="SM">San Marino</option>
                                        <option value="ST">Sao Tome and Principe</option>
                                        <option value="SA">Saudi Arabia</option>
                                        <option value="SN">Senegal</option>
                                        <option value="RS">Serbia</option>
                                        <option value="SC">Seychelles</option>
                                        <option value="SL">Sierra Leone</option>
                                        <option value="SG">Singapore</option>
                                        <option value="SK">Slovakia</option>
                                        <option value="SI">Slovenia</option>
                                        <option value="SB">Solomon Islands</option>
                                        <option value="SO">Somalia</option>
                                        <option value="ZA">South Africa</option>
                                        <option value="GS">South Georgia and the South Sandwich Islands</option>
                                        <option value="ES">Spain</option>
                                        <option value="LK">Sri Lanka</option>
                                        <option value="SD">Sudan</option>
                                        <option value="SR">Suriname</option>
                                        <option value="SJ">Svalbard and Jan Mayen</option>
                                        <option value="SZ">Swaziland</option>
                                        <option value="SE">Sweden</option>
                                        <option value="CH">Switzerland</option>
                                        <option value="SY">Syrian Arab Republic</option>
                                        <option value="TW">Taiwan, Province of China</option>
                                        <option value="TJ">Tajikistan</option>
                                        <option value="TZ">Tanzania, United Republic of</option>
                                        <option value="TH">Thailand</option>
                                        <option value="TL">Timor-Leste</option>
                                        <option value="TG">Togo</option>
                                        <option value="TK">Tokelau</option>
                                        <option value="TO">Tonga</option>
                                        <option value="TT">Trinidad and Tobago</option>
                                        <option value="TN">Tunisia</option>
                                        <option value="TR">Turkey</option>
                                        <option value="TM">Turkmenistan</option>
                                        <option value="TC">Turks and Caicos Islands</option>
                                        <option value="TV">Tuvalu</option>
                                        <option value="UG">Uganda</option>
                                        <option value="UA">Ukraine</option>
                                        <option value="AE">United Arab Emirates</option>
                                        <option value="GB">United Kingdom</option>
                                        <option value="US">United States</option>
                                        <option value="UM">United States Minor Outlying Islands</option>
                                        <option value="UY">Uruguay</option>
                                        <option value="UZ">Uzbekistan</option>
                                        <option value="VU">Vanuatu</option>
                                        <option value="VE">Venezuela, Bolivarian Republic of</option>
                                        <option value="VN">Viet Nam</option>
                                        <option value="VG">Virgin Islands, British</option>
                                        <option value="VI">Virgin Islands, U.S.</option>
                                        <option value="WF">Wallis and Futuna</option>
                                        <option value="EH">Western Sahara</option>
                                        <option value="YE">Yemen</option>
                                        <option value="ZM">Zambia</option>
                                        <option value="ZW">Zimbabwe</option>

                                    </select>
                                        <label for="country">Country</label>
                                    </div>
                              </div>
                           </div>
                           <div class="form-check d-flex justify-content-center  mb-2">
                              <input type="checkbox" class="form-check-input" id="agree">
                              <label class="ms-1 form-check-label" for="agree">I agree with the terms of
                                 use</label>
                           </div>
                           <div class="text-center">
                              <button type="submit" class="btn btn-primary">Sign Up</button>
                           </div>
                           <!-- <div class="text-center mt-3">
                              <p>or sign in with others account?</p>
                           </div> -->
                           <!-- <div class="d-flex justify-content-center">
                                 <ul class="list-group list-group-horizontal list-group-flush">
                                    <li class="list-group-item border-0 bg-transparent">
                                       <a href="#"><img src="../../assets/images/brands/01.png" class="img-fluid avatar avatar-30 avatar-rounded" alt="fb"></a>
                                    </li>
                                    <li class="list-group-item border-0 bg-transparent">
                                       <a href="#"><img src="../../assets/images/brands/02.png" class="img-fluid avatar avatar-30 avatar-rounded" alt="gm"></a>
                                    </li>
                                    <li class="list-group-item border-0 bg-transparent">
                                       <a href="#"><img src="../../assets/images/brands/03.png" class="img-fluid avatar avatar-30 avatar-rounded" alt="im"></a>
                                    </li>
                                    <li class="list-group-item border-0 bg-transparent">
                                       <a href="#"><img src="../../assets/images/brands/04.png" class="img-fluid avatar avatar-30 avatar-rounded" alt="li"></a>
                                    </li>
                                 </ul>
                              </div> -->
                        </form>
                        <div class="new-account mt-3 text-center">
                           <p>Already have an Account <a class="text-primary" href="{{route('login')}}">Sign in</a>
                           </p>
                        </div>
                     </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
        </div>
      </div>
      <!-- <script src="{{asset('assets/js/app.js')}}"></script> -->


    <!-- Backend Bundle JavaScript -->
    <script src="{{asset('assets/js/libs.min.js')}}"></script>
    <!-- widgetchart JavaScript -->
    <script src="{{asset('assets/js/charts/widgetcharts.js')}}"></script>
    <!-- fslightbox JavaScript -->
    <script src="{{asset('assets/js/fslightbox.js')}}"></script>
    <!-- app JavaScript -->
    <script src="{{asset('assets/js/app.js')}}"></script>
    <!-- apexchart JavaScript -->
    <script src="{{asset('assets/js/charts/apexcharts.js')}}"></script>
    <script>
    $("body").on("keyup", "#sponsor", function () {
    //alert('success');
        let searchData = $("#sponsor").val();
        if (searchData.length > 0) {
            $.ajax({
                type: 'POST',
                url: '{{route("get-sponsor")}}',
                data: {search: searchData},
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (result) {
                    $('#suggestUser').html(result.success)
                    console.log(result.data)
                    // if (result.data) {
                    //     $("#position").val("");
                    //     $("#placement_id").val("");
                    //     $("#position").removeAttr('disabled');
                    // } else {
                    //     $("#position").val("");
                    //     $("#placement_id").val("");
                    //     $('#position').prop('disabled', true);
                    // }
                }
            });
        }
        if (searchData.length < 1) $('#suggestUser').html("")
    })


    </script>
  </body>
</html>
