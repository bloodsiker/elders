<!-- BEGIN: Top Bar -->
{{--ТОПТОПТОПТОПТОПТОПТОПТОПТПО--}}
<div class="top-bar">
    <!-- BEGIN: Breadcrumb -->
    <div class="-intro-x breadcrumb mr-auto hidden sm:flex">
        {{--<a href="">Application</a>
        <i data-feather="chevron-right" class="breadcrumb__icon"></i>
        <a href="" class="breadcrumb--active">Dashboard</a>--}}
    </div>
    <!-- END: Breadcrumb -->
    <!-- BEGIN: Search -->
    {{--<div class="intro-x relative mr-3 sm:mr-6">
        --}}{{--<div class="search hidden sm:block">
            <input type="text" class="search__input form-control border-transparent placeholder-theme-13" placeholder="Search...">
            <i data-feather="search" class="search__icon dark:text-gray-300"></i>
        </div>--}}{{--
        <a class="notification sm:hidden" href="">
            <i data-feather="search" class="notification__icon dark:text-gray-300"></i>
        </a>
        <div class="search-result">
            <div class="search-result__content">
                <div class="search-result__content__title">Pages</div>
                <div class="mb-5">
                    <a href="" class="flex items-center">
                        <div class="w-8 h-8 bg-theme-18 text-theme-9 flex items-center justify-center rounded-full">
                            <i class="w-4 h-4" data-feather="inbox"></i>
                        </div>
                        <div class="ml-3">Mail Settings</div>
                    </a>
                    <a href="" class="flex items-center mt-2">
                        <div class="w-8 h-8 bg-theme-17 text-theme-11 flex items-center justify-center rounded-full">
                            <i class="w-4 h-4" data-feather="users"></i>
                        </div>
                        <div class="ml-3">Users & Permissions</div>
                    </a>
                    <a href="" class="flex items-center mt-2">
                        <div class="w-8 h-8 bg-theme-14 text-theme-10 flex items-center justify-center rounded-full">
                            <i class="w-4 h-4" data-feather="credit-card"></i>
                        </div>
                        <div class="ml-3">Transactions Report</div>
                    </a>
                </div>
                <div class="search-result__content__title">Users</div>
                <div class="mb-5">
                    @foreach (array_slice($fakers, 0, 4) as $faker)
                        <a href="" class="flex items-center mt-2">
                            <div class="w-8 h-8 image-fit">
                                <img alt="Rubick Tailwind HTML Admin Template" class="rounded-full" src="{{ asset('dist/images/' . $faker['photos'][0]) }}">
                            </div>
                            <div class="ml-3">{{ $faker['users'][0]['name'] }}</div>
                            <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">{{ $faker['users'][0]['email'] }}</div>
                        </a>
                    @endforeach
                </div>
                <div class="search-result__content__title">Products</div>
                @foreach (array_slice($fakers, 0, 4) as $faker)
                    <a href="" class="flex items-center mt-2">
                        <div class="w-8 h-8 image-fit">
                            <img alt="Rubick Tailwind HTML Admin Template" class="rounded-full" src="{{ asset('dist/images/' . $faker['images'][0]) }}">
                        </div>
                        <div class="ml-3">{{ $faker['products'][0]['name'] }}</div>
                        <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">{{ $faker['products'][0]['category'] }}</div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>--}}
    <!-- END: Search -->
    <!-- BEGIN: Notifications -->
   {{-- <div class="intro-x dropdown mr-auto sm:mr-6">
        <div class="dropdown-toggle notification notification--bullet cursor-pointer" role="button" aria-expanded="false">
            <i data-feather="bell" class="notification__icon dark:text-gray-300"></i>
        </div>
        <div class="notification-content pt-2 dropdown-menu">
            <div class="notification-content__box dropdown-menu__content box dark:bg-dark-6">
                <div class="notification-content__title">Notifications</div>
                @foreach (array_slice($fakers, 0, 5) as $key => $faker)
                    <div class="cursor-pointer relative flex items-center {{ $key ? 'mt-5' : '' }}">
                        <div class="w-12 h-12 flex-none image-fit mr-1">
                            <img alt="Rubick Tailwind HTML Admin Template" class="rounded-full" src="{{ asset('dist/images/' . $faker['photos'][0]) }}">
                            <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                        </div>
                        <div class="ml-2 overflow-hidden">
                            <div class="flex items-center">
                                <a href="javascript:;" class="font-medium truncate mr-5">{{ $faker['users'][0]['name'] }}</a>
                                <div class="text-xs text-gray-500 ml-auto whitespace-nowrap">{{ $faker['times'][0] }}</div>
                            </div>
                            <div class="w-full truncate text-gray-600 mt-0.5">{{ $faker['news'][0]['short_content'] }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>--}}
    <!-- END: Notifications -->
    <!-- BEGIN: Account Menu -->
    <div class="intro-x dropdown w-8 h-8">
        <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in" role="button" aria-expanded="false">
            {{--<div class="col-span-6 sm:col-span-3 lg:col-span-2 xl:col-span-1">--}}
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user block mx-auto"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
             {{--   <div class="text-center text-xs mt-2">user</div>--}}
         {{--   </div>--}}
            {{--<img alt="Rubick Tailwind HTML Admin Template" src="{{ asset('dist/images/' . $fakers[9]['photos'][0]) }}">--}}
        </div>
        <div class="dropdown-menu w-56">
            <div class="dropdown-menu__content box bg-theme-26 dark:bg-dark-6 text-white">
                <div class="p-4 border-b border-theme-27 dark:border-dark-3">
                    <div class="font-medium">{{ Auth::user()->last_name.' '.Auth::user()->user_name.' '.Auth::user()->middle_name }}</div>
                    <div class="text-xs text-theme-28 mt-0.5 dark:text-gray-600">{{ Auth::user()->email }}</div>
                    <div class="text-xs text-theme-28 mt-0.5 dark:text-gray-600">{{ Auth::user()->phone }}</div>
                </div>
                <div class="p-2">
                    @if(session()->has('admin_login'))
                        <a href="{{ route('admin.login_back_admin') }}" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">Повернутись в Admin</a>
                    @endif
                    <a href="{{ route('logout') }}" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">Вихiд</a>
                    {{--<a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                        <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile
                    </a>
                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                        <i data-feather="edit" class="w-4 h-4 mr-2"></i> Add Account
                    </a>
                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                        <i data-feather="lock" class="w-4 h-4 mr-2"></i> Reset Password
                    </a>
                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                        <i data-feather="help-circle" class="w-4 h-4 mr-2"></i> Help
                    </a>--}}
                </div>
                {{--<div class="p-2 border-t border-theme-27 dark:border-dark-3">
                    --}}{{--<a href="{{ route('logout') }}" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                        <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Вихiд
                    </a>--}}{{--
                </div>--}}
            </div>
        </div>
    </div>
    <!-- END: Account Menu -->
</div>
<!-- END: Top Bar -->
