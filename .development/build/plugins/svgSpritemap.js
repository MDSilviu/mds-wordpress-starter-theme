const SVGSpritemapPlugin = require('svg-spritemap-webpack-plugin');
const config = require('../lib/config');

const spritemapConfig = {
    output: {
        filename: 'img/icons.svg',
        svg: {
            sizes: false
        },
        svg4everybody: false,
        svgo: {
            removeDoctype: true,
            removeXMLProcInst: true,
            removeComments: true,
            removeMetadata: true,
            removeXMLNS: true,
            removeUselessDefs: true,
            removeEditorsNSData: true,
            cleanupAttrs: true,
            removeEmptyAttrs: true,
            removeHiddenElems: true,
            removeEmptyText: true,
            removeEmptyContainers: true,
            removeViewBox: false,
            cleanUpEnableBackground: true,
            convertStyleToAttrs: true,
            convertColors: true,
            convertPathData: true,
            convertTransform: true,
            removeUnknownsAndDefaults: true,
            removeNonInheritableGroupAttrs: true,
            removeUselessStrokeAndFill: true,
            removeUnusedNS: true,
            cleanupIDs: true,
            cleanupNumericValues: true,
            moveElemsAttrsToGroup: true,
            moveGroupAttrsToElems: true,
            collapseGroups: true,
            removeRasterImages: true,
            mergePaths: true,
            convertShapeToPath: true,
            sortAttrs: true,
            removeTitle: true,
            removeDesc: true,
            removeDimensions: false,
            removeAttrs: {
                attrs: '(stroke|fill|class|id|data.*)'
            },
            removeStyleElement: true,
            removeScriptElement: true,
        }
    },
    sprite: {
        prefix: 'icon-',
    },
};

module.exports = new SVGSpritemapPlugin(
    config.srcIconsPath('*.svg'),
    spritemapConfig
);
