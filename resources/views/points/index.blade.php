@extends('layouts.master')
@section('title')
{{env('APP_NAME')}} | Points
@endsection
@section('module')
<div class="btn-group float-right m-t-15">
  @if($privileges['Add']=='true') 
  {{ link_to_route('points.create','Add Point',null, array('class' => 'btn btn-info')) }}
  @endif
</div>
Points
@endsection
@section('content')
@include('components.message')
    <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Points</th>
                                    @if($privileges['Edit']=='true')
                                    <th>Actions</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($points as $point)
                                <tr>
                                    <td>{{$point->date}}</td>
                                    <td>{{$point->name}}</td>
                                    <td>{{$point->points}}</td>
                                    @if($privileges['Edit']=='true')
                                    <td>
                                        <a href="{{env('APP_URL')}}/points/{{$point->id}}/edit" style="cursor: pointer;font-size: x-large;">
                                        <i class="ion-compose"></i></a>
                                        </td>
                                        @endif
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

@endsection