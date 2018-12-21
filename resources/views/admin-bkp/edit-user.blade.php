@include('admin.includes.header')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<div class="container-fluid display-table">
  <div class="row display-table-row">

    @include('admin.includes.sidebar')

    <div class="col-md-10 col-sm-11 display-table-cell v-align">
      <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->
      <div class="row">
       @include('admin.includes.inner-header')
     </div>
     <div class="user-dashboard">
      <!-- <h1>Hello, {{$user->name}}</h1> -->
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 gutter">
          <div class="sales">
            <h2>Edit User</h2>
            <div class="btn-group">
              <div class="panel-body">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                  <strong>Whoops!</strong> There were some problems with your input.<br><br>
                  <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
                @endif

                @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Success!</strong> {{ session()->get('message') }}
                </div>
                @endif
                <div class="container bootstrap snippets">
                  <div class="row">
                    <div class="col-xs-12 col-sm-9 col-md-offset-1">
                      <!-- <form class="form-horizontal"> -->
                        <form method ="post" action="{{ url('user/update') }}" class="registerform form-horizontal" enctype="multipart/form-data">
                          <input type="hidden" placeholder="Enter Name" name="edit_id" value="{{ $user->id }}" required>
                          <div class="panel panel-default">
                            <!-- start of foto -->
                            <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">

                              <!-- <label class="col-md-4 control-label">F o t o</label> -->

                              <div class="col-md-6">
                                <?php 

                                ?>
                                <!-- <img src="http://localhost/test-lara/public/storage/app/15_avatar1544179556.png"></img> -->
                                <div id="kv-avatar-errors" class="center-block" style="width:800px;display:none">
                                </div>

                                <div class="kv-avatar" style="width:200px">
                                  <!-- <input id="avatar" name="avatar" type="file" class="file-loading"> -->
                                </div>

                              </div>

                            </div>
                            <!-- end of foto -->
                            <!-- {{ asset('storage/profiles/1_avatar1544549177.jpeg') }} -->
                            <!-- {{Auth::user()->id}} -->
                            @if( !empty($user->avatar) )                    
                            @php $avatar = asset('storage/profiles/'.$user->avatar); @endphp
                            @else
                            @php $avatar = 'https://bootdey.com/img/Content/avatar/avatar6.png'; @endphp
                            @endif
                            <div class="panel-body text-center img-circle profile-avatar img-responsive">
                             <img src="{{$avatar}}" class="img-circle profile-avatar" alt="User avatar">
                             <input id="avatar" name="avatar" type="file" class="file-loading" style="margin-left: 40%;">
                           </div>
                         </div>
                         <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">User info</h4>
                          </div>
                          <div class="panel-body">                   
                            <div class="form-group">
                              <label class="col-sm-2 control-label">Name</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}"  />                        
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-2 control-label">E-mail address</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="email" value="{{ $user->email }}"  />                        
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-2 control-label">User Type</label>
                              <div class="col-sm-10">
                                <select class="form-control" name="user_type">                          
                                  <!-- <option selected="">Select country</option> -->
                                  <!-- <option value="admin" {{Auth::user()->user_type == 'admin' ? 'selected' : '' }} >Admin</option> -->
                                  <option value="subscriber" {{Auth::user()->user_type == 'subscriber' ? 'selected' : '' }} >Subscriber</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">Contact info</h4>
                          </div>
                          <div class="panel-body">
                            <div class="form-group">
                              <label class="col-sm-2 control-label">First Name</label>
                              <div class="col-sm-10">
                                <input type="text" name="first_name" class="form-control">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-2 control-label">Middle Nmae</label>
                              <div class="col-sm-10">
                                <input type="text" name="middle_initial" class="form-control">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-2 control-label">Last Nmae</label>
                              <div class="col-sm-10">
                                <input type="text" name="last_name" class="form-control">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-2 control-label">Date Of Birth</label>
                              <div class="col-sm-10">
                                <input id="datepicker" type="text" name="dob" class="form-control">
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">Address</h4>
                          </div>
                          <div class="panel-body">

                           <fieldset>
                            <!-- Address form -->

                            <!-- <h2>Address</h2> -->

                            <!-- first_name input-->
                            <div class="form-group">
                              <label class="col-sm-2 control-label">House Number</label>
                              <div class="col-sm-10">
                                <input class="form-control" id="housenumber" name="housenumber" type="text" placeholder="House Number"
                                class="input-xlarge">
                                <p class="help-block"></p>
                              </div>
                            </div>
                            <!-- address-line1 input-->
                            <div class="form-group">
                              <label class="col-sm-2 control-label">Address Line 1</label>
                              <div class="col-sm-10">
                                <input class="form-control" id="address-line1" name="addressline1" type="text" placeholder="address line 1"
                                class="input-xlarge">
                                <p class="help-block">Street address, P.O. box, company name, c/o</p>
                              </div>
                            </div>
                            <!-- address-line2 input-->
                            <div class="form-group">
                              <label class="col-sm-2 control-label">Address Line 2</label>
                              <div class="col-sm-10">
                                <input class="form-control" id="address-line2" name="addressline2" type="text" placeholder="address line 2"
                                class="input-xlarge">
                                <p class="help-block">Apartment, suite , unit, building, floor, etc.</p>
                              </div>
                            </div>
                            <!-- city input-->
                            <div class="form-group">
                              <label class="col-sm-2 control-label">City / Town</label>
                              <div class="col-sm-10">
                                <input class="form-control" id="city" name="city" type="text" placeholder="city" class="input-xlarge">
                                <p class="help-block"></p>
                              </div>
                            </div>
                            <!-- region input-->
                            <div class="form-group">
                              <label class="col-sm-2 control-label">State / Province / Region</label>
                              <div class="col-sm-10">
                                <input class="form-control" id="region" name="region" type="text" placeholder="state / province / region"
                                class="input-xlarge">
                                <p class="help-block"></p>
                              </div>
                            </div>
                            <!-- postal-code input-->
                            <div class="form-group">
                              <label class="col-sm-2 control-label">Zip / Postal Code</label>
                              <div class="col-sm-10">
                                <input class="form-control" id="postal-code" name="zipcode" type="text" placeholder="zip or postal code"
                                class="input-xlarge">
                                <p class="help-block"></p>
                              </div>
                            </div>
                            <!-- country select -->
                            <div class="form-group">
                              <label class="col-sm-2 control-label">Country</label>
                              <div class="col-sm-10">
                                <select id="country" name="country" class="form-control input-xlarge">
                                  <option value="" selected="selected">(please select a country)</option>
                                  <option value="AF">Afghanistan</option>
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
                                  <option value="BO">Bolivia</option>
                                  <option value="BA">Bosnia and Herzegowina</option>
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
                                  <option value="CI">Cote d'Ivoire</option>
                                  <option value="HR">Croatia (Hrvatska)</option>
                                  <option value="CU">Cuba</option>
                                  <option value="CY">Cyprus</option>
                                  <option value="CZ">Czech Republic</option>
                                  <option value="DK">Denmark</option>
                                  <option value="DJ">Djibouti</option>
                                  <option value="DM">Dominica</option>
                                  <option value="DO">Dominican Republic</option>
                                  <option value="TP">East Timor</option>
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
                                  <option value="FX">France, Metropolitan</option>
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
                                  <option value="GN">Guinea</option>
                                  <option value="GW">Guinea-Bissau</option>
                                  <option value="GY">Guyana</option>
                                  <option value="HT">Haiti</option>
                                  <option value="HM">Heard and Mc Donald Islands</option>
                                  <option value="VA">Holy See (Vatican City State)</option>
                                  <option value="HN">Honduras</option>
                                  <option value="HK">Hong Kong</option>
                                  <option value="HU">Hungary</option>
                                  <option value="IS">Iceland</option>
                                  <option value="IN">India</option>
                                  <option value="ID">Indonesia</option>
                                  <option value="IR">Iran (Islamic Republic of)</option>
                                  <option value="IQ">Iraq</option>
                                  <option value="IE">Ireland</option>
                                  <option value="IL">Israel</option>
                                  <option value="IT">Italy</option>
                                  <option value="JM">Jamaica</option>
                                  <option value="JP">Japan</option>
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
                                  <option value="MO">Macau</option>
                                  <option value="MK">Macedonia, The Former Yugoslav Republic of</option>
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
                                  <option value="RE">Reunion</option>
                                  <option value="RO">Romania</option>
                                  <option value="RU">Russian Federation</option>
                                  <option value="RW">Rwanda</option>
                                  <option value="KN">Saint Kitts and Nevis</option>
                                  <option value="LC">Saint LUCIA</option>
                                  <option value="VC">Saint Vincent and the Grenadines</option>
                                  <option value="WS">Samoa</option>
                                  <option value="SM">San Marino</option>
                                  <option value="ST">Sao Tome and Principe</option>
                                  <option value="SA">Saudi Arabia</option>
                                  <option value="SN">Senegal</option>
                                  <option value="SC">Seychelles</option>
                                  <option value="SL">Sierra Leone</option>
                                  <option value="SG">Singapore</option>
                                  <option value="SK">Slovakia (Slovak Republic)</option>
                                  <option value="SI">Slovenia</option>
                                  <option value="SB">Solomon Islands</option>
                                  <option value="SO">Somalia</option>
                                  <option value="ZA">South Africa</option>
                                  <option value="GS">South Georgia and the South Sandwich Islands</option>
                                  <option value="ES">Spain</option>
                                  <option value="LK">Sri Lanka</option>
                                  <option value="SH">St. Helena</option>
                                  <option value="PM">St. Pierre and Miquelon</option>
                                  <option value="SD">Sudan</option>
                                  <option value="SR">Suriname</option>
                                  <option value="SJ">Svalbard and Jan Mayen Islands</option>
                                  <option value="SZ">Swaziland</option>
                                  <option value="SE">Sweden</option>
                                  <option value="CH">Switzerland</option>
                                  <option value="SY">Syrian Arab Republic</option>
                                  <option value="TW">Taiwan, Province of China</option>
                                  <option value="TJ">Tajikistan</option>
                                  <option value="TZ">Tanzania, United Republic of</option>
                                  <option value="TH">Thailand</option>
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
                                  <option value="VE">Venezuela</option>
                                  <option value="VN">Viet Nam</option>
                                  <option value="VG">Virgin Islands (British)</option>
                                  <option value="VI">Virgin Islands (U.S.)</option>
                                  <option value="WF">Wallis and Futuna Islands</option>
                                  <option value="EH">Western Sahara</option>
                                  <option value="YE">Yemen</option>
                                  <option value="YU">Yugoslavia</option>
                                  <option value="ZM">Zambia</option>
                                  <option value="ZW">Zimbabwe</option>
                                </select>
                              </div>
                            </div>
                          </fieldset>
                        </div>
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4 class="panel-title">Security</h4>
                        </div>
                        <div class="panel-body">
                          <div class="form-group">
                            <label class="col-sm-2 control-label">Current password</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 control-label">New password</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                              <div class="checkbox">
                                <input type="checkbox" id="checkbox_1">
                                <label for="checkbox_1">Make this account public</label>
                              </div>
                            </div>
                          </div>                     
                          <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                              <button type="submit" class="btn btn-primary">Update</button>
                              <button type="reset" class="btn btn-default">Cancel</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>                                    
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@include('admin.includes.inner-footer')
</div>
</div>

@include('admin.includes.popup.add-page-popup')
@include('admin.includes.popup.feedback-popup')

@include('admin.includes.inner-footer')
<style type="text/css">
img.img-circle.profile-avatar {
  width: 20%;
}
</style>