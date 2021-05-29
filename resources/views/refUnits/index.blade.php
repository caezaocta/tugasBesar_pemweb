@extends('layouts.base')

@section('title', 'Ref Units')

@section('content')
    <div class="container">
        <div class="row">   
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Is Active</th>git
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                            <th scope="col">Id Unit Parent</th>
                            <th scope="col">Created By</th>
                            <th scope="col">Updated By</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($refUnits as $refUnit)
                            <tr>
                                <th scope="row">{{ $refUnit->id }}</th>
                                <td>{{ $refUnit->nama }}</td>
                                <td>{{ $refUnit->is_active }}</td>
                                <td>{{ $refUnit->created_at }}</td>
                                <td>{{ $refUnit->updated_at }}</td>
                                <td>{{ $refUnit->id_unit_parent }}</td>
                                <td>{{ $refUnit->created_by }}</td>
                                <td>{{ $refUnit->updated_by }}</td>

                                <td><a href="/refunits/{{$refUnit->id}}" class="btn btn-primary">Details</a></td>
                                
                            </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection
