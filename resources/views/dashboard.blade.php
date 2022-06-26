

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('messages.Dashboard') }}
        </h2>
     
        <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ Config::get('languages')[App::getLocale()] }}
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
    @foreach (Config::get('languages') as $lang => $language)
        @if ($lang != App::getLocale())
                <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}"> {{$language}}</a>
        @endif
    @endforeach
    </div>
</li>
        

 
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                {{ __('messages.LogIn') }}
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                <a href="{{ url('/menu') }}"class="return">{{ __('messages.Menu') }}</a> 
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                <a href="{{ url('/welcome') }}"class="return">{{ __('messages.Welcome') }}</a> 
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                <a href="{{ url('/income') }}"class="return">{{ __('messages.Income') }}</a> 
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                <a href="{{ url('/expense') }}"class="return">{{ __('messages.Expense') }}</a> 
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                <a href="{{ url('/expense') }}"class="return">{{ __('messages.Notes') }}</a> 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
