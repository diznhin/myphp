    </main>

    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <p>&copy; 2025 Diệu Hiền. All rights reserved.</p>
            <div class="social-links">
                <a href="https://github.com/" target="_blank" aria-label="GitHub">
                    <i class="fa-brands fa-github"></i>
                </a>
                <a href="https://instagram.com/" target="_blank" aria-label="Instagram">
                    <i class="fa-brands fa-instagram"></i>
                </a>
                <a href="https://facebook.com/" target="_blank" aria-label="Facebook">
                    <i class="fa-brands fa-facebook"></i>
                </a>
            </div>
        </div>
    </footer>

    <!-- AOS Animation -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({ offset: 0 });
    </script>

    <!-- Menu Mobile Toggle -->
    <script>
        const hamburger = document.querySelector(".hamburg");
        const cancel = document.querySelector(".cancel");
        const dropdown = document.querySelector(".dropdown");

        if (hamburger && cancel && dropdown) {
            hamburger.addEventListener("click", () => {
                dropdown.classList.add("active");
            });

            cancel.addEventListener("click", () => {
                dropdown.classList.remove("active");
            });
        }
    </script>

    <style>
        footer {
            background: linear-gradient(135deg, #f9f9f9 60%, #e3f0ff 100%);
            padding: 40px 0;
            position: relative;
            overflow: hidden;
            box-shadow: 0 -4px 24px rgba(0,0,0,0.04);
            z-index: 10;
        }

        footer::before {
            content: '';
            position: absolute;
            bottom: 0;
            right: 0;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(0,123,255,0.05) 0%, transparent 70%);
            border-radius: 50%;
            transform: translate(100px, 150px);
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            position: relative;
            z-index: 1;
        }

        .footer-container p {
            color: #234567;
            font-size: 1.1rem;
            font-weight: 500;
            background: linear-gradient(135deg, #234567 0%, #007bff 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            margin: 0;
        }

        footer .social-links {
            display: flex;
            gap: 20px;
            margin-top: 10px;
        }

        footer .social-links a {
            font-size: 1.4rem;
            color: #007bff;
            transition: all 0.3s ease;
            padding: 10px;
            border-radius: 50%;
            background: rgba(0,123,255,0.1);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        footer .social-links a:hover {
            transform: translateY(-5px);
            background: #007bff;
            color: #fff;
            box-shadow: 0 5px 15px rgba(0,123,255,0.3);
        }

        @media (max-width: 768px) {
            .footer-container {
                flex-direction: column;
                text-align: center;
                gap: 20px;
            }

            footer {
                padding: 30px 0;
            }

            footer .social-links {
                justify-content: center;
            }
        }

        @media (max-width: 576px) {
            .footer-container p {
                font-size: 1rem;
            }

            footer .social-links a {
                font-size: 1.2rem;
                padding: 8px;
            }
        }
    </style>

</body>
</html>
