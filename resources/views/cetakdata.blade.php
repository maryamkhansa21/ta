<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
<table class='table table-bordered' id="customers">
			<thead>
				<tr>
					<th>Nama Mata Kuliah</th>
					<th>Jenis Mata Kuliah</th>
					<th>SKS</th>
					<th>Jam</th>
				<!-- <tr>Total SKS</tr>
				<tr>Total Jam</tr> -->
				</tr>
			</thead>
			<tbody>
				@php $i=1 @endphp
				@foreach($distribusimatkul as $dm)
				<tr>
					<!-- <td>{{ $i++ }}</td> -->
					<td>{{$dm->detailmatkul->dtlmatkul}}</td>
					<td>{{$dm->jenismatkul}}</td>
					<td>{{$dm->pembulatansks}}</td>
					<td>{{$dm->jam}}</td>
					<!-- <td>{{$dm->totalsks}}</td>
					<td>{{$dm->totaljam}}</td> -->
				</tr>
				@endforeach
			</tbody>
		</table>