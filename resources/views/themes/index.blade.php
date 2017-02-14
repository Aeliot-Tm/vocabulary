@extends('layouts.dashboard')

@section('page-header')Themes @endsection
@section('body-class')themes @endsection

@section('content')

    @include('partials.errors')

    <table class="table">
        <thead>
        <tr>
            <th class="title">Title</th>
            <th class="actions">Actions</th>
        </tr>
        </thead>
        <tbody class="themes-tbody">
        @foreach($themes as $theme)
            <tr>
                <td class="title">{{ $theme->title }}</td>
                <td class="actions">
                    <a href="{{ route('theme-words', ['themeId' => $theme->id], false) }}"
                       class="btn btn-xs btn-info">Words</a>
                    <button type="button" class="btn btn-xs btn-danger js-theme-delete">Delete</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="theme-add-bl">
        <button type="button" class="btn btn-primary js-theme-add">Add</button>

        <form action="{{ route('theme-new', [], false) }}" method="POST" role="form"
              class="form-horizontal theme-add-form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="col-md-10">
                <div class="form-group row">
                    <label class="col-md-2 control-label" for="theme-new-title">Title</label>
                    <div class="col-md-10">
                        <input type="text" name="title" id="theme-new-title" class="form-control" value="">
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('js-template')
    @include('themes.theme-row-tpl')
@endsection
