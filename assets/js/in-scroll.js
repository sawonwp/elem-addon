(function(jquery) {
    jquery.fn.marqueeSlider = function(options) {
      const defaults = {
        sensitivity: 0.1,
        repeatItems: true,
      };
  
      return this.each(function(index, element) {
        const container = jquery(element);
        const lists = container.find('.marquee-slider__list');
        const settings = jquery.extend({}, defaults, options[index]);
  
        if (settings.repeatItems) {
          lists.each(function() {
            const list = jquery(this);
            const items = list.find('.marquee-slider__list--item');
  
            // Calculate the total width of the items
            let totalItemsWidth = 0;
            items.each(function() {
              totalItemsWidth += jquery(this).outerWidth(true);
            });
  
            // Calculate the number of items to repeat based on the container width
            const containerWidth = container.width();
            const itemsToRepeat = Math.ceil(containerWidth / totalItemsWidth) + 1;
              
            // Clone and append items to meet the required count
            for (let i = 0; i < itemsToRepeat; i++) {
              items.clone().addClass('cloned').appendTo(list);
            }
          });
        }
  
        let scrollPosition = 0;
        let lastScrollTop = 0;
  
        function handleScroll() {
          const st = jquery(window).scrollTop();
  
          if (st > lastScrollTop) {
            // Scroll down
            scrollPosition += settings.sensitivity;
          } else {
            // Scroll up
            scrollPosition -= settings.sensitivity;
          }
  
          lists.each(function(index) {
            const direction = index % 2 === 0 ? -1 : 1;
            const translateValue = scrollPosition * direction;
  
            jquery(this).css('transform', `translate3d(jquery{translateValue}%, 0, 0)`);
          });
  
          lastScrollTop = st;
        }
  
        jquery(window).on('scroll', function() {
          const containerTop = container.offset().top;
          const containerBottom = containerTop + container.outerHeight();
          const windowTop = jquery(window).scrollTop();
          const windowBottom = windowTop + jquery(window).height();
  
          if (windowBottom > containerTop && windowTop < containerBottom) {
            // The container is in the viewport
            handleScroll();
          }
        });
      });
    };
  })(jQuery);



  