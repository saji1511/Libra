@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {!! Form::open(['url'=>'vendors/store','method'=>'post']) !!}
                @if(isset($vendor["id"]))
                    {!! Form::hidden('id',$vendor["id"]) !!}
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Vendor: @if(isset($vendor["id"])){{$vendor['name']}}@endif</h4>
                    </div>

                    <div class="panel-body">
                        @if($errors->any())
                            <div class="form-group">
                                <ul class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        <li class="list-group-item">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            {!! Form::label('vendor','Vendor') !!}
                            {!! Form::select('vendor',$vendors, null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('manufacturer','Manufacturer') !!}
                            {!! Form::select('manufacturer',$mfgs, null,['class'=>'form-control']) !!}
                        </div>
                    </div>

                    <div class="panel-footer">
                        {!! Form::submit('Save',['class' => 'btn btn-primary form-control'])!!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
