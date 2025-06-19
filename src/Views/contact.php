<?php
// Bắt đầu session nếu chưa có
if (session_status() === PHP_SESSION_NONE) session_start();

// Gán thông báo và xoá sau khi hiển thị
$success = $_SESSION['success'] ?? '';
$error = $_SESSION['error'] ?? '';
unset($_SESSION['success'], $_SESSION['error']);
?>

<?php include __DIR__ . '/includes/header.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Projects</title>
</head>
<body>

<section id="contact" class="section-box alt-bg" data-aos="fade-up" data-aos-duration="1200">
    <div class="container contact-container">
        <h2 class="contact-title"><i class="fa-solid fa-envelope"></i> Contact</h2>

        <!-- Hiển thị thông báo -->
        <?php if ($success): ?>
            <p style="color: green; text-align:center;">✔️ <?= htmlspecialchars($success) ?></p>
        <?php elseif ($error): ?>
            <p style="color: red; text-align:center;">❌ <?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <div class="contact-flex">
            <form class="contact-form" action="/contact" method="post">
                <div class="form-group">
                    <label for="name"><i class="fa-solid fa-user"></i> Name</label>
                    <input type="text" id="name" name="name" required placeholder="Your Name">
                </div>
                <div class="form-group">
                    <label for="email"><i class="fa-solid fa-paper-plane"></i> Email</label>
                    <input type="email" id="email" name="email" required placeholder="your@email.com">
                </div>
                <div class="form-group">
                    <label for="subject"><i class="fa-solid fa-tag"></i> Subject</label>
                    <input type="text" id="subject" name="subject" required placeholder="Subject">
                </div>
                <div class="form-group">
                    <label for="message"><i class="fa-solid fa-message"></i> Message</label>
                    <textarea id="message" name="message" rows="5" required placeholder="Your message..."></textarea>
                </div>
                <button type="submit" class="btn-submit">
                    <i class="fa-solid fa-paper-plane"></i> Send
                </button>
            </form>

            <div class="contact-info">
                <div class="info-item">
                    <span class="info-icon"><i class="fa-solid fa-envelope"></i></span>
                    <span class="info-text"><a href="mailto:dieuhiennguyen.2006@gmail.com">dieuhiennguyen.2006@gmail.com</a></span>
                </div>
                <div class="info-item">
                    <span class="info-icon"><i class="fa-solid fa-phone"></i></span>
                    <span class="info-text"><a href="tel:+84123456789">+84 123 456 789</a></span>
                </div>
                <div class="info-item">
                    <span class="info-icon"><i class="fa-solid fa-location-dot"></i></span>
                    <span class="info-text">Đà Nẵng City, Vietnam</span>
                </div>

                <div class="contact-map">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3833.8354999936127!2d108.2207993152881!3d16.07411894356626!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314219b18f7a9753%3A0x849d6b77a2e2a065!2zVMOibiBDaMOtbmggQ-G7lSBHaeG6o24gxJDDtG5nIMSQw6AgTuG7mWkgRG5hbmcgLSBE4bqndSBIaeG7h24gUXXhuq1u!5e0!3m2!1sen!2s!4v1700000000000!5m2!1sen!2s" 
                        width="100%" 
                        height="200" 
                        style="border:0; border-radius: 12px; box-shadow: 0 4px 16px rgba(0,0,0,0.05);" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- AOS & Typewriter Script -->
<script src="https://unpkg.com/aos@next/dist/aos.js" defer></script>
<script defer>
    document.addEventListener('DOMContentLoaded', function () {
        AOS.init({ offset: 0 });

        const words = ["Developer", "Designer", "Content Creator", "Freelancer"];
        const typewriterSpan = document.getElementById('typewriter-text');
        let wordIndex = 0;
        let charIndex = 0;
        let isDeleting = false;

        function type() {
            const currentWord = words[wordIndex];
            if (isDeleting) {
                typewriterSpan.textContent = currentWord.substring(0, charIndex--);
            } else {
                typewriterSpan.textContent = currentWord.substring(0, charIndex++);
            }

            if (!isDeleting && charIndex === currentWord.length + 1) {
                isDeleting = true;
                setTimeout(type, 1000);
            } else if (isDeleting && charIndex === 0) {
                isDeleting = false;
                wordIndex = (wordIndex + 1) % words.length;
                setTimeout(type, 500);
            } else {
                setTimeout(type, isDeleting ? 60 : 120);
            }
        }

        if (typewriterSpan) {
            type();
        }
    });
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>
