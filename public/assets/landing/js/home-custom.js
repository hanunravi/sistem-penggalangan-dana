$(document).ready(function() {
        
    // -------------------------------------------------------
    // 1. LOGIKA POPUP VIDEO TIKTOK (Mode Inline)
    // -------------------------------------------------------
    if($('.tiktok-trigger').length > 0) {
        $('.tiktok-trigger').magnificPopup({
            type: 'inline',       
            midClick: true,
            mainClass: 'mfp-fade',
            callbacks: {
                open: function() {
                    // Hapus script lama jika ada
                    $('#tiktok-script-loader').remove(); 
                    
                    // Inject ulang script TikTok agar video muncul
                    var script = document.createElement('script');
                    script.id = 'tiktok-script-loader';
                    script.src = "https://www.tiktok.com/embed.js";
                    document.body.appendChild(script);
                }
            }
        });
    }

    // -------------------------------------------------------
    // 2. LOGIKA TOMBOL PILIH PAKET (Mengisi Modal Otomatis)
    // -------------------------------------------------------
    $('.btn-paket').click(function(e) {
        e.preventDefault();
        
        // Ambil data dari tombol
        var namaPaket = $(this).data('nama');
        var hargaPaket = $(this).data('harga');
        
        // Format Rupiah
        var hargaFormatted = new Intl.NumberFormat('id-ID', { 
            style: 'currency', 
            currency: 'IDR', 
            minimumFractionDigits: 0 
        }).format(hargaPaket);

        // Isi Modal
        $('#displayNamaPaket').text(namaPaket);
        $('#displayHargaPaket').text(hargaFormatted);
        $('#inputNamaPaket').val(namaPaket);
        $('#inputHargaPaket').val(hargaPaket);

        // Tampilkan Modal
        var modalPaket = new bootstrap.Modal(document.getElementById('modalPaket'));
        modalPaket.show();
    });

    // -------------------------------------------------------
    // 3. LOGIKA CHECKBOX ANONIM (Hamba Allah)
    // -------------------------------------------------------
    $('#anonimManual, #anonimPaket').change(function() {
        var inputNama = $(this).closest('form').find('input[name="donatur_name"]');
        
        if(this.checked) {
            inputNama.val('Hamba Allah').attr('readonly', true);
        } else {
            inputNama.val('').attr('readonly', false);
        }
    });

      // Logika Popup Video TikTok (Inline Mode)
    if($('.tiktok-trigger').length > 0) {
        $('.tiktok-trigger').magnificPopup({
            type: 'inline',       
            midClick: true,
            mainClass: 'mfp-fade',
            callbacks: {
                open: function() {
                    // Trik: Reload script TikTok agar video muncul saat popup dibuka
                    $('#tiktok-script-loader').remove(); 
                    
                    var script = document.createElement('script');
                    script.id = 'tiktok-script-loader';
                    script.src = "https://www.tiktok.com/embed.js";
                    document.body.appendChild(script);
                }
            }
        });
    }

});

