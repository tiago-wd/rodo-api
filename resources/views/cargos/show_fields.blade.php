<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $cargo->name }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $cargo->description }}</p>
</div>

<!-- Weight Field -->
<div class="form-group">
    {!! Form::label('weight', 'Weight:') !!}
    <p>{{ $cargo->weight }}</p>
</div>

<!-- Price Field -->
<div class="form-group">
    {!! Form::label('price', 'Price:') !!}
    <p>{{ $cargo->price }}</p>
</div>

<!-- From Where Field -->
<div class="form-group">
    {!! Form::label('from_where', 'From Where:') !!}
    <p>{{ $cargo->from_where }}</p>
</div>

<!-- To Where Field -->
<div class="form-group">
    {!! Form::label('to_where', 'To Where:') !!}
    <p>{{ $cargo->to_where }}</p>
</div>

<!-- Cargo Type Id Field -->
<div class="form-group">
    {!! Form::label('cargo_type_id', 'Cargo Type Id:') !!}
    <p>{{ $cargo->cargo_type_id }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $cargo->user_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $cargo->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $cargo->updated_at }}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{{ $cargo->deleted_at }}</p>
</div>

