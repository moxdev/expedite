/**
 * Mobile Navigation Functions
 */

( function( panel ) {

  // Button
  const mobileToggle = document.querySelector( '.menu-toggle' );
  mobileToggle.addEventListener( 'click', function() {
    panel.classList.toggle( 'nav-open' );
    this.classList.toggle( 'nav-open' );
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
}( document.getElementById( 'site-navigation' ) ) );
