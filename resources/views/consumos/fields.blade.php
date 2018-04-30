<!-- Consumo Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('consumo_id', 'Código:') !!}
    {!! Form::text('consumo_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Cantidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cantidad', 'Cantidad:') !!}
    {!! Form::text('cantidad', null, ['class' => 'form-control']) !!}
</div>

<!-- Preciounitario Field -->
<div class="form-group col-sm-6">
    {!! Form::label('precioUnitario', 'Preciounitario:') !!}
    {!! Form::text('precioUnitario', null, ['class' => 'form-control']) !!}
</div>

<!-- Preciototal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('precioTotal', 'Preciototal:') !!}
    {!! Form::text('precioTotal', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('consumos.index') !!}" class="btn btn-default">Cancelar</a>
</div>
