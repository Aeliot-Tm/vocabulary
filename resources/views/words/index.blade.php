@extends('layouts.dashboard')

@section('page-header')Words @endsection
@section('body-class')words @endsection

@section('content')

    @include('partials.errors')

    <div id="words" class="words-list"></div>

    <script type="text/javascript">
            {{-- TODO load wordas by request --}}
        var _words = {!! json_encode( $words->all() ) !!};
    </script>
@endsection

@section('js-template')
    @include('words.words-tpl')
@endsection
