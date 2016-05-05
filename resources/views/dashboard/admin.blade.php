@extends('layout')
@section('content')

<center><h1>ADMIN PANEL</h1> </center>
<div class="container">
</br>
                <div style="height: 800px; overflow: auto">
                    <table class="table" id="table" >
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Name</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>

                                <form action="/admin" method="post">
                                  {{ csrf_field() }}
                                  <input type="hidden" name="user_id" value="{{$user->id}}">
                                  <td><button>Delete User</button></td>
                                </form>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
</div>

@endsection
