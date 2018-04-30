<table class="table table-responsive" id="consumos-table">
    <thead>
        <th>Consumo Id</th>
        <th>Descripcion</th>
        <th>Cantidad</th>
        <th>Preciounitario</th>
        <th>Preciototal</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($consumos as $consumo)
        <tr>
            <td>{!! $consumo->consumo_id !!}</td>
            <td>{!! $consumo->descripcion !!}</td>
            <td>{!! $consumo->cantidad !!}</td>
            <td>{!! $consumo->precioUnitario !!}</td>
            <td>{!! $consumo->precioTotal !!}</td>
            <td>
                {!! Form::open(['route' => ['consumos.destroy', $consumo->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('consumos.show', [$consumo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('consumos.edit', [$consumo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('¿Estás seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>