@extends('template')

@section('content')
    <div class="row">
        <div class="col-md-8 off-2 p-4">
            <div class="card">
                <div class="card-header">
                    <h1>FullCalendar</h1>
                </div>

                <div class="card-body">
                    {!! $calendar->calendar() !!}

                </div>
                <div class="card-footer">
                    <a href="{{ route('events.create') }}" class="btn btn-primary">Adicionar</a>
                </div>
            </div>
            @if(Session::has('success'))
                <div class="alert alert-success">
                    <span>{{ Session::get('success') }}</span>
                </div>
            @endif
        </div>
    </div>

@endsection
@push('css')
    {{-- <link rel=<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>"stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.css"> --}}
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
@endpush
@push('scripts')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.js"></script> --}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    {!! $calendar->script() !!}
@endpush
