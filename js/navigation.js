// Array.from() polyfill
if ( ! Array.from ) {
  Array.from = ( function() {
    var toStr = Object.prototype.toString;
    var isCallable = function( fn ) {
      return 'function' === typeof fn || '[object Function]' === toStr.call( fn );
    };
    var toInteger = function( value ) {
      var number = Number( value );
      if ( isNaN( number ) ) {
        return 0;
      }
      if ( 0 === number || ! isFinite( number ) ) {
        return number;
      }
      return ( 0 < number ? 1 : -1 ) * Math.floor( Math.abs( number ) );
    };
    var maxSafeInteger = Math.pow( 2, 53 ) - 1;
    var toLength = function( value ) {
      var len = toInteger( value );
      return Math.min( Math.max( len, 0 ), maxSafeInteger );
    };

    // The length property of the from method is 1.
    return function from( arrayLike/*, mapFn, thisArg */ ) {
      // 1. Let C be the this value.
      var C = this;

      // 2. Let items be ToObject(arrayLike).
      var items = Object( arrayLike );

      // 3. ReturnIfAbrupt(items).
      if ( null == arrayLike ) {
        throw new TypeError( 'Array.from requires an array-like object - not null or undefined' );
      }

      // 4. If mapfn is undefined, then let mapping be false.
      var mapFn = 1 < arguments.length ? arguments[1] : void undefined;
      var T;
      if ( 'undefined' !== typeof mapFn ) {

        // 5. else
        // 5. a If IsCallable(mapfn) is false, throw a TypeError exception.
        if ( ! isCallable( mapFn ) ) {
          throw new TypeError( 'Array.from: when provided, the second argument must be a function' );
        }

        // 5. b. If thisArg was supplied, let T be thisArg; else let T be undefined.
        if ( 2 < arguments.length ) {
          T = arguments[2];
        }
      }

      // 10. Let lenValue be Get(items, "length").
      // 11. Let len be ToLength(lenValue).
      var len = toLength( items.length );

      // 13. If IsConstructor(C) is true, then
      // 13. a. Let A be the result of calling the [[Construct]] internal method
      // of C with an argument list containing the single item len.
      // 14. a. Else, Let A be ArrayCreate(len).
      var A = isCallable( C ) ? Object( new C( len ) ) : new Array( len );

      // 16. Let k be 0.
      var k = 0;

      // 17. Repeat, while k < len… (also steps a - h)
      var kValue;
      while ( k < len ) {
        kValue = items[k];
        if ( mapFn ) {
          A[k] = 'undefined' === typeof T ? mapFn( kValue, k ) : mapFn.call( T, kValue, k );
        } else {
          A[k] = kValue;
        }
        k += 1;
      }

      // 18. Let putStatus be Put(A, "length", len, true).
      A.length = len;

      // 20. Return A.
      return A;
    };
  }() );
}

( function( panel, header ) {

  // Get the height of our panel
  function getPanelHeight( panel ) {
    return panel.scrollHeight;
  }

  // Get our panel in place
  function positionPanel( panel, header ) {
    const offset = getPanelHeight( panel ) + getPanelHeight( header ) + 30;
    panel.style.transform = 'translateY(-' + offset + 'px)';
  }

  // Set panel initial position
  positionPanel( panel, header );

  // Button
  const mobileToggle = document.querySelector( '.mobile-menu-toggle' );
  mobileToggle.addEventListener( 'click', function() {
    positionPanel( panel, header );
    panel.classList.toggle( 'active' );
    this.classList.toggle( 'active' );
  });

  // Toggle Submenus
  const arrows = [ ...document.querySelectorAll( '.arrow' ) ];
  arrows.forEach( element => {
    element.addEventListener( 'click', toggleSubMenu );
  });

  function toggleSubMenu() {
    if ( 0 == this.nextElementSibling.style.maxHeight ) {
      this.nextElementSibling.style.maxHeight = this.nextElementSibling.scrollHeight + 'px';
    } else {
      this.nextElementSibling.style.maxHeight = this.nextElementSibling.style.maxHeight = null;
    }
    this.classList.toggle( 'active' );
  }

  window.addEventListener( 'resize', function() {
    positionPanel( panel, header );
  });

}( document.getElementById( 'main-navigation' ), document.getElementById( 'masthead' ) ) );
