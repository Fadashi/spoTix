<x-guest-layout>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Pilih Pendaftaran</h1>
        <div class="row justify-content-center">
            <div class="row-md-6 text-center">
                <a href="{{ route('register') }}" class="btn btn-primary btn-lg mb-3">Register as User</a>
                <a href="{{ route('registerEO') }}" class="btn btn-secondary btn-lg">Register as Event Organizer</a>
            </div>
        </div>
    </div>
</x-guest-layout> 