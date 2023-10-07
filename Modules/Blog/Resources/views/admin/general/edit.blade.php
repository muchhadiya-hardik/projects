@extends(config('blog.defaultLayout'))
@section('title', 'Edit '. $module_name)
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        @if(isset($module_name))
        <h2>{{ $module_name }}</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url(config('blog.routePrefix')) }}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>Edit {{ $module_name }}</a>
            </li>
        </ol>
        @endif
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    @if(isset($module_name))
                    <h5>Edit {{ $module_name }}</h5>
                    @endif
                </div>
                <div class="ibox-content">
                    <form class='form-horizontal' method="POST" id="blog-edit" action="{{ $module_route.'/'.$result['id'] }}"
                        enctype="multipart/form-data">
                        @csrf
                        <input name="_method" type="hidden" value="PUT">
                        @include("blog::admin.$module_view._form")
                        <div class="text-end">
                            <a href="{{ $module_route }}" class="btn btn-white btn-sm">Cancel</a>
                            <button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-check"></i>
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script type="module">
        $("#blog-edit").validate()
    </script>
@endpush
