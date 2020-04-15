<!-- Cargo Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cargo_id', 'Cargo Id:') !!}
    {!! Form::text('cargo_id', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::text('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Driver Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('driver_id', 'Driver Id:') !!}
    {!! Form::text('driver_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Bid Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bid_status', 'Bid Status:') !!}
    {!! Form::select('bid_status', ['Negociando' => 'Negociando', 'Negado' => ' Negado', 'Aceito' => ' Aceito', 'Em Andamento' => ' Em Andamento', 'Finalizado' => ' Finalizado'], null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('bids.index') }}" class="btn btn-default">Cancel</a>
</div>
