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
                    {{$user = Auth::user();
                    }}
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
