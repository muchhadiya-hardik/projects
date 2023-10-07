@extends('front.layouts.app')
@section('title', 'Dashbord')
@push("style")
<style>

</style>
@endpush
@section('content')
    <h2>ddd</h2>
    @foreach($images as $image)
        <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $image->title }}">
    @endforeach
@endsection
@push('script')
    <script type="module">
        console.log("ddd");
    </script>
@endpush
