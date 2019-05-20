// MOBILE NAVIGATION
( function() {
  const toggleBtn = document.querySelector( '.menu-toggle' );
  const mainNav = document.querySelector( '.main-navigation' );

  // Kill the script if there is no menu button, ie. there is no mobile menu
  if ( ! toggleBtn ) {
    return;
  }

  const mobileMenu = document.querySelector( '.main-navigation' );
  const mobileMenuAnchors = [ ...document.querySelectorAll( '.main-navigation a' ) ];
  let toggled = false;

  // Prevent tabbing to anchors until the menu is revealed
  mobileMenuAnchors.forEach( anchor => {
    anchor.setAttribute( 'tabindex', '-1' );
  });

  // Set ARIA controls and tab order when toggling
  toggleBtn.addEventListener( 'click', () => {
    document.body.classList.toggle( 'mobile-nav-active' );
    toggleBtn.classList.toggle( 'nav-open' );
    mainNav.classList.toggle( 'nav-open' );

    if ( toggled ) {
      toggled = false;
      toggleBtn.setAttribute( 'aria-expanded', 'false' );
      toggleBtn.setAttribute( 'tabindex', null );
      mobileMenu.setAttribute( 'aria-expanded', 'false' );

      mobileMenuAnchors.forEach( anchor => {
        anchor.setAttribute( 'tabindex', '-1' );
      });
    } else {
      toggled = true;
      toggleBtn.setAttribute( 'aria-expanded', 'true' );
      toggleBtn.setAttribute( 'tabindex', '1' );
      mobileMenu.setAttribute( 'aria-expanded', 'true' );

      mobileMenuAnchors.forEach( anchor => {
        anchor.setAttribute( 'tabindex', '1' );
      });
    }
  });
}() );

// DESKTOP NAVIGATION
( function() {

  // Kill the script if there is no main menu item
  if ( ! document.querySelector( '#main-navigation' ) ) {
    return;
  }

  const lis = [ ...document.querySelectorAll( '#main-navigation li' ) ];
  const anchors = [ ...document.querySelectorAll( '#main-navigation a' ) ];

  // Function that returns an array of an elements parents (up to the #main-navigation node)
  const getParents = function( elem ) {
    const parents = [];
    for ( ; elem; elem = elem.parentNode ) {
      if ( 'main-navigation' === elem.id ) {
        break;
      }
      parents.unshift( elem );
    }
    return parents;
  };

  anchors.forEach( anchor => {
    anchor.addEventListener( 'focus', () => {
      const parents = getParents( anchor );

      lis.forEach( li => {
        li.classList.remove( 'focus' );
      });

      // If a one level dropdown, add a focus class to the li
      if ( parents[parents.length - 2].classList.contains( 'menu-item-has-children' ) ) {
        anchor.parentElement.classList.add( 'focus' );
      }

      // If a more than a one level dropdown, add a focus class each li in the "parents" array
      if ( parents[parents.length - 3].classList.contains( 'sub-menu' ) ) {
        parents.forEach( parent => {
          if ( 'li' === parent.localName ) {
            parent.classList.add( 'focus' );
          }
        });
      }
    });

    // Reset all li's when focus is removed
    anchor.addEventListener( 'focusout', () => {
      lis.forEach( li => {
        li.classList.remove( 'focus' );
      });
    });
  });
}() );
