@extends('front.layout.main')
@section('content')
<section class="banner-slider" id="inn-banner-slider">
    <div data-ride="carousel" class="carousel slide" id="carouselExampleIndicators">
        <div role="listbox" class="carousel-inner">
            <!-- Slide One - Set the background image for this slide in the line below -->
            <div style="background-image: url({{asset('front/images/inner-banner.jpg')}})" class="carousel-item active">
            </div>
        </div>
    </div>
</section>
<section id="inn-pg-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <h3>Contact Us</h3>
            @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

              
                <form role="form" action="{{ route('contact.submit') }}" method="post" id="hm-contact-form">
                    @csrf
                    <div class="controls">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="text" required="required" placeholder="Full name" class="form-control" name="form_name" id="form_name">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="email" required="required" placeholder="Email" class="form-control" name="form_email" id="form_email">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="number" required="required" placeholder="Phone no" class="form-control" name="form_phone" id="form_phone">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <select name="form_location"  id="inputState" class="form-control">
                                        <option value="">Select Country</option>
                                        <option value="AF^93">Afghanistan</option>
                                        <option value="AL^335">Albania</option>
                                        <option value="DZ^213">Algeria</option>
                                        <option value="AS^684">American Samoa</option>
                                        <option value="AD^376">Andorra</option>
                                        <option value="AO^244">Angola</option>
                                        <option value="AI^264">Anguilla</option>
                                        <option value="AQ^672">Antarctica</option>
                                        <option value="AG^268">Antigua and Barbuda</option>
                                        <option value="AR^54">Argentina</option>
                                        <option value="AM^374">Armenia</option>
                                        <option value="AW^297">Aruba</option>
                                        <option value="AU^61">Australia</option>
                                        <option value="AT^43">Austria</option>
                                        <option value="AZ^994">Azerbaijan</option>
                                        <option value="BS^242">Bahamas</option>
                                        <option value="BH^973">Bahrain</option>
                                        <option value="BD^880">Bangladesh</option>
                                        <option value="BB^246">Barbados</option>
                                        <option value="BY^375">Belarus</option>
                                        <option value="BE^32">Belgium</option>
                                        <option value="BZ^501">Belize</option>
                                        <option value="BJ^229">Benin</option>
                                        <option value="BM^441">Bermuda</option>
                                        <option value="BT^975">Bhutan</option>
                                        <option value="BO^591">Bolivia</option>
                                        <option value="BA^387">Bosnia and Herzegowina</option>
                                        <option value="BW^267">Botswana</option>
                                        <option value="BV^47">Bouvet Island</option>
                                        <option value="BR^55">Brazil</option>
                                        <option value="IO^246">British Indian Ocean Territory</option>
                                        <option value="BN^673">Brunei Darussalam</option>
                                        <option value="BG^359">Bulgaria</option>
                                        <option value="BF^226">Burkina Faso</option>
                                        <option value="BI^257">Burundi</option>
                                        <option value="KH^855">Cambodia</option>
                                        <option value="CM^237">Cameroon</option>
                                        <option value="CA^1">Canada</option>
                                        <option value="CV^238">Cape Verde</option>
                                        <option value="KY^345">Cayman Islands</option>
                                        <option value="CF^236">Central African Republic</option>
                                        <option value="TD^235">Chad</option>
                                        <option value="CL^56">Chile</option>
                                        <option value="CN^86">China</option>
                                        <option value="CX^61">Christmas Island</option>
                                        <option value="CC^61">Cocos (Keeling) Islands</option>
                                        <option value="CO^57">Colombia</option>
                                        <option value="KM^269">Comoros</option>
                                        <option value="CG^242">Congo</option>
                                        <option value="CK^682">Cook Islands</option>
                                        <option value="CR^506">Costa Rica</option>
                                        <option value="CI^225">Cote D'Ivoire</option>
                                        <option value="HR^385">Croatia</option>
                                        <option value="CU^53">Cuba</option>
                                        <option value="CY^357">Cyprus</option>
                                        <option value="CZ^420">Czech Republic</option>
                                        <option value="DK^45">Denmark</option>
                                        <option value="DJ^253">Djibouti</option>
                                        <option value="DM^767">Dominica</option>
                                        <option value="DO^809">Dominican Republic</option>
                                        <option value="TP^670">East Timor</option>
                                        <option value="EC^593">Ecuador</option>
                                        <option value="EG^20">Egypt</option>
                                        <option value="SV^503">El Salvador</option>
                                        <option value="GQ^240">Equatorial Guinea</option>
                                        <option value="ER^291">Eritrea</option>
                                        <option value="EE^372">Estonia</option>
                                        <option value="ET^251">Ethiopia</option>
                                        <option value="FK^500">Falkland Islands (Malvinas)</option>
                                        <option value="FO^298">Faroe Islands</option>
                                        <option value="FJ^679">Fiji</option>
                                        <option value="FI^358">Finland</option>
                                        <option value="FR^33">France</option>
                                        <option value="FX^590">France, Metropolitan</option>
                                        <option value="GF^594">French Guiana</option>
                                        <option value="PF^689">French Polynesia</option>
                                        <option value="TF^590">French Southern Territories</option>
                                        <option value="GA^241">Gabon</option>
                                        <option value="GM^220">Gambia</option>
                                        <option value="GE^995">Georgia</option>
                                        <option value="DE^49">Germany</option>
                                        <option value="GH^233">Ghana</option>
                                        <option value="GI^350">Gibraltar</option>
                                        <option value="GR^30">Greece</option>
                                        <option value="GL^299">Greenland</option>
                                        <option value="GD^809">Grenada</option>
                                        <option value="GP^590">Guadeloupe</option>
                                        <option value="GU^1">Guam</option>
                                        <option value="GT^502">Guatemala</option>
                                        <option value="GN^224">Guinea</option>
                                        <option value="GW^245">Guinea-bissau</option>
                                        <option value="GY^592">Guyana</option>
                                        <option value="HT^509">Haiti</option>
                                        <option value="HM^61">Heard and Mc Donald Islands</option>
                                        <option value="HN^504">Honduras</option>
                                        <option value="HK^852">Hong Kong</option>
                                        <option value="HU^36">Hungary</option>
                                        <option value="IS^354">Iceland</option>
                                        <option value="IN^91" selected="selected">India</option>
                                        <option value="ID^62">Indonesia</option>
                                        <option value="IR^98">Iran (Islamic Republic of)</option>
                                        <option value="IQ^964">Iraq</option>
                                        <option value="IE^353">Ireland</option>
                                        <option value="IL^972">Israel</option>
                                        <option value="IT^39">Italy</option>
                                        <option value="JM^876">Jamaica</option>
                                        <option value="JP^81">Japan</option>
                                        <option value="JO^962">Jordan</option>
                                        <option value="KZ^7">Kazakhstan</option>
                                        <option value="KE^254">Kenya</option>
                                        <option value="KI^686">Kiribati</option>
                                        <option value="KP^850">Korea, Democratic People's Republic of</option>
                                        <option value="KR^82">Korea, Republic of</option>
                                        <option value="KW^965">Kuwait</option>
                                        <option value="KG^7">Kyrgyzstan</option>
                                        <option value="LA^856">Lao People's Democratic Republic</option>
                                        <option value="LV^371">Latvia</option>
                                        <option value="LB^961">Lebanon</option>
                                        <option value="LS^266">Lesotho</option>
                                        <option value="LR^231">Liberia</option>
                                        <option value="LY^218">Libya</option>
                                        <option value="LI^423">Liechtenstein</option>
                                        <option value="LT^370">Lithuania</option>
                                        <option value="LU^352">Luxembourg</option>
                                        <option value="MO^853">Macau</option>
                                        <option value="MK^389">Macedonia, The Former Yugoslav Republic of</option>
                                        <option value="MG^261">Madagascar</option>
                                        <option value="MW^265">Malawi</option>
                                        <option value="MY^60">Malaysia</option>
                                        <option value="MV^960">Maldives</option>
                                        <option value="ML^223">Mali</option>
                                        <option value="MT^356">Malta</option>
                                        <option value="MH^692">Marshall Islands</option>
                                        <option value="MQ^596">Martinique</option>
                                        <option value="MR^222">Mauritania</option>
                                        <option value="MU^230">Mauritius</option>
                                        <option value="YT^269">Mayotte</option>
                                        <option value="MX^52">Mexico</option>
                                        <option value="FM^691">Micronesia, Federated States of</option>
                                        <option value="MD^373">Moldova, Republic of</option>
                                        <option value="MC^377">Monaco</option>
                                        <option value="MN^976">Mongolia</option>
                                        <option value="ME^382">Montenegro</option>
                                        <option value="MS^664">Montserrat</option>
                                        <option value="MA^212">Morocco</option>
                                        <option value="MZ^258">Mozambique</option>
                                        <option value="MM^95">Myanmar</option>
                                        <option value="NA^264">Namibia</option>
                                        <option value="NR^674">Nauru</option>
                                        <option value="NP^977">Nepal</option>
                                        <option value="NL^31">Netherlands</option>
                                        <option value="AN^599">Netherlands Antilles</option>
                                        <option value="NC^687">New Caledonia</option>
                                        <option value="NZ^64">New Zealand</option>
                                        <option value="NI^505">Nicaragua</option>
                                        <option value="NE^227">Niger</option>
                                        <option value="NG^234">Nigeria</option>
                                        <option value="NU^683">Niue</option>
                                        <option value="NF^672">Norfolk Island</option>
                                        <option value="MP^670">Northern Mariana Islands</option>
                                        <option value="NO^47">Norway</option>
                                        <option value="OM^968">Oman</option>
                                        <option value="PK^92">Pakistan</option>
                                        <option value="PW^680">Palau</option>
                                        <option value="PS^970">Palestine</option>
                                        <option value="PA^507">Panama</option>
                                        <option value="PG^675">Papua New Guinea</option>
                                        <option value="PY^595">Paraguay</option>
                                        <option value="PE^51">Peru</option>
                                        <option value="PH^63">Philippines</option>
                                        <option value="PN^872">Pitcairn</option>
                                        <option value="PL^48">Poland</option>
                                        <option value="PT^351">Portugal</option>
                                        <option value="PR^787">Puerto Rico</option>
                                        <option value="QA^974">Qatar</option>
                                        <option value="RE^262">Reunion</option>
                                        <option value="RO^40">Romania</option>
                                        <option value="RU^7">Russian Federation</option>
                                        <option value="RW^250">Rwanda</option>
                                        <option value="KN^869">Saint Kitts and Nevis</option>
                                        <option value="LC^758">Saint Lucia</option>
                                        <option value="VC^784">Saint Vincent and the Grenadines</option>
                                        <option value="WS^685">Samoa</option>
                                        <option value="SM^378">San Marino</option>
                                        <option value="ST^239">Sao Tome and Principe</option>
                                        <option value="SA^966">Saudi Arabia</option>
                                        <option value="SN^221">Senegal</option>
                                        <option value="RS^381">Serbia</option>
                                        <option value="SC^248">Seychelles</option>
                                        <option value="SL^232">Sierra Leone</option>
                                        <option value="SG^65">Singapore</option>
                                        <option value="SK^421">Slovakia (Slovak Republic)</option>
                                        <option value="SI^386">Slovenia</option>
                                        <option value="SB^677">Solomon Islands</option>
                                        <option value="SO^252">Somalia</option>
                                        <option value="ZA^27">South Africa</option>
                                        <option value="GS^44">South Georgia and the South Sandwich Islands
                                        </option>
                                        <option value="SS^211">South Sudan</option>
                                        <option value="ES^34">Spain</option>
                                        <option value="LK^94">Sri Lanka</option>
                                        <option value="SH^290">St. Helena</option>
                                        <option value="PM^508">St. Pierre and Miquelon</option>
                                        <option value="SD^249">Sudan</option>
                                        <option value="SR^597">Suriname</option>
                                        <option value="SJ^47">Svalbard and Jan Mayen Islands</option>
                                        <option value="SZ^268">Swaziland</option>
                                        <option value="SE^46">Sweden</option>
                                        <option value="CH^41">Switzerland</option>
                                        <option value="SY^963">Syrian Arab Republic</option>
                                        <option value="TW^886">Taiwan</option>
                                        <option value="TJ^992">Tajikistan</option>
                                        <option value="TZ^255">Tanzania, United Republic of</option>
                                        <option value="TH^66">Thailand</option>
                                        <option value="TG^228">Togo</option>
                                        <option value="TK^64">Tokelau</option>
                                        <option value="TO^676">Tonga</option>
                                        <option value="TT^868">Trinidad and Tobago</option>
                                        <option value="TN^216">Tunisia</option>
                                        <option value="TR^90">Turkey</option>
                                        <option value="TM^993">Turkmenistan</option>
                                        <option value="TC^649">Turks and Caicos Islands</option>
                                        <option value="TV^688">Tuvalu</option>
                                        <option value="UG^256">Uganda</option>
                                        <option value="UA^380">Ukraine</option>
                                        <option value="AE^971">United Arab Emirates</option>
                                        <option value="UK^44">United Kingdom</option>
                                        <option value="US^1">United States</option>
                                        <option value="UM^1">United States Minor Outlying Islands</option>
                                        <option value="UY^598">Uruguay</option>
                                        <option value="UZ^998">Uzbekistan</option>
                                        <option value="VU^678">Vanuatu</option>
                                        <option value="VA^39">Vatican City State (Holy See)</option>
                                        <option value="VE^58">Venezuela</option>
                                        <option value="VN^84">Viet Nam</option>
                                        <option value="VG^1">Virgin Islands (British)</option>
                                        <option value="VI^1">Virgin Islands (U.S.)</option>
                                        <option value="WF^681">Wallis and Futuna Islands</option>
                                        <option value="EH^212">Western Sahara</option>
                                        <option value="YE^967">Yemen</option>
                                        <option value="YU^381">Yugoslavia</option>
                                        <option value="ZR^243">Zaire</option>
                                        <option value="ZM^260">Zambia</option>
                                        <option value="ZW^263">Zimbabwe</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <textarea data-error="Please,leave us a message." required="required" rows="4" placeholder="Message for me" class="form-control" name="form_message" id="form_message"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <input type="submit" value="Submit Now" class="banner-btn">
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-lg-7 px-0">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14725.480463501943!2d88.4617269!3d22.6772619!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f89f81c3e33a29%3A0x25430fa354e460fc!2sSusri%20Trading%20and%20Export!5e0!3m2!1sen!2sin!4v1712247284225!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

        </div>
    </div>
</section>

<section id="address-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="address-box box-shadow">
                    <h3>Contact Info</h3>
                    <p><i class="fa fa-map-marker" aria-hidden="true"></i> Street Address Here, Kolkata, West
                        Bengal, India.</p>
                    <p><i class="fa fa-phone" aria-hidden="true"></i> +91 9876543210</p>
                    <p><i class="fa fa-envelope" aria-hidden="true"></i> info@companyname.com</p>
                    <h3 class="mt-3 mb-0">Follow us</h3>
                    <ul class="footer-social">
                        <li><a href=""></a><i class="fa fa-facebook-f" aria-hidden="true"></i></li>
                        <li><a href=""></a><i class="fa fa-youtube" aria-hidden="true"></i></li>
                        <li><a href=""></a><i class="fa fa-twitter" aria-hidden="true"></i></li>
                        <li><a href=""></a><i class="fa fa-linkedin" aria-hidden="true"></i></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>






<a href="https://api.whatsapp.com/send?phone=8220026777&text=Hello..." class="float" target="_blank">
    <i class="fa fa-whatsapp my-float"></i>
</a>
@endsection