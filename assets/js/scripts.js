const firebaseConfig = {
    projectId: "reckstar-1522999382871",
    appId: "1:472879872249:web:90596f9ae4aabbbe61ca28",
    apiKey: "AIzaSyAp2-Mig0oB_Kxgseh3cbueqwBHmtg2kKY",
    authDomain: "reckstar-1522999382871.firebaseapp.com",
    storageBucket: "reckstar-1522999382871.firebasestorage.app",
    messagingSenderId: "472879872249"
};

(function($) {

    (function($) {

        $(document).ready(function() {
            // 1. Initialize Lucide Icons
            lucide.createIcons();

            // 2. Header Scroll Effect
            $(window).on('scroll', function() {
                if ($(window).scrollTop() > 20) {
                    $('#main-header').addClass('glass py-3 shadow-sm').removeClass('bg-transparent py-5');
                    $('.nav-text').addClass('text-navy').removeClass('text-white');
                } else {
                    $('#main-header').removeClass('glass py-3 shadow-sm').addClass('bg-transparent py-5');
                    $('.nav-text').addClass('text-white').removeClass('text-navy');
                }
            });

            // 3. Mobile Menu Toggle
            $('#mobile-menu-btn').on('click', function() {
                const menu = $('#mobile-menu');
                const icon = $(this).find('i');
                if (menu.hasClass('hidden')) {
                    menu.removeClass('hidden').hide().slideDown(300);
                    icon.attr('data-lucide', 'x');
                    if ($(window).scrollTop() <= 20) {
                        $('.nav-text').addClass('text-navy').removeClass('text-white');
                    }
                } else {
                    menu.slideUp(300, function() { $(this).addClass('hidden'); });
                    icon.attr('data-lucide', 'menu');
                    if ($(window).scrollTop() <= 20) {
                        $('.nav-text').addClass('text-white').removeClass('text-navy');
                    }
                }
                lucide.createIcons();
            });

            $('#mobile-menu a').on('click', function() {
                $('#mobile-menu').slideUp(300, function() { $(this).addClass('hidden'); });
                $('#mobile-menu-btn i').attr('data-lucide', 'menu');
                if ($(window).scrollTop() <= 20) {
                    $('.nav-text').addClass('text-white').removeClass('text-navy');
                }
                lucide.createIcons();
            });

            // 4. FAQ Accordion
            $('.faq-btn').on('click', function() {
                const content = $(this).next('.faq-content');
                const icon = $(this).find('.faq-icon');
                $('.faq-content').not(content).slideUp(300);
                $('.faq-icon').not(icon).removeClass('rotate-180');
                content.slideToggle(300);
                icon.toggleClass('rotate-180');
            });

            // 5. Scroll Animations - Removed as per request
            let dbInstance = null;
            let addDocFn = null;
            let serverTimestampFn = null;
            let collectionFn = null;

            $('#quote-form').on('submit', async function(e) {
                e.preventDefault();
                $('#form-error').addClass('hidden').text('');
                
                const propertyType = $('#prop-type').val();
                const postcode = $('#postcode').val();
                const phone = $('#phone').val();
                const email = $('#email').val();
                
                const services = [];
                $('.service-checkbox:checked').each(function() { services.push($(this).val()); });

                if (services.length === 0) {
                    $('#form-error').removeClass('hidden').text('Please select at least one service.');
                    return;
                }

                const submitBtn = $('#submit-btn');
                const originalText = submitBtn.html();
                submitBtn.prop('disabled', true).html('<i data-lucide="loader-2" class="animate-spin inline-block mr-2"></i> Submitting...');
                lucide.createIcons();

                try {
                    // Dynamically load Firebase only when the user submits the form
                    // This prevents CORS errors from blocking the rest of the UI script
                    if (!dbInstance) {
                        const { initializeApp } = await import("https://www.gstatic.com/firebasejs/10.14.1/firebase-app.js");
                        const { getFirestore, collection, addDoc, serverTimestamp } = await import("https://www.gstatic.com/firebasejs/10.14.1/firebase-firestore.js");
                        
                        const app = initializeApp(firebaseConfig);
                        dbInstance = getFirestore(app, "ai-studio-7cb26f87-eea1-4a20-a266-9783acea3985");
                        addDocFn = addDoc;
                        serverTimestampFn = serverTimestamp;
                        collectionFn = collection;
                    }

                    await addDocFn(collectionFn(dbInstance, 'quoteRequests'), {
                        propertyType, services, postcode, email, phone, createdAt: serverTimestampFn()
                    });
                    
                    $('#quote-form-container').addClass('hidden');
                    $('#success-message').removeClass('hidden').hide().fadeIn();
                } catch (err) {
                    console.error('Error:', err);
                    $('#form-error').removeClass('hidden').text('Something went wrong. Note: Form submission may be blocked if opening directly from a local folder (file://).');
                } finally {
                    submitBtn.prop('disabled', false).html(originalText);
                    lucide.createIcons();
                }
            });

            $('#submit-another').on('click', function() {
                $('#quote-form')[0].reset();
                $('#success-message').addClass('hidden');
                $('#quote-form-container').removeClass('hidden').hide().fadeIn();
            });
        });


        window.tailwind = window.tailwind || {};

        window.tailwind.config = {
          safelist: [
            'bg-navy',
            'bg-electric',
            'bg-safety',
            'bg-orange',
            'bg-light-grey'
          ],
          theme: {
            extend: {
              colors: {
                navy: '#0B1F3A',
                electric: '#1E90FF',
                safety: '#28C76F',
                orange: '#FF7A00',
                'light-grey': '#F8FAFC',
              },
              fontFamily: {
                sans: ['Inter', 'sans-serif'],
                heading: ['Space Grotesk', 'sans-serif'],
              },
            },
          },
        };


    })(jQuery)

})(jQuery)


