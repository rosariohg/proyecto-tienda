<!-- Id Field -->
<!--<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $consumir->id !!}</p>
</div>-->

<!-- Producto Id Field -->
<div class="form-group">
    {!! Form::label('producto_id', 'Producto Id:') !!}
    <p>{!! $consumir->producto->nombre !!}</p>
</div>

<!-- Cantidad Total Field -->
<div class="form-group">
    {!! Form::label('cantidad_total', 'Cantidad Total:') !!}
    <p>{!! $consumir->cantidad_total !!}</p>
</div>

<!-- Cantidad Consumo Field -->
<div class="form-group">
    {!! Form::label('cantidad_consumo', 'Cantidad Consumo:') !!}
    <p>{!! $consumir->cantidad_consumo !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Creado:') !!}
    <p>{!! $consumir->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Actualizado:') !!}
    <p>{!! $consumir->updated_at !!}</p>
</div>
