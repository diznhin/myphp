<?php include __DIR__ . '/includes/header.php'; ?>

<section id="home">
    <div class="main-container">
        <div class="image" data-aos="zoom-in-right" data-aos-duration="2500">
            <img src="<?= htmlspecialchars($homeData['image_url']) ?>" alt="Profile Image">
        </div>
        <div class="content">
            <h1 data-aos="fade-left" data-aos-duration="1000" data-aos-delay="800">
                <?= $homeData['greeting_title'] ?>
            </h1>
            <div class="typewriter" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="900">
                I'm a <span id="typewriter-text"></span>
            </div>
            <p data-aos="flip-up" data-aos-duration="1000" data-aos-delay="1000">
                <?= nl2br(htmlspecialchars($homeData['short_description'])) ?>
            </p>
            <div class="social-links" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="1100">
                <a href="<?= htmlspecialchars($homeData['github_url']) ?>" target="_blank"><i class="fa-brands fa-github"></i></a>
                <a href="<?= htmlspecialchars($homeData['instagram_url']) ?>" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                <a href="<?= htmlspecialchars($homeData['facebook_url']) ?>" target="_blank"><i class="fa-brands fa-facebook"></i></a>
            </div>
            <div class="btn" data-aos="zoom-out-left" data-aos-duration="1000" data-aos-delay="1300">
                <a href="<?= htmlspecialchars($homeData['cv_file']) ?>" download><button>Download CV</button></a>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        AOS.init({ offset: 0 });

        const words = <?= json_encode($homeData['typewriter_words']) ?>;
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

        type();
    });
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>
