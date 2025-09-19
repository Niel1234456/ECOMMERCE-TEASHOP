<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tea Bliss - Refresh Your Soul</title>
  <style>
    /* Reset */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', sans-serif;
    }

    body {
      background-color: #fffdf8;
      color: #333;
      line-height: 1.6;
      scroll-behavior: smooth;
    }

    /* Navbar */
    header {
      position: fixed;
      top: 0;
      width: 100%;
      background: transparent;
      color: white;
      padding: 18px 60px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      z-index: 1000;
      transition: background 0.3s, padding 0.3s;
    }

    header.scrolled {
      background: #2e7d32;
      padding: 12px 50px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.2);
    }

    header h1 {
      font-size: 26px;
      font-weight: bold;
      letter-spacing: 1px;
    }

    nav {
      display: flex;
      gap: 20px;
    }

    nav a {
      color: white;
      text-decoration: none;
      font-weight: 500;
      position: relative;
      transition: color 0.3s;
    }

    nav a::after {
      content: "";
      position: absolute;
      width: 0;
      height: 2px;
      background: white;
      left: 0;
      bottom: -5px;
      transition: 0.3s;
    }

    nav a:hover::after {
      width: 100%;
    }

    /* Hamburger */
    .menu-toggle {
      display: none;
      flex-direction: column;
      cursor: pointer;
    }
    .menu-toggle span {
      width: 28px;
      height: 3px;
      background: white;
      margin: 4px 0;
      transition: 0.3s;
    }

    /* Hero */
    .hero {
      background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.4)),
        url('/assets/img/animesher.com_green-gif-tea-1163007.gif') no-repeat center center/cover;
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      color: white;
      text-align: center;
      padding: 0 20px;
    }

    .hero h2 {
      font-size: 56px;
      margin-bottom: 20px;
      opacity: 0;
      transform: translateY(30px);
      animation: fadeUp 1s ease forwards;
    }

    .hero p {
      font-size: 22px;
      margin-bottom: 30px;
      opacity: 0;
      transform: translateY(30px);
      animation: fadeUp 1.3s ease forwards;
    }

    .hero button {
      background: #fff;
      color: #2e7d32;
      border: none;
      padding: 14px 40px;
      font-size: 18px;
      cursor: pointer;
      border-radius: 30px;
      transition: all 0.3s;
      opacity: 0;
      transform: translateY(30px);
      animation: fadeUp 1.6s ease forwards;
    }

    .hero button:hover {
      background: #e8f5e9;
      transform: scale(1.08);
    }

    @keyframes fadeUp {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Sections */
    .section {
      padding: 80px 40px;
      text-align: center;
    }

    .section h3 {
      font-size: 34px;
      margin-bottom: 40px;
      color: #2e7d32;
      position: relative;
      display: inline-block;
    }

    .section h3::after {
      content: "";
      display: block;
      width: 50%;
      height: 3px;
      background: #2e7d32;
      margin: 10px auto 0;
      border-radius: 2px;
    }

    /* Tea cards */
    .teas {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 40px;
    }

    .tea-card {
      background: #fff;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 6px 12px rgba(0,0,0,0.1);
      transition: transform 0.3s, box-shadow 0.3s;
      opacity: 0;
      transform: translateY(40px);
      display: flex;
      flex-direction: column;
      position: relative;
    }

    .tea-card.visible {
      opacity: 1;
      transform: translateY(0);
      transition: all 0.6s ease;
    }

    .tea-card:hover {
      transform: translateY(-10px) scale(1.02);
      box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    }

    .tea-card img {
      width: 100%;
      height: 220px;
      object-fit: cover;
      transition: transform 0.5s ease;
    }

    .tea-card:hover img {
      transform: scale(1.1);
    }

    .tea-card h4 {
      padding: 20px 15px 10px;
      font-size: 22px;
      color: #2e7d32;
    }

    .tea-card p {
      padding: 0 20px 40px;
      font-size: 16px;
      color: #555;
    }

    .add-cart {
      position: absolute;
      bottom: 15px;
      right: 15px;
      background: #2e7d32;
      color: white;
      padding: 10px 18px;
      border-radius: 25px;
      text-decoration: none;
      font-size: 14px;
      transition: 0.3s;
    }

    .add-cart:hover {
      background: #1b5e20;
    }

    /* Footer */
    footer {
      background: #2e7d32;
      color: white;
      text-align: center;
      padding: 30px;
      margin-top: 60px;
    }

    /* Responsive */
    @media(max-width: 768px) {
      nav {
        display: none;
        flex-direction: column;
        background: #2e7d32;
        position: absolute;
        top: 70px;
        right: 0;
        width: 200px;
        padding: 20px;
        border-radius: 0 0 0 10px;
      }
      nav.active {
        display: flex;
      }
      .menu-toggle {
        display: flex;
      }
      .hero h2 {
        font-size: 36px;
      }
      .hero p {
        font-size: 18px;
      }
    }
  </style>
</head>
<body>
  <header id="navbar">
    <h1>Tea Bliss</h1>
    <nav>
      <a href="#home">Home</a>
      <a href="#teas">Our Teas</a>
      <a href="#about">About</a>
      <a href="#contact">Contact</a>
    </nav>
    <div class="menu-toggle" id="menu-toggle">
      <span></span><span></span><span></span>
    </div>
  </header>

  <!-- Hero Section -->
  <section class="hero" id="home">
    <h2>Refresh Your Soul with Tea</h2>
    <p>Hand-picked, organic, and crafted for the perfect brew.</p>
    <button>Shop Now</button>
  </section>

<!-- Products Section -->
<section class="section" id="teas">
  <h3>Our Featured Teas</h3>
  <div class="teas">
    @foreach($products as $product)
      <div class="tea-card">
          @if($product->image)
              <img src="{{ asset('assets/img/' . $product->image) }}" alt="{{ $product->name }}">
          @else
              <img src="{{ asset('assets/img/default-tea.png') }}" alt="Default Tea">
          @endif


        <h4>{{ $product->name }}</h4>

        {{-- Show Description --}}
        <p>{{ $product->description }}</p>

        {{-- Show ONLY Min Price --}}
        <p>
          Price: ${{ number_format($product->price_min, 2) }}
        </p>

        <a href="{{ route('cart.add', $product->id) }}" class="add-cart">🛒 Add to Cart</a>
      </div>
    @endforeach
  </div>
</section>

  <footer id="contact">
    <p>&copy; 2025 Tea Bliss | All Rights Reserved</p>
  </footer>
  <!-- Tea GIF Popup Notification -->
  <div id="cart-popup" class="cart-popup cart-popup-center">
    <div class="cart-popup-gif">
      <img src="{{ asset('assets/img/mug-tea.gif') }}" alt="Tea Bliss">
    </div>
    <div id="cart-popup-msg" class="cart-popup-msg">Added to cart!</div>
  </div>

  <style>
    .cart-popup {
      display: none;
      position: fixed;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -60%) scale(0.98);
      z-index: 2000;
      min-width: 380px;
      max-width: 98vw;
      background: rgba(255,255,255,0.92);
      backdrop-filter: blur(14px) saturate(1.7);
      color: #1b5e20;
      padding: 48px 60px 48px 60px;
      border-radius: 32px;
      box-shadow: 0 0px 0px rgba(67,233,123,0), 0 2px 8px rgba(0,0,0,0.10);
      font-size: 32px;
      font-weight: 700;
      letter-spacing: 0.5px;
      opacity: 0;
      transition: opacity 0.35s cubic-bezier(.4,2,.6,1), transform 0.35s cubic-bezier(.4,2,.6,1);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 24px;
      border: 2px solid #b9fbc0;
      box-sizing: border-box;
      animation: popup-bounce 1s cubic-bezier(.4,2,.6,1);
      text-align: center;
    }
    .cart-popup.show {
      opacity: 1;
      transform: translate(-50%, -50%) scale(1);
    }
    .cart-popup-gif {
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 50%;
      width: 200px;
      height: 200px;
      overflow: hidden;
      animation: popup-bounce 1s cubic-bezier(.4,2,.6,1);
      margin-bottom: 0;
    }
    .cart-popup-gif img {
      width: 200px;
      height: 200px;
      object-fit: contain;
      display: block;
      background: transparent;
      animation: tea-spin 1.2s cubic-bezier(.4,2,.6,1);
      box-shadow: none !important;
    }
    .cart-popup-msg {
      color: #1b5e20;
      font-size: 32px;
      font-weight: 700;
      letter-spacing: 0.5px;
      margin-top: 0;
    }
    @keyframes popup-bounce {
      0% { transform: scale(0.7); }
      60% { transform: scale(1.15); }
      80% { transform: scale(0.95); }
      100% { transform: scale(1); }
    }
    @keyframes tea-spin {
      0% { transform: rotate(-10deg) scale(0.7); opacity: 0; }
      60% { transform: rotate(8deg) scale(1.1); opacity: 1; }
      100% { transform: rotate(0deg) scale(1); opacity: 1; }
    }
    @media (max-width: 600px) {
      .cart-popup {
        left: 50%;
        top: 50%;
        min-width: 140px;
        padding: 12px 4px 12px 4px;
        font-size: 18px;
        border-radius: 18px;
        gap: 10px;
      }
      .cart-popup-gif {
        width: 100px;
        height: 100px;
      }
      .cart-popup-gif img {
        width: 100px;
        height: 100px;
      }
      .cart-popup-msg {
        font-size: 18px;
      }
    }
  </style>

  <script>
    // Navbar scroll background
    window.addEventListener("scroll", function() {
      const navbar = document.getElementById("navbar");
      navbar.classList.toggle("scrolled", window.scrollY > 50);
    });

    // Scroll reveal for tea cards
    const cards = document.querySelectorAll(".tea-card");
    const revealOnScroll = () => {
      const triggerBottom = window.innerHeight * 0.85;
      cards.forEach(card => {
        const cardTop = card.getBoundingClientRect().top;
        if (cardTop < triggerBottom) {
          card.classList.add("visible");
        }
      });
    };
    window.addEventListener("scroll", revealOnScroll);
    revealOnScroll();

    // Hamburger toggle
    const menuToggle = document.getElementById("menu-toggle");
    const nav = document.querySelector("nav");
    menuToggle.addEventListener("click", () => {
      nav.classList.toggle("active");
      menuToggle.classList.toggle("open");
    });

    // Modern glassmorphism popup notification for Add to Cart
    document.querySelectorAll('.add-cart').forEach(function(btn) {
      btn.addEventListener('click', function(e) {
        e.preventDefault();
        const url = btn.getAttribute('href');
        const productName = btn.closest('.tea-card').querySelector('h4').innerText;
        showCartPopup(productName);
        setTimeout(function() {
          window.location.href = url;
        }, 3200); // Delay for notification (3 seconds)
      });
    });

    function showCartPopup(productName) {
      const popup = document.getElementById('cart-popup');
      const msg = document.getElementById('cart-popup-msg');
      msg.textContent = `"${productName}" added to cart!`;
      popup.style.display = 'flex';
      setTimeout(() => {
        popup.classList.add('show');
      }, 10);
      setTimeout(() => {
        popup.classList.remove('show');
        setTimeout(() => { popup.style.display = 'none'; }, 400);
      }, 3000);
    }
  </script>
</body>
</html>
