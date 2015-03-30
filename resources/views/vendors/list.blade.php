@extends('layouts.layout')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading"><h4>Vendors</h4></div>

				<div class="panel-body">
					<table id="table">
					</table>
				</div>
				<script type="text/javascript">
    				$('#table').bootstrapTable({
    	                method: 'get',
    	                url: '/vendors/list',
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
    	                    title: 'VendorID',
    	                    align: 'right',
    	                    sortable: true,
                            formatter: function(value,row){
                                return '<a href="/vendors/edit/'+value+'">'+value+'</a>';
                            }
    	                }, {
    	                    field: 'name',
    	                    title: 'Vendor Name',
    	                    align: 'center',
    	                    sortable: true,
                            formatter: function(value,row){
                                return '<a href="/vendors/edit/'+row.id+'">'+value+'</a>';
                            }
    	                }, {
    	                    field: 'email',
    	                    title: 'Email',
    	                    align: 'center',
    	                    sortable: true,
                            formatter: function(value,row){
                                return '<a href="/vendors/edit/'+row.id+'">'+value+'</a>';
                            }
    	                }, {
                            title: 'Products',
                            align: 'center',
                            sortable: true,
                            formatter: function(value,row){
                                return '<a href="/vendors/products/'+row.id+'">Products</a>';
                            }
                        }, {
                            title: 'MFGs',
                            align: 'center',
                            sortable: true,
                            formatter: function(value,row){
                                return '<a href="/vendors/mfgs/'+row.id+'">MFGs</a>';
                            }
                        }, {
    	                    field: 'active',
    	                    title: 'Active',
    	                    align: 'center',
    	                    sortable: true,
    	                    formatter:function(value,row){
        	                    if(value==1)
     	                    	   return '<a style="background:url({{ asset("/images/rsz_yesno.png")}}) 0 0 no-repeat; height:22px; width:20px;display:block;" href="/vendors/deactivate/'+row.id+'"></a>';
        	                    else
        	                       return '<a style="background:url({{ asset("/images/rsz_yesno.png")}}) -20px -7px no-repeat; height:22px; width:20px;display:block;" href="/vendors/activate/'+row.id+'"></a>';
    	                    }
    	                }, {
    	                    field: 'set_cron',
    	                    title: 'Cron',
    	                    align: 'center',
    	                    sortable: true,
    	                    formatter:function(value,row){
    	                    	if(value==1)
 	                    		   return '<a style="background:url({{ asset("/images/rsz_yesno.png")}}) 0 0 no-repeat; height:22px; width:20px;display:block;" href="/vendors/unsetCron/'+row.id+'">&nbsp;</a>';
    	                    	else
    	                    		return '<a style="background:url({{ asset("/images/rsz_yesno.png")}}) -20px -7px no-repeat; height:22px; width:20px;display:block;" href="/vendors/setCron/'+row.id+'">&nbsp;</a>';
    	                    }
    	                }]
    	            });
				</script>
				<div class="panel-footer">
                    {!! Form::open(['url'=>'vendors/create','method'=>'get']) !!}
                        {!! Form::submit('Add New Vendor',['class' => 'btn btn-primary form-control'])!!}
                    {!! Form::close() !!}
                </div>
			</div>
		</div>
	</div>
</div>
@endsection
