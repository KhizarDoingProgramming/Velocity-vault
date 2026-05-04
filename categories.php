<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories | Velocity Vault</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Outfit:wght@700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="loader-wrapper">
        <div class="loader"></div>
    </div>

    <nav id="navbar" class="sticky">
        <div class="logo"><a href="index.php">VELOCITY<span>VAULT</span></a></div>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="categories.php" class="active" style="color: var(--primary);">Categories</a></li>
            <li><a href="index.php#products">Products</a></li>
            <li><a href="index.php#contact">Contact</a></li>
        </ul>
        <div class="cart-icon">
            <i class="fas fa-shopping-bag"></i>
        </div>
    </nav>

    <header class="page-header" style="padding-top: 150px; text-align: center; background: #080808;">
        <h1 class="reveal">Explore <span style="color: var(--primary);">Categories</span></h1>
        <div class="underline" style="width: 80px; height: 4px; background: var(--primary); margin: 1rem auto;"></div>
    </header>

    <section id="categories-full">
        <div class="category-grid">
            <div class="category-card reveal">
                <img src="https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?auto=format&fit=crop&q=80&w=800" alt="Car Accessories">
                <div class="category-info">
                    <h3>Interior Luxury</h3>
                    <p>Premium Alcantara and Carbon fiber trims.</p>
                </div>
            </div>
            <div class="category-card reveal">
                <img src="https://images.unsplash.com/photo-1558981403-c5f91cbba527?auto=format&fit=crop&q=80&w=800" alt="Bike Accessories">
                <div class="category-info">
                    <h3>Riding Gear</h3>
                    <p>Safety meets style with top-tier protection.</p>
                </div>
            </div>
            <div class="category-card reveal">
                <img src="https://images.unsplash.com/photo-1486496146582-9ffcd0b2b2b7?auto=format&fit=crop&q=80&w=800" alt="Performance Parts">
                <div class="category-info">
                    <h3>Engine Mods</h3>
                    <p>Turbochargers and ECU tuning kits.</p>
                </div>
            </div>
            <div class="category-card reveal">
                <img src="https://images.unsplash.com/photo-1547919307-1ecb10702e6f?auto=format&fit=crop&q=80&w=800" alt="Exhaust Systems">
                <div class="category-info">
                    <h3>Acoustics</h3>
                    <p>Titanium exhaust systems for the perfect roar.</p>
                </div>
            </div>
            <div class="category-card reveal">
                <img src="https://images.unsplash.com/photo-1600706432502-77a0e2e327fc?auto=format&fit=crop&q=80&w=800" alt="Wheels">
                <div class="category-info">
                    <h3>Forged Wheels</h3>
                    <p>Lightweight wheels for maximum agility.</p>
                </div>
            </div>
            <div class="category-card reveal">
                <img src="https://images.unsplash.com/photo-1517524008436-bbdb53c57d2d?auto=format&fit=crop&q=80&w=800" alt="Lighting">
                <div class="category-info">
                    <h3>Dynamic Lighting</h3>
                    <p>Adaptive LED and Laser light upgrades.</p>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="copyright">
            <p>&copy; <?php echo date("Y"); ?> Velocity Vault. All rights reserved. Designed for speed.</p>
        </div>
    </footer>

    <div id="cart-sidebar" class="cart-sidebar">
        <div class="cart-header">
            <h3>Your Vault</h3>
            <button id="close-cart"><i class="fas fa-times"></i></button>
        </div>
        <div id="cart-items" class="cart-items">
            <p class="empty-msg">The vault is empty.</p>
        </div>
        <div class="cart-footer">
            <div class="cart-total">
                <span>Total:</span>
                <span id="cart-total-amount">$0.00</span>
            </div>
            <button class="btn btn-primary" style="width: 100%;">Checkout</button>
        </div>
    </div>

    <script src="js/script.js"></script>
</body>
</html>
