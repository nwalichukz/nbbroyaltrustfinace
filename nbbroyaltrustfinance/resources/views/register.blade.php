@extends('layouts.app')

@section('title', 'Open an Account | Nbb Trust Kapital')
@section('meta_description', 'Register for a Nbb Trust Kapital account. Available to clients worldwide.')

@section('content')

    <section class="auth-section">
        <div class="container">
            <div class="auth-shell">
                <div class="auth-card">
                    <div class="auth-card__head">
                        <span class="u-eyebrow">Open an account</span>
                        <h1 style="margin-top:0.6rem;">Create your Nbb Trust Kapital account</h1>
                        <p>It takes about five minutes. A relationship manager will be in touch to complete verification.</p>
                    </div>

                    @include('partials.errors')

                    <form action="{{ url('/create-user') }}" method="POST" novalidate>
                        @csrf

                        <div class="form-field">
                            <label for="reg-name">Full name</label>
                            <input type="text" id="reg-name" name="name" placeholder="As it appears on your ID" autocomplete="name" required>
                        </div>

                        <div class="form-field">
                            <label for="reg-email">Email address</label>
                            <input type="email" id="reg-email" name="email" placeholder="you@example.com" autocomplete="email" required>
                        </div>

                        <div class="form-field">
                            <label for="reg-phone">Mobile number</label>
                            <input type="tel" id="reg-phone" name="mobile_number" placeholder="+1 (555) 000-0000" autocomplete="tel" required>
                        </div>

                        <div class="form-field">
                            <label for="reg-password">Password</label>
                            <input type="password" id="reg-password" name="password" placeholder="At least 10 characters" autocomplete="new-password" minlength="10" required>
                            <span class="hint">Use a mix of letters, numbers and symbols for a stronger password.</span>
                        </div>

                        <div class="form-field">
                            <label for="reg-password-confirmation">Confirm password</label>
                            <input type="password" id="reg-password-confirmation" name="password_confirmation" placeholder="Re-enter your password" autocomplete="new-password" minlength="10" required>
                        </div>

                        <div class="form-field">
                            <label for="reg-human">Confirm human</label>
                            <input type="text" id="reg-human" name="confirm_human"  placeholder="Enter first 3 letters of the name you entered above eg: joh" required>
                        </div>

                        <div class="form-field">
                            <label for="reg-country">Country of residence</label>
                            <select id="reg-country" name="country" required>
                                <option value="" disabled>Select your country&hellip;</option>
                                <option>Afghanistan</option>
                                <option>Albania</option>
                                <option>Algeria</option>
                                <option>Andorra</option>
                                <option>Angola</option>
                                <option>Antigua and Barbuda</option>
                                <option>Argentina</option>
                                <option>Armenia</option>
                                <option>Australia</option>
                                <option>Austria</option>
                                <option>Azerbaijan</option>
                                <option>Bahamas</option>
                                <option>Bahrain</option>
                                <option>Bangladesh</option>
                                <option>Barbados</option>
                                <option>Belarus</option>
                                <option>Belgium</option>
                                <option>Belize</option>
                                <option>Benin</option>
                                <option>Bhutan</option>
                                <option>Bolivia</option>
                                <option>Bosnia and Herzegovina</option>
                                <option>Botswana</option>
                                <option>Brazil</option>
                                <option>Brunei</option>
                                <option>Bulgaria</option>
                                <option>Burkina Faso</option>
                                <option>Burundi</option>
                                <option>Cabo Verde</option>
                                <option>Cambodia</option>
                                <option>Cameroon</option>
                                <option>Canada</option>
                                <option>Central African Republic</option>
                                <option>Chad</option>
                                <option>Chile</option>
                                <option>China</option>
                                <option>Colombia</option>
                                <option>Comoros</option>
                                <option>Congo (Brazzaville)</option>
                                <option>Congo (DRC)</option>
                                <option>Costa Rica</option>
                                <option>Croatia</option>
                                <option>Cuba</option>
                                <option>Cyprus</option>
                                <option>Czechia</option>
                                <option>Denmark</option>
                                <option>Djibouti</option>
                                <option>Dominica</option>
                                <option>Dominican Republic</option>
                                <option>Ecuador</option>
                                <option>Egypt</option>
                                <option>El Salvador</option>
                                <option>Equatorial Guinea</option>
                                <option>Eritrea</option>
                                <option>Estonia</option>
                                <option>Eswatini</option>
                                <option>Ethiopia</option>
                                <option>Fiji</option>
                                <option>Finland</option>
                                <option>France</option>
                                <option>Gabon</option>
                                <option>Gambia</option>
                                <option>Georgia</option>
                                <option>Germany</option>
                                <option>Ghana</option>
                                <option>Greece</option>
                                <option>Grenada</option>
                                <option>Guatemala</option>
                                <option>Guinea</option>
                                <option>Guinea-Bissau</option>
                                <option>Guyana</option>
                                <option>Haiti</option>
                                <option>Honduras</option>
                                <option>Hungary</option>
                                <option>Iceland</option>
                                <option>India</option>
                                <option>Indonesia</option>
                                <option>Iran</option>
                                <option>Iraq</option>
                                <option>Ireland</option>
                                <option>Israel</option>
                                <option>Italy</option>
                                <option>Ivory Coast</option>
                                <option>Jamaica</option>
                                <option>Japan</option>
                                <option>Jordan</option>
                                <option>Kazakhstan</option>
                                <option>Kenya</option>
                                <option>Kiribati</option>
                                <option>Kosovo</option>
                                <option>Kuwait</option>
                                <option>Kyrgyzstan</option>
                                <option>Laos</option>
                                <option>Latvia</option>
                                <option>Lebanon</option>
                                <option>Lesotho</option>
                                <option>Liberia</option>
                                <option>Libya</option>
                                <option>Liechtenstein</option>
                                <option>Lithuania</option>
                                <option>Luxembourg</option>
                                <option>Madagascar</option>
                                <option>Malawi</option>
                                <option>Malaysia</option>
                                <option>Maldives</option>
                                <option>Mali</option>
                                <option>Malta</option>
                                <option>Marshall Islands</option>
                                <option>Mauritania</option>
                                <option>Mauritius</option>
                                <option>Mexico</option>
                                <option>Micronesia</option>
                                <option>Moldova</option>
                                <option>Monaco</option>
                                <option>Mongolia</option>
                                <option>Montenegro</option>
                                <option>Morocco</option>
                                <option>Mozambique</option>
                                <option>Myanmar</option>
                                <option>Namibia</option>
                                <option>Nauru</option>
                                <option>Nepal</option>
                                <option>Netherlands</option>
                                <option>New Zealand</option>
                                <option>Nicaragua</option>
                                <option>Niger</option>
                                <option selected>Nigeria</option>
                                <option>North Korea</option>
                                <option>North Macedonia</option>
                                <option>Norway</option>
                                <option>Oman</option>
                                <option>Pakistan</option>
                                <option>Palau</option>
                                <option>Palestine</option>
                                <option>Panama</option>
                                <option>Papua New Guinea</option>
                                <option>Paraguay</option>
                                <option>Peru</option>
                                <option>Philippines</option>
                                <option>Poland</option>
                                <option>Portugal</option>
                                <option>Qatar</option>
                                <option>Romania</option>
                                <option>Russia</option>
                                <option>Rwanda</option>
                                <option>Saint Kitts and Nevis</option>
                                <option>Saint Lucia</option>
                                <option>Saint Vincent and the Grenadines</option>
                                <option>Samoa</option>
                                <option>San Marino</option>
                                <option>Sao Tome and Principe</option>
                                <option>Saudi Arabia</option>
                                <option>Senegal</option>
                                <option>Serbia</option>
                                <option>Seychelles</option>
                                <option>Sierra Leone</option>
                                <option>Singapore</option>
                                <option>Slovakia</option>
                                <option>Slovenia</option>
                                <option>Solomon Islands</option>
                                <option>Somalia</option>
                                <option>South Africa</option>
                                <option>South Korea</option>
                                <option>South Sudan</option>
                                <option>Spain</option>
                                <option>Sri Lanka</option>
                                <option>Sudan</option>
                                <option>Suriname</option>
                                <option>Sweden</option>
                                <option>Switzerland</option>
                                <option>Syria</option>
                                <option>Taiwan</option>
                                <option>Tajikistan</option>
                                <option>Tanzania</option>
                                <option>Thailand</option>
                                <option>Timor-Leste</option>
                                <option>Togo</option>
                                <option>Tonga</option>
                                <option>Trinidad and Tobago</option>
                                <option>Tunisia</option>
                                <option>Turkey</option>
                                <option>Turkmenistan</option>
                                <option>Tuvalu</option>
                                <option>Uganda</option>
                                <option>Ukraine</option>
                                <option>United Arab Emirates</option>
                                <option>United Kingdom</option>
                                <option>United States</option>
                                <option>Uruguay</option>
                                <option>Uzbekistan</option>
                                <option>Vanuatu</option>
                                <option>Vatican City</option>
                                <option>Venezuela</option>
                                <option>Vietnam</option>
                                <option>Yemen</option>
                                <option>Zambia</option>
                                <option>Zimbabwe</option>
                            </select>
                        </div>

                        <div class="form-check">
                            <input type="checkbox" id="reg-terms" name="terms" required>
                            <label for="reg-terms">I agree to the <a href="{{ url('/terms-of-use') }}">Terms of Use</a> and <a href="{{ url('/privacy-policy') }}">Privacy Policy</a>, and confirm the information provided is accurate.</label>
                        </div>

                        <button type="submit" class="btn btn--primary btn--block">Create Account</button>
                    </form>

                    <div class="auth-card__foot">
                        Already have an account? <a href="{{ url('/login') }}">Sign in</a>
                    </div>
                </div>

                <aside class="auth-side">
                    <h2>Banking without borders</h2>
                    <p>Nbb Trust Kapital serves private individuals, families and institutions across more than 40 countries.</p>
                    <ul>
                        <li>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 12l6 6L20 6"/></svg>
                            <span>Multi-currency accounts in GBP, USD and EUR</span>
                        </li>
                        <li>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 12l6 6L20 6"/></svg>
                            <span>A dedicated relationship manager from day one</span>
                        </li>
                        <li>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 12l6 6L20 6"/></svg>
                            <span>FCA-regulated, FSCS-eligible deposit protection</span>
                        </li>
                        <li>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 12l6 6L20 6"/></svg>
                            <span>Available in your language via our site translator</span>
                        </li>
                    </ul>
                </aside>
            </div>
        </div>
    </section>

@endsection