@extends('layout.app')

@section('content')
<div>
    <table class="table">
      <!-- head -->
      <thead>
        <tr class="text-gray-100">
          <th></th>
          <th>Blok</th>
          <th>Nama</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @php
            $counter = 0;

        @endphp
        @foreach ($warga as $w)
            <tr class="text-gray-200">
                <th>
                    @php
                        $counter++
                    @endphp
                    {{$counter}}
                </th>
                <td>{{$w->alamat}}</td>
                <td>{{$w->nama}}</td>
                <td><div class="">
                    <a href="{{route('operator.edit', $w->warga_id)}}">
                        <button type="submit" class="bg-indigo-600 text-white px-5 py-2 rounded-lg">Edit</button>
                    </a>
                    </div>
                </td>
            </tr>
        @endforeach
      </tbody>
    </table>
</div>
@endsection
