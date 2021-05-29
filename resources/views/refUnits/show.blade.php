@extends('layouts.base')

@section('title', 'Show')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card" style="width: 20rem;">

                    <h5 class="card-title">{{ $refUnit->nama }}</h5>
                    <ul>
                        <li>
                            <p class="card-text">Is Active{{ $refUnit->is_active }}</p>
                        </li>
                        <li>
                            <p class="card-text">Created At{{ $refUnit->created_at }}</p>
                        </li>
                        <li>
                            <p class="card-text">Updated At{{ $refUnit->updated_at }}</p>
                        </li>
                        <li>
                            <p class="card-text">Id Unit Parent{{ $refUnit->id_unit_parent }}</p>
                        </li>
                        <li>
                            <p class="card-text">Created By{{ $refUnit->created_by }}</p>
                        </li>
                        <li>
                            <p class="card-text">Updated By{{ $refUnit->updated_by }}</p>
                        </li>
                    </ul>

                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>

        </div>
    </div>
    </div>

@endsection
