<ul class="dropdown-menu absolute hidden w-32 text-darkgray pt-1 z-50 font-medium">

    @auth
    @if (Auth::user()->name == 'admin')
    <li>
        <a href="{{ route('admin') }}"
            class="rounded-t bg-white opacity-90 hover:bg-blue hover:text-white py-2 px-4 block">Admin</a>
    </li>
    @endif
    <li class=""><a
            class=" bg-white opacity-90 hover:bg-blue hover:text-white py-2 px-4 block"
            href="{{ route('home') }}">Home</a></li>
    <li class="">
    <li class=""><a
            class=" bg-white opacity-90 hover:bg-blue hover:text-white py-2 px-4 block"
            href="{{ route('friends') }}">Friends</a></li>
    <li class="">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a
                class="rounded-b cursor-pointer bg-white opacity-90 hover:bg-blue hover:text-white py-2 px-4 block"
                :href="route('logout')"
                onclick="event.preventDefault();
                                this.closest('form').submit();">
                {{ __('Log Out') }}
            </a>
        </form>
    </li>
    @endauth

    @guest
    <li>
        <a href="{{ route('login') }}"
            class="rounded-t bg-white opacity-90 hover:bg-blue hover:text-white py-2 px-4 block">Login</a>
    </li>

    <li>
        <a href="{{ route('register') }}"
            class="rounded-b bg-white opacity-90 hover:bg-blue hover:text-white py-2 px-4 block">Register</a>
    </li>
    @endguest
</ul>
