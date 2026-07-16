

        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const navLinks = document.getElementById('navLinks');
        mobileMenuBtn.addEventListener('click', function() {
            navLinks.classList.toggle('active');
            if (navLinks.classList.contains('active')) {
                mobileMenuBtn.innerHTML = '<i class="fas fa-times"></i>';
            } else {
                mobileMenuBtn.innerHTML = '<i class="fas fa-bars"></i>';
            }
        });

        // Testimonial slider
        const testimonialSlider = document.getElementById('testimonialSlider');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        let scrollAmount = 0;
        nextBtn.addEventListener('click', function() {
            const cardWidth = document.querySelector('.testimonial-card').offsetWidth + 30;
            const maxScroll = testimonialSlider.scrollWidth - testimonialSlider.clientWidth;
            scrollAmount += cardWidth;
            if (scrollAmount > maxScroll) scrollAmount = 0;
            testimonialSlider.scrollTo({ left: scrollAmount, behavior: 'smooth' });
        });
        prevBtn.addEventListener('click', function() {
            const cardWidth = document.querySelector('.testimonial-card').offsetWidth + 30;
            scrollAmount -= cardWidth;
            if (scrollAmount < 0) scrollAmount = testimonialSlider.scrollWidth - testimonialSlider.clientWidth;
            testimonialSlider.scrollTo({ left: scrollAmount, behavior: 'smooth' });
        });

        // Modal functionality
        const modal = document.getElementById('contentModal');
        const modalTitle = document.getElementById('modalTitle');
        const modalText = document.getElementById('modalText');
        const closeModal = document.getElementById('closeModal');
        function openModal(title, content) {
            modalTitle.textContent = title;
            modalText.innerHTML = content;
            modal.style.display = 'flex';
        }
        closeModal.addEventListener('click', function() {
            modal.style.display = 'none';
        });
        window.addEventListener('click', function(event) {
            if (event.target === modal) modal.style.display = 'none';
        });

        // Button event handlers
        document.getElementById('viewMenuBtn').addEventListener('click', function() {
            openModal('Our Full Menu', `
                <h3>Breakfast</h3>
                <ul>
                    <li>Egg & Toast - R15</li>
                    <li>French Toast - R20</li>
                    <li>Breakfast Wrap - R25</li>
                </ul>
                <h3>Lunch Specials</h3>
                <ul>
                    <li>Beef Patty Kota - R25</li>
                    <li>Chicken Kota - R20</li>
                    <li>Veggie Kota - R18</li>
                    <li>Loaded Fries - R15</li>
                </ul>
                <h3>Beverages</h3>
                <ul>
                    <li>Coffee - R10</li>
                    <li>Tea - R8</li>
                    <li>Soft Drinks - R12</li>
                    <li>Fresh Juice - R15</li>
                </ul>
            `);
        });
        document.getElementById('findUsBtn').addEventListener('click', function() {
            openModal('Find Us On Campus', `
                <p><strong>Location:</strong> Main Campus, Next to Student Center</p>
                <p><strong>Hours:</strong></p>
                <ul>
                    <li>Monday - Friday: 7:30 AM - 6:00 PM</li>
                    <li>Saturday: 9:00 AM - 2:00 PM</li>
                    <li>Sunday: Closed</li>
                </ul>
                <p><strong>Contact:</strong> vutcafe@vut.ac.za | +27 67 993 3441</p>
                <p>We're located in the heart of campus, making it easy to grab a bite between classes!</p>
            `);
        });
        document.getElementById('specialsBtn').addEventListener('click', function() {
            openModal('Today\'s Specials', `
                <h3>Daily Discount</h3>
                <p>15% off all meals between 2 PM - 4 PM with student ID</p>
                <h3>Today's Featured Items</h3>
                <ul>
                    <li>Chicken Curry & Rice - R30 (Regularly R35)</li>
                    <li>Vegetable Stir Fry - R25 (Regularly R30)</li>
                    <li>Chocolate Milkshake - R12 (Regularly R15)</li>
                </ul>
                <p>Special offers change daily, so check back tomorrow for new deals!</p>
            `);
        });
        document.getElementById('ourStoryBtn').addEventListener('click', function() {
            openModal('Our Story', `
                <p>VUT Cafeteria was established in 2005 with a simple mission: to provide quality, affordable meals to students on campus.</p>
                <p>Over the years, we've grown from a small kiosk to a full-service cafeteria, but our commitment to student satisfaction has never changed.</p>
                <h3>Our Values</h3>
                <ul>
                    <li><strong>Quality:</strong> We use fresh ingredients and prepare everything daily</li>
                    <li><strong>Affordability:</strong> We keep prices student-friendly</li>
                    <li><strong>Community:</strong> We're more than a cafeteria - we're part of campus life</li>
                    <li><strong>Sustainability:</strong> We're committed to environmentally friendly practices</li>
                </ul>
                <p>Thank you for making us your campus dining destination!</p>
            `);
        });