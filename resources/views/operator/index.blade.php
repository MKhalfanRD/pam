@extends('layout.app')

@section('title', 'Dashboard Operator')

@section('content')
    <div class="overflow-x-auto">
        <table class="table">
          <!-- head -->
          <thead>
            <tr class="text-gray-500">
              <th></th>
              <th>Blok</th>
              <th>Nama</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            {{-- <tr>
                <th>1</th>
                <td>A-1</td>
                <td>PANTI ASUHAN (YAYASAN)</td>
                <td><div class="">
                    <a href="{{route('operator.edit', $w->id)}}">
                        <button type="submit" class="bg-indigo-600 text-white px-5 py-2 rounded-lg">Edit</button>
                    </a>
                    </div>
                </td>
            </tr> --}}
            @php
                $counter = 0;

            @endphp
            @foreach ($warga as $w)
                <tr class="text-gray-700">
                    <th>
                        @php
                            $counter++
                        @endphp
                        {{$counter}}
                    </th>
                    <td>{{$w->alamat}}</td>
                    <td>{{$w->nama}}</td>
                    <td><div class="">
                        <a href="{{route('operator.edit', $w->id)}}">
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
