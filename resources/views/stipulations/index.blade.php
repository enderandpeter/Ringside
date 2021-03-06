@extends('layouts.app')

@section('header')
    <h1 class="page-title">Stipulations</h1>
@endsection

@section('content')
    <div class="panel panel-bordered panel-primary">
        <div class="panel-heading clearfix">
            <h3 class="panel-title pull-left d-inline-block"><i class="icon fa-gavel"></i>List of Stipulations</h3>
            @can('create', \App\Models\Stipulation::class)
                <div class="panel-actions">
                    <a class="btn btn-default pull-right" href="{{ route('stipulations.create') }}">Create Stipulation</a>
                </div>
            @endcan
        </div>
        <div class="panel-body container-fluid">
            <table class="table table-striped table-bordered datatable" cellspacing="0" width="100%">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                @foreach($stipulations as $stipulation)
                    <tr>
                        <td>{{ $stipulation->id }}</td>
                        <td>{{ $stipulation->name }}</td>
                        <td>{{ $stipulation->slug }}</td>
                        <td>
                            @can('edit-stipulation')
                                <a class="btn btn-sm btn-icon btn-flat btn-default" href="{{ route('stipulations.edit', $stipulation->id) }}" data-toggle="tooltip" data-original-title="Edit">
                                    <i class="icon wb-wrench" aria-hidden="true"></i>
                                </a>
                            @endcan
                            <a class="btn btn-sm btn-icon btn-flat btn-default" href="{{ route('stipulations.show', $stipulation->id) }}" data-toggle="tooltip" data-original-title="Show">
                                <i class="icon wb-eye" aria-hidden="true"></i>
                            </a>
                            <form style="display: inline-block;" action="{{ route('stipulations.destroy', $stipulation->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button style="cursor: pointer" class="btn btn-sm btn-icon btn-flat btn-default" type="submit" data-toggle="tooltip" data-original-title="Delete">
                                    <i class="icon wb-close" aria-hidden="true"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
