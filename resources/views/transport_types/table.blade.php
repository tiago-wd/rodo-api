<div class="table-responsive">
    <table class="table" id="transportTypes-table">
        <thead>
            <tr>
                <th>Name</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($transportTypes as $transportType)
            <tr>
                <td>{{ $transportType->name }}</td>
                <td>
                    {!! Form::open(['route' => ['transportTypes.destroy', $transportType->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('transportTypes.show', [$transportType->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('transportTypes.edit', [$transportType->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
