@extends('main')

@section('content')
<br>
        <table class="table" style="background-color: #FFFDE3">
            <thead>
              <tr>
                <th scope="col-md-1 text-white">No</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Created</th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
              <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->nama }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ \Carbon\Carbon::parse($user['created_at'])->format('j F, Y') }}</td>
                {{-- <td>{{ \Carbon\Carbon::parse($user['updated_at'])->format('j F, Y') }}</td> --}}
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
</div>
@endsection