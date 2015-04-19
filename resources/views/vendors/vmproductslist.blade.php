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
    	                url: '/vmproductslist/{{$id}}',
    	                cache: false,
    	                height: 400,
    	                striped: true,
    	                pagination: true,
                        //sidePagination:'server',
                        totalRows:50,
                        pageNumber:1,
    	                pageSize: 25,
    	                search: true,
    	                showColumns: true,
    	                showRefresh: true,
    	                minimumCountColumns: 2,
    	                clickToSelect: true,
    	                columns: [{
    	                    field: 'productid',
    	                    title: 'Id',
    	                    align: 'right',
    	                    sortable: true
    	                }, {
    	                    field: 'productcode',
    	                    title: 'SKU',
    	                    align: 'center',
    	                    sortable: true
    	                }, {
                            field: 'product',
                            title: 'Product Name',
                            align: 'center',
                            sortable: true
                        }, {
                            field: 'list_price',
                            title: 'Price',
                            align: 'center',
                            sortable: true
                        }, {
                            field: 'forsale',
                            title: 'ForSale',
                            align: 'center',
                            sortable: true
                        }, {
                            field: 'ebay_id',
                            title: 'Ebay Id',
                            align: 'center',
                            sortable: true,
                            formatter: function(value,row){
                                return value==null ? '--' : value;
                            }
                        }, {
                            field: 'amazon_id',
                            title: 'Amazon Id',
                            align: 'center',
                            sortable: true,
                            formatter: function(value,row){
                                return value==null ? '--' : value;
                            }
                        }, {
                            field: 'mfgsku',
                            title: 'MFG SKU',
                            align: 'center',
                            sortable: true,
                            formatter: function(value,row){
                                return value==null ? '--' : value;
                            }
                        }]
    	            });
				</script>
				<div class="panel-footer">
                    {!! Form::open(['url'=>'vendors/create','method'=>'get']) !!}
                        {!! Form::submit('Link New MFG',['class' => 'btn btn-primary form-control'])!!}
                    {!! Form::close() !!}
                </div>
			</div>
		</div>
	</div>
</div>
@endsection
