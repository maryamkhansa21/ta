@extends('layouts.master')

@section('content')
<template>

	<body>
		<style type="text/css">
			table tr td,
			table tr th {
				font-size: 9pt;
			}
		</style>
		<center>
			<h5>Kurikulum</h5>
			<h6></h6>
		</center>

		<table class='table table-bordered'>
			<thead>
				<tr>
					<th>Nama Mata Kuliah</th>
					<th>Jenis Mata Kuliah</th>
					<th>SKS</th>
					<th>Jam</th>
				<tr>Total SKS</tr>
				<tr>Total Jam</tr>
				</tr>
			</thead>
			<tbody>
				@php $i=1 @endphp
				@foreach($distribusimatkul as $dm)
				<tr>
					<td>{{ $i++ }}</td>
					<td>{{$dm->dtlmatkul_id}}</td>
					<td>{{$dm->jenismatkul_id}}</td>
					<td>{{$dm->sks_id}}</td>
					<td>{{$dm->jam_id}}</td>
					<td>{{$dm->totalsks}}</td>
					<td>{{$dm->totaljam}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</body>
</template>
@endsection