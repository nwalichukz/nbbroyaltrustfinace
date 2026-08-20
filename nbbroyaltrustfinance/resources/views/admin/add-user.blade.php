@extends('layouts.dashboard')

@php($activeNav = 'add-user')
@section('title', 'Register New User | Nbb Trust Kapital Admin')

@section('content')

    <div class="db-page-head">
        <div>
            <div class="breadcrumb"><a href="{{ url('/dashboard') }}">Admin</a> <span>/</span> <span>Users</span> <span>/</span> <span>New</span></div>
            <h1>Register New User</h1>
            <p class="lede">Create an internal staff account with login access to the admin console.</p>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert--danger" style="margin-bottom:1.4rem;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" style="flex:none;"><circle cx="12" cy="12" r="9"/><path d="M12 8v5M12 16h.01"/></svg>
            <ul style="margin:0; padding-left:1.1rem;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="db-form-grid" id="user-register-form" method="POST" action="{{ url('/admin/create-user') }}" enctype="multipart/form-data">
        @csrf

        <div class="db-card">
            <div class="db-card__head">
                <div>
                    <span class="u-eyebrow">Step 1</span>
                    <h2 style="margin-top:0.4rem;">User details</h2>
                </div>
            </div>

            <div class="db-form-grid">
                {{--<div class="field">
                    <label for="ru-avatar">Profile image</label>
                    <div style="display:flex; align-items:center; gap:1rem;">
                        <span class="avatar" id="ru-avatar-preview" style="width:56px; height:56px; font-size:1.1rem; background-size:cover; background-position:center;">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
                        </span>
                        <input type="file" id="ru-avatar" name="avatar" accept="image/png, image/jpeg, image/webp">
                    </div>
                    <span class="hint">PNG, JPG or WEBP. Max 2MB.</span>
                </div>--}}

                <div class="field-row field-row--2">
                    <div class="field">
                        <label for="ru-name">Full name</label>
                        <input type="text" id="ru-name" name="name" value="{{ old('name') }}" required autocomplete="name">
                    </div>
                    <div class="field">
                        <label for="ru-email">Email address</label>
                        <input type="email" id="ru-email" name="email" value="{{ old('email') }}" required autocomplete="email">
                    </div>
                </div>

                <div class="field-row field-row--2">
                    <div class="field">
                        <label for="ru-password">Password</label>
                        <input type="password" id="ru-password" name="password" required autocomplete="new-password" minlength="8">
                        <span class="hint">Minimum 8 characters.</span>
                    </div>
                    <div class="field">
                        <label for="ru-password-confirm">Confirm password</label>
                        <input type="password" id="ru-password-confirm" name="password_confirmation" required autocomplete="new-password" minlength="8">
                    </div>
                     <div class="form-field">
                            <label for="reg-phone">Mobile number</label>
                            <input type="tel" id="reg-phone" name="mobile_number" placeholder="+1 (555) 000-0000" autocomplete="tel" required>
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
                </div>
            </div>

            <div style="display:flex; gap:0.8rem; margin-top:1.6rem; flex-wrap:wrap;">
                <button type="submit" class="btn btn--primary">Register User</button>
                <a href="#" class="btn btn--outline-dark">Cancel</a>
            </div>
        </div>
    </form>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    var input = document.getElementById('ru-avatar');
    var preview = document.getElementById('ru-avatar-preview');
    if (!input || !preview) return;

    input.addEventListener('change', function () {
        var file = input.files && input.files[0];
        if (!file) return;
        var reader = new FileReader();
        reader.onload = function (e) {
            preview.style.backgroundImage = 'url(' + e.target.result + ')';
            preview.innerHTML = '';
        };
        reader.readAsDataURL(file);
    });
});
</script>
@endpush