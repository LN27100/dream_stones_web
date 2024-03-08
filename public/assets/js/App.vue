<template>
  <div>
    <div v-for="item in cartItems" :key="item.id" class="product border border-light d-flex" :data-id="item.id">
      <img :src="'/assets/img/' + item.picture" :alt="'Image de ' + item.name">
      <p style="color: white;">{{ item.name }} - Quantité: {{ item.quantity }} - Total: €{{ item.total.toFixed(2) }}</p>
      <div class="remove-btn-container">
        <input class="quantity-input" type="number" v-model="item.quantity" min="1">
        <span class="remove-btn text-light" @click="removeProduct(item.id, item.quantity)">Supprimer</span>
      </div>
    </div>
    <div>Total : €{{ cartTotal.toFixed(2) }}</div>
    <form id="orderForm" action="/controllers/controller-order.php" method="post">
      <input type="hidden" name="action" value="view_order">
      <input type="hidden" name="product_ids" :value="productIds">
      <button type="submit" class="btn2" @click.prevent="commander()">Commander</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      cartItems: [],
      cartTotal: 0
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
      const orderForm = document.getElementById('orderForm');
      if (orderForm) {
        orderForm.submit();
      } else {
        console.error('Le formulaire de commande est introuvable.');
      }
    }
  }
};
</script>
