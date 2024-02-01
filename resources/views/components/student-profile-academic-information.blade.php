@props(['user'])
<div class="row mb-3">
    <div class="col-sm-4 col-md-4">
        <div class="mb-3">
            <x-dynamic-input
                id="high-school-name"
                name="high_school_name"
                value="{{ old('high_school_name', $user->high_school_name) }}"
                type="text"
                placeholder="High school name..." />
        </div>
    </div>
    <div class="col-sm-4 col-md-4">
        <div class="mb-3">
            @component('components.select-list', [
                    'name' => 'registered_with_ncaa',
                    'options' => ['Yes', 'No'],
                    'selected' => ucfirst(old('registered_with_ncaa', $user->registered_with_ncaa)),
                    'label' => 'Registered With NCAA',
                    'id' => 'registered-with-ncaa',
                    'arrayKey' => false
                ])
            @endcomponent
        </div>
    </div>
    <div class="col-sm-4 col-md-4">
        <div class="mb-3">
            <x-dynamic-input
                id="ncaa-id"
                name="ncaa_id"
                value="{{ old('ncaa_id', $user->ncaa_id) }}"
                placeholder="NCAA ID"
                type="text" />
        </div>
    </div>
    <div class="col-md-4">
        <x-dynamic-input
            type="text"
            name="gpa"
            placeholder="GPA"
            value="{{ old('gpa', $user->gpa) }}"
            id="gpa" />
    </div>
    <div class="col-sm-4 col-md-4">
        <div class="mb-3">
            <x-dynamic-input
                id="sat-test-date"
                name="sat_test_date"
                value="{{ old('sat_test_date', $user->sat_test_date) }}"
                placeholder="SAT Test Date"
                type="date" />
        </div>
    </div>
    <div class="col-sm-4 col-md-4">
        <div class="mb-3">
            <x-dynamic-input
                id="sat-reading"
                name="sat_reading"
                value="{{ old('sat_reading', $user->sat_reading) }}"
                placeholder="SAT Reading"
                type="text" />
        </div>
    </div>
    <div class="col-sm-4 col-md-4">
        <div class="mb-3">
            <x-dynamic-input
                id="sat-writing"
                name="sat_writing"
                value="{{ old('sat_writing', $user->sat_writing) }}"
                placeholder="SAT Writing"
                type="text" />
        </div>
    </div>
    <div class="col-sm-4 col-md-4">
        <div class="mb-3">
            <x-dynamic-input
                id="sat-math"
                name="sat_math"
                value="{{ old('sat_math', $user->sat_math) }}"
                placeholder="SAT Math"
                type="text" />
        </div>
    </div>
    <div class="col-sm-4 col-md-4">
        <div class="mb-3">
            <x-dynamic-input
                id="sat-total"
                name="sat_total"
                value="{{ old('sat_total', $user->sat_total) }}"
                placeholder="SAT Total"
                type="text" />
        </div>
    </div>
    <div class="col-sm-4 col-md-4">
        <div class="mb-3">
            <x-dynamic-input
                id="act-test-date"
                name="act_test_date"
                value="{{ old('act_test_date', $user->act_test_date) }}"
                placeholder="ACT Test Date"
                type="date" />
        </div>
    </div>
    <div class="col-sm-4 col-md-4">
        <div class="mb-3">
            <x-dynamic-input
                id="act-sum-score"
                name="act_sum_score"
                value="{{ old('act_sum_score', $user->act_sum_score) }}"
                placeholder="ACT SUM Score"
                type="text" />
        </div>
    </div>
    <div class="col-sm-4 col-md-4">
        <div class="mb-3">
            <x-dynamic-input
                id="act-composite"
                name="act_composite"
                value="{{ old('act_composite', $user->act_composite) }}"
                placeholder="ACT Composite"
                type="text" />
        </div>
    </div>
    <div class="col-sm-4 col-md-4">
        <div class="mb-3">
            <x-dynamic-input
                id="act-english"
                name="act_english"
                value="{{ old('act_english', $user->act_english) }}"
                placeholder="ACT English"
                type="text" />
        </div>
    </div>
    <div class="col-sm-4 col-md-4">
        <div class="mb-3">
            <x-dynamic-input
                id="act-math"
                name="act_math"
                value="{{ old('act_math', $user->act_math) }}"
                placeholder="ACT Math"
                type="text" />
        </div>
    </div>
    <div class="col-sm-4 col-md-4">
        <div class="mb-3">
            <x-dynamic-input
                id="act-reading"
                name="act_reading"
                value="{{ old('act_total', $user->act_total) }}"
                placeholder="ACT Total"
                type="text" />
        </div>
    </div>
    <div class="col-sm-4 col-md-4">
        <div class="mb-3">
            <x-dynamic-input
                id="act-science"
                name="act_science"
                value="{{ old('act_total', $user->act_total) }}"
                placeholder="ACT Science"
                type="text" />
        </div>
    </div>
    <div class="col-sm-4 col-md-4">
        <div class="mb-3">
            <x-dynamic-input name="transcript" type="file" placeholder="Transcript" />
        </div>
    </div>
</div>
