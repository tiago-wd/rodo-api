<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Weight Field -->
<div class="form-group col-sm-6">
    {!! Form::label('weight', 'Weight:') !!}
    {!! Form::text('weight', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
</div>

<!-- From Where Field -->
<div class="form-group col-sm-6">
    {!! Form::label('from_where', 'From Where:') !!}
    {!! Form::text('from_where', null, ['class' => 'form-control']) !!}
</div>

<!-- To Where Field -->
<div class="form-group col-sm-6">
    {!! Form::label('to_where', 'To Where:') !!}
    {!! Form::text('to_where', null, ['class' => 'form-control']) !!}
</div>

<!-- Cargo Type Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cargo_type_id', 'Cargo Type Id:') !!}
    {!! Form::text('cargo_type_id', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::text('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('cargos.index') }}" class="btn btn-default">Cancel</a>
</div>
