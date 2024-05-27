        <div class="left-sidenav">
            <ul class="metismenu left-sidenav-menu" id="side-nav">
                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="mdi mdi-home"></i> Beranda
                    </a>
                </li>
                @if (Auth::user()->id == 1)
                    <li>
                        <a href="javascript: void(0);">
                            <span><i class="mdi mdi-file-document-box"></i>Kelola lainnya</span>
                            <span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{ route('kelolaKomunitas.index') }}">Kelola Komunitas</a></li>
                            <li><a href="{{ route('kelolaPengguna.index') }}">Kelola Pengguna</a></li>
                        </ul>
                    </li>
                @endif
                {{-- <li>
                    <a href="javascript: void(0);">
                        <span><i class="mdi mdi-file-document-box"></i>Kelola lainnya</span>
                        <span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('kelolaKomunitas.index') }}">Kelola Komunitas</a></li>
                        <li><a href="{{ route('kelolaPengguna.index') }}">Kelola Pengguna</a></li>
                    </ul>
                </li> --}}
                <li>
                    <a href="javascript: void(0);"><span> <i class="mdi mdi-account-multiple"></i>
                            Komunitasku</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        @foreach ($komunitasKu as $data)
                            <li>
                                <a href="{{ route('komunitas.show', $data->id) }}">{{ $data->nama_komunitas }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);"><span> <i class="mdi mdi-account-multiple"></i>Member
                            Komunitas</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        {{-- @foreach ($memberKomunitas as $member)
                            <li>
                                <a
                                    href="{{ route('komunitas.show', $member->komunitas_id) }}">{{ $member->nama_komunitas }}</a>
                            </li>
                        @endforeach --}}
                        @php
                            $uniqueKomunitas = $memberKomunitas->unique('nama_komunitas');
                        @endphp

                        @foreach ($uniqueKomunitas as $member)
                            <li>
                                <a
                                    href="{{ route('komunitas.show', $member->komunitas_id) }}">{{ $member->nama_komunitas }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li>
                    <a href="{{ route('komunitas.create') }}"> <i class="fa fa-address-book-o"></i> Buat Komunitas</a>
                </li>
                <li>
                    <a href="{{ route('cariKomunitas.cari') }}"> <i class="fa fa-search"></i> Cari Komunitas</a>
                </li>
            </ul>
        </div>
