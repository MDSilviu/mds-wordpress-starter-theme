// import '@babel/polyfill';
import 'eventlistener-polyfill';
import svg4everybody from 'svg4everybody';
import objectFitImages from 'object-fit-images';

import '@styles/theme/app.scss';

// init svg polyfill
svg4everybody();

// object fit polyfill
objectFitImages($('img.mds--of'));