<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $transport->name }}</p>
</div>

<!-- Brand Field -->
<div class="form-group">
    {!! Form::label('brand', 'Brand:') !!}
    <p>{{ $transport->brand }}</p>
</div>

<!-- Color Field -->
<div class="form-group">
    {!! Form::label('color', 'Color:') !!}
    <p>{{ $transport->color }}</p>
</div>

<!-- Plate Field -->
<div class="form-group">
    {!! Form::label('plate', 'Plate:') !!}
    <p>{{ $transport->plate }}</p>
</div>

<!-- Transport Type Id Field -->
<div class="form-group">
    {!! Form::label('transport_type_id', 'Transport Type Id:') !!}
    <p>{{ $transport->transport_type_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $transport->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $transport->updated_at }}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{{ $transport->deleted_at }}</p>
</div>

