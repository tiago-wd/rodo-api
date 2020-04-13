<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{{ route('users.index') }}"><i class="fa fa-edit"></i><span>Users</span></a>
</li>

<li class="{{ Request::is('transportTypes*') ? 'active' : '' }}">
    <a href="{{ route('transportTypes.index') }}"><i class="fa fa-edit"></i><span>Transport Types</span></a>
</li>

<li class="{{ Request::is('transports*') ? 'active' : '' }}">
    <a href="{{ route('transports.index') }}"><i class="fa fa-edit"></i><span>Transports</span></a>
</li>

<li class="{{ Request::is('cargoTypes*') ? 'active' : '' }}">
    <a href="{{ route('cargoTypes.index') }}"><i class="fa fa-edit"></i><span>Cargo Types</span></a>
</li>

