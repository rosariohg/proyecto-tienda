<table class="table table-responsive" id="consumirs-table">
    <thead>
        <th>Producto</th>
        <th>Cantidad Total</th>
        <th>Cantidad Consumo</th>
        <th colspan="3">Opciones</th>
    </thead>
    <tbody>
    @foreach($consumirs as $consumir)
        <tr>
            <td>{!! $consumir->producto->nombre !!}</td>
            <td>{!! $consumir->cantidad_total !!}</td>
            <td>{!! $consumir->cantidad_consumo !!}</td>
            <td>
                {!! Form::open(['route' => ['consumirs.destroy', $consumir->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('consumirs.show', [$consumir->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('consumirs.edit', [$consumir->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('¿Está seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
