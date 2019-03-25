@extends('template')

@section('content')
    <div class="row">
        <div class="col-md-8 off-2 p-4">
            <div class="card">
                <div class="card-header">
                    <h1>Add Event To Calendar</h1>
                </div>

                <div class="card-body">
                    <h1>Task: Add Data</h1>
                    <form action="{{ route('events.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="title">Título</label>
                            <input type="text" name="title" id="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="color">Cor</label>
                            <input type="color" name="color" id="color" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="start_date">Início</label>
                            <input type="datetime-local" name="start_date" id="start_date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="end_date">fim</label>
                            <input type="datetime-local" name="end_date" id="end_date" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Adicionar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('css')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
@endpush
@push('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
@endpush
