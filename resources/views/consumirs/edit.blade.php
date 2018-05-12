@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Consumir
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($consumir, ['route' => ['consumirs.update', $consumir->id], 'method' => 'patch']) !!}

                        @include('consumirs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection