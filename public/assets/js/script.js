// PANIER

// Définition des variables globales
let cartItems = [];
let cartTotal = 0;

// Charge les données du panier depuis le stockage local
function loadCartFromStorage() {
    const cartDataJSON = sessionStorage.getItem('cartData');
    if (cartDataJSON) {
        const cartData = JSON.parse(cartDataJSON);
        cartItems = cartData.cartItems;
        cartTotal = cartData.cartTotal;
        updateCartView();
    }
}

// Mettre à jour la vue du panier
function updateCartView() {
    const cartItemsElement = document.getElementById('cartItems');
    const cartTotalElement = document.getElementById('cartTotal');

    // Efface le contenu actuel du panier
    cartItemsElement.innerHTML = '';

    let totalPrice = 0; // Initialise le prix total à zéro

    cartItems.forEach(item => {
        const productElement = document.createElement('div');
        productElement.classList.add('product');
        productElement.setAttribute('data-id', item.id);
        productElement.innerHTML = `
            <img src="/assets/images/${item.picture}" alt="Image de ${item.name}">
            <p style="color: white;">${item.name} - Quantité: ${item.quantity} - Total: €${item.total.toFixed(2)}</p>
            <div class="remove-btn-container">
                <input class="quantity-input" type="number" value="1" min="1">
                <span class="remove-btn text-light" onclick="removeProduct('${item.id}', parseInt(this.parentNode.querySelector('.quantity-input').value))">Supprimer</span>
            </div>`;
    
        // Ajoute le produit créé au conteneur du panier
        cartItemsElement.appendChild(productElement);
    
        totalPrice += item.total; // Ajoute le prix total de chaque article au prix total global
    });

    // Met à jour le total du panier
    cartTotalElement.textContent = totalPrice.toFixed(2);
}

// Sauvegarde le panier dans la session
function saveCartToSession() {
    const sessionData = {
        cartItems: cartItems,
        cartTotal: cartTotal
    };
    sessionStorage.setItem('cartData', JSON.stringify(sessionData));
}

// Ajoute un produit au panier
function addToCart(id, name, price, picture) {
    const existingItem = cartItems.find(item => item.id === id);

    if (existingItem) {
        existingItem.quantity++;
        existingItem.total += price;
    } else {
        const newItem = {
            id: id,
            name: name,
            quantity: 1,
            price: price,
            total: price,
            picture: picture
        };
        cartItems.push(newItem);
    }

    cartTotal = cartItems.reduce((acc, item) => acc + item.total, 0); // Recalcule le total du panier

    updateCartView();
    saveCartToSession(); // Sauvegarde le panier dans la session après chaque modification

    // Afficher une alerte pour indiquer que l'article a été ajouté au panier
    alert('Article ajouté au panier');
}

// Supprime un produit du panier en fonction de la quantité spécifiée
function removeProduct(id, quantityToRemove) {
    const index = cartItems.findIndex(item => item.id === id);
    if (index !== -1) {
        const item = cartItems[index];
        const itemPrice = item.price;

        // Vérifie si la quantité à supprimer est inférieure ou égale à la quantité actuelle dans le panier
        if (quantityToRemove <= item.quantity) {
            item.quantity -= quantityToRemove;
            item.total -= itemPrice * quantityToRemove;
            cartTotal -= itemPrice * quantityToRemove;

            // Si la quantité devient 0, retire complètement l'article du panier
            if (item.quantity === 0) {
                cartItems.splice(index, 1);
            }
        } else {
            // Si la quantité à supprimer est supérieure à la quantité actuelle dans le panier,
            // supprime complètement l'article du panier
            cartTotal -= item.total;
            cartItems.splice(index, 1);
        }

        updateCartView();
        saveCartToSession();
    }
}

// Sélection des boutons "Ajouter au panier"
const addToCartButtons = document.querySelectorAll('.btn-add-to-cart');

// Boucle à travers chaque bouton et ajoute un gestionnaire d'événement pour le clic
addToCartButtons.forEach(button => {
    button.addEventListener('click', function () {
        // Récupére les informations du produit à partir des attributs de données HTML
        const productId = button.getAttribute('data-id');
        const productName = button.getAttribute('data-name');
        const productPrice = parseFloat(button.getAttribute('data-price'));
        const productPicture = button.getAttribute('data-picture');

        // Ajoute le produit au panier avec les informations récupérées
        addToCart(productId, productName, productPrice, productPicture);
    });
});

// Charge le panier depuis la session lors du chargement de la page
window.addEventListener('load', function() {
    loadCartFromStorage(); // Chargez d'abord le panier depuis la session
});


// COMMANDE

function commander() {
    // Récupére le formulaire par son ID
    const orderForm = document.getElementById('orderForm');
    
    // Vérifie si le formulaire est trouvé
    if (orderForm) {
         // Récupére les IDs et les quantités des produits depuis votre panier
         const productIds = cartItems.map(item => item.id);
         
         // Met à jour les valeurs des champs de formulaire cachés avec les IDs et les quantités des produits
         document.getElementById('productIds').value = productIds.join(',');
        
        // Soumet le formulaire en utilisant la méthode POST
        // avec l'URL générée par Twig
        orderForm.setAttribute('action', '/confirm_order');
        orderForm.setAttribute('method', 'post');
        orderForm.submit();
    } else {
        console.error('Le formulaire de commande est introuvable.');
    }
}

// gestionnaire d'événements
document.querySelector('.btn2').addEventListener('click', function() {
    commander();
});

// Vider le panier lors du chargement de la page, uniquement si vous êtes sur la page "controller-validateorder.php"
function clearCartOnPageLoad() {
    // Vérifie si vous êtes sur la page "controller-validateorder.php"
    if (window.location.pathname.includes('controller-validateorder.php')) {
        console.log("Vidage du panier lors du chargement de la page...");
        // Effacer les données de panier de la session
        sessionStorage.removeItem('cartData');
    }
}

// Ajoute un gestionnaire d'événements pour le chargement de la page
window.addEventListener('load', function() {
    // Appeler la fonction pour vider le panier uniquement si vous êtes sur la page "controller-validateorder.php"
    clearCartOnPageLoad();
});
