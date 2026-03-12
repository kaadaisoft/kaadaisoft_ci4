<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KSlogo</title>
</head>
<body>
<style>
    @media (max-width: 768px) {
        .logo-text-mobile {
            font-size: 1rem !important;
        }
        .ps-logo {
            padding: 5px 10px !important;
        }
    }
</style>
<div class="ps-logo d-flex align-items-center justify-content-between w-100 px-1">
    <!-- Text LEFT side -->
    <div class="d-flex align-items-center order-1 order-md-1 me-auto ps-0">
        <img src="<?= base_url('assets/poondurai kaadaikulam image.png') ?>" alt="Logo" style="height: 40px; width: 40px; border-radius: 50%; box-shadow: 0 2px 5px rgba(0,0,0,0.3); margin-right: 8px; object-fit: cover; border: 2px solid rgba(56, 189, 248, 0.5);">
        <span class="heading-kaadaisoft position-relative logo-text-mobile" style="top:1px; color: #38bdf8 !important; font-weight: 700; font-size: 1.2rem; letter-spacing: 0.5px; line-height: 1.1; display: block;">
            <span style="white-space: nowrap;">Poondurai Kaadai</span><br>
            <span style="white-space: nowrap;">Kulam</span>
        </span>
    </div>
    
    <!-- Hamburger RIGHT side (Mobile only) -->
    <button type="button" onclick="openMobileMenu()" class="ham-menu border-0 rounded-3 order-2 order-md-2 d-md-none" style="background: rgba(255,255,255,0.1); color: #cbd5e1; padding: 4px 8px; font-size: 1.3rem; transition: 0.3s;" onmouseover="this.style.color='#fff'; this.style.background='rgba(255,255,255,0.2)';" onmouseout="this.style.color='#cbd5e1'; this.style.background='rgba(255,255,255,0.1)';">
        <i class="fa-sharp fa-solid fa-bars"></i>
    </button>
</div>
</body>
</html>
