<li class="{{ Request::is('productos*') ? 'active' : '' }}">
    <a href="{!! route('productos.index') !!}"><i class="fa fa-edit"></i><span>Productos</span></a>
</li>

<li class="{{ Request::is('consumos*') ? 'active' : '' }}">
    <a href="{!! route('consumos.index') !!}"><i class="fa fa-edit"></i><span>Consumos</span></a>
</li>

