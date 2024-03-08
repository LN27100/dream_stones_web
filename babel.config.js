module.exports = {
  presets: [
    ['@babel/preset-env', { targets: { node: 'current' } }]
  ],
  plugins: [
    // Assurez-vous d'inclure le plugin pour les fonctions async/await, souvent utilisé dans Vue.js
    '@babel/plugin-transform-runtime',
    // Plugin pour la gestion des décorateurs, utile dans certains cas avec Vue.js
    ['@babel/plugin-proposal-decorators', { legacy: true }],
    // Plugin pour la gestion des propriétés de classe, souvent utilisé dans Vue.js
    ['@babel/plugin-proposal-class-properties', { loose: true }]
    // Vous pouvez ajouter d'autres plugins ici
  ]
};
