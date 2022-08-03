@extends('layouts.app')

<?php
    /* Call model Usuario*/
    use App\Models\User;
    $users = User::all();
?>

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table>
                <tr>
                    {{-- List all users from Database --}}

                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <td>{{ $user->password }}</td>
                        </tr>
                        <tr>
                            <td>{{ $user->email }}</td>
                        </tr>

                    @endforeach
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
