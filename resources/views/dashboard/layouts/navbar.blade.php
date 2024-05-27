<nav class="navbar-custom">
    <ul class="list-unstyled topbar-nav float-right mb-0">
        <li class="dropdown">
            <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#"
                role="button" aria-haspopup="false" aria-expanded="false">
                @if (auth()->user()->foto === null)
                    <img src="{{ asset('assets/images/users/profil.png') }}" alt="{{ auth()->user()->name }}"
                        class="rounded-circle thumb-xl profile-image">
                @else
                    <img src="{{ asset('storage/' . auth()->user()->foto) }}" alt="{{ auth()->user()->foto }}"
                        class="rounded-circle">
                @endif
                <span class="ml-1 nav-user-name hidden-sm">{{ auth()->user()->name }}<i
                        class="mdi mdi-chevron-down"></i></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="{{ route('profile.edit') }}"><i
                        class="dripicons-user text-muted mr-2"></i>Profil Pengguna</a>
                <a class="dropdown-item" href="{{ route('profil-keluarga.index') }}"><i
                        class="dripicons-user-group text-muted mr-2"></i>Profil
                    Keluarga</a>
                <a class="dropdown-item" href="{{ route('pengaturan.index') }}"><i
                        class="dripicons-gear text-muted mr-2"></i>Pengaturan</a>
                <a class="dropdown-item" href="{{ route('notifikasi.index') }}"><i
                        class="dripicons-bell text-muted mr-2"></i>Notifikasi</a>
                {{-- <a class="dropdown-item" href="#"><i class="mdi mdi-brightness-1 text-muted mr-2"></i>Dropdown
                    Item</a> --}}
                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button style="cursor: pointer" type="submit" class="dropdown-item"><i
                            class="dripicons-exit text-muted mr-2"></i>
                        Logout</button>
                </form>
            </div>
        </li>
    </ul>
    <ul class="list-unstyled topbar-nav mb-0">
        <li>
            <button class="button-menu-mobile nav-link waves-effect waves-light"><i
                    class="mdi mdi-menu nav-icon"></i></button>
        </li>
    </ul>
</nav>
