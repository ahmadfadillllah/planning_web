@if (session('alertWelcome'))
    <script>
        window.addEventListener('DOMContentLoaded', function () {
            Toastify({
                text: "Selamat Datang, {{ Auth::user()->name }}!",
                gravity: "top",
                position: "right",
                duration: 5000,
                close: true,
                offset: {
                    x: 20,
                    y: 20
                },
                style: {
                    background: "#001932",
                    color: "#fff",
                    borderRadius: "8px",
                    boxShadow: "0 0 10px rgba(0,0,0,0.2)"
                }
            }).showToast();
        });
    </script>
@endif

@if (session('success'))
    <script>
        window.addEventListener('DOMContentLoaded', function () {
            Toastify({
                text: "Yaay.., {{ session('success') }}!",
                gravity: "top",
                position: "right",
                duration: 5000,
                close: true,
                offset: {
                    x: 20,
                    y: 20
                },
                style: {
                    background: "#5cc184",
                    color: "#fff",
                    borderRadius: "8px",
                    boxShadow: "0 0 10px rgba(0,0,0,0.2)"
                }
            }).showToast();
        });
    </script>
@endif

 @if (session('info'))
    <script>
        window.addEventListener('DOMContentLoaded', function () {
            Toastify({
                text: "Upps..., {{ session('info') }}",
                gravity: "top",
                position: "right",
                duration: 5000,
                close: true,
                offset: {
                    x: 20,
                    y: 20
                },
                style: {
                    background: "#dc3545",
                    color: "#fff",
                    borderRadius: "8px",
                    boxShadow: "0 0 10px rgba(0,0,0,0.2)"
                }
            }).showToast();
        });
    </script>
@endif
{{-- @if (session('success'))
<script>
    window.onload = function () {
        Swal.fire({
            title: "Success",
            text: "{{ session('success') }}",
            icon: "success",
            confirmButtonClass: "btn btn-primary w-xs mt-2",
            buttonsStyling: false,
            showCloseButton: false
        });
    };
</script>
@endif
@if (session('info'))
<script>
    window.onload = function () {
        Swal.fire({
            title: "Upps...",
            text: "{{ session('info') }}",
            icon: "info",
            confirmButtonClass: "btn btn-primary w-xs mt-2",
            buttonsStyling: false,
            showCloseButton: false
        });
    };
</script>
@endif --}}
