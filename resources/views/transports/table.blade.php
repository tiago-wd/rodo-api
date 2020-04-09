<div class="table-responsive">
    <table class="table" id="transports-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Brand</th>
        <th>Color</th>
        <th>Plate</th>
        <th>Transport Type Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($transports as $transport)
            <tr>
                <td>{{ $transport->name }}</td>
            <td>{{ $transport->brand }}</td>
            <td>{{ $transport->color }}</td>
            <td>{{ $transport->plate }}</td>
            <td>{{ $transport->transport_type_id }}</td>
                <td>
                    {!! Form::open(['route' => ['transports.destroy', $transport->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('transports.show', [$transport->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('transports.edit', [$transport->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
