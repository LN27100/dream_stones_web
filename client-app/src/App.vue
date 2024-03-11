<template>
  <div>
    <!-- PANIER -->
    <div v-for="item in cartItems" :key="item.id" class="product border border-light d-flex" :data-id="item.id">
      <img :src="'/assets/img/' + item.picture" :alt="'Image de ' + item.name">
      <p style="color: white;">{{ item.name }} - Quantité: {{ item.quantity }} - Total: €{{ item.total.toFixed(2) }}</p>
      <div class="remove-btn-container">
        <input class="quantity-input" type="number" v-model="item.quantity" min="1">
        <span class="remove-btn text-light" @click="removeProduct(item.id, item.quantity)">Supprimer</span>
      </div>
    </div>
    <div>Total : €{{ cartTotal.toFixed(2) }}</div>

    <!-- Offcanvas pour le panier -->
    <div class="offcanvas offcanvas-start" tabindex="-1" aria-labelledby="offcanvasExampleLabel" v-show="showOffcanvas">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title text-light" id="offcanvasExampleLabel">Votre panier</h5>
        <button type="button" class="btn-close" @click="toggleOffcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <div id="cart">
          <div class="product border border-light d-flex" data-id="1" v-for="item in cartItems" :key="item.id">
            <img :src="'/assets/img/' + item.picture" :alt="'Image de ' + item.name">
            <p>{{ item.name }} - Quantité: {{ item.quantity }} - Total: €{{ item.total.toFixed(2) }}</p>
            <div class="remove-btn-container">
              <input class="quantity-input" type="number" v-model="item.quantity" min="1">
              <span class="remove-btn text-light" @click="removeProduct(item.id, item.quantity)">Supprimer</span>
            </div>
          </div>
          <div>Total : €{{ cartTotal.toFixed(2) }}</div>
          <form id="orderForm" action="/controllers/controller-order.php" method="post">
            <input type="hidden" name="action" value="view_order">
            <input type="hidden" name="product_ids" :value="productIds">
            <button type="button" class="btn2" @click="commander()">Commander</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { createApp } from 'vue';

export default {
  data() {
    return {
      cartItems: [],
      cartTotal: 0,
      showOffcanvas: false //contrôler l'affichage du Offcanvas
    };
  },
  computed: {
    productIds() {
      return this.cartItems.map(item => item.id).join(',');
    }
  },
  mounted() {
    this.loadCartFromStorage();
  },
  methods: {
    loadCartFromStorage() {
      const cartItemsFromStorage = JSON.parse(localStorage.getItem('cartItems'));
      const cartTotalFromStorage = parseFloat(localStorage.getItem('cartTotal'));

      if (cartItemsFromStorage && cartTotalFromStorage) {
        this.cartItems = cartItemsFromStorage;
        this.cartTotal = cartTotalFromStorage;
      }
    },
    saveCartToStorage() {
      localStorage.setItem('cartItems', JSON.stringify(this.cartItems));
      localStorage.setItem('cartTotal', this.cartTotal);
    },
    addToCart(id, name, price, picture) {
      const existingItem = this.cartItems.find(item => item.id === id);

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
        this.cartItems.push(newItem);
      }

      this.cartTotal = this.cartItems.reduce((acc, item) => acc + item.total, 0);
      this.saveCartToStorage();
      alert('Article ajouté au panier');
    },
    removeProduct(id, quantityToRemove) {
      const index = this.cartItems.findIndex(item => item.id === id);
      if (index !== -1) {
        const item = this.cartItems[index];
        const itemPrice = item.price;

        if (quantityToRemove <= item.quantity) {
          item.quantity -= quantityToRemove;
          item.total -= itemPrice * quantityToRemove;
          this.cartTotal -= itemPrice * quantityToRemove;

          if (item.quantity === 0) {
            this.cartItems.splice(index, 1);
          }
        } else {
          this.cartTotal -= item.total;
          this.cartItems.splice(index, 1);
        }

        this.saveCartToStorage();
      }
    },

    commander() {
      // Vérifier si le panier est vide avant de soumettre le formulaire
      if (this.cartItems.length === 0) {
        console.error('Votre panier est vide.');
        return;
      }

      const orderForm = document.getElementById('orderForm');
      if (orderForm) {
        orderForm.submit();
      } else {
        console.error('Le formulaire de commande est introuvable.');
      }
    },
    
    toggleOffcanvas() { // Afficher ou masquer le Offcanvas
      this.showOffcanvas = !this.showOffcanvas;
    }
  }
};

// Création de l'application Vue.js
Vue.createApp(this).mount('#vue-app');
</script>

<style scoped>

.product img {
  width: 5rem;
  height: auto;
}

.quantity-input {
  width: 3.2rem;
}

.remove-btn {
  font-family: "Varela Round", sans-serif;
  padding: 0.2rem;
  font-size: 0.8rem;
  text-align: center;
  color: white;
  text-shadow: 1px 1px 1px #000;
  border-radius: 5px;
  background-color: rgb(185, 90, 90);
  box-shadow:
    inset 2px 2px 3px rgba(255, 255, 255, 0.6),
    inset -2px -2px 3px rgba(0, 0, 0, 0.6);
}

.remove-btn:hover {
  background-color: rgb(168, 109, 109);
}

.img-fluid {
  max-width: 5rem;
}

#offcanvasExample {
  background-color: #0B533D;
}

.btn2 {
  background-color: #24916A;
  font-family: "Varela Round", sans-serif;
  padding: 0.2rem;
  font-size: 1rem;
  text-align: center;
  color: white;
  text-shadow: 1px 1px 1px #000;
  border-radius: 5px;
  box-shadow:
    inset 2px 2px 3px rgba(255, 255, 255, 0.6),
    inset -2px -2px 3px rgba(0, 0, 0, 0.6);
}

.btn2:hover {
  background-color: #57BC9A;
}

.pan {
  font-family: "Varela Round", sans-serif;
  text-align: center;
  font-weight: bolder;
}

#cart {
  overflow-y: auto;
}

#cart::-webkit-scrollbar {
  width: 0.8rem;
  background-color: #0B533D;
  border: 2px solid #24916A;
}

#cart::-webkit-scrollbar-thumb {
  background-color: #0B533D;
}

</style>
