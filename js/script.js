document.addEventListener('DOMContentLoaded', () => {
    const loader = document.querySelector('.loader-wrapper');
    window.addEventListener('load', () => {
        setTimeout(() => {
            loader.classList.add('loader-hidden');
            setTimeout(() => {
                loader.style.display = 'none';
            }, 800);
        }, 1500); 
    });

    const nav = document.querySelector('#navbar');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            nav.classList.add('sticky');
        } else {
            nav.classList.remove('sticky');
        }
    });

    const heroBg = document.querySelector('#parallax-bg');
    if (heroBg) {
        window.addEventListener('scroll', () => {
            let offset = window.scrollY;
            heroBg.style.transform = `translateY(${offset * 0.4}px) scale(1.1)`;
        });
    }

    const reveal = () => {
        const reveals = document.querySelectorAll('.reveal');
        reveals.forEach(element => {
            const windowHeight = window.innerHeight;
            const revealTop = element.getBoundingClientRect().top;
            const revealPoint = 150;
            if (revealTop < windowHeight - revealPoint) {
                element.classList.add('active');
            }
        });
    };
    window.addEventListener('scroll', reveal);
    reveal(); 

    // Cart Logic
    const cartIcon = document.querySelector('.cart-icon');
    const cartSidebar = document.querySelector('#cart-sidebar');
    const closeCart = document.querySelector('#close-cart');
    const cartItemsContainer = document.querySelector('#cart-items');
    const cartTotalAmount = document.querySelector('#cart-total-amount');
    let cart = [];

    const toggleCart = () => cartSidebar.classList.toggle('open');
    if (cartIcon) cartIcon.addEventListener('click', toggleCart);
    if (closeCart) closeCart.addEventListener('click', toggleCart);

    const updateCartUI = () => {
        if (cart.length === 0) {
            cartItemsContainer.innerHTML = '<p class="empty-msg">The vault is empty.</p>';
            cartTotalAmount.innerText = '$0.00';
            return;
        }

        cartItemsContainer.innerHTML = '';
        let total = 0;
        cart.forEach((item, index) => {
            total += item.price;
            const itemElement = document.createElement('div');
            itemElement.classList.add('cart-item');
            itemElement.innerHTML = `
                <img src="${item.img}" alt="${item.name}">
                <div>
                    <h4>${item.name}</h4>
                    <p>$${item.price.toFixed(2)}</p>
                </div>
                <button onclick="removeFromCart(${index})" style="background:transparent; border:none; color:var(--primary); cursor:pointer; margin-left:auto;"><i class="fas fa-trash"></i></button>
            `;
            cartItemsContainer.appendChild(itemElement);
        });
        cartTotalAmount.innerText = `$${total.toFixed(2)}`;
    };

    window.removeFromCart = (index) => {
        cart.splice(index, 1);
        updateCartUI();
    };

    const cartButtons = document.querySelectorAll('.add-to-cart');
    cartButtons.forEach(btn => {
        btn.addEventListener('click', (e) => {
            const card = e.target.closest('.product-card');
            const name = card.querySelector('h3').innerText;
            const priceText = card.querySelector('.product-price').innerText;
            const price = parseFloat(priceText.replace('$', '').replace(',', ''));
            const img = card.querySelector('img').src;

            cart.push({ name, price, img });
            updateCartUI();
            
            // Success Feedback
            btn.innerHTML = '<i class="fas fa-check"></i> Added';
            btn.style.background = '#00e5ff';
            btn.style.color = '#000';
            
            if (!cartSidebar.classList.contains('open')) {
                setTimeout(toggleCart, 500);
            }

            setTimeout(() => {
                btn.innerHTML = 'Add to Cart';
                btn.style.background = '';
                btn.style.color = '';
            }, 2000);
        });
    });

    const contactForm = document.getElementById('contactForm');
    const formResponse = document.getElementById('formResponse');
    if (contactForm) {
        contactForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = new FormData(contactForm);
            const submitBtn = contactForm.querySelector('button');
            const originalText = submitBtn.innerText;
            submitBtn.innerText = 'Sending...';
            submitBtn.disabled = true;
            try {
                const response = await fetch('php/process-contact.php', {
                    method: 'POST',
                    body: formData
                });
                const data = await response.json();
                if (data.status === 'success') {
                    formResponse.innerHTML = `<p style="color: #00e5ff;"><i class="fas fa-check-circle"></i> ${data.message}</p>`;
                    contactForm.reset();
                } else {
                    formResponse.innerHTML = `<p style="color: #ff3e00;"><i class="fas fa-exclamation-circle"></i> ${data.message}</p>`;
                }
            } catch (error) {
                formResponse.innerHTML = `<p style="color: #ff3e00;"><i class="fas fa-exclamation-circle"></i> Connection error. Please try again.</p>`;
            } finally {
                submitBtn.innerText = originalText;
                submitBtn.disabled = false;
                setTimeout(() => {
                    formResponse.innerHTML = '';
                }, 5000);
            }
        });
    }

    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                e.preventDefault();
                targetElement.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });
});
