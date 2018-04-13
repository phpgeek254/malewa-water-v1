<table class="striped responsive-table">
    <tr>
        <th>Name</th>
        <th>Phone </th>
        <th colspan="3" class="center noPrint"> Options</th>
    </tr>
    @forelse ($users as $user)
        <tr>
            <td>{{strtoupper($user->name)}}</td>
            <td>+254 - {{$user->phone_number}}</td>
            <td class="noPrint"><a href="{{ route('users.show', ['id'=>$user->id]) }}" class='btn-flat blue-text'>
            <i class="fa fa-folder-open blue-text"></i></a></td>
            <td class="noPrint">
                <a href="#edit_user_{{ $user->id }}" class='btn-flat blue-text'> 
            <i class="fa fa-pencil blue-text"></i>
            </a>
            </td>
            <td class="noPrint"><a href="#delete_user_{{ $user->id }}" class='btn-flat blue-text'>
                    <i class="fa fa-trash red-text"></i>
                </a></td>
        </tr>
    @empty
        <p class="center">There no users in the system </p>
    @endforelse
</table>

@forelse ($users as $user)
    @include('auth.delete_user')
    @include('auth.edit')
    @empty
@endforelse

