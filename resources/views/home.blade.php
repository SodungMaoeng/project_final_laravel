<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Courses</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #4a6bff;
            --secondary-color: #6c757d;
            --accent-color: #ff6b6b;
            --light-bg: #f8f9fa;
            --dark-color: #343a40;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            line-height: 1.6;
        }

        .hero-section {
            background: linear-gradient(135deg, #f5f7ff 0%, #e3e9ff 100%);
            padding: 100px 0;
            border-radius: 0 0 30px 30px;
            margin-bottom: 60px;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            padding: 10px 25px;
            font-weight: 600;
        }

        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
            padding: 10px 25px;
            font-weight: 600;
        }

        .btn-primary:hover, .btn-outline-primary:hover {
            background-color: #3a5bff;
            border-color: #3a5bff;
        }

        .section-title {
            position: relative;
            margin-bottom: 40px;
            color: var(--dark-color);
        }

        .section-title:after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -10px;
            width: 60px;
            height: 4px;
            background-color: var(--accent-color);
            border-radius: 2px;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s ease;
            height: 100%;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .course-card .card-body {
            padding: 25px;
        }

        .rating {
            color: #ffc107;
        }

        .testimonial-card {
            background-color: var(--light-bg);
            border-left: 5px solid var(--primary-color);
        }

        .feature-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            background-color: rgba(74, 107, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            color: var(--primary-color);
            font-size: 24px;
        }

        .community-section {
            background-color: var(--light-bg);
            border-radius: 20px;
            padding: 60px 40px;
            margin: 60px 0;
        }

        .course-badge {
            background-color: rgba(255, 107, 107, 0.1);
            color: var(--accent-color);
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .stats {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-color);
        }

        .stats-label {
            color: var(--secondary-color);
            font-size: 1rem;
        }

        footer {
            background-color: var(--dark-color);
            color: white;
            padding: 60px 0 30px;
            margin-top: 80px;
        }

        .footer-link {
            color: #ddd;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-link:hover {
            color: white;
        }

        .social-icons a {
            color: white;
            font-size: 1.2rem;
            margin-right: 15px;
            transition: color 0.3s;
        }

        .social-icons a:hover {
            color: var(--primary-color);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.8rem;
            color: var(--primary-color) !important;
        }

        .nav-link {
            font-weight: 500;
        }

        .nav-link.active {
            color: var(--primary-color) !important;
        }

        /* Animation for cards */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeInUp 0.6s ease forwards;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-graduation-cap me-2"></i>Online Courses
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#courses">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#community">Community</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimonials">Success Stories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-outline-primary" href="#signin">Sign In</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4">Unlock Skills That Move You Forward</h1>
                    <p class="lead mb-4">Master in-demand skills from industry experts. Learn at your pace, track your growth, and stay ahead.</p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="#" class="btn btn-primary btn-lg">Start Learning Free</a>
                        <a href="#courses" class="btn btn-outline-primary btn-lg">Browse Courses</a>
                    </div>
                </div>
                <div class="col-lg-6 mt-5 mt-lg-0">
                    <div class="position-relative">
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                             alt="People learning together" class="img-fluid rounded-3 shadow">
                        <div class="position-absolute bottom-0 start-0 bg-white p-3 m-3 rounded-3 shadow-sm">
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <h4 class="mb-0 stats">500,000+</h4>
                                    <small class="stats-label">Learners Worldwide</small>
                                </div>
                                <div class="border-start ps-3">
                                    <h4 class="mb-0 stats">4.8/5</h4>
                                    <small class="stats-label">Average Rating</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="container mb-5">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="section-title d-inline-block">Smart Learning, Real Results</h2>
                <p class="text-muted mx-auto" style="max-width: 700px;">We make learning effective, enjoyable, and personalized—so you stay motivated and actually finish what you start.</p>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="feature-icon">
                    <i class="fas fa-brain"></i>
                </div>
                <h4>Learn Smarter</h4>
                <p class="text-muted">Reduce manual errors and save hours every pay cycle with our AI-assisted payroll engine.</p>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="feature-icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <h4>Built for Your Schedule</h4>
                <p class="text-muted">Learn anytime, anywhere. Pick up where you left off, even on your coffee break.</p>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="feature-icon">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <h4>Learn from the Best</h4>
                <p class="text-muted">Courses are led by top professionals and practitioners who know what works.</p>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="feature-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h4>Community-Powered</h4>
                <p class="text-muted">Join peer groups, ask questions, and build your portfolio with others on the same journey.</p>
            </div>
        </div>
    </section>

    <!-- Community Section -->
    <section id="community" class="container community-section">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h2 class="section-title">You're Not Learning Alone</h2>
                <p>At Skillery, learning is more than just watching lessons — it's about growing together. Our vibrant community connects learners from around the world through active discussion forums, peer groups based on shared interests, and monthly live events like workshops and open Q&As.</p>
                <p>Whether you're diving into AI, design, or writing, you'll find support, collaboration, and motivation through leaderboards, challenges, and shared achievements. Join a space where curiosity meets connection.</p>
                <a href="https://www.skillery.com/community" class="btn btn-primary mt-3">Join Our Community</a>
            </div>
            <div class="col-lg-6 mt-5 mt-lg-0">
                <img src="https://images.unsplash.com/photo-1523580494863-6f3031224c94?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                     alt="Community learning together" class="img-fluid rounded-3 shadow">
            </div>
        </div>
    </section>

    <!-- Courses Section -->
    <section id="courses" class="container mb-5">
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="section-title">This Month's Most-Loved Courses</h2>
                <p class="text-muted">Trending with our learners — take a look at what's capturing attention and delivering results.</p>
            </div>
        </div>

        <div class="row g-4" id="courses-container">
            <!-- Courses will be loaded here by JavaScript -->
        </div>
    </section>


    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h3 class="mb-3">
                        <i class="fas fa-graduation-cap me-2"></i>Skillery
                    </h3>
                    <p>Master in-demand skills from industry experts. Learn at your pace, track your growth, and stay ahead.</p>
                    <div class="social-icons mt-4">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 mb-4 mb-md-0">
                    <h5 class="mb-3">Platform</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="footer-link">Browse Courses</a></li>
                        <li class="mb-2"><a href="#" class="footer-link">Instructors</a></li>
                        <li class="mb-2"><a href="#" class="footer-link">Pricing</a></li>
                        <li class="mb-2"><a href="#" class="footer-link">Success Stories</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-4 mb-4 mb-md-0">
                    <h5 class="mb-3">Company</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="footer-link">About Us</a></li>
                        <li class="mb-2"><a href="#" class="footer-link">Careers</a></li>
                        <li class="mb-2"><a href="#" class="footer-link">Blog</a></li>
                        <li class="mb-2"><a href="#" class="footer-link">Press</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-4">
                    <h5 class="mb-3">Stay Updated</h5>
                    <p>Subscribe to our newsletter for the latest course updates and learning tips.</p>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Your email address">
                        <button class="btn btn-primary" type="button">Subscribe</button>
                    </div>
                </div>
            </div>

            <hr class="mt-5 mb-4" style="border-color: #555;">

            <div class="row">
                <div class="col-md-6">
                    <p class="mb-0">&copy; 2023 Skillery. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="#" class="footer-link me-3">Privacy Policy</a>
                    <a href="#" class="footer-link me-3">Terms of Service</a>
                    <a href="#" class="footer-link">Cookie Policy</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JavaScript -->
    <script>
        // Course data
        const courses = [
            {
                title: "Master Prompt Engineering with AI",
                rating: 4.9,
                reviews: "5,200+",
                description: "Learn how to write effective prompts for tools like ChatGPT, Midjourney, and more.",
                category: "AI & Tech"
            },
            {
                title: "UI/UX Design Fundamentals",
                rating: 4.8,
                reviews: "2,700+",
                description: "Build beautiful and functional user interfaces with solid design principles and hands-on projects.",
                category: "Design"
            },
            {
                title: "Build Your First Website",
                rating: 4.7,
                reviews: "2,900+",
                description: "A complete beginner's guide to launching your first responsive website from scratch.",
                category: "Web Dev"
            },
            {
                title: "Digital Marketing Strategy for Beginners",
                rating: 4.8,
                reviews: "2,500+",
                description: "Learn SEO, email marketing, social media strategy, and paid ads in one power-priced course.",
                category: "Marketing"
            },
            {
                title: "Productivity & Time Management",
                rating: 4.9,
                reviews: "3,000+",
                description: "Learn how to organize your time, stay focused, and boost productivity with proven techniques.",
                category: "Business"
            },
            {
                title: "Data Analytics with Python",
                rating: 4.7,
                reviews: "1,900+",
                description: "Explore how to analyze and visualize data using Python, Pandas, Matplotlib, and more.",
                category: "Data Science"
            }
        ];

        // Function to generate star rating HTML
        function generateStarRating(rating) {
            let stars = '';
            const fullStars = Math.floor(rating);
            const hasHalfStar = rating % 1 !== 0;

            for (let i = 0; i < fullStars; i++) {
                stars += '<i class="fas fa-star"></i>';
            }

            if (hasHalfStar) {
                stars += '<i class="fas fa-star-half-alt"></i>';
            }

            const emptyStars = 5 - Math.ceil(rating);
            for (let i = 0; i < emptyStars; i++) {
                stars += '<i class="far fa-star"></i>';
            }

            return stars;
        }

        // Function to render courses
        function renderCourses() {
            const coursesContainer = document.getElementById('courses-container');
            coursesContainer.innerHTML = '';

            courses.forEach((course, index) => {
                const courseCard = document.createElement('div');
                courseCard.className = 'col-md-6 col-lg-4 fade-in';
                courseCard.style.animationDelay = `${index * 0.1}s`;

                courseCard.innerHTML = `
                    <div class="card course-card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <span class="course-badge">${course.category}</span>
                                <span class="text-muted"><i class="far fa-clock me-1"></i> 12 weeks</span>
                            </div>
                            <h4 class="card-title mb-3">${course.title}</h4>
                            <p class="card-text text-muted mb-3">${course.description}</p>
                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <div>
                                    <div class="rating mb-1">
                                        ${generateStarRating(course.rating)}
                                    </div>
                                    <small class="text-muted">${course.rating} (${course.reviews} reviews)</small>
                                </div>
                                <a href="#" class="btn btn-primary">Enroll Now</a>
                            </div>
                        </div>
                    </div>
                `;

                coursesContainer.appendChild(courseCard);
            });
        }

        // Function to animate elements on scroll
        function animateOnScroll() {
            const elements = document.querySelectorAll('.fade-in');

            elements.forEach(element => {
                const elementTop = element.getBoundingClientRect().top;
                const windowHeight = window.innerHeight;

                if (elementTop < windowHeight - 100) {
                    element.style.opacity = '1';
                    element.style.transform = 'translateY(0)';
                }
            });
        }

        // Initialize when page loads
        document.addEventListener('DOMContentLoaded', function() {
            // Render courses
            renderCourses();

            // Add scroll animation
            window.addEventListener('scroll', animateOnScroll);
            animateOnScroll(); // Initial check

            // Navbar active link update
            const navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    navLinks.forEach(item => item.classList.remove('active'));
                    this.classList.add('active');
                });
            });

            // Newsletter form submission
            const newsletterForm = document.querySelector('.input-group button');
            newsletterForm.addEventListener('click', function() {
                const emailInput = document.querySelector('.input-group input');
                if (emailInput.value && emailInput.value.includes('@')) {
                    alert('Thank you for subscribing to our newsletter!');
                    emailInput.value = '';
                } else {
                    alert('Please enter a valid email address.');
                }
            });
        });
    </script>
</body>
</html>
