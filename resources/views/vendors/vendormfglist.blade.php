@extends('layouts.layout')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading"><h4>Manufacturers for this Vendor</h4></div>

				<div class="panel-body">
					<table id="table">
					</table>
				</div>
				<script type="text/javascript">
    				$('#table').bootstrapTable({
    	                method: 'get',
    	                url: '/vendormfgslist/{{$id}}',
    	                cache: false,
    	                height: 400,
    	                striped: true,
    	                pagination: true,
    	                pageSize: 50,
    	                pageList: [10, 25, 50, 100, 200],
    	                search: true,
    	                showColumns: true,
    	                showRefresh: true,
    	                minimumCountColumns: 2,
    	                clickToSelect: true,
    	                columns: [{
    	                    field: 'id',
    	                    title: 'MFG Id',
    	                    align: 'right',
    	                    sortable: true,
                            formatter: function(value,row){
                                return '<a href="'+value+'">'+value+'</a>';
                            }
    	                }, {
    	                    field: 'name',
    	                    title: 'MFG  Name',
    	                    align: 'center',
    	                    sortable: true,
                            formatter: function(value,row){
                                return '<a href="'+row.id+'">'+value+'</a>';
                            }
    	                }, {
    	                    field: 'cnt',
    	                    title: 'Total Products',
    	                    align: 'center',
    	                    sortable: true,
                            formatter: function(value,row){
                                return '<a href="/vmproducts/'+row.id+'">'+value+'</a>';
                            }
    	                }]
    	            });
				</script>
				<div class="panel-footer">
                    {!! Form::open(['url'=>'vendorsmfg/create','method'=>'get']) !!}
                        {!! Form::submit('Link New MFG',['class' => 'btn btn-primary form-control'])!!}
                    {!! Form::close() !!}
                </div>
			</div>
		</div>
	</div>
</div>
@endsection
