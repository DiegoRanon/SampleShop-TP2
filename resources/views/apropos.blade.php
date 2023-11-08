@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>@lang('messages.about_title')</h1>

            <h2>@lang('messages.name')</h2>
            <br></br>
            <h2>@lang('messages.course')</h2>
            <br></br>
            <h2>@lang('messages.typical_steps')</h2>
            <p>
                <strong>@lang('messages.step_1'):</strong>
                <br>
                <strong>@lang('messages.step_2'):</strong>
                <br>
                <strong>@lang('messages.step_3'):</strong>
                <br>
                <strong>@lang('messages.step_4'):</strong>
                <br>
                <strong>@lang('messages.step_5'):</strong>
                <br>
                <strong>@lang('messages.expected_result'):</strong> 
                <br>
            </p>

            <h2>@lang('messages.database_diagram')</h2>
            <img src="{{ asset('images/BaseDeDonneesLaravel.png') }}" alt="Diagramme de la base de données">

            <h2>@lang('messages.inspiring_links')</h2>
            <p>@lang('messages.inspiration_website')</p>
            <ul>
                <li><a href="https://www.looperman.com/" target="_blank">Looperman</a></li>
                <li><a href="https://www.beatstars.com/" target="_blank">Beatstars</a></li>
            </ul>
        </div>
    </div>
</div>
@endsection

