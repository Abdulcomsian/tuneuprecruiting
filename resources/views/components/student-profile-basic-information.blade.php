@props(['user', 'countries', 'programTypes'])
<div class="row">
    <div class="col-md-4">
        <div class="mb-3">
            <x-dynamic-input
                name="first_name"
                value="{{ $user->first_name }}"
                type="text"
                required="{{ true }}"
                placeholder="First name"
                id="first-name"/>
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            <x-dynamic-input
                name="last_name"
                value="{{ $user->last_name }}"
                type="text"
                required="true"
                placeholder="Last Name"
                id="last-name" />
        </div>
    </div>
    <div class="col-sm-4 col-md-4">
        <div class="mb-3">
            <x-dynamic-input
                name="preferred_name"
                value="{{ old('preferred_name', $user->preferred_name) }}"
                type="text"
                required="true"
                id="preferred-name"
                placeholder="Preferred Name" />
        </div>
    </div>
    <div class="col-sm-4 col-md-4">
        <div class="mb-3">
            <x-dynamic-input
                name="email"
                value="{{ $user->email }}"
                type="email"
                disable="true"
                required="true"
                id="email"
                placeholder="Email" />
        </div>
    </div>
    <div class="col-sm-4 col-md-4">
        <div class="mb-3">
            <x-dynamic-input
                name="home_phone_number"
                value="{{ old('home_phone_number', $user->home_phone_number) }}"
                type="text"
                required="true"
                id="home-phone-number"
                placeholder="Home phone number" />
        </div>
    </div>
    <div class="col-sm-4 col-md-4">
        <div class="mb-3">
            <x-dynamic-input
                id="mobile-number"
                name="mobile_number"
                type="text"
                value="{{ old('mobile_number', $user->mobile_number) }}"
                required="true"
                placeholder="Cell Phone Number" />
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            <x-dynamic-input
                id="graduation-year"
                name="graduation_year"
                type="text"
                value="{{ old('graduation_year', $user->graduation_year) }}"
                required="{{ true }}"
                placeholder="Graduation Year" />
        </div>
    </div>
    <div class="col-md-4">
        <x-dynamic-input
            type="date"
            name="birth_date"
            placeholder="Date of Birth"
            value="{{ old('birth_date', $user->birth_date) }}"
            required="{{ true }}"
            id="birth-date" />
    </div>
    <div class="col-sm-4 col-md-4">
        <div class="mb-3">
            @component('components.select-list', [
                    'name' => 'are_u_from_usa',
                    'options' => ['Yes', 'No'],
                    'selected' => ucfirst(old('are_u_from_usa', $user->are_u_from_usa)),
                    'label' => 'Are you from the United State',
                    'id' => 'are-u-from-usa',
                    'required' => true,
                    'arrayKey' => false
                ])
            @endcomponent
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            @component('components.select-type-of-object-array', [
                    'options' => $countries,
                    'selected' => old('country', $user->country),
                    'name' => 'country',
                    'id' => 'country',
                    'label' => 'Country',
                    'required' => true
                ])
            @endcomponent
        </div>
    </div>
    <div class="col-sm-4 col-md-4">
        <div class="mb-3">
            <x-dynamic-input
                id="state"
                name="state"
                value="{{ old('state', $user->state) }}"
                required={{ true }}
                                                type="text"
                placeholder="State/Province" />
        </div>
    </div>
    <div class="col-sm-12 col-md-12">
        <div class="mb-3">
            <x-dynamic-input
                id="primary-address"
                name="primary_address"
                value="{{ old('primary_address', $user->primary_address) }}"
                required={{ true }}
                                                type="text"
                placeholder="Primary Address" />
        </div>
    </div>
    <div class="col-sm-4 col-md-4">
        <div class="mb-3">
            <x-dynamic-input
                id="guardian-name"
                name="guardians_name"
                value="{{ old('guardians_name', $user->guardians_name) }}"
                required={{ true }}
                                                type="text"
                placeholder="Guardian Name" />
        </div>
    </div>
    <div class="col-sm-4 col-md-4">
        <div class="mb-3">
            <x-dynamic-input
                id="guardian-phone-number"
                name="guardians_phone_number"
                value="{{ old('guardians_phone_number', $user->guardians_phone_number) }}"
                required={{ true }}
                                                type="text"
                placeholder="Guardian Phone Number" />
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            @component('components.select-type-of-object-array', [
                    'options' => $programTypes,
                    'selected' => old('program_type', $user->program_type),
                    'name' => 'program_type',
                    'id' => 'program-type',
                    'label' => 'Program Type',
                    'required' => true
                ])
            @endcomponent
        </div>
    </div>
    <div class="col-sm-4 col-md-4">
        <div class="mb-3">
            @component('components.radio-buttons', [
                    'name' => 'gender',
                    'options' => getGenderTypes(),
                    'selected' => ucfirst(old('gender', $user->gender)),
                    'label' => 'Gender',
                    'id' => 'gender',
                    'required' => true
                ])
            @endcomponent
        </div>
    </div>
</div>
