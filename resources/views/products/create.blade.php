@extends('layouts.loja_info')

@section('content')
@isset($produto)
    <h1>Editar Produto {{ $produto->Name }}</h1>
@else
    <h1>Criar Produto</h1>
@endisset

<div id="createProductBox">
    <form id="createProductForm" method="POST"
        @isset($produto)
            action="{{ route('products.update', $produto->id) }}"
        @else
            action="{{ route('products.store') }}"
        @endisset
    >
        @csrf
        @isset($produto)
            @method('PUT')
        @endisset

        <h1>Nome do Produto</h1>
        <input id="name" name="name" type="text" placeholder="Nome do Produto" value="{{ old('name') !== null ? old('name'] : (isset($produto) ? $produto->Name : '') }}">

        <h1>Descrição</h1>
        <input id="desc" name="desc" type="text" placeholder="Descrição do Produto" value="{{ old('desc') !== null ? old('desc') : (isset($produto) ? $produto->Description : '') }}">

        <h1>Categoria</h1>
        <select name="cat" id="cat">
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}"
                    @if(isset($produto) && old('cat') == null && $produto->category_id == $categoria->id || old('cat') == $categoria->id)
                        selected
                    @endif
                >{{ $categoria->Name }}</option>
            @endforeach
        </select>

        <h1>Valor</h1>
        <input id="cost" name="cost" type="number" placeholder="Valor do Produto" value="{{ old('cost') !== null ? old('cost') : (isset($produto) ? $produto->Cost : '') }}">

        <h1>Imagem</h1>
        <div class="image-upload-box">
            <div class="button" id="uploadWidgetBtn">
                Escolher Imagem
            </div>
        </div>
        <input type="hidden" id="img" name="img" value="{{ old('img') !== null ? old('img') : (isset($produto) ? $produto->img : '') }}" required>
    </form>

    <div id="editProductImage">
        <p><img alt="pré-visualização da imagem do produto."
            @isset($produto)
                src="{{ $produto->img }}"
            @endisset
        ></p>
    </div>

    <div class="createProductButtons">
        <a href="{{ route('products.index') }}">
            <div class="button">
                Voltar
            </div>
        </a>
        <div class="button" onclick="submitForm('createProductForm')">
            Gravar
        </div>
    </div>

    @if(count($errors) > 0)
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif
</div>

@push('scripts')
<script src="https://upload-widget.cloudinary.com/global/all.js" type="text/javascript"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const cloudName = "{{ env('CLOUDINARY_CLOUD_NAME') }}";
    const uploadPreset = 'lojainfo_preset';

    if (!cloudName || cloudName === '') {
        console.error("ERRO CRÍTICO: O CLOUDINARY_CLOUD_NAME está vazio no .env!");
        alert("Erro de configuração: Verifica se CLOUDINARY_CLOUD_NAME está definido no ficheiro .env");
        return;
    }

    const myWidget = cloudinary.createUploadWidget({
        cloudName: cloudName,
        uploadPreset: uploadPreset,
        sources: ['local', 'url'],
        multiple: false,
        maxFiles: 1,
        cropping: false,
        showAdvancedOptions: false
    }, function (error, result) {
        if (!error && result && result.event === "success") {
            document.getElementById('img').value = result.info.secure_url;
            let divPreview = document.getElementById('editProductImage');
            divPreview.querySelector('img').src = result.info.secure_url;
        }

        if (error) {
            console.error("Erro no upload:", error);
            alert("Erro ao fazer upload: " + error.message);
        }
    });

    const btn = document.getElementById('uploadWidgetBtn');
    if (btn) {
        btn.addEventListener('click', function() {
            myWidget.open();
        });
    }
});
</script>
@endpush
@endsection
