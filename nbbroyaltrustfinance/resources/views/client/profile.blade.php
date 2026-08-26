@extends('layouts.client')

@php($activeNav = 'profile')
@section('title', 'Profile & Security | Nbb Trust Kapital')

@section('content')

    <div class="db-page-head">
        <div>
            <div class="breadcrumb"><a href="{{ url('/client/dashboard') }}">Client Area</a> <span>/</span> <span>Profile & Security</span></div>
            <h1>Profile & Security</h1>
            <p class="lede">Manage your personal information, security preferences, and credentials.</p>
        </div>
    </div>

    <div class="profile-grid">

        <!-- Main Settings Column -->
        <div class="profile-main">

            <!-- Profile Picture Management Card -->
            <div class="db-card profile-card">
                <div class="card-head">
                    <div>
                        <h2>Profile Picture</h2>
                        <p>Update your photo or remove your current image.</p>
                    </div>
                </div>

                <div class="avatar-upload-layout" style="display: flex; align-items: center; gap: 1.5rem; flex-wrap: wrap;">
                    <div class="user-avatar-large" style="margin: 0; overflow: hidden; position: relative;">
                        @if(!empty(Auth::user()->avatar))
                            <img src="{{ asset('images/avatar/'.Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                        @else
                            <span>{{ strtoupper(substr(Auth::user()->name, 0, 2)) }}</span>
                        @endif
                    </div>

                    <div style="flex: 1; display: flex; flex-direction: column; gap: 0.75rem; min-width: 220px;">
                        <!-- Upload Form -->
                        <form action="{{ url('/admin/img-update') }}" method="POST" enctype="multipart/form-data" style="display: flex; gap: 0.5rem; align-items: center; flex-wrap: wrap;">
                            @csrf
                            @method('POST')
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="file" name="avatar" accept="image/*" required style="font-size: 0.85rem; max-width: 220px;">
                            <button type="submit" class="btn-brand" style="padding: 0.5rem 1rem; font-size: 0.85rem;">Upload Photo</button>
                        </form>

                        <!-- Delete Photo Form (Only shows if avatar exists) -->
                        @if(!empty(Auth::user()->avatar))
                            <form action="{{ url('/client/profile/avatar') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-danger-outline" style="background: none; border: 1px solid #dc2626; color: #dc2626; padding: 0.4rem 0.8rem; border-radius: 6px; font-size: 0.8rem; font-weight: 600; cursor: pointer;">
                                    Remove Current Photo
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Personal Details Card -->
            <div class="db-card profile-card">
                <div class="card-head">
                    <div>
                        <h2>Personal Details</h2>
                        <p>Keep your contact details up to date.</p>
                    </div>
                    <span class="badge badge--verified">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg>
                        Verified
                    </span>
                </div>

                <form action="{{ url('/update-user') }}" method="POST">
                    @csrf
                    {{--@method('PUT')--}}

                    <div class="form-row">
                        <div class="form-group col-half">
                            <label for="first_name" class="form-label">Name</label>
                            <input type="text" id="first_name" name="name" class="form-control" value="{{ Auth::user()->name }}" required>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="{{Auth::user()->id}}">

                    <div class="form-row">
                        <div class="form-group col-half">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ Auth::user()->email}}" required>
                        </div>
                        <div class="form-group col-half">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" id="phone" name="mobile_number" class="form-control" value="{{ Auth::user()->mobile_numner }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address" class="form-label">Residential Address</label>
                        <input type="text" id="address" name="house_address" class="form-control" value="{{ Auth::user()->house_address }} ">
                    </div>

                    <div class="form-group">
                        <label for="address" class="form-label">Zip Code</label>
                        <input type="text" id="address" name="zip_code" class="form-control" value="{{  Auth::user()->zip_code }} ">
                    </div>

                      <div class="form-group">
                        <label for="address" class="form-label">City</label>
                        <input type="text" id="address" name="city" class="form-control" value="{{ Auth::user()->city}}">
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
                                <option>Nigeria</option>
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
                                <option selected>United Kingdom</option>
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

                    <div class="form-actions">
                        <button type="submit" class="btn-brand">Save Changes</button>
                    </div>
                </form>
            </div>

            <!-- Password & Security Card -->
            <div class="db-card profile-card">
                <div class="card-head">
                    <div>
                        <h2>Password & Authentication</h2>
                        <p>Ensure your account is using a strong password.</p>
                    </div>
                </div>

                <form action="{{ url('/user/post-change-password') }}" method="POST">
                    @csrf
                    {{--@method('PUT')--}}

                    <div class="form-group">
                        <label for="current_password" class="form-label">Current Password</label>
                        <input type="password" id="current_password" name="old_password" class="form-control" placeholder="••••••••••••" required>
                    </div>
                       <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <div class="form-row">
                        <div class="form-group col-half">
                            <label for="new_password" class="form-label">New Password</label>
                            <input type="password" id="new_password" name="new_password" class="form-control" placeholder="Minimum 8 characters" required>
                        </div>
                        {{--<div class="form-group col-half">
                            <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                            <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="form-control" placeholder="Re-enter new password" required>
                        </div>--}}
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn-brand">Update Password</button>
                    </div>
                </form>
            </div>

        </div>

        <!-- Sidebar Summary Column -->
        <aside class="profile-sidebar">

            <!-- Profile Summary Badge -->
            <div class="db-card user-badge-card">
                <div class="user-avatar-large" style="overflow: hidden;">
                    @if(!empty(Auth::user()->avatar))
                        <img src="{{ asset('images/avatar/'.Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                    @else
                        <span>{{ strtoupper(substr(Auth::user()->name, 0, 2)) }}</span>
                    @endif
                </div>
                <h3>{{ Auth::user()->name}}</h3>
                <span class="user-tag">Private Client</span>

                <div class="meta-divider"></div>

                <div class="meta-list">
                    <div class="meta-item">
                        <span class="meta-label">Client ID</span>
                        <span class="meta-value">NBB-GB-{{Auth::user()->userwallet->wallet_no}}</span>
                    </div>
                    <div class="meta-item">
                        <span class="meta-label">Account Tier</span>
                        <span class="meta-value">Premier Tier</span>
                    </div>
                    <div class="meta-item">
                        <span class="meta-label">Member Since</span>
                        <span class="meta-value">Jan 2024</span>
                    </div>
                </div>
            </div>

            <!-- Quick Security Settings -->
            <div class="db-card security-card">
                <h3>Security Preferences</h3>

                <div class="toggle-item">
                    <div class="toggle-info">
                        <strong>Two-Factor Auth (2FA)</strong>
                        <p>Protect account with SMS / App verification.</p>
                    </div>
                    <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider"></span>
                    </label>
                </div>

                <div class="toggle-item">
                    <div class="toggle-info">
                        <strong>Login Alerts</strong>
                        <p>Receive immediate email notification on new sign-ins.</p>
                    </div>
                    <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider"></span>
                    </label>
                </div>
            </div>

        </aside>

    </div>

    <style>
        :root {
            --color-brand: #081C33;
            --color-brand-hover: #0b2545;
            --color-brand-subtle: #f0f4f8;
            --color-border: #cbd5e1;
            --color-ink: #0f172a;
            --color-ink-soft: #64748b;
        }

        .profile-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 1.5rem;
            align-items: start;
        }

        @media (max-width: 900px) {
            .profile-grid {
                grid-template-columns: 1fr;
            }
        }

        .profile-main, .profile-sidebar {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .profile-card {
            background: #ffffff;
            border-radius: 12px;
            padding: 1.5rem;
            border: 1px solid #e2e8f0;
        }

        .card-head {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1.25rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #f1f5f9;
        }

        .card-head h2 {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--color-brand);
            margin: 0 0 0.2rem 0;
        }

        .card-head p {
            font-size: 0.85rem;
            color: var(--color-ink-soft);
            margin: 0;
        }

        .badge--verified {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            background: #dcfce7;
            color: #15803d;
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0.3rem 0.6rem;
            border-radius: 20px;
        }

        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-row {
            display: flex;
            gap: 1rem;
        }

        .col-half {
            flex: 1;
        }

        .form-label {
            display: block;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 0.4rem;
            color: var(--color-ink);
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--color-border);
            border-radius: 8px;
            font-size: 0.95rem;
            background: #ffffff;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--color-brand);
            box-shadow: 0 0 0 3px rgba(8, 28, 51, 0.12);
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            margin-top: 1rem;
        }

        .btn-brand {
            padding: 0.75rem 1.5rem;
            background: var(--color-brand);
            color: #ffffff;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.9rem;
            cursor: pointer;
            transition: background 0.2s;
        }

        .btn-brand:hover {
            background: var(--color-brand-hover);
        }

        /* Sidebar Styling */
        .user-badge-card {
            text-align: center;
            padding: 2rem 1.5rem;
            background: #ffffff;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
        }

        .user-avatar-large {
            width: 72px;
            height: 72px;
            background: var(--color-brand);
            color: #ffffff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.6rem;
            font-weight: 700;
            margin: 0 auto 1rem auto;
            box-shadow: 0 4px 10px rgba(8, 28, 51, 0.2);
        }

        .user-badge-card h3 {
            margin: 0 0 0.25rem 0;
            font-size: 1.15rem;
            color: var(--color-ink);
        }

        .user-tag {
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--color-brand);
            background: var(--color-brand-subtle);
            padding: 0.2rem 0.6rem;
            border-radius: 6px;
        }

        .meta-divider {
            height: 1px;
            background: #e2e8f0;
            margin: 1.25rem 0;
        }

        .meta-list {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .meta-item {
            display: flex;
            justify-content: space-between;
            font-size: 0.85rem;
        }

        .meta-label {
            color: var(--color-ink-soft);
        }

        .meta-value {
            font-weight: 600;
            color: var(--color-ink);
        }

        .security-card {
            background: #ffffff;
            border-radius: 12px;
            padding: 1.5rem;
            border: 1px solid #e2e8f0;
        }

        .security-card h3 {
            font-size: 1rem;
            font-weight: 700;
            color: var(--color-brand);
            margin: 0 0 1rem 0;
        }

        .toggle-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.75rem 0;
            border-bottom: 1px solid #f1f5f9;
        }

        .toggle-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .toggle-info strong {
            display: block;
            font-size: 0.85rem;
            color: var(--color-ink);
        }

        .toggle-info p {
            margin: 0.15rem 0 0 0;
            font-size: 0.75rem;
            color: var(--color-ink-soft);
        }

        /* CSS Switch */
        .switch {
            position: relative;
            display: inline-block;
            width: 42px;
            height: 22px;
            flex-shrink: 0;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0; left: 0; right: 0; bottom: 0;
            background-color: #cbd5e1;
            transition: .3s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: .3s;
            border-radius: 50%;
        }

        input:checked + .slider {
            background-color: var(--color-brand);
        }

        input:checked + .slider:before {
            transform: translateX(20px);
        }
    </style>

@endsection