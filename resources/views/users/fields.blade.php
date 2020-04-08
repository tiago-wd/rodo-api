<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Verified At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email_verified_at', 'Email Verified At:') !!}
    {!! Form::text('email_verified_at', null, ['class' => 'form-control','id'=>'email_verified_at']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#email_verified_at').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Fone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fone', 'Fone:') !!}
    {!! Form::text('fone', null, ['class' => 'form-control']) !!}
</div>

<!-- Transport Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('transport_id', 'Transport Id:') !!}
    {!! Form::text('transport_id', null, ['class' => 'form-control']) !!}
</div>

<!-- CNH Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cnh', 'CNH:') !!}
    {!! Form::text('cnh', null, ['class' => 'form-control']) !!}
</div>

<!-- Identidade Field -->
<div class="form-group col-sm-6">
    {!! Form::label('identity_number', 'Identidade:') !!}
    {!! Form::text('identity_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Fone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fone', 'Fone:') !!}
    {!! Form::text('fone', null, ['class' => 'form-control']) !!}
</div>

<!-- Active Field -->
<div class="form-group col-sm-6">
    {!! Form::label('active', 'Active:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('active', 0) !!}
        {!! Form::checkbox('active', '1', null) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('users.index') }}" class="btn btn-default">Cancel</a>
</div>
