@extends('template')

@section('content')
<div class="row">
    <div class="col-md-8 off-2 p-4">
        <!-- Modal -->
        <div class="modal fade" id="cropModal" tabindex="-1" role="dialog" aria-labelledby="cropModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Recortar imagem</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ $data['imagem'] }}" alt="" id="crop">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </div>
        </div>
        <form action="{{ route('crops.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <img src="{{ $data['imagem'] }}" alt="">
            <input type="hidden" name="img_bckp" src="{{ $data['imagem'] }}" alt="">
            <div class="form-group">
                <label for="image">Imagem</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <button type="submit" class="btn btn-secondary">Enviar</button>
        </form>
        <input type="hidden" name="modal" id="modal" value="{{ $data['model'] }}">
        {{-- <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Launch demo modal
        </button> --}}
    </div>

    
</div>
@endsection
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-jcrop/2.0.4/css/Jcrop.css">
@endpush
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-jcrop/2.0.4/js/Jcrop.js"></script>
    <script>
        var model;
        if($('#modal').val() == 'true'){
            model = true;
        }
        else{
            model = false;
        }

        $(document).ready(function() {
            $('#crop').Jcrop({
                aspectRatio: 1,
                onSelect: atualizaCoordenadas
            })

            $('#cropModal').modal({show: model})
        })

        function atualizaCoordenadas(c)
        {
            $('#x').val(c.x);
            $('#y').val(c.y);
            $('#w').val(c.w);
            $('#h').val(c.h);
        }

        function checkCoords(){
            if(parseInt($('#w').val())) return true;
            alert('Selecione a área da imagem');
            return false;
        }
    </script>
@endpush
