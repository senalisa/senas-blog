@if (session()->has('succes'))
    <div x-data="{ show: true}"
         x-init="setTimeout(() => show = false, 4000)"
         x-show="show"
         class="fixed top-0 start-50 translate-middle-x bg-pink-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm"
         style="right: 43%;margin-top: 20px;height: 40px;">
        <p>{{ session('succes') }}</p>
    </div>
@endif
