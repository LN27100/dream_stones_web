const Encore = require('@symfony/webpack-encore');

if (!Encore.isRuntimeEnvironmentConfigured()) {
    Encore.configureRuntimeEnvironment(process.env.NODE_ENV || 'dev');
}

Encore
    .enableSingleRuntimeChunk()
    .setOutputPath('public/build/')
    .setPublicPath('/build')
    .addEntry('app', './public/assets/js/app.js')
    .splitEntryChunks()
    .enableSingleRuntimeChunk()
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction())
    .enableVueLoader()
    .configureDefinePlugin(options => {
        options.mode = JSON.stringify(process.env.NODE_ENV || 'development');
    });

module.exports = Encore.getWebpackConfig();
