
<h5>Hello</h5>
@foreach ($users as $user)
    <form action="{{ route('admin.users.update-role') }}" method="post">
    @csrf
    <input type="hidden" name="users[{{ $user->id }}]" value="{{ $user->role }}">

    <select name="users[{{ $user->id }}]">
        <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
        <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
    </select>
    <button type="submit">Update Role</button>
</form>
@endforeach
