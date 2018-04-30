<table class="table table-responsive" id="productos-table">
    <thead>
        <th>Nombre</th>
        <th>Codigo</th>
        <th>Cantidad</th>
        <th>Precio</th>
        <th>Imagen</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($productos as $producto)
        <tr>
            <td>{!! $producto->nombre !!}</td>
            <td>{!! $producto->codigo !!}</td>
            <td>{!! $producto->cantidad !!}</td>
            <td>{!! $producto->precio !!}</td>
            <td><img style="width: 75px" src="{!! $producto->imagen !!}"></td>
            <td>
                {!! Form::open(['route' => ['productos.destroy', $producto->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('productos.show', [$producto->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('productos.edit', [$producto->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('¿Estas seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>