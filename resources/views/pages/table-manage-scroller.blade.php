@extends('layouts.default')

@section('title', 'Managed Tables - Scroller')

@push('css')
	<link href="/assets/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
	<link href="/assets/plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" />
	<link href="/assets/plugins/datatables.net-scroller-bs5/css/scroller.bootstrap5.min.css" rel="stylesheet" />
@endpush

@push('scripts')
	<script src="/assets/plugins/datatables.net/js/dataTables.min.js"></script>
	<script src="/assets/plugins/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
	<script src="/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
	<script src="/assets/plugins/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
	<script src="/assets/plugins/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
	<script src="/assets/plugins/datatables.net-scroller-bs5/js/scroller.bootstrap5.min.js"></script>
	<script src="/assets/plugins/@highlightjs/cdn-assets/highlight.min.js"></script>
	<script src="/assets/js/demo/render.highlight.js"></script>
	<script>
		if ($('#data-table-scroller').length !== 0) {
			$('#data-table-scroller').DataTable({
				ajax:           "/assets/js/demo/json/scroller_demo.json",
				deferRender:    true,
				scrollY:        300,
				scrollCollapse: true,
				scroller:       true,
				responsive: true
			});
		}
	</script>
@endpush

@section('content')
	<!-- BEGIN breadcrumb -->
	<ol class="breadcrumb float-xl-end">
		<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
		<li class="breadcrumb-item"><a href="javascript:;">Tables</a></li>
		<li class="breadcrumb-item"><a href="javascript:;">Managed Tables</a></li>
		<li class="breadcrumb-item active">Scroller</li>
	</ol>
	<!-- END breadcrumb -->
	<!-- BEGIN page-header -->
	<h1 class="page-header">Managed Tables - Scroller <small>header small text goes here...</small></h1>
	<!-- END page-header -->
	<!-- BEGIN row -->
	<div class="row">
		<!-- BEGIN col-2 -->
		<div class="col-xl-2">
			<h5>
				Key features include:
			</h5>
			<ul class="ps-25px mb-3">
				<li>Speed! The aim of Scroller for DataTables is to make rendering large data sets fast</li>
				<li>Full compatibility with DataTables' deferred rendering for maximum speed</li>
				<li>Display millions of rows in a scrollable table</li>
				<li>Integration with state saving in DataTables (scrolling position is saved)</li>
				<li>Easy to use</li>
			</ul>
			<p class="mb-20px">
				<a href="http://www.datatables.net/extensions/scroller/" target="_blank" class="btn btn-dark btn-sm">View Official Website</a>
			</p>
		</div>
		<!-- END col-2 -->
		<!-- BEGIN col-10 -->
		<div class="col-xl-10">
			<!-- BEGIN panel -->
			<div class="panel panel-inverse">
				<!-- BEGIN panel-heading -->
				<div class="panel-heading">
					<h4 class="panel-title">DataTable - Scroller</h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<!-- END panel-heading -->
				<!-- BEGIN alert -->
				<div class="alert alert-yellow alert-dismissible rounded-0 mb-0 fade show">
					<button type="button" class="btn-close" data-bs-dismiss="alert">
					</button>
					Scroller is a virtual rendering plug-in for DataTables which allows large datasets to be drawn on screen every quickly. What the virtual rendering means is that only the visible portion of the table (and a bit to either side to make the scrolling smooth) is drawn, while the scrolling container gives the visual impression that the whole table is visible. This is done by making use of the pagination abilities of DataTables and moving the table around in the scrolling container DataTables adds to the page. The scrolling container is forced to the height it would be for the full table display using an extra element.
				</div>
				<!-- END alert -->
				<!-- BEGIN panel-body -->
				<div class="panel-body">
					<table id="data-table-scroller" width="100%" class="table table-striped table-bordered align-middle text-nowrap">
						<thead>
							<tr>
								<th>ID</th>
								<th>First name</th>
								<th>Last name</th>
								<th>ZIP / Post code</th>
								<th>Country</th>
							</tr>
						</thead>
					</table>
				</div>
				<!-- END panel-body -->
				<!-- BEGIN hljs-wrapper -->
				<div class="hljs-wrapper">
					<pre><code class="html" data-url="/assets/data/table-manage/scroller.json"></code></pre>
				</div>
				<!-- END hljs-wrapper -->
			</div>
			<!-- END panel -->
		</div>
		<!-- END col-10 -->
	</div>
	<!-- END row -->
@endsection