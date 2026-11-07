@extends('layouts.loja_info')

@section('content')
<h1>As minhas Compras</h1>

<div id="salesBox">
    @foreach ($compras as $compra)
        <div class="userSale">
            <div class="userSaleDate">
                <h3>{{ $compra->date }}</h3>
            </div>
            <div class="userSaleProductName">
                <h3>{{ $compra->product->Name }}</h3>
            </div>
            <div class="userSaleProductImg">
                <img src="{{ $compra->product->img }}">
            </div>
            <div class="userSaleProductCost">
                <h3>€ {{ $compra->product->Cost }}</h3>
            </div>
        </div>
    @endforeach
</div>
@endsection
