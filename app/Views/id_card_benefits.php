<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID Card Benefits | Kaadaikulam</title>
    <link rel="icon" type="image/png" href="<?= base_url('assets/poondurai kaadaikulam image.png') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        serif: ['Outfit', 'serif'],
                    },
                    colors: {
                        'sacred-home': '#fafaf9',
                    }
                }
            }
        }
    </script>
    <style>
        .preserve-3d {
            transform-style: preserve-3d;
        }
        .backface-hidden {
            backface-visibility: hidden;
        }
        .rotate-y-180 {
            transform: rotateY(180deg);
        }
        .card-container {
            perspective: 1500px;
        }
        .card-inner {
            transition: transform 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        .card-container.flipped .card-inner {
            transform: rotateY(180deg);
        }
        
        /* Modal Animation */
        #detailModal {
            transition: opacity 0.3s ease;
            opacity: 0;
            pointer-events: none;
        }
        #detailModal.show {
            opacity: 1;
            pointer-events: auto;
        }
        #detailModalContent {
            transition: transform 0.3s ease, opacity 0.3s ease;
            transform: scale(0.9) translateY(20px);
            opacity: 0;
        }
        #detailModal.show #detailModalContent {
            transform: scale(1) translateY(0);
            opacity: 1;
        }

        /* Staggered entry animation */
        .advantage-item {
            opacity: 0;
            transform: translateY(30px);
            animation: slideUp 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
        }
        @keyframes slideUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body class="bg-sacred-home min-h-screen py-16 px-4 md:px-8 relative overflow-x-hidden font-sans">
    
    <!-- Language Toggle -->
    <div class="absolute top-4 right-4 md:top-8 md:right-8 z-50">
        <button id="langToggle" class="bg-white/80 backdrop-blur border border-[#c49a3c]/30 text-[#5d1712] px-4 py-2 rounded-full font-bold text-sm shadow hover:bg-white transition-colors">
            தமிழ்
        </button>
    </div>

    <!-- Temple Watermark Background -->
    <div class="fixed inset-0 z-0 pointer-events-none bg-center bg-cover bg-no-repeat bg-fixed opacity-[0.12] mix-blend-multiply" style="background-image: url('<?= base_url('assets/perumal kovil.png') ?>');"></div>

    <div class="max-w-6xl mx-auto relative z-10">
        
        <!-- Back Button -->
        <div class="mb-8">
            <a href="<?= base_url('admindashboard') ?>" class="inline-flex items-center gap-2 text-stone-700 hover:text-[#8b1d1d] transition-colors font-bold uppercase tracking-widest text-xs py-2 group">
                <i class="fa-solid fa-arrow-left w-4 h-4 group-hover:-translate-x-1 transition-transform flex items-center justify-center"></i>
                <span data-i18n="backBtn">Back to Dashboard</span>
            </a>
        </div>

        <!-- Hero Section -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center mb-24">
            
            <!-- Hero Left: Page Titles & Intro -->
            <div class="lg:col-span-7 flex flex-col items-start">
                <div class="flex items-center gap-3 mb-4">
                    <span class="w-12 h-[1.5px] bg-[#c49a3c]"></span>
                    <span class="text-[#c49a3c] font-bold tracking-[0.25em] uppercase text-xs" data-i18n="hero.label">
                        Premium Member Benefits
                    </span>
                </div>

                <h1 class="font-serif text-4xl md:text-5xl lg:text-6xl font-bold text-[#5d1712] leading-tight mb-6 drop-shadow-sm" data-i18n="hero.title">
                    Empowering Our Community
                </h1>

                <p class="text-stone-700 text-lg md:text-xl font-light leading-relaxed mb-8 max-w-xl" data-i18n="hero.desc">
                    Your official family ID card unlocks exclusive privileges, community support systems, and a unified digital identity for all Kaadaikulam members.
                </p>

                <a href="<?= base_url('members/registrationform') ?>" class="group relative px-8 py-4 bg-[#8b1d1d] hover:bg-[#5d1712] text-white rounded-full font-bold shadow-lg shadow-[#8b1d1d]/20 overflow-hidden transition-all duration-300 flex items-center justify-center text-sm tracking-widest uppercase">
                    <span class="relative z-10 flex items-center gap-2">
                        <span data-i18n="hero.applyBtn">Apply For ID Card</span>
                        <i class="fa-solid fa-arrow-right w-4 h-4 group-hover:translate-x-1 transition-transform flex items-center justify-center"></i>
                    </span>
                </a>
            </div>

            <!-- Hero Right: 3D Interactive ID Card -->
            <div class="lg:col-span-5 flex flex-col items-center justify-center">
                
                <div class="card-container relative w-full max-w-[400px] h-[250px] cursor-pointer group" id="idCard3D">
                    <!-- Card Container with CSS 3D flips -->
                    <div class="card-inner w-full h-full relative preserve-3d">
                        
                        <!-- OFFICIAL FRONT OF CARD -->
                        <div class="absolute inset-0 w-full h-full rounded-2xl overflow-hidden shadow-2xl border border-white/20 select-none bg-gradient-to-r from-[#4d050f] via-[#5a0914] to-[#1f0206] backface-hidden">
                            <img src="<?= base_url('assets/id card front.jpeg') ?>" alt="ID Card Front" class="w-full h-full object-cover" onerror="this.src='https://placehold.co/400x250/4d050f/FFF?text=ID+Card+Front'" />
                        </div>

                        <!-- OFFICIAL BACK OF CARD -->
                        <div class="absolute inset-0 w-full h-full rounded-2xl overflow-hidden shadow-2xl border border-white/20 select-none bg-gradient-to-r from-[#4d050f] via-[#5a0914] to-[#1a2d21] backface-hidden rotate-y-180">
                            <img src="<?= base_url('assets/id card back.jpeg') ?>" alt="ID Card Back" class="w-full h-full object-cover" onerror="this.src='https://placehold.co/400x250/1a2d21/FFF?text=ID+Card+Back'" />
                        </div>

                    </div>
                </div>

                <!-- Hint Indicator -->
                <p class="text-stone-500 text-[11px] font-bold uppercase tracking-widest mt-4 flex items-center gap-1.5 animate-pulse">
                    <i class="fa-solid fa-expand w-3.5 h-3.5 rotate-45 flex items-center justify-center"></i>
                    <span data-i18n="card.flipHint">Click to view back</span>
                </p>
            </div>

        </div>

        <!-- 12 Advantages Grid -->
        <div id="advantagesGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-24">
            <!-- Advantages generated by JS -->
        </div>

        <!-- CTA Box Section -->
        <div class="bg-white/80 backdrop-blur-md rounded-3xl p-8 md:p-12 border-2 border-dashed border-[#c49a3c]/35 flex flex-col md:flex-row items-center justify-between gap-8 relative overflow-hidden shadow-xl transition-all duration-700 hover:shadow-2xl">
            <!-- Decorative Emblem Graphic in CTA Background -->
            <div class="absolute top-0 right-0 w-44 h-44 opacity-[0.03] pointer-events-none translate-x-6 -translate-y-6">
                <img src="<?= base_url('assets/poondurai kaadaikulam image.png') ?>" alt="Mandala" class="w-full h-full object-contain" />
            </div>

            <div class="flex flex-col items-start max-w-xl relative z-10">
                <h3 class="font-serif text-2xl md:text-3xl font-bold text-[#5d1712] mb-3 leading-tight" data-i18n="cta.title">
                    Obtain Your Official ID Card Today
                </h3>
                <p class="text-stone-600 text-base leading-relaxed" data-i18n="cta.desc">
                    Register in our secure portal, verify your family tree, and acquire your digital QR-enabled PVC card with full access to our community welfare benefits.
                </p>
            </div>

            <a href="<?= base_url('members/registrationform') ?>" class="w-full md:w-auto px-8 py-4 bg-[#c49a3c] hover:bg-[#b38a2c] text-white font-bold rounded-xl shadow-lg transition-all duration-300 text-center uppercase tracking-widest text-sm relative z-10 whitespace-nowrap active:scale-95 hover:-translate-y-0.5" data-i18n="cta.btn">
                Become a Member
            </a>
        </div>

    </div>

    <!-- Detail Overlay Modal popup -->
    <div id="detailModal" class="fixed inset-0 z-[150] flex items-center justify-center p-4">
        
        <!-- Backdrop -->
        <div id="modalBackdrop" class="absolute inset-0 bg-stone-900/60 backdrop-blur-sm cursor-pointer"></div>

        <!-- Content Box -->
        <div id="detailModalContent" class="relative w-full max-w-md bg-white rounded-2xl shadow-2xl p-8 border border-[#c49a3c]/30 text-center z-10">
            <!-- Modal Close Button -->
            <button id="closeModalBtn" class="absolute top-4 right-4 text-stone-400 hover:text-stone-600 transition-colors">
                <i class="fa-solid fa-xmark text-2xl"></i>
            </button>

            <!-- Modal Icon -->
            <div class="bg-gradient-to-br from-[#8b1d1d] to-[#5d1712] text-white p-5 rounded-full shadow-xl w-16 h-16 flex items-center justify-center mx-auto mb-6">
                <i id="modalIcon" class="fa-solid fa-star text-2xl"></i>
            </div>

            <!-- Modal Content -->
            <span class="text-[10px] text-[#c49a3c] font-bold tracking-[0.3em] uppercase block mb-2">
                ADVANTAGE FEATURE #<span id="modalNumber"></span>
            </span>

            <h3 id="modalTitle" class="font-serif text-2xl font-bold text-[#5d1712] mb-4">
                Title
            </h3>

            <p id="modalDesc" class="text-stone-600 leading-relaxed mb-6">
                Description
            </p>

            <!-- Action Button -->
            <a href="<?= base_url('members/registrationform') ?>" class="block w-full py-3.5 bg-[#8b1d1d] hover:bg-[#5d1712] text-white font-bold rounded-xl shadow-lg transition-colors text-center uppercase tracking-widest text-xs" data-i18n="hero.applyBtn">
                Apply For ID Card
            </a>
        </div>
    </div>

    <!-- Application Script -->
    <script>
        const translations = {
            en: {
                backBtn: "Back to Dashboard",
                hero: {
                    label: "EXCLUSIVE PRIVILEGES",
                    title: "Advantages of the ID Card",
                    desc: "The Poondurai Kaadai ID Card is more than an identity; it is a gateway to collective security, community prosperity, and cultural preservation. Explore the twelve core benefits designed to support and elevate our members.",
                    applyBtn: "Apply For ID Card"
                },
                card: {
                    flipHint: "Click to view back"
                },
                cta: {
                    title: "Obtain Your Official ID Card Today",
                    desc: "Register in our secure portal, verify your family tree, and acquire your digital QR-enabled PVC card with full access to our community welfare benefits.",
                    btn: "Become a Member"
                },
                advantages: [
                    { title: "Emergency Response Support", desc: "Provides immediate identification and quick support for safety and crisis management.", icon: "fa-solid fa-triangle-exclamation" },
                    { title: "Unified ID Card System", desc: "Streamlines identification and connectivity across the entire organization or community.", icon: "fa-solid fa-fingerprint" },
                    { title: "QR Code with Family Details", desc: "Advanced digital integration for quick and secure access to essential kinship information.", icon: "fa-solid fa-qrcode" },
                    { title: "Business Offers & Discounts", desc: "Acts as a premium membership pass for exclusive economic benefits and discounts.", icon: "fa-solid fa-tag" },
                    { title: "Durable PVC ID Card", desc: "A durable, high-quality physical card format suitable for long-term daily use.", icon: "fa-solid fa-layer-group" },
                    { title: "Temple Pooja Initiatives", desc: "Facilitates seamless participation, priority bookings, and recognition in traditional community activities.", icon: "fa-solid fa-fire" },
                    { title: "Business Promotion Tools", desc: "Serves as an influential tool for networking, professional visibility, and business growth.", icon: "fa-solid fa-bullhorn" },
                    { title: "Agricultural Resources & Support", desc: "Connects agrarian members directly to sector-specific modern resources, guidance, and aid.", icon: "fa-solid fa-seedling" },
                    { title: "Education Support & Career Guidance", desc: "Identifies students and young professionals for targeted academic scholarships and mentorship.", icon: "fa-solid fa-graduation-cap" },
                    { title: "Employment Assistance & Support", desc: "Validates member status for community-driven job placements, references, and assistance.", icon: "fa-solid fa-briefcase" },
                    { title: "Group Insurance Benefits", desc: "Links the cardholder to collective medical security, health benefits, and life cover.", icon: "fa-solid fa-heart-pulse" },
                    { title: "Water Welfare & Ecological Renewal", desc: "Directs contributions and volunteer efforts to community-driven pond renovations and water body revival.", icon: "fa-solid fa-water" }
                ]
            },
            ta: {
                backBtn: "முகப்பிற்குச் செல்ல",
                hero: {
                    label: "பிரத்தியேக சலுகைகள்",
                    title: "அடையாள அட்டை நன்மைகள்",
                    desc: "பூந்துறை காடை அடையாள அட்டை என்பது வெறும் அடையாளம் மட்டுமல்ல; இது கூட்டு பாதுகாப்பு, சமூக செழிப்பு மற்றும் பண்பாட்டு பாதுகாப்பிற்கான ஒரு நுழைவாயிலாகும். நமது உறுப்பினர்களை ஆதரிப்பதற்காக வடிவமைக்கப்பட்ட பன்னிரண்டு முக்கிய நன்மைகளை இங்கே ஆராயுங்கள்.",
                    applyBtn: "அடையாள அட்டைக்கு விண்ணப்பிக்கவும்"
                },
                card: {
                    flipHint: "அட்டையைத் திருப்ப அதன் மீது நகர்த்தவும் அல்லது அழுத்தவும்"
                },
                cta: {
                    title: "இன்றே உங்கள் அடையாள அட்டையைப் பெறுங்கள்",
                    desc: "நமது குலத்தின் அதிகாரப்பூர்வ உறுப்பினராக இணைந்து,12 பிரத்யேக நன்மைகளுடன் உங்கள் பாதுகாப்பான இயற்பியல் PVC அட்டை மற்றும் டிஜிட்டல் QR இணைப்பைப் பெற்றிடுங்கள்.",
                    btn: "உறுப்பினர் பதிவு செய்ய"
                },
                advantages: [
                    { title: "அவசர கால உதவி ஆதரவு", desc: "பாதுகாப்பு மற்றும் பேரிடர் மேலாண்மைக்கு உடனடி அடையாளத்தையும் விரைவான ஆதரவையும் வழங்குகிறது.", icon: "fa-solid fa-triangle-exclamation" },
                    { title: "ஒருங்கிணைந்த அடையாள அட்டை", desc: "ஒட்டுமொத்த சமூகம் மற்றும் அமைப்பிற்குள் தடையற்ற அடையாளப்படுத்தலையும் இணைப்பையும் எளிதாக்குகிறது.", icon: "fa-solid fa-fingerprint" },
                    { title: "குடும்ப விவரங்களுடன் QR குறியீடு", desc: "அத்தியாவசிய குடும்ப விவரங்களை விரைவாகவும் பாதுகாப்பாகவும் அணுக உதவும் மேம்பட்ட டிஜிட்டல் ஒருங்கிணைப்பு.", icon: "fa-solid fa-qrcode" },
                    { title: "பிரத்யேக வணிக சலுகைகள் & தள்ளுபடிகள்", desc: "பிரத்யேக பொருளாதார நன்மைகள் மற்றும் தள்ளுபடிகளைப் பெற ஒரு பிரீமியம் உறுப்பினர் அட்டையாகச் செயல்படுகிறது.", icon: "fa-solid fa-tag" },
                    { title: "நீடித்த PVC அடையாள அட்டை", desc: "நீண்ட கால தினசரி பயன்பாட்டிற்கு ஏற்ற நீடித்த, உயர்தர இயற்பியல் அட்டை வடிவம்.", icon: "fa-solid fa-layer-group" },
                    { title: "கோயில் பூஜை வழிபாட்டு முன்னுரிமை", desc: "பாரம்பரிய சமூக மற்றும் ஆன்மீக வழிபாடுகளில் தடையற்ற பங்கேற்பு மற்றும் முன்னுரிமையை வழங்குகிறது.", icon: "fa-solid fa-fire" },
                    { title: "வணிக மேம்பாட்டு வாய்ப்புகள்", desc: "சமூக உறவுகள், தொழில்முறை அங்கீகாரம் மற்றும் வணிக வளர்ச்சிக்கு ஒரு சிறந்த கருவியாக அமைகிறது.", icon: "fa-solid fa-bullhorn" },
                    { title: "விவசாய ஆதரவு மற்றும் வழிகாட்டுதல்", desc: "விவசாயப் பெருமக்களை நேரடியாக நவீன விவசாய வளங்கள், வழிகாட்டுதல் மற்றும் உதவிகளுடன் இணைக்கிறது.", icon: "fa-solid fa-seedling" },
                    { title: "கல்வி உதவி & தொழில் வழிகாட்டுதல்", desc: "மாணவச் செல்வங்கள் மற்றும் இளம் பட்டதாரிகளை அடையாளம் கண்டு பிரத்யேக கல்வி உதவித்தொகை மற்றும் வழிகாட்டுதலை வழங்குகிறது.", icon: "fa-solid fa-graduation-cap" },
                    { title: "வேலைவாய்ப்பு ஆதரவு மற்றும் வழிகாட்டல்", desc: "சமூக அளவிலான வேலைவாய்ப்பு, பரிந்துரைகள் மற்றும் உதவிக்கு உறுப்பினரின் தகுதியை உறுதிப்படுத்துகிறது.", icon: "fa-solid fa-briefcase" },
                    { title: "குழு காப்பீட்டுத் திட்டம்", desc: "அட்டைதாரர்களை கூட்டு மருத்துவப் பாதுகாப்பு, சுகாதார நன்மைகள் மற்றும் ஆயுள் காப்பீட்டுடன் இணைக்கிறது.", icon: "fa-solid fa-heart-pulse" },
                    { title: "நீர்வழி தடம் & குளம் சீரமைப்பு", desc: "சமூக அளவிலான குளம் சீரமைப்பு மற்றும் நீர்நிலை மீட்புப் பணிகளுக்கு பங்களிப்புகளையும் தன்னார்வ முயற்சிகளையும் வழிநடத்துகிறது.", icon: "fa-solid fa-water" }
                ]
            }
        };

        let currentLang = 'en';

        // Translate specific elements
        function translatePage() {
            const t = translations[currentLang];
            
            document.querySelectorAll('[data-i18n]').forEach(el => {
                const keys = el.getAttribute('data-i18n').split('.');
                let value = t;
                keys.forEach(k => { value = value[k] || value; });
                el.innerText = value;
            });

            renderAdvantages();
        }

        // Render Cards
        function renderAdvantages() {
            const grid = document.getElementById('advantagesGrid');
            grid.innerHTML = '';
            const advantages = translations[currentLang].advantages;

            advantages.forEach((adv, index) => {
                const num = String(index + 1).padStart(2, "0");
                const delay = index * 0.1; // Stagger animation

                const cardHTML = `
                    <div class="advantage-item bg-white/80 backdrop-blur-sm border border-[#c49a3c]/15 hover:border-[#c49a3c]/60 rounded-2xl p-8 flex flex-col items-start relative overflow-hidden group shadow-md hover:shadow-[0_15px_30px_rgba(196,154,60,0.12)] hover:-translate-y-1.5 transition-all duration-300 cursor-pointer" onclick="openModal(${index})" style="animation-delay: ${delay}s">
                        <div class="absolute inset-0 bg-gradient-to-tr from-[#c49a3c]/5 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"></div>
                        
                        <span class="absolute top-4 right-6 font-serif text-3xl font-extrabold text-stone-200 group-hover:text-[#c49a3c]/20 transition-colors pointer-events-none">
                            ${num}
                        </span>

                        <div class="bg-gradient-to-br from-[#8b1d1d] to-[#5d1712] text-white p-3.5 rounded-xl shadow-lg mb-6 group-hover:scale-110 transition-transform duration-300 relative z-10">
                            <i class="${adv.icon} text-xl w-6 h-6 flex items-center justify-center"></i>
                            <span class="absolute -inset-1 rounded-xl border border-white/20 animate-pulse pointer-events-none"></span>
                        </div>

                        <h3 class="font-serif text-xl font-bold text-[#5d1712] mb-3 relative z-10 leading-snug group-hover:text-[#8b1d1d] transition-colors">
                            ${adv.title}
                        </h3>

                        <p class="text-stone-600 text-sm leading-relaxed relative z-10 font-normal opacity-90">
                            ${adv.desc}
                        </p>

                        <div class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-0 bg-[#c49a3c] group-hover:h-[60%] transition-all duration-500 rounded-r"></div>
                    </div>
                `;
                grid.insertAdjacentHTML('beforeend', cardHTML);
            });
        }

        // Language Toggle Logic
        const langToggle = document.getElementById('langToggle');
        langToggle.addEventListener('click', () => {
            currentLang = currentLang === 'en' ? 'ta' : 'en';
            langToggle.innerText = currentLang === 'en' ? 'தமிழ்' : 'English';
            translatePage();
        });

        // 3D Card Flip Logic
        const idCard3D = document.getElementById('idCard3D');
        idCard3D.addEventListener('click', () => {
            idCard3D.classList.toggle('flipped');
        });
        idCard3D.addEventListener('mouseenter', () => {
            idCard3D.classList.add('flipped');
        });
        idCard3D.addEventListener('mouseleave', () => {
            idCard3D.classList.remove('flipped');
        });

        // Modal Logic
        const modal = document.getElementById('detailModal');
        const modalBackdrop = document.getElementById('modalBackdrop');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const modalIcon = document.getElementById('modalIcon');
        const modalNumber = document.getElementById('modalNumber');
        const modalTitle = document.getElementById('modalTitle');
        const modalDesc = document.getElementById('modalDesc');

        window.openModal = function(index) {
            const adv = translations[currentLang].advantages[index];
            modalIcon.className = `${adv.icon} text-2xl`;
            modalNumber.innerText = String(index + 1);
            modalTitle.innerText = adv.title;
            modalDesc.innerText = adv.desc;
            modal.classList.add('show');
        }

        function closeModal() {
            modal.classList.remove('show');
        }

        modalBackdrop.addEventListener('click', closeModal);
        closeModalBtn.addEventListener('click', closeModal);

        // Initial Render
        translatePage();

    </script>
</body>
</html>
