<!-- Producto Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('producto_id', 'Producto Id:') !!}
    {!! Form::select('producto_id', $productos ], null, ['class' => 'form-control']) !!}
</div>

<!-- Cantidad Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cantidad_total', 'Cantidad Total:') !!}
    {!! Form::text('cantidad_total', null, ['class' => 'form-control']) !!}
</div>

<!-- Cantidad Consumo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cantidad_consumo', 'Cantidad Consumo:') !!}
    {!! Form::text('cantidad_consumo', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('consumirs.index') !!}" class="btn btn-default">Cancel</a>
</div>
