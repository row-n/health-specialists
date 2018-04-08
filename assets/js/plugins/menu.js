import $ from 'jquery';
import plugin from './plugin';

class Menu {
  constructor(element, options) {
    this.$element = $(element);
    this.$mainNavigation = this.$element.find('.menu__top');
    this.$mainNavigationItems = this.$mainNavigation.find('.menu__item--has-children');
    this.$dropdownList = this.$element.find('.menu__dropdown');
    this.$dropdownWrappers = this.$dropdownList.find('.sub-menu');
    this.$dropdownItems = this.$dropdownList.find('.sub-menu__list');
    this.$dropdownBg = this.$element.find('.bg-layer');
    this.resizing = false;

    this.bindEvents();

    // on resize, reset dropdown style property
    // this.updateDropdownPosition();
    // $(window).on('resize', () => {
    //   if (!this.resizing) {
    //     this.resizing = true;
    //     (!window.requestAnimationFrame) ? setTimeout(this.updateDropdownPosition, 300) : window.requestAnimationFrame(updateDropdownPosition);
    //   }
    // });
  }

  showDropdown(item) {
    const $selectedDropdown = this.$dropdownList.find(`#${item.data('content')}`);
    const selectedDropdownHeight = $selectedDropdown.innerHeight();
    const selectedDropdownWidth = $selectedDropdown.children('.sub-menu__list').innerWidth();
    const selectedDropdownLeft = item.offset().left +
      ((item.innerWidth() / 2) - (selectedDropdownWidth / 2));

    console.log(selectedDropdownHeight);
    console.log(selectedDropdownWidth);

    // update dropdown position and size
    this.updateDropdown($selectedDropdown, parseInt(selectedDropdownHeight, 10), selectedDropdownWidth, parseInt(selectedDropdownLeft, 10));
    // add active class to the proper dropdown item
    this.$element.find('.is-active').removeClass('is-active');
    $selectedDropdown.addClass('is-active').removeClass('sub-menu--move-left sub-menu--move-right').prevAll().addClass('sub-menu--move-left')
      .end()
      .nextAll()
      .addClass('sub-menu--move-right');
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

    this.$dropdownBg.css({
      '-moz-transform': `scaleX(${width}) scaleY(${height})`,
      '-webkit-transform': `scaleX(${width}) scaleY(${height})`,
      '-ms-transform': `scaleX(${width}) scaleY(${height})`,
      '-o-transform': `scaleX(${width}) scaleY(${height})`,
      transform: `scaleX(${width}) scaleY(${height})`,
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

  bindEvents() {
    // hover over an item in the main navigation
    this.$mainNavigationItems.mouseenter((event) => {
      // hover over one of the nav items -> show dropdown
      this.showDropdown($(event.target));
    }).mouseleave(() => {
      setTimeout(() => {
        // if not hovering over a nav item or a dropdown -> hide dropdown
        if (this.$mainNavigation.find('.menu__item--has-children:hover').length === 0 && this.$element.find('.menu__bottom menu__list:hover').length === 0) {
          this.hideDropdown();
        }
      }, 50);
    });

    // hover over the dropdown
    this.$dropdownList.mouseleave(() => {
      setTimeout(() => {
        // if not hovering over a dropdown or a nav item -> hide dropdown
        if (this.$mainNavigation.find('.menu__item--has-children:hover').length === 0 && this.$element.find('.menu__bottom menu__list:hover').length === 0) {
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

Menu.DEFAULTS = {
};

plugin('Menu', Menu);
