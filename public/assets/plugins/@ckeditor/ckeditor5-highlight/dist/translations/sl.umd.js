/**
 * @license Copyright (c) 2003-2024, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
 */

( e => {
const { [ 'sl' ]: { dictionary, getPluralForm } } = {"sl":{"dictionary":{"Yellow marker":"Rumena oznaka","Green marker":"Zelena oznaka","Pink marker":"Rožnata oznaka","Blue marker":"Modra oznaka","Red pen":"Rdeče pisalo","Green pen":"Zeleno pisalo","Remove highlight":"Odstrani oznako","Highlight":"Označi","Text highlight toolbar":"Orodna vrstica označevanja"},getPluralForm(n){return (n%100==1 ? 0 : n%100==2 ? 1 : n%100==3 || n%100==4 ? 2 : 3);}}};
e[ 'sl' ] ||= { dictionary: {}, getPluralForm: null };
e[ 'sl' ].dictionary = Object.assign( e[ 'sl' ].dictionary, dictionary );
e[ 'sl' ].getPluralForm = getPluralForm;
} )( window.CKEDITOR_TRANSLATIONS ||= {} );
