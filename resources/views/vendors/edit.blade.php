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
                                {!! Form::label('name','Name') !!}
                                {!! Form::text('name',(isset($vendor["name"])?$vendor["name"]:''),['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('email','Email') !!}
                                {!! Form::text('email',(isset($vendor["email"])?$vendor["email"]:''),['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('contact','Contact') !!}
                                {!! Form::text('contact',(isset($vendor["contact"])?$vendor["contact"]:''),['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('address','Address') !!}
                                {!! Form::text('address',(isset($vendor["address"])?$vendor["address"]:''),['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('url','Url') !!}
                                {!! Form::text('url',(isset($vendor["url"])?$vendor["url"]:''),['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('cc_email','CC Email') !!}
                                {!! Form::text('cc_email',(isset($vendor["cc_email"])?$vendor["cc_email"]:''),['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('cancel_email','Cancel Email') !!}
                                {!! Form::text('cancel_email',(isset($vendor["cancel_email"])?$vendor["cancel_email"]:''),['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('shipping','Shipping') !!}
                                {!! Form::text('shipping',(isset($vendor["shipping"])?$vendor["shipping"]:''),['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('use_email','Use Email?') !!}
                                {!! Form::checkbox('use_email',(isset($vendor["use_email"])?'1':'0'),(isset($vendor["use_email"]) && $vendor["use_email"] == 1 ?true:false),['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('send_attachment','Send Attachment?') !!}
                                {!! Form::checkbox('send_attachment',(isset($vendor["send_attachment"])?'1':'0'),(isset($vendor["send_attachment"]) && $vendor["send_attachment"] == 1 ?true:false),['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('active','Active?') !!}
                                {!! Form::checkbox('active',(isset($vendor["active"])?'1':'0'),(isset($vendor["active"]) && $vendor["active"] == 1 ? true:false),['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('set_cron','Set Cron?') !!}
                                {!! Form::checkbox('set_cron',(isset($vendor["set_cron"])?'1':'0'),(isset($vendor["set_cron"]) && $vendor["set_cron"] == 1 ?true:false),['class'=>'form-control']) !!}
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
