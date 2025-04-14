<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>360° Feedback - Government News Stories</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script defer src="news.js"></script>
  <style>
    /* New styles for sliding news section */
    .news-slider-container {
      overflow: hidden;
      position: relative;
      width: 100%;
      background: linear-gradient(90deg, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 2%, rgba(255,255,255,1) 98%, rgba(255,255,255,0) 100%);
      padding: 3rem 0;
    }
    
    @keyframes slideNews {
      0% { transform: translateX(0); }
      100% { transform: translateX(-50%); }
    }
    
    .news-slider-track {
      display: flex;
      width: fit-content;
      animation: slideNews 60s linear infinite;
      padding: 2rem 0;
    }
    
    .news-slider-track:hover {
      animation-play-state: paused;
    }
    
    .news-item {
      min-width: 400px;
      margin-right: 2rem;
      transition: all 0.5s ease;
      padding: 1rem;
    }
    
    .news-item:hover {
      transform: scale(1.1);
      z-index: 10;
      position: relative;
    }
    
    .card-hover {
      transition: all 0.3s ease;
      height: 100%;
    }
    
    .card-hover:hover {
      box-shadow: 0 15px 30px rgba(0,0,0,0.15);
    }
    
    @media (max-width: 768px) {
      .news-item {
        min-width: 300px;
      }
      .news-item:hover {
        transform: scale(1.05);
      }
      .news-slider-container {
        padding: 2rem 0;
      }
      .news-slider-track {
        padding: 1rem 0;
      }
    }
  </style>
</head>
<body class="bg-gray-50">

  <!-- Navigation -->
  <nav class="bg-gradient-to-r from-purple-700 to-purple-900 text-white shadow-lg sticky top-0 z-50">
    <div class="container mx-auto px-4 sm:px-6 py-4">
      <div class="flex justify-between items-center">
        <div class="text-xl font-bold">360° Feedback Portal</div>
        <div class="hidden md:flex items-center space-x-6">
          <a href="index.php" class="hover:text-blue-200 transition">Home</a>
          <a href="news.php" class="hover:text-blue-200 transition">News Stories</a>
          <a href="feedback.php" class="hover:text-blue-200 transition">Submit Feedback</a>
          <a href="analysis.php" class="hover:text-blue-200 transition">Analysis</a>
          <a href="about.html" class="hover:text-blue-200 transition">About</a>
          <a href="register.php" class="bg-white text-purple-600 px-4 py-2 rounded-lg hover:bg-purple-50 transition-colors duration-300 font-medium ml-4">Register</a>
        </div>
        <button class="md:hidden text-white focus:outline-none" id="mobile-menu-button">
          <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
          </svg>
        </button>
      </div>
    </div>
  </nav>

  <!-- Mobile Menu -->
  <div class="md:hidden hidden bg-purple-800 text-white" id="mobile-menu">
    <div class="container mx-auto px-4 py-4 space-y-3">
      <a href="index.php" class="block hover:text-blue-200 transition">Home</a>
      <a href="news.php" class="block hover:text-blue-200 transition">News Stories</a>
      <a href="feedback.php" class="block hover:text-blue-200 transition">Submit Feedback</a>
      <a href="analysis.php" class="block hover:text-blue-200 transition">Analysis</a>
      <a href="about.html" class="block hover:text-blue-200 transition">About</a>
      <a href="register.php" class="block bg-white text-purple-600 px-4 py-2 rounded-lg hover:bg-purple-50 transition-colors duration-300 font-medium mt-4 inline-block">Register</a>
    </div>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <div class="bg-gradient-to-r from-purple-700 to-purple-900 text-white py-16">
    <div class="container mx-auto px-6 max-w-3xl text-center">
      <h1 class="text-4xl sm:text-5xl font-bold mb-6 leading-tight">360-Degree Feedback on Government News Stories</h1>
      <p class="text-xl mb-8 text-purple-100">Share your perspective on news stories about the Government of India from regional media sources.</p>
      <a href="news.php" class="inline-block bg-white text-purple-700 px-8 py-4 rounded-lg font-semibold hover:bg-purple-50 transition transform hover:scale-105 shadow-lg">
        Submit Feedback
      </a>
    </div>
  </div>

  <!-- News Section -->
  <section class="bg-white py-12">
    <div class="w-full">
      <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Latest News</h2>


      <!-- Sliding News Container -->
      <div class="news-slider-container">
        <div id="news-container" class="news-slider-track">
          <!-- Cards will be injected by JS -->
        </div>
      </div>

      <!-- Status messages -->
      <div id="loading" class="text-center text-gray-500 mt-6">
        <svg class="animate-spin h-8 w-8 mx-auto text-purple-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
          <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
          <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
      </div>
      <div id="error" class="hidden text-center text-red-500 mt-6"></div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-gray-900 text-white py-12">
    <div class="container mx-auto px-6">
      <div class="grid md:grid-cols-3 gap-8">
        <div>
          <h4 class="text-lg font-semibold mb-4">About Us</h4>
          <p class="text-gray-400">A platform for collecting comprehensive feedback on Government of India news stories.</p>
        </div>
        <div>
          <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
          <ul class="space-y-2 text-gray-400">
            <li><a href="news.php" class="hover:text-white transition">Latest News</a></li>
            <li><a href="feedback.php" class="hover:text-white transition">Submit Feedback</a></li>
            <li><a href="analysis.php" class="hover:text-white transition">View Analysis</a></li>
          </ul>
        </div>
        <div>
          <h4 class="text-lg font-semibold mb-4">Contact</h4>
          <p class="text-gray-400">Email: contact@360feedback.com</p>
        </div>
      </div>
      <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
        <p>&copy; 2025 360° Feedback Portal. All rights reserved.</p>
      </div>
    </div>
  </footer>

  <!-- JS includes news fetching and search filter -->
  <script>
    const API_KEY = '3fc4c60978dc4b33acde0a9904194035';
    const newsContainer = document.getElementById("news-container");
    const loading = document.getElementById("loading");
    const error = document.getElementById("error");

    function renderNews(articles) {
      if (!articles || articles.length === 0) {
        error.classList.remove('hidden');
        error.innerText = 'No news found.';
        return;
      }

      // Create the main news cards
      let newsHtml = articles.map(article => `
        <div class="news-item card-hover">
          <div class="bg-white rounded-xl shadow-md overflow-hidden h-full transform transition duration-300 hover:scale-105">
            <img src="${article.urlToImage || 'https://via.placeholder.com/400x200'}" alt="news" class="w-full h-48 object-cover">
            <div class="p-6">
              <h3 class="text-xl font-semibold text-gray-800 mb-3 line-clamp-2">${article.title}</h3>
              <p class="text-gray-600 text-sm mb-4 line-clamp-3">${article.description || ''}</p>
              <div class="flex justify-between items-center">
                <a href="${article.url}" target="_blank" class="text-purple-600 hover:text-purple-700 font-medium transition flex items-center gap-1">
                  Read more
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                  </svg>
                </a>
                <span class="text-sm text-gray-500">${new Date(article.publishedAt).toLocaleDateString()}</span>
              </div>
            </div>
          </div>
        </div>
      `).join('');

      // Duplicate the content for seamless infinite scroll
      newsHtml = newsHtml + newsHtml;
      newsContainer.innerHTML = newsHtml;
    }

    function loadNews() {
      loading.style.display = 'block';
      error.classList.add('hidden');
      
      fetch(`https://newsapi.org/v2/everything?q=india+government&sortBy=publishedAt&language=en&pageSize=12&apiKey=${API_KEY}`)
        .then(res => res.json())
        .then(data => {
          loading.style.display = 'none';
          if (data.status === 'ok') {
            renderNews(data.articles);
          } else {
            throw new Error(data.message || 'Failed to fetch news');
          }
        })
        .catch(err => {
          loading.style.display = 'none';
          error.classList.remove('hidden');
          error.innerText = 'Something went wrong while fetching news.';
          console.error(err);
        });
    }

    // Initialize
    loadNews();

    // Mobile Menu Toggle
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenuButton.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
    });
  </script>
</body>
</html>
