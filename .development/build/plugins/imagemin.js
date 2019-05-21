const ImageminPlugin = require('imagemin-webpack-plugin').default;
const imageminJpegRecompress = require('imagemin-jpeg-recompress');
const imageminGiflossy = require('imagemin-giflossy');
const imageminPngquant = require('imagemin-pngquant');

const imageminConfig = {
    svgo: [
        { removeDoctype: true },
        { removeXMLProcInst: true },
        { removeComments: true },
        { removeMetadata: true },
        { removeXMLNS: true },
        { removeUselessDefs: true },
        { removeEditorsNSData: true },
        { cleanupAttrs: true },
        { removeEmptyAttrs: true },
        { removeHiddenElems: true },
        { removeEmptyText: true },
        { removeEmptyContainers: true },
        { removeViewBox: false },
        { cleanUpEnableBackground: true },
        { convertStyleToAttrs: true },
        { convertColors: true },
        { convertPathData: true },
        { convertTransform: true },
        { removeUnknownsAndDefaults: true },
        { removeNonInheritableGroupAttrs: true },
        { removeUselessStrokeAndFill: true },
        { removeUnusedNS: true },
        { cleanupIDs: true },
        { cleanupNumericValues: true },
        { moveElemsAttrsToGroup: true },
        { moveGroupAttrsToElems: true },
        { collapseGroups: true },
        { removeRasterImages: true },
        { mergePaths: true },
        { convertShapeToPath: true },
        { sortAttrs: true },
        { removeTitle: true },
        { removeDesc: true },
        { removeDimensions: false },
        { inlineStyles: true },
        { removeAttrs: { attrs: 'data.*' } },
        { removeStyleElement: false },
        { removeScriptElement: false },
        { convertDimensions: true },
        { reusePaths: true }
    ],
    pngquant: {
        strip: true,
        quality: [0.65, 0.8],
        speed: 1,
        dithering: 0.8
    },
    jpegRecompress: {
        loops: 10,
        min: 40,
        max: 80,
        quality: 'medium'
    },
    giflossy: {
        optimizationLevel: 3,
        optimize: 3,
        lossy: 30
    }
};

module.exports =  new ImageminPlugin({
    svgo: imageminConfig.svgo,
    plugins: [
        imageminJpegRecompress(imageminConfig.jpegRecompress),
        imageminPngquant(imageminConfig.pngquant),
        imageminGiflossy(imageminConfig.giflossy)
    ],
});
