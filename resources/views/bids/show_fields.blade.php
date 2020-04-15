<!-- Cargo Id Field -->
<div class="form-group">
    {!! Form::label('cargo_id', 'Cargo Id:') !!}
    <p>{{ $bid->cargo_id }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $bid->user_id }}</p>
</div>

<!-- Driver Id Field -->
<div class="form-group">
    {!! Form::label('driver_id', 'Driver Id:') !!}
    <p>{{ $bid->driver_id }}</p>
</div>

<!-- Bid Status Field -->
<div class="form-group">
    {!! Form::label('bid_status', 'Bid Status:') !!}
    <p>{{ $bid->bid_status }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $bid->status }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $bid->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $bid->updated_at }}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{{ $bid->deleted_at }}</p>
</div>

