/**
 * @license Copyright (c) 2003-2024, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
 */

( e => {
const { [ 'pl' ]: { dictionary, getPluralForm } } = {"pl":{"dictionary":{"Find and replace":"Znajdź i zamień","Find in text…":"Znajdź…","Find":"Znajdź","Previous result":"Poprzedni","Next result":"Następny","Replace":"Zamień","Replace all":"Zamień wszystko","Match case":"Uwzględnij wielkość liter","Whole words only":"Znajdź tylko całe wyrazy","Replace with…":"Zamień na…","Text to find must not be empty.":"Szukany tekst nie może być pusty.","Tip: Find some text first in order to replace it.":"Podpowiedź: Znajdź jakiś tekst, aby go zamienić.","Advanced options":"Opcje zaawansowane","Find in the document":"Otwiera interfejs Znajdź w dokumencie"},getPluralForm(n){return (n==1 ? 0 : (n%10>=2 && n%10<=4) && (n%100<12 || n%100>14) ? 1 : n!=1 && (n%10>=0 && n%10<=1) || (n%10>=5 && n%10<=9) || (n%100>=12 && n%100<=14) ? 2 : 3);}}};
e[ 'pl' ] ||= { dictionary: {}, getPluralForm: null };
e[ 'pl' ].dictionary = Object.assign( e[ 'pl' ].dictionary, dictionary );
e[ 'pl' ].getPluralForm = getPluralForm;
} )( window.CKEDITOR_TRANSLATIONS ||= {} );
