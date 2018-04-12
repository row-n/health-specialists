import $ from 'jquery';
import plugin from './plugin';

class Menu {
  constructor(element) {
    this.$element = $(element);
    this.$mainNavigation = this.$element.find('.menu__top');
    this.$mainNavigationItems = this.$mainNavigation.find('.menu__item--has-children');
    this.$dropdownList = this.$element.find('.menu__dropdown');
    this.$dropdownWrappers = this.$dropdownList.find('.sub-menu');
    this.$dropdownItems = this.$dropdownList.find('.sub-menu__list');
    this.resizing = false;

    this.events();

    // on resize, reset dropdown style property
    // this.updateDropdownPosition();
    // $(window).on('resize', () => {
    //   if (!this.resizing) {
    //     this.resizing = true;
    //     if (!window.requestAnimationFrame) {
    //       setTimeout(() => {
    //         this.updateDropdownPosition();
    //       }, 300);
    //     } else {
    //       window.requestAnimationFrame(this.updateDropdownPosition());
    //     }
    //   }
    // });
  }

  showDropdown(item) {
    const $selectedDropdown = this.$dropdownList.find(`#${item.data('content')}`);
    const selectedDropdownHeight = $selectedDropdown.outerHeight();
    const selectedDropdownWidth = $selectedDropdown.children('.sub-menu__list').outerWidth();
    const selectedDropdownLeft = item.offset().left + ((item.innerWidth() / 2) - (selectedDropdownWidth / 2));

    // update dropdown position and size
    this.updateDropdown($selectedDropdown, parseInt(selectedDropdownHeight, 10), parseInt(selectedDropdownWidth, 10), parseInt(selectedDropdownLeft, 10));

    // add active class to the proper dropdown item
    this.$element.find('.is-active').removeClass('is-active');
    $selectedDropdown.addClass('is-active').removeClass('sub-menu--move-left sub-menu--move-right');
    $selectedDropdown.prevAll().addClass('sub-menu--move-left');
    $selectedDropdown.nextAll().addClass('sub-menu--move-right');
    item.addClass('is-active');
    // show the dropdown wrapper if not visible yet
    if (!this.$element.hasClass('header--active')) {
      setTimeout(() => {
        this.$element.addClass('header--active');
      }, 10);
    }
  }

  updateDropdown(dropdownItem, height, width, left) {
    this.$dropdownList.css({
      '-moz-transform': `translateX(${left}px)`,
      '-webkit-transform': `translateX(${left}px)`,
      '-ms-transform': `translateX(${left}px)`,
      '-o-transform': `translateX(${left}px)`,
      transform: `translateX(${left}px)`,
      width: `${width}px`,
      height: `${height}px`,
    });
  }

  hideDropdown() {
    this.$element.removeClass('header--active').find('.is-active').removeClass('is-active');
    this.$element.find('.sub-menu--move-left').removeClass('sub-menu--move-left');
    this.$element.find('.sub-menu--move-right').removeClass('sub-menu--move-right');
  }

  resetDropdown() {
    this.$dropdownList.removeAttr('style');
  }

  updateDropdownPosition() {
    this.resetDropdown();
    this.resizing = false;
  }

  events() {
    // hover over an item in the main navigation
    this.$mainNavigationItems.mouseenter((event) => {
      // hover over one of the nav items -> show dropdown
      this.showDropdown($(event.target));
    }).mouseleave(() => {
      setTimeout(() => {
        // if not hovering over a nav item or a dropdown -> hide dropdown
        if (this.$mainNavigation.find('.menu__item--has-children:hover').length === 0 && this.$element.find('.menu__dropdown:hover').length === 0) {
          this.hideDropdown();
        }
      }, 50);
    });

    // hover over the dropdown
    this.$dropdownList.mouseleave(() => {
      setTimeout(() => {
        // if not hovering over a dropdown or a nav item -> hide dropdown
        if (this.$mainNavigation.find('.menu__item--has-children:hover').length === 0 && this.$element.find('.menu__dropdown:hover').length === 0) {
          this.hideDropdown();
        }
      }, 50);
    });

    // click on an item in the main navigation -> open a dropdown on a touch device
    this.$mainNavigationItems.on('click', (event) => {
      const $selectedDropdown = this.$dropdownList.find(`#${$(event.target).data('content')}`);
      if (!this.$element.hasClass('header--active') || !$selectedDropdown.hasClass('is-active')) {
        event.preventDefault();
        this.showDropdown($(event.target));
      }
    });

    // on small screens, open navigation clicking on the menu icon
    // this.$element.on('click', '.nav-trigger', (event) => {
    //   event.preventDefault();
    //   this.element.toggleClass('nav-open');
    // });
  }
}

plugin('Menu', Menu);
