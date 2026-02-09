@extends('admin.layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="md:flex md:items-center md:justify-between mb-6">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                Profil sozlamalari
            </h2>
        </div>
    </div>

    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <form action="{{ route('admin.profile.update') }}" method="POST" class="p-6 space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                <div class="sm:col-span-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Foydalanuvchi nomi</label>
                    <div class="mt-1">
                        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="shadow-sm focus:ring-[#F07F15] focus:border-[#F07F15] block w-full sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>

                <div class="sm:col-span-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email manzili</label>
                    <div class="mt-1">
                        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="shadow-sm focus:ring-[#F07F15] focus:border-[#F07F15] block w-full sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>

                <div class="sm:col-span-6 border-t border-gray-200 pt-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Parolni almashtirish</h3>
                    <p class="text-sm text-gray-500 mb-4">(Agar parolni o'zgartirmoqchi bo'lsangiz, quyidagilarni to'ldiring. Bo'sh qoldirsangiz, parol o'zgarmaydi)</p>
                </div>

                <div class="sm:col-span-4">
                    <label for="current_password" class="block text-sm font-medium text-gray-700">Hozirgi parol</label>
                    <div class="mt-1">
                        <input type="password" name="current_password" id="current_password" class="shadow-sm focus:ring-[#F07F15] focus:border-[#F07F15] block w-full sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>

                <div class="sm:col-span-4">
                    <label for="new_password" class="block text-sm font-medium text-gray-700">Yangi parol</label>
                    <div class="mt-1">
                        <input type="password" name="new_password" id="new_password" class="shadow-sm focus:ring-[#F07F15] focus:border-[#F07F15] block w-full sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>

                <div class="sm:col-span-4">
                    <label for="new_password_confirmation" class="block text-sm font-medium text-gray-700">Yangi parolni tasdiqlash</label>
                    <div class="mt-1">
                        <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="shadow-sm focus:ring-[#F07F15] focus:border-[#F07F15] block w-full sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>
            </div>

            <div class="pt-5">
                <div class="flex justify-end">
                    <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-[#F07F15] hover:bg-[#d0690c] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#F07F15]">
                        O'zgarishlarni saqlash
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
