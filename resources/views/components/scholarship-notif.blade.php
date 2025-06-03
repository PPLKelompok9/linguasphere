@if(session('success') || session('error'))
    <div 
        id="flash-alert" 
        class="fixed top-5 right-5 z-50 px-4 py-3 rounded shadow-lg text-white transition-all duration-500
               {{ session('success') ? 'bg-green-500' : 'bg-red-500' }}">
        {{ session('success') ?? session('error') }}
    </div>

    <script>
        setTimeout(() => {
            const alert = document.getElementById('flash-alert');
            if (alert) {
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            }
        }, 4000);
    </script>
@endif
