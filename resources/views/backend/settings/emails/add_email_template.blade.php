<x-app-layout>
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6 ps-0">
                        <h3>Total Applications</h3>
                    </div>
                    <div class="col-sm-6 pe-0">
                        <ol class="breadcrumb">
                            {!! generateBreadcrumbs(["Total Applications"]) !!}
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid basic_table">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if(session('success') || session('danger'))
                                @php $className = (session('success')) ? 'success' : 'danger'; @endphp
                                @php $message = (session('success')) ? session('success') : session('danger'); @endphp
                                <div class="alert alert-{{ $className }}">
                                    {{ $message }}
                                </div>
                            @endif
                                @if(isset($template))
                                    <form action="{{ route('template.update', $template->id) }}" method="post">
                                    <input type="hidden" name="_method" value="PUT" id="route-method">
                                @else
                                    <form action="{{ route('template.store') }}" method="post">
                                @endif
                                @csrf
                                <div class="row">
                                    <div class="col-sm-4">
                                        <x-dynamic-input
                                            type="text"
                                            name="subject"
                                            value="{{ old('subject', $template->subject ?? '') }}"
                                            placeholder="Subject"
                                            required="{{ true }}"
                                            id="subject" />
                                    </div>
                                    <div class="col-sm-4">
                                        @component('components.select-list', [
                                            'name' => 'template_for',
                                            'options' => getEmailTemplateTypes(),
                                            'selected' => ucfirst(old('template_for', $template->template_for ?? '')),
                                            'label' => 'Template For',
                                            'id' => 'template-for',
                                            'arrayKey' => false,
                                            'required' => true
                                        ])
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-4">
                                        @component('components.select-list', [
                                            'name' => 'status',
                                            'options' => ['Active', 'Disable'],
                                            'selected' => ucfirst(old('status', $template->status ?? '')),
                                            'label' => 'Status',
                                            'id' => 'status',
                                            'arrayKey' => false,
                                            'required' => true
                                        ])
                                        @endcomponent
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-sm-12">
                                        <p>If you require a dynamic value, you can simply copy and paste the name enclosed in brackets.</p>
                                        @foreach($tableColumns as $column)
                                            <span id="{{ $column }}" class="btn-default btn-clipboard"
                                                  type="button"
                                                  data-clipboard-action="copy"
                                                  data-clipboard-target="#{{ $column }}">[{{ $column }}]</span>
                                            <a
                                                class="btn-default btn-clipboard"
                                                type="button"
                                                data-clipboard-action="copy"
                                                data-clipboard-target="#{{ $column }}">
                                                <i class="fa fa-copy"></i>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-sm-12">
                                        <textarea id="editor1" name="body" cols="30" rows="10">{{ old('body', $template->body ?? '') }}</textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-12">
                                        <button class="btn btn-primary float-end">{{ isset($template) ? 'Update' : 'Save' }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
</x-app-layout>
