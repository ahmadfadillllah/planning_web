<!doctype html>
<html lang="en">

<head>
    <title>{{ config('app.name') }}</title><!-- [Meta] -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
</head><!-- [Head] end -->
<!-- [Body] Start -->

<body data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-layout="vertical" data-pc-direction="ltr"
    data-pc-theme_contrast="" data-pc-theme="light">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div><!-- [ Pre-loader ] End -->
    <!-- [ Main Content ] start -->
    <div class="maintenance-block">
        <div class="container">
            <div class="row">
                <!-- [ sample-page ] start -->
                <div class="col-sm-12">
                    <div class="card construction-card">
                        <div class="card-body">
                            <div class="construction-image-block">
                                <div class="row justify-content-center">
                                    <div class="col-12 text-center" style="display: flex; justify-content: center;margin-top: 200px;">
                                        <img src="{{ asset('app/assets') }}/images/sims1.png"
                                            class="img-fluid"
                                            style="max-width: 400px; width: 90%; height: auto;">
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <br>
                                <div style="max-width: 500px; margin: 0 auto; background: #f9fbfc; padding: 30px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); font-family: 'Segoe UI', sans-serif; color: #34495e;">
                                    <h2 style="color: #2c3e50; margin-bottom: 20px;">✅ Verifikasi Berhasil</h2>
                                    <h5 style="margin: 0 0 10px 0;"><strong>Nama:</strong> <span style="color: #2980b9;text-transform: uppercase;">{{ $user->name }}</span></h5>
                                    <h5 style="margin: 0 0 10px 0;"><strong>NIK:</strong> <span style="color: #2980b9;text-transform: uppercase;">{{ $user->nik }}</span></h5>
                                    <h5 style="margin: 0 0 20px 0;"><strong>Jabatan:</strong> <span style="color: #2980b9;text-transform: uppercase;">{{ $user->role }}</span></h5>
                                    <p style="font-size: 0.9em; color: #7f8c8d;">Data telah tervalidasi dan dicatat secara resmi dalam sistem.</p>
                                    <button onclick="window.close();" style="margin-top: 20px; background-color: #e74c3c; color: white; padding: 10px 20px; border: none; border-radius: 6px; font-weight: 600; cursor: pointer;">
                                        ❌ Tutup Halaman
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- [ sample-page ] end -->
        </div>
    </div><!-- [ Main Content ] end -->

</body>
</html>
