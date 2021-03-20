@extends('layouts.app')
@include('partials.side-navbar')
@section('content')
<div class="container">
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <table class="table table-hover table-dark">
            <thead>
                <tr class="d-flex">
                    <th scope="row" class="col-1">S.No</th>
                    <th class="col-2">Name</th>
                    <th class="col-6">Address</th>
                    <th class="col-3">Options</th>
                </tr>
            </thead>
            <tbody>
            @php
                $count = 0;
            @endphp
            @foreach ($addresses as $address)
                <tr class="d-flex">
                    <th scope="row" class="col-1">{{ ++$count }}</th>
                    <td class="col-2">{{ $address->name }}</td>
                    <td class="col-6">{{ $address->address }}</td>
                    <td class="col-3">
                        <a href="{{ route('address.show',$address->id) }}" class="btn btn-primary">
                            Show
                        </a>
                        <a href="{{ route('address.edit',$address->id) }}" class="btn btn-success">
                            Edit
                        </a>
                        <form action="{{ route('address.destroy',$address->id) }}" method="POST" class="ml-2 float-right">
                            @csrf
                            @method('DELETE')
                            <button type="submit" title="delete" class="btn btn-danger">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            <a class="btn btn-primary" href="{{ route('address.create') }}">Add New Address</a>
        </div>
    </div>
</div>
@endsection
