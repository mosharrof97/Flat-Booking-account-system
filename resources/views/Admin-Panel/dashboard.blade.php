@extends('Admin-Panel.partial.Layout')
@section('content')
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Hello Admin</h1>
                    {{-- @php
                        dd(auth()->guard('admin')->user());
                    @endphp --}}
                    @if (auth()->guard('admin')->user())
                        @if (auth()->guard('admin')->user()->role_id == 2)
                            <p>{{ auth()->guard('admin')->user()->name }} are User logged in! </p>
                        @elseif (auth()->guard('admin')->user()->role_id == 1)
                            <p>{{ auth()->guard('admin')->user()->name }} are Admin logged in! </p>
                        @else
                            {{ __("You're logged in! -- ok") }}
                        @endif
                    @else
                        {{ __("You're logged in! -- ok") }}
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
