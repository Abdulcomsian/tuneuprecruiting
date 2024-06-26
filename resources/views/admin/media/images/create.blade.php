<x-app-layout>
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6 ps-0">
                        <h3>Add new Image</h3>
                    </div>
                    <div class="col-sm-6 pe-0">
                        <ol class="breadcrumb">
                            {!! generateBreadcrumbs(['Add new Image']) !!}
                        </ol>
                    </div>
                </div>
            </div>
        </div>
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

                            @if (session('success') || session('danger'))
                                @php $className = (session('success')) ? 'success' : 'danger'; @endphp
                                @php $message = (session('success')) ? session('success') : session('danger'); @endphp
                                <div class="alert alert-{{ $className }}">
                                    {{ $message }}
                                </div>
                            @endif
                            <form method="POST" id="frm-media" action="{{ route('medias.images-store') }}"
                                class="row g-3" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                    <x-dynamic-input id="image" type="file" name="media_image"
                                        value="{{ old('image') }}" placeholder="Upload Image" required="true" />
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-primary float-end mt-3" id="btn-form-add"
                                        type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive theme-scrollbar">
                                <table class="display" id="data-table">
                                    <thead>
                                        <tr>
                                            <th scope="col">image</th>
                                            <th scope="col">URL</th>
                                            <th scope="col"><x-list-view-action-heading /></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($images as $image)
                                            <tr class="border-bottom-secondary">
                                                <td>
                                                    <a href="{{ asset($image->path) }}" target="_blank">
                                                        <img src="{{ asset($image->path) }}" alt="Image URL"
                                                            width="300" height="300">
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);" onclick="copyToClipboard(this)"
                                                        data-link="{{ $image->link }}"
                                                        style="font-weight:bold; text-transform: capitalize;">Copy
                                                        Link</a>
                                                    <span class="copy-notification"
                                                        style="display: none; color: green; margin-left: 10px;">Copied</span>
                                                </td>
                                                <td>
                                                    <ul class="action">
                                                        <li class="edit"><a
                                                                href="{{ route('medias.images-show', $image->id) }}"><i
                                                                    class="icofont icofont-eye-alt"></i></a></li>
                                                        <li class="delete">
                                                            <form method="POST"
                                                                action="{{ route('medias.images-destroy', $image->id) }}"
                                                                onsubmit='return confirm("Are you sure?")'>
                                                                @csrf
                                                                @method('DELETE')
                                                                <a href="#"
                                                                    onclick="$(this).closest('form').submit();"><i
                                                                        class="fa fa-trash"></i></a>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
