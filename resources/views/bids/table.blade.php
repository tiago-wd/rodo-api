<div class="table-responsive">
    <table class="table" id="bids-table">
        <thead>
            <tr>
                <th>Cargo Id</th>
        <th>User Id</th>
        <th>Driver Id</th>
        <th>Bid Status</th>
        <th>Status</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($bids as $bid)
            <tr>
                <td>{{ $bid->cargo_id }}</td>
            <td>{{ $bid->user_id }}</td>
            <td>{{ $bid->driver_id }}</td>
            <td>{{ $bid->bid_status }}</td>
            <td>{{ $bid->status }}</td>
                <td>
                    {!! Form::open(['route' => ['bids.destroy', $bid->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('bids.show', [$bid->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('bids.edit', [$bid->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
