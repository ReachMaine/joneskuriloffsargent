$(document).ready(function() {
  
  // When Navbar is present on top
  if ($('.navbar-fixed-top').length) {
    
    // If there is a Top Menu
    if ($('nav#top-nav').length != 0) {
      $('nav#top-nav').css('margin-top', '40px');
      // console.log('Top Navigation Found'); // Testing Purposes
      
      // If there is a header
    } else if ($('header#navigation').length != 0) {
      $('header#navigation').css('margin-top', '40px');
      // console.log('Navigation Found'); // Testing Purposes
      
      // If there is a .hero-unit
    } else if ($('.hero-unit').length != 0) {
      $('.hero-unit').css('margin-top', '40px');
      // console.log('Hero Unit Found'); // Testing Purposes
      
      // Else, add padding to content area
    } else {
      $('section#content').css('padding-top', '40px');
      // console.log('Content Area Found'); // Testing Purposes
    }
  } // End Navbar Check
  
  // When Navbar is present on bottom
  if ($('.navbar-fixed-bottom').length) {
    
    // Add margin of bottom 40px
    $('footer').css('margin-bottom', '40px');
  } // End Navbar Bottom Check
  
  
  // Check if an item is a parent
  if ($('ul.nav li ul.sub-menu').length) {
    
    // if the list item has a child of ul.sub-menu apply the class "dropdown"
    $('ul.nav li:has(> ul.sub-menu)').addClass('dropdown');
    
    // Select the links with the parent list item being li.dropdown
    // Add an attribute of data-toggle and a value of dropdown
    // Add a class of "dropdown-toggle"
    $('li.dropdown a').attr('data-toggle', 'dropdown').addClass('dropdown-toggle');
    
    // Append "<b class='caret'></b>" to links with the class "dropdown-toggle"
    $('li.dropdown a.dropdown-toggle').append('<b class="caret"></b>');
    
    // For all child menus add the class "dropdown-menu"
    $('ul.sub-menu').addClass('dropdown-menu');
    
    // For all child menus list item links remove attribute and class
    $('ul.sub-menu li a').removeAttr('data-toggle', 'dropdown').removeClass('dropdown-toggle');

    // For all child menus list item links remove "<b class='caret'></b>"
    $('ul.sub-menu li a b.caret').remove();
  }
});