<li class="{{ Request::is('productos*') ? 'active' : '' }}">
    <a href="{!! route('productos.index') !!}"><i class="fa fa-edit"></i><span>Productos</span></a>
</li>

<li class="{{ Request::is('consumirs*') ? 'active' : '' }}">
    <a href="{!! route('consumirs.index') !!}"><i class="fa fa-edit"></i><span>Consumirs</span></a>
</li>

