@extends('dashboard.layouts.main')
@section('title', 'Cari Komunitas')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card bg-transparent shadow-none">
                <div class="card-body">
                    <h4 class="text-dark mt-0">Cari Komunitasmu</h4>
                    <div class="card">
                        <div class="card-body">
                            <p>Cari dan bergabunglah dengan komunitas yang kamu inginkan !</p>
                            <div class="row">
                                <div class="col-sm-12">
                                    <form action="">
                                        <div class="input-group mb-3">
                                            <input type="text" id="example-input1-group2" name="cariKomunitas"
                                                class="form-control" placeholder="Search..."
                                                value="{{ request('cariKomunitas') }}">
                                            <span class="input-group-prepend">
                                                <button type="submit" class="btn btn-success">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </form>
                                    @if (request('cariKomunitas'))
                                        <p>Hasil pencarian : <b>{{ $searchKomunitas->total() }}</b> komunitas</p>
                                        @foreach ($searchKomunitas as $data)
                                            <ul>
                                                <li class="fa fa-chevron-right">
                                                    <a href="{{ route('carikomunitas.showkomunitas', $data->id) }}"
                                                        style="font-size: 18px;">
                                                        {{ $data->nama_komunitas }}
                                                    </a>
                                                </li>
                                            </ul>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
@endsection
