<div class="table-responsive">
    <table class="table" id="cargos-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Description</th>
        <th>Weight</th>
        <th>Price</th>
        <th>From Where</th>
        <th>To Where</th>
        <th>Cargo Type Id</th>
        <th>User Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($cargos as $cargo)
            <tr>
                <td>{{ $cargo->name }}</td>
            <td>{{ $cargo->description }}</td>
            <td>{{ $cargo->weight }}</td>
            <td>{{ $cargo->price }}</td>
            <td>{{ $cargo->from_where }}</td>
            <td>{{ $cargo->to_where }}</td>
            <td>{{ $cargo->cargo_type_id }}</td>
            <td>{{ $cargo->user_id }}</td>
                <td>
                    {!! Form::open(['route' => ['cargos.destroy', $cargo->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('cargos.show', [$cargo->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('cargos.edit', [$cargo->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
